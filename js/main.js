
document.addEventListener('DOMContentLoaded', function() {
    // Update copyright year
    document.getElementById('current-year').textContent = new Date().getFullYear();

    // Header scroll effect
    const header = document.querySelector('.site-header');
    let scrolled = false;

    function handleScroll() {
        if (window.scrollY > 20 && !scrolled) {
            header.style.padding = '0.75rem 0';
            header.style.boxShadow = '0 4px 6px -1px rgba(0, 0, 0, 0.1)';
            scrolled = true;
        } else if (window.scrollY <= 20 && scrolled) {
            header.style.padding = '1rem 0';
            header.style.boxShadow = '0 1px 3px rgba(0, 0, 0, 0.1)';
            scrolled = false;
        }
    }

    window.addEventListener('scroll', handleScroll);

    // Mobile menu toggle
    const menuToggle = document.querySelector('.menu-toggle');
    const mainNav = document.querySelector('.main-nav');

    if (menuToggle && mainNav) {
        menuToggle.addEventListener('click', function() {
            mainNav.classList.toggle('show');
        });
    }
});
