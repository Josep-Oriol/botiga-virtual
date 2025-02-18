import { contenidoProductos, popupCrearProducto } from "./productos.js";
import { contenidoCategorias } from "./categorias.js";

export const content = document.querySelector(".content");

const botonCrearProducto = document.getElementById("popupCrearProducto");

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
                contenidoCategorias();
                break;
            case "productos":
                contenidoProductos();
                break;
        }
    }

    botonCrearProducto.addEventListener("click", () => {
        popupCrearProducto();
    });
});
