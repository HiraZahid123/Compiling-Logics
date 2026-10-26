import './booking-widget';

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
