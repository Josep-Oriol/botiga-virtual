import { listarProductos } from "../utils/productos.js";
import { listarCategorias } from "../utils/categorias.js";

document.addEventListener("DOMContentLoaded", () => {
    const listadoProductos = document.getElementById("listadoProductos");

    if (listadoProductos) {
        console.log("listadoProductos");
        listarProductos();
    } else if (listadoCategorias) {
        console.log("listadoCategorias");
        listarCategorias();
    }
});

export function asset(path) {
    const baseUrl = document
        .querySelector('meta[name="asset-url"]')
        .getAttribute("content");
    return baseUrl + path;
}
