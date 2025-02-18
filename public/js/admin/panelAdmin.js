import { contenidoProductos } from "./productos.js";
import { contenidoCategorias } from "./categorias.js";

export const content = document.querySelector(".content");

export const crear = document.getElementById("crear");

document.addEventListener("DOMContentLoaded", () => {
    const adminNavItems = document.querySelectorAll(".admin-nav-item");

    crear.addEventListener("click", () => {
        popupCrearProducto();
    });

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
                contenidoCategorias();
                break;
            case "productos":
                contenidoProductos();
                break;
        }
    }
});
