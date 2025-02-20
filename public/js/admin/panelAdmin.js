import {
    contenidoProductos,
    setContenidoProductos,
} from "../utils/productos.js";
import {
    contenidoCategorias,
    setContenidoCategorias,
} from "../utils/categorias.js";

export const content = document.querySelector(".content");

export const crear = document.getElementById("crear");

document.addEventListener("DOMContentLoaded", () => {
    const adminNavItems = document.querySelectorAll(".admin-nav-item");

    if (crear) {
        crear.addEventListener("click", () => {
            popupCrearProducto();
        });
    }

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
                setContenidoCategorias();
                contenidoCategorias();
                break;
            case "productos":
                setContenidoProductos();
                contenidoProductos();
                break;
        }
    }
});

export function asset(path) {
    const baseUrl = document
        .querySelector('meta[name="asset-url"]')
        .getAttribute("content");
    return baseUrl + path;
}
