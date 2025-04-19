document.addEventListener("DOMContentLoaded", function () {
    const toggleBtn = document.getElementById("darkModeBtn");
    const body = document.body;

    // আগের ইউজার পছন্দ লোড করো
    if (localStorage.getItem("darkMode") === "enabled") {
        body.classList.add("dark-mode");
        toggleBtn.innerText = "☀️ লাইট মোড";
    }

    // টগল বাটনে ক্লিক করলে dark mode চালু বা বন্ধ হবে
    toggleBtn.addEventListener("click", function () {
        body.classList.toggle("dark-mode");

        if (body.classList.contains("dark-mode")) {
            localStorage.setItem("darkMode", "enabled");
            toggleBtn.innerText = "☀️ লাইট মোড";
        } else {
            localStorage.setItem("darkMode", "disabled");
            toggleBtn.innerText = "🌙 ডার্ক মোড";
        }
    });
});
