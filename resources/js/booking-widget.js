const widget = document.querySelector('[data-booking-widget]');

if (widget) {
    const nextLabels = {
        1: 'Next: <strong>Date &amp; Time</strong>',
        2: 'Next: <strong>Basic Details</strong>',
        3: 'Next: <strong>Summary</strong>',
        4: '<strong>Confirm Booking</strong>',
    };

    const state = { step: 1, service: null, date: null, dateLabel: null, time: null, days: [] };

    const element = (selector) => widget.querySelector(selector);
    const elements = (selector) => widget.querySelectorAll(selector);

    const nextButton = element('[data-step-next]');
    const backButton = element('[data-step-back]');
    const detailsForm = element('[data-details-form]');
    const message = element('[data-booking-message]');
    const availabilityStatus = element('[data-availability-status]');
    const dayList = element('[data-day-list]');
    const timeList = element('[data-time-list]');
    const timeSection = element('[data-time-section]');
    const pillTemplate = element('[data-day-template]');

    const press = (buttons, pressedButton) => {
        buttons.forEach((button) => button.setAttribute('aria-pressed', String(button === pressedButton)));
    };

    const canAdvance = () => {
        if (state.step === 1) {
            return state.service !== null;
        }

        if (state.step === 2) {
            return state.date !== null && state.time !== null;
        }

        return true;
    };

    const refreshNextButton = () => {
        nextButton.disabled = !canAdvance();
    };

    const showStep = (step) => {
        state.step = step;

        elements('[data-step-panel]').forEach((panel) => {
            panel.hidden = Number(panel.dataset.stepPanel) !== step;
        });

        elements('[data-step-link]').forEach((link) => {
            const linkStep = Number(link.dataset.stepLink);

            link.dataset.state = linkStep === step ? 'current' : linkStep < step ? 'done' : 'upcoming';
            link.disabled = linkStep >= step;
        });

        element('[data-next-label]').innerHTML = nextLabels[step];
        backButton.classList.toggle('invisible', step === 1);
        message.textContent = '';
        refreshNextButton();
    };

    const createPill = (label, onSelect, list) => {
        const pill = pillTemplate.content.firstElementChild.cloneNode(true);

        pill.querySelector('[data-label]').textContent = label;
        pill.addEventListener('click', () => {
            press(list.querySelectorAll('button'), pill);
            onSelect();
            refreshNextButton();
        });

        return pill;
    };

    const renderTimes = (day) => {
        timeList.replaceChildren(
            ...day.slots.map((slot) =>
                createPill(
                    slot,
                    () => {
                        state.time = slot;
                    },
                    timeList,
                ),
            ),
        );
        timeSection.hidden = false;
    };

    const loadAvailability = async () => {
        state.date = null;
        state.time = null;
        dayList.replaceChildren();
        timeSection.hidden = true;
        availabilityStatus.textContent = 'Loading available times…';

        try {
            const response = await fetch(widget.dataset.availabilityUrl.replace('__SERVICE__', state.service.id), {
                headers: { Accept: 'application/json' },
            });

            if (!response.ok) {
                throw new Error(String(response.status));
            }

            state.days = (await response.json()).days;
        } catch {
            availabilityStatus.textContent = 'We could not load available times. Please refresh and try again.';

            return;
        }

        availabilityStatus.textContent = state.days.length === 0 ? 'No times are available in the next three weeks. Please send us a message instead.' : '';

        dayList.replaceChildren(
            ...state.days.map((day) =>
                createPill(
                    day.label,
                    () => {
                        state.date = day.date;
                        state.dateLabel = day.label;
                        state.time = null;
                        renderTimes(day);
                    },
                    dayList,
                ),
            ),
        );
        refreshNextButton();
    };

    const fillSummary = () => {
        const details = new FormData(detailsForm);
        const values = {
            service: `${state.service.name} (${state.service.duration} min)`,
            when: `${state.dateLabel}, ${state.time} (PKT)`,
            name: details.get('name'),
            email: details.get('email'),
            phone: details.get('phone') || '—',
            notes: details.get('notes') || '—',
        };

        elements('[data-summary-field]').forEach((field) => {
            field.textContent = values[field.dataset.summaryField];
        });
    };

    const submitBooking = async () => {
        nextButton.disabled = true;
        message.textContent = 'Booking your call…';

        const details = Object.fromEntries(new FormData(detailsForm));
        let response;

        try {
            response = await fetch(widget.dataset.storeUrl, {
                method: 'POST',
                headers: {
                    Accept: 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({ service_id: state.service.id, date: state.date, time: state.time, ...details }),
            });
        } catch {
            message.textContent = 'We could not reach the server. Please check your connection and try again.';
            refreshNextButton();

            return;
        }

        if (response.status === 201) {
            const booking = await response.json();

            element('[data-summary-heading]').textContent = 'Booking confirmed';
            message.classList.remove('text-booking-accent');
            message.textContent = `You're booked in for ${booking.service} on ${booking.starts_at} (PKT). A confirmation email is on its way.`;
            element('[data-booking-actions]').hidden = true;
            elements('[data-step-link]').forEach((link) => {
                link.disabled = true;
                link.dataset.state = 'done';
            });

            return;
        }

        if (response.status === 422) {
            const { errors } = await response.json();

            if (errors.time) {
                showStep(2);
                await loadAvailability();
                availabilityStatus.textContent = errors.time[0];

                return;
            }

            message.textContent = Object.values(errors).flat().join(' ');
        } else if (response.status === 429) {
            message.textContent = 'Too many attempts. Please wait a minute and try again.';
        } else {
            message.textContent = 'Something went wrong. Please try again.';
        }

        refreshNextButton();
    };

    elements('[data-category-filter]').forEach((filter) => {
        filter.addEventListener('click', () => {
            press(elements('[data-category-filter]'), filter);

            elements('[data-service-option]').forEach((option) => {
                option.hidden = filter.dataset.categoryFilter !== 'all' && option.dataset.category !== filter.dataset.categoryFilter;
            });
        });
    });

    elements('[data-service-option]').forEach((option) => {
        option.addEventListener('click', () => {
            press(elements('[data-service-option]'), option);
            state.service = {
                id: option.dataset.serviceOption,
                name: option.dataset.serviceName,
                duration: option.dataset.serviceDuration,
            };
            refreshNextButton();
        });
    });

    elements('[data-step-link]').forEach((link) => {
        link.addEventListener('click', () => showStep(Number(link.dataset.stepLink)));
    });

    backButton.addEventListener('click', () => showStep(state.step - 1));

    nextButton.addEventListener('click', async () => {
        if (state.step === 4) {
            await submitBooking();

            return;
        }

        if (state.step === 3 && !detailsForm.reportValidity()) {
            return;
        }

        if (state.step === 1) {
            await loadAvailability();
        }

        if (state.step === 3) {
            fillSummary();
        }

        showStep(state.step + 1);
    });
}
