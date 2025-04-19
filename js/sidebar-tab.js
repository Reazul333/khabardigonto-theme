document.addEventListener("DOMContentLoaded", function () {
    const tabs = document.querySelectorAll(".tab-btn");
    const contents = document.querySelectorAll(".tab-content");

    tabs.forEach((tab) => {
        tab.addEventListener("click", function () {
            // Remove active class from all tabs
            tabs.forEach((t) => t.classList.remove("active"));
            // Hide all contents
            contents.forEach((c) => c.style.display = "none");

            // Add active class to clicked tab
            tab.classList.add("active");
            // Show the corresponding content
            const target = tab.getAttribute("data-tab");
            document.getElementById(target).style.display = "block";
        });
    });
});
