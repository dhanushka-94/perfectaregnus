import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {
    initMobileMenu();
    initProductBuyBar();
    initQuantityControls();
});

function initMobileMenu() {
    const toggle = document.getElementById('menu-toggle');
    const closeBtn = document.getElementById('menu-close');
    const panel = document.getElementById('mobile-nav-panel');
    const overlay = document.getElementById('mobile-nav-overlay');
    const links = panel?.querySelectorAll('.mobile-nav-link, .mobile-nav-panel .btn-primary');

    if (!toggle || !panel || !overlay) return;

    const open = () => {
        toggle.classList.add('is-active');
        toggle.setAttribute('aria-expanded', 'true');
        panel.classList.add('is-open');
        overlay.classList.add('is-open');
        overlay.setAttribute('aria-hidden', 'false');
        document.body.classList.add('menu-open');
    };

    const close = () => {
        toggle.classList.remove('is-active');
        toggle.setAttribute('aria-expanded', 'false');
        panel.classList.remove('is-open');
        overlay.classList.remove('is-open');
        overlay.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('menu-open');
    };

    toggle.addEventListener('click', () => {
        panel.classList.contains('is-open') ? close() : open();
    });

    closeBtn?.addEventListener('click', close);
    overlay.addEventListener('click', close);

    links?.forEach(link => link.addEventListener('click', close));

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') close();
    });

    window.matchMedia('(min-width: 1024px)').addEventListener('change', (e) => {
        if (e.matches) close();
    });
}

function initProductBuyBar() {
    const bar = document.getElementById('mobile-buy-bar');
    const trigger = document.getElementById('product-actions');

    if (!bar || !trigger) return;

    const observer = new IntersectionObserver(
        ([entry]) => bar.classList.toggle('is-visible', !entry.isIntersecting),
        { threshold: 0, rootMargin: '0px' }
    );

    observer.observe(trigger);
}

function initQuantityControls() {
    document.querySelectorAll('[data-qty-control]').forEach(control => {
        const input = control.querySelector('[data-qty-input]');
        const minus = control.querySelector('[data-qty-minus]');
        const plus = control.querySelector('[data-qty-plus]');

        if (!input) return;

        const min = parseInt(input.min) || 1;
        const max = parseInt(input.max) || 99;

        minus?.addEventListener('click', () => {
            const val = parseInt(input.value) || min;
            if (val > min) input.value = val - 1;
        });

        plus?.addEventListener('click', () => {
            const val = parseInt(input.value) || min;
            if (val < max) input.value = val + 1;
        });
    });
}
