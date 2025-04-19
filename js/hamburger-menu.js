document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.getElementById('hamburger-menu');
    const mainMenu = document.getElementById('main-menu');
    const scrollTopBtn = document.getElementById('scrollTopBtn');

    // ✅ শুধুমাত্র যদি এগুলা থাকে তখন কাজ করবে
    if (menuToggle && mainMenu) {
        menuToggle.addEventListener('click', function () {
            mainMenu.classList.toggle('active');
        });
    }

    // ✅ Scroll-to-top button
    if (scrollTopBtn) {
        window.addEventListener('scroll', function () {
            scrollTopBtn.style.display = window.scrollY > 200 ? 'block' : 'none';
        });

        scrollTopBtn.addEventListener('click', function () {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }
});
