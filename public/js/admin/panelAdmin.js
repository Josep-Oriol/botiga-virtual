import { listarProductos } from "../utils/productos.js";
import { contenidoCategorias, initializeImagePreview } from "../utils/categorias.js";
import { listarUsuarios } from "../utils/usuarios.js";
import { listarCompras } from "../utils/compras.js";

document.addEventListener("DOMContentLoaded", () => {
    const currentPage = {
        productos: document.getElementById("listadoProductos"),
        categorias: document.getElementById("listadoCategorias"),
        usuarios: document.getElementById("listadoUsuarios"),
        compras: document.getElementById("listadoCompras"),
        crearCategoria: document.getElementById("imagen_categoria")
    };

    if (currentPage.productos) {
        console.log("listadoProductos");
        listarProductos();
    } else if (currentPage.categorias) {
        console.log("categorias");
        contenidoCategorias();
    } else if (currentPage.crearCategoria) {
        console.log("crear/editar categoria");
        initializeImagePreview();
    } else if (currentPage.usuarios) {
        console.log("listadoUsuarios");
        listarUsuarios();
    } else if (currentPage.compras) {
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

export function route(path, params = {}) {
    const baseUrl = document
        .querySelector('meta[name="base-url"]')
        .getAttribute("content");

    let url = baseUrl + "/" + path;

    Object.keys(params).forEach((key) => {
        url = url.replace(`:${key}`, params[key]);
    });

    return url;
}
