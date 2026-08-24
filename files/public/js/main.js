/*
    Stack — the site's small interaction layer.

    The layout head runs a tiny pre-paint script that applies the saved (or
    system) theme and adds the .js class; everything here builds on that.
    Every effect degrades cleanly: without this file the page is fully
    visible, all posts show, and navigation still works.
*/

document.addEventListener('DOMContentLoaded', function () {
    markCurrentMenuItem();
    stickyHeader();
    themeToggle();
    revealOnScroll();
    paginatePosts();
    readingProgress();
});

var REDUCED_MOTION = window.matchMedia('(prefers-reduced-motion: reduce)');

// The header only grows a background and a hairline once content scrolls under it.
function stickyHeader() {
    var header = document.getElementById('header');
    if (!header) return;

    function evaluate() {
        if (window.scrollY > 12) {
            header.setAttribute('data-scrolled', '');
        } else {
            header.removeAttribute('data-scrolled');
        }
    }

    evaluate();
    window.addEventListener('scroll', evaluate, { passive: true });
}

// The sun and moon swap via the dark: variant in CSS — this only owns the class and the preference.
function themeToggle() {
    var toggles = document.querySelectorAll('[data-theme-toggle]');

    toggles.forEach(function (toggle) {
        toggle.addEventListener('click', function () {
            var isDark = document.documentElement.classList.toggle('dark');
            localStorage.setItem('stack_theme', isDark ? 'dark' : 'light');
        });
    });
}

// aria-current tells screen readers which page you are on, and styles the active link.
function markCurrentMenuItem() {
    document.querySelectorAll('#header nav a').forEach(function (item) {
        if (item.pathname === window.location.pathname) {
            item.setAttribute('aria-current', 'page');
        }
    });
}

// Flip .is-visible on each [data-reveal] as it scrolls into view — once.
function revealOnScroll() {
    var revealed = document.querySelectorAll('[data-reveal]');
    if (!revealed.length) return;

    if (!('IntersectionObserver' in window) || REDUCED_MOTION.matches) {
        revealed.forEach(function (el) { el.classList.add('is-visible'); });
        return;
    }

    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                observer.unobserve(entry.target);
            }
        });
    }, { rootMargin: '0px 0px -8% 0px' });

    revealed.forEach(function (el) { observer.observe(el); });
}

/*
    The quiet page turn: the post ledger paginates in place. All rows are in
    the DOM (and visible without JavaScript); this chunks them into pages and
    replays a staggered entrance on each turn.
*/
function paginatePosts() {
    var list = document.querySelector('[data-posts]');
    var controls = document.querySelector('[data-pagination]');
    if (!list || !controls) return;

    var rows = Array.prototype.slice.call(list.querySelectorAll('[data-post-row]'));
    var perPage = parseInt(list.getAttribute('data-per-page'), 10) || 5;
    var totalPages = Math.ceil(rows.length / perPage);
    if (totalPages < 2) return;

    var prev = controls.querySelector('[data-page-prev]');
    var next = controls.querySelector('[data-page-next]');
    var currentLabel = controls.querySelector('[data-page-current]');
    var totalLabel = controls.querySelector('[data-page-total]');
    var page = 1;

    controls.removeAttribute('hidden');
    totalLabel.textContent = totalPages;

    function show(target, animate) {
        page = Math.min(Math.max(target, 1), totalPages);
        var start = (page - 1) * perPage;

        rows.forEach(function (row, index) {
            var onPage = index >= start && index < start + perPage;
            row.hidden = !onPage;
            row.classList.remove('is-entering');

            if (onPage && animate && !REDUCED_MOTION.matches) {
                row.style.setProperty('--stagger', ((index - start) * 45) + 'ms');
                // Reflow so the entrance replays on every turn of the same rows.
                void row.offsetWidth;
                row.classList.add('is-entering');
            }
        });

        currentLabel.textContent = page;
        prev.disabled = page === 1;
        next.disabled = page === totalPages;
    }

    function turn(delta) {
        show(page + delta, true);
        var top = list.getBoundingClientRect().top + window.scrollY - 96;
        window.scrollTo({ top: top, behavior: REDUCED_MOTION.matches ? 'auto' : 'smooth' });
    }

    prev.addEventListener('click', function () { turn(-1); });
    next.addEventListener('click', function () { turn(1); });

    show(1, false);
}

// A 1px hairline along the top of article pages tracks reading position.
function readingProgress() {
    var bar = document.querySelector('[data-progress]');
    var article = document.querySelector('[data-article]');
    if (!bar || !article) return;

    function update() {
        var rect = article.getBoundingClientRect();
        var total = rect.height - window.innerHeight;
        var progress = total > 0 ? Math.min(Math.max(-rect.top / total, 0), 1) : 1;
        bar.style.setProperty('--progress', progress);
    }

    update();
    window.addEventListener('scroll', update, { passive: true });
    window.addEventListener('resize', update, { passive: true });
}
