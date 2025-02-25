import { listarProductos } from "../utils/productos.js";
import { listarCategorias } from "../utils/categorias.js";
import { listarUsuarios } from "../utils/usuarios.js";

document.addEventListener("DOMContentLoaded", () => {
    const listadoProductos = document.getElementById("listadoProductos");
    const listadoCategorias = document.getElementById("listadoCategorias");
    const listadoUsuarios = document.getElementById("listadoUsuarios");

    if (listadoProductos) {
        console.log("listadoProductos");
        listarProductos();
    } else if (listadoCategorias) {
        console.log("listadoCategorias");
        listarCategorias();
    } else if (listadoUsuarios) {
        console.log("listadoUsuarios");
        listarUsuarios();
    }
});

export function asset(path) {
    const baseUrl = document
        .querySelector('meta[name="asset-url"]')
        .getAttribute("content");
    return baseUrl + path;
}
