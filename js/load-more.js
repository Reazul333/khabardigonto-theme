document.addEventListener("DOMContentLoaded", function () {
    const loadMoreBtn = document.getElementById("loadMoreBtn");

    if (loadMoreBtn) {
        loadMoreBtn.addEventListener("click", function () {
            const page = parseInt(loadMoreBtn.dataset.page);
            const xhr = new XMLHttpRequest();

            xhr.open("POST", load_more_obj.ajax_url, true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onload = function () {
                if (xhr.status === 200) {
                    const container = document.getElementById("main-post-grid");
                    container.insertAdjacentHTML("beforeend", xhr.responseText);
                    loadMoreBtn.dataset.page = page + 1;
                }
            };

            xhr.send("action=load_more&page=" + page);
        });
    }
});
