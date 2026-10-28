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

const projectFilters = document.querySelector('[data-project-filters]');

if (projectFilters) {
    const projects = document.querySelectorAll('[data-project]');
    const emptyMessage = document.querySelector('[data-projects-empty]');
    const activeFilters = { type: 'all', industry: 'all' };

    const matches = (project, attribute, value) => value === 'all' || project.dataset[attribute].split(' ').includes(value);

    projectFilters.addEventListener('click', (event) => {
        const button = event.target.closest('[data-filter-group]');

        if (!button) {
            return;
        }

        const { filterGroup, filterValue } = button.dataset;
        activeFilters[filterGroup] = filterValue;

        projectFilters.querySelectorAll(`[data-filter-group="${filterGroup}"]`).forEach((option) => {
            option.setAttribute('aria-pressed', String(option === button));
        });

        let visibleCount = 0;

        projects.forEach((project) => {
            const isVisible = matches(project, 'types', activeFilters.type) && matches(project, 'industries', activeFilters.industry);

            project.hidden = !isVisible;
            visibleCount += isVisible ? 1 : 0;
        });

        emptyMessage?.classList.toggle('hidden', visibleCount > 0);
    });
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
                window.Calendly.initInlineWidget({ url: calendlyContainer.dataset.calendlyUrl, parentElement: calendlyContainer, resize: true });
            });
            document.head.append(script);
        },
        { rootMargin: '400px 0px' },
    );

    calendlyObserver.observe(calendlyContainer);
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

