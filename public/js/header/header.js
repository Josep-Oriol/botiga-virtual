document.addEventListener("DOMContentLoaded", function () {
    console.log("Header js cargado");

    const menuBtn = document.getElementById("mobile-menu-button");

    if (menuBtn) {
        menuBtn.addEventListener("click", function () {
            const menuMobileBtn = document.getElementById("mobile-menu");
            if (menuMobileBtn) {
                menuMobileBtn.classList.toggle("hidden");
            }
        });
    }
});
