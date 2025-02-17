import { tenerProductos, contenidoProductos } from "./productos.js";

export const content = document.querySelector(".content");

document.addEventListener("DOMContentLoaded", () => {
    const adminNavItems = document.querySelectorAll(".admin-nav-item");

    adminNavItems.forEach((item) => {
        item.addEventListener("click", () => {
            loadContent(item);
        });
    });

    function loadContent(element) {
        let contentId = element.id;

        switch (contentId) {
            case "estats":
                content.innerHTML = "";
                break;
            case "categorias":
                content.innerHTML = "";
                break;
            case "productos":
                content.innerHTML = "";
                contenidoProductos();
                tenerProductos();
                break;
        }
    }
});
