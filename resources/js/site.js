import './booking-widget';
import { initAgenticChat } from './agentic-chat';

initAgenticChat();

const menuToggle = document.querySelector('[data-menu-toggle]');
const menu = document.querySelector('[data-menu]');

if (menuToggle && menu) {
    menuToggle.addEventListener('click', () => {
        const isOpen = menuToggle.getAttribute('aria-expanded') === 'true';

        menuToggle.setAttribute('aria-expanded', String(!isOpen));
        menu.classList.toggle('hidden', isOpen);
    });
}

const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
const heroVideo = document.querySelector('[data-hero-video]');

if (heroVideo && prefersReducedMotion) {
    heroVideo.removeAttribute('autoplay');
    heroVideo.pause();
}

const showroom = document.querySelector('[data-showroom]');

if (showroom) {
    const tabs = [...showroom.querySelectorAll('[data-showroom-tab]')];
    const stage = showroom.querySelector('[data-showroom-stage]');
    const image = stage.querySelector('[data-showroom-image]');
    const caseStudy = stage.querySelector('[data-showroom-case-study]');
    const visit = stage.querySelector('[data-showroom-visit]');
    const toggle = stage.querySelector('[data-showroom-toggle]');
    const autoplayDuration = 7000;
    let current = 0;
    let isPlaying = !prefersReducedMotion;
    let pausedByHover = false;
    let startedAt = performance.now();

    const field = (name) => stage.querySelector(`[data-showroom-${name}]`);

    const show = (index) => {
        current = (index + tabs.length) % tabs.length;
        const tab = tabs[current];
        const project = tab.dataset;

        tabs.forEach((option) => {
            option.setAttribute('aria-selected', String(option === tab));
            option.querySelector('[data-showroom-bar]').style.width = '0';
        });

        image.classList.add('opacity-0');
        setTimeout(() => {
            image.src = project.image;
            image.alt = `${project.name} website preview`;
            image.classList.remove('opacity-0');
        }, 180);

        field('domain').textContent = project.domain;
        field('category').textContent = project.category;
        field('name').textContent = project.name;
        field('description').innerHTML = project.description;
        field('tags').replaceChildren(
            ...project.tags.split('|').map((tag) =>
                Object.assign(document.createElement('li'), { textContent: tag, className: 'border border-black/14 bg-white px-2.5 py-1 text-xs tracking-[0.05em]' }),
            ),
        );

        caseStudy.disabled = !project.pdf;
        caseStudy.dataset.projectName = project.name;
        caseStudy.dataset.pdfUrl = project.pdf;
        caseStudy.querySelector('[data-showroom-case-study-label]').textContent = project.pdf ? 'View Case Study' : 'Case study coming soon';

        visit.href = project.url || '#';
        visit.classList.toggle('hidden', !project.url);

        startedAt = performance.now();

        if (window.innerWidth < 1024) {
            tab.scrollIntoView({ inline: 'center', block: 'nearest' });
        }
    };

    const setPlaying = (playing) => {
        isPlaying = playing;
        startedAt = performance.now();
        toggle.setAttribute('aria-label', playing ? 'Pause autoplay' : 'Play autoplay');
        toggle.querySelector('[data-showroom-pause-icon]').classList.toggle('hidden', !playing);
        toggle.querySelector('[data-showroom-play-icon]').classList.toggle('hidden', playing);

        if (!playing) {
            tabs[current].querySelector('[data-showroom-bar]').style.width = '0';
        }
    };

    const tick = (now) => {
        if (isPlaying) {
            const progress = Math.min((now - startedAt) / autoplayDuration, 1);
            tabs[current].querySelector('[data-showroom-bar]').style.width = `${progress * 100}%`;

            if (progress >= 1) {
                show(current + 1);
            }
        }

        requestAnimationFrame(tick);
    };

    tabs.forEach((tab, index) => tab.addEventListener('click', () => show(index)));
    stage.querySelector('[data-showroom-prev]').addEventListener('click', () => show(current - 1));
    stage.querySelector('[data-showroom-next]').addEventListener('click', () => show(current + 1));
    toggle.addEventListener('click', () => setPlaying(!isPlaying));

    stage.addEventListener('mouseenter', () => {
        if (isPlaying) {
            pausedByHover = true;
            setPlaying(false);
        }
    });
    stage.addEventListener('mouseleave', () => {
        if (pausedByHover) {
            pausedByHover = false;
            setPlaying(true);
        }
    });

    showroom.addEventListener('keydown', (event) => {
        if (event.key === 'ArrowRight' || event.key === 'ArrowLeft') {
            event.preventDefault();
            show(current + (event.key === 'ArrowRight' ? 1 : -1));
            tabs[current].focus();
        }
    });

    setPlaying(isPlaying);
    requestAnimationFrame(tick);
}

const revealElements = document.querySelectorAll('[data-reveal]');

if (revealElements.length > 0 && !prefersReducedMotion) {
    const revealObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach(({ target, isIntersecting }) => {
                if (isIntersecting) {
                    target.classList.add('is-revealed');
                    revealObserver.unobserve(target);
                }
            });
        },
        { rootMargin: '0px 0px -10% 0px' },
    );

    document.documentElement.classList.add('reveal-ready');
    revealElements.forEach((element) => revealObserver.observe(element));
}

const calendlyContainer = document.querySelector('[data-calendly-url]');

if (calendlyContainer) {
    const calendlyObserver = new IntersectionObserver(
        ([entry]) => {
            if (!entry.isIntersecting) {
                return;
            }

            calendlyObserver.disconnect();

            const script = document.createElement('script');
            script.src = 'https://assets.calendly.com/assets/external/widget.js';
            script.async = true;
            script.addEventListener('load', () => {
                window.Calendly.initInlineWidget({
                    url: calendlyContainer.dataset.calendlyUrl,
                    parentElement: calendlyContainer,
                    resize: true,
                });
            });
            document.head.append(script);
        },
        { rootMargin: '400px 0px' },
    );

    calendlyObserver.observe(calendlyContainer);
}

const scrollProgress = document.querySelector('[data-scroll-progress]');

if (scrollProgress) {
    const updateScrollProgress = () => {
        const scrollable = document.documentElement.scrollHeight - window.innerHeight;

        scrollProgress.style.setProperty('--scroll-progress', String(scrollable > 0 ? window.scrollY / scrollable : 0));
    };

    window.addEventListener('scroll', updateScrollProgress, { passive: true });
    updateScrollProgress();
}

const pillarChips = document.querySelectorAll('[data-pillar-chip]');

if (pillarChips.length > 0) {
    const pillarObserver = new IntersectionObserver(
        (entries) => {
            entries
                .filter(({ isIntersecting }) => isIntersecting)
                .forEach(({ target }) => {
                    pillarChips.forEach((chip) => {
                        const isActive = chip.dataset.pillarChip === target.id;

                        chip.toggleAttribute('data-active', isActive);

                        if (isActive) {
                            chip.scrollIntoView({ block: 'nearest', inline: 'center' });
                        }
                    });
                });
        },
        { rootMargin: '-45% 0px -50% 0px' },
    );

    document.querySelectorAll('[data-pillar-section]').forEach((section) => pillarObserver.observe(section));
}

document.querySelectorAll('[data-pick-pillar]').forEach((link) => {
    link.addEventListener('click', () => {
        document.querySelectorAll('[data-pillar-pick]').forEach((checkbox) => {
            if (checkbox.value === link.dataset.pickPillar) {
                checkbox.checked = true;
            }
        });
    });
});

const recaptchaOverlay = document.querySelector('[data-recaptcha-fit]');

if (recaptchaOverlay) {
    const fitRecaptcha = () => {
        const isOverlaid = window.matchMedia('(min-width: 768px)').matches;
        const scale = Math.min(1, recaptchaOverlay.offsetParent?.offsetWidth / 1920 || 1);

        recaptchaOverlay.style.transform = isOverlaid ? `scale(${scale})` : '';
    };

    window.addEventListener('resize', fitRecaptcha);
    fitRecaptcha();
}

const sentPopup = document.querySelector('[data-sent-popup]');

if (sentPopup) {
    const closeButton = sentPopup.querySelector('[data-sent-popup-close]');

    const closeSentPopup = () => {
        sentPopup.remove();
        document.removeEventListener('keydown', closeOnEscape);
    };

    const closeOnEscape = (event) => {
        if (event.key === 'Escape') {
            closeSentPopup();
        }
    };

    closeButton.addEventListener('click', closeSentPopup);
    sentPopup.addEventListener('click', (event) => {
        if (event.target === sentPopup) {
            closeSentPopup();
        }
    });
    document.addEventListener('keydown', closeOnEscape);
    closeButton.focus();
}

const testimonials = document.querySelector('[data-testimonials]');

if (testimonials) {
    const filters = testimonials.querySelectorAll('[data-testimonial-filter]');
    const items = testimonials.querySelectorAll('[data-testimonial-type]');

    filters.forEach((filter) => {
        filter.addEventListener('click', () => {
            const value = filter.dataset.testimonialFilter;

            filters.forEach((option) => option.setAttribute('aria-pressed', String(option === filter)));
            items.forEach((item) => {
                const isShown = value === 'all' || item.dataset.testimonialType === value;

                item.hidden = !isShown;
                item.classList.remove('is-filtered-in');

                if (isShown) {
                    void item.offsetWidth;
                    item.classList.add('is-filtered-in', 'is-revealed');
                }
            });
        });
    });

    const modal = testimonials.querySelector('[data-testimonial-modal]');

    if (modal) {
        const stage = modal.querySelector('[data-testimonial-stage]');
        const caption = modal.querySelector('[data-testimonial-caption]');

        const closeModal = () => {
            modal.classList.replace('flex', 'hidden');
            stage.replaceChildren();
        };

        const playerFor = (url) => {
            if (/\.(mp4|webm)(\?|$)/i.test(url)) {
                const video = Object.assign(document.createElement('video'), { src: url, controls: true, autoplay: true, playsInline: true });
                video.className = 'size-full';

                return video;
            }

            if (/^https:\/\//i.test(url)) {
                const frame = Object.assign(document.createElement('iframe'), {
                    src: `${url}${url.includes('?') ? '&' : '?'}autoplay=1`,
                    title: 'Video testimonial',
                    allow: 'autoplay; encrypted-media; fullscreen',
                    allowFullscreen: true,
                });
                frame.className = 'size-full border-0';

                return frame;
            }

            return Object.assign(document.createElement('p'), { textContent: 'This client video will appear here once its link is added.', className: 'px-6' });
        };

        testimonials.querySelectorAll('[data-testimonial-video]').forEach((poster) => {
            poster.addEventListener('click', () => {
                caption.textContent = poster.dataset.testimonialTitle;
                stage.replaceChildren(playerFor(poster.dataset.testimonialVideo));
                modal.classList.replace('hidden', 'flex');
                modal.querySelector('[data-testimonial-close]').focus();
            });
        });

        modal.querySelector('[data-testimonial-close]').addEventListener('click', closeModal);
        modal.addEventListener('click', (event) => {
            if (event.target === modal) {
                closeModal();
            }
        });
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && modal.classList.contains('flex')) {
                closeModal();
            }
        });
    }
}

const lazyVideos = document.querySelectorAll('[data-lazy-video]');

if (lazyVideos.length > 0) {
    const videoObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach(({ target: video, isIntersecting }) => {
                if (!isIntersecting) {
                    video.pause();

                    return;
                }

                if (!video.getAttribute('src')) {
                    video.src = video.dataset.src;
                }

                if (!prefersReducedMotion) {
                    video.play().catch(() => {});
                }
            });
        },
        { rootMargin: '200px 0px' },
    );

    lazyVideos.forEach((video) => videoObserver.observe(video));
}

const caseStudyModal = document.querySelector('[data-case-study-modal]');

if (caseStudyModal) {
    const dialog = caseStudyModal.querySelector('[data-case-study-dialog]');
    const titleEl = caseStudyModal.querySelector('[data-case-study-title]');
    const frameEl = caseStudyModal.querySelector('[data-case-study-frame]');
    const downloadEl = caseStudyModal.querySelector('[data-case-study-download]');
    const fallbackEl = caseStudyModal.querySelector('[data-case-study-fallback]');
    const closeBtn = caseStudyModal.querySelector('[data-case-study-close]');
    let previousActiveElement = null;

    const openModal = (projectName, pdfUrl) => {
        previousActiveElement = document.activeElement;

        if (titleEl) {
            titleEl.textContent = `${projectName} — Case Study`;
        }

        if (frameEl) {
            frameEl.src = pdfUrl;
        }

        if (downloadEl) {
            downloadEl.href = pdfUrl;
            downloadEl.setAttribute('download', `${projectName.toLowerCase().replace(/[^a-z0-9]+/g, '-')}-case-study.pdf`);
        }

        if (fallbackEl) {
            fallbackEl.href = pdfUrl;
        }

        caseStudyModal.classList.remove('hidden');
        caseStudyModal.classList.add('flex');

        // Force browser repaint to trigger CSS transitions
        void caseStudyModal.offsetHeight;

        caseStudyModal.classList.remove('opacity-0');
        caseStudyModal.classList.add('opacity-100');

        if (dialog) {
            dialog.classList.remove('scale-95');
            dialog.classList.add('scale-100');
        }

        document.body.classList.add('overflow-hidden');
        closeBtn?.focus();
    };

    const closeModal = () => {
        caseStudyModal.classList.remove('opacity-100');
        caseStudyModal.classList.add('opacity-0');

        if (dialog) {
            dialog.classList.remove('scale-100');
            dialog.classList.add('scale-95');
        }

        setTimeout(() => {
            caseStudyModal.classList.remove('flex');
            caseStudyModal.classList.add('hidden');
            if (frameEl) {
                frameEl.src = 'about:blank';
            }
            document.body.classList.remove('overflow-hidden');

            if (previousActiveElement && typeof previousActiveElement.focus === 'function') {
                previousActiveElement.focus();
            }
        }, 200);
    };

    document.addEventListener('click', (event) => {
        const trigger = event.target.closest('[data-case-study-trigger]');

        if (trigger) {
            event.preventDefault();
            const { projectName, pdfUrl } = trigger.dataset;
            if (pdfUrl) {
                openModal(projectName || 'Project', pdfUrl);
            }
            return;
        }

        if (event.target === caseStudyModal) {
            closeModal();
        }
    });

    closeBtn?.addEventListener('click', closeModal);

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && !caseStudyModal.classList.contains('hidden')) {
            closeModal();
        }
    });
}

