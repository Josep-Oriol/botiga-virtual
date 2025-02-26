import { listarProductos } from "../utils/productos.js";
import { listarCategorias } from "../utils/categorias.js";
import { listarUsuarios } from "../utils/usuarios.js";
import { listarCompras } from "../utils/compras.js";

document.addEventListener("DOMContentLoaded", () => {
    const listadoProductos = document.getElementById("listadoProductos");
    const listadoCategorias = document.getElementById("listadoCategorias");
    const listadoUsuarios = document.getElementById("listadoUsuarios");
    const listadoCompras = document.getElementById("listadoCompras");

    if (listadoProductos) {
        console.log("listadoProductos");
        listarProductos();
    } else if (listadoCategorias) {
        console.log("listadoCategorias");
        listarCategorias();
    } else if (listadoUsuarios) {
        console.log("listadoUsuarios");
        listarUsuarios();
    } else if (listadoCompras) {
        console.log("listadoCompras");
        listarCompras();
    }
});

export function asset(path) {
    const baseUrl = document
        .querySelector('meta[name="asset-url"]')
        .getAttribute("content");
    return baseUrl + path;
}
