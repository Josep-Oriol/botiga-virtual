import { content } from "./panelAdmin.js";

export function tenerProductos() {
    console.log("Tener productos");
}

export function contenidoProductos() {
    const contentProductos = document.createElement("div");

    const hProductos = document.createElement("h1");
    hProductos.textContent = "Productos";
    hProductos.setAttribute("class", "p-5");

    const busqueda = document.createElement("input");
    busqueda.setAttribute("placeholder", "Buscar...");
    busqueda.setAttribute("class", "pl-2");

    const botonBuscar = document.createElement("button");
    botonBuscar.textContent = "Buscar";
    botonBuscar.addEventListener("click", () => {
        console.log("Buscar");
    });

    const botonCrear = document.createElement("button");
    botonCrear.textContent = "Crear";
    botonCrear.addEventListener("click", () => {
        crearProducto();
    });

    const listaProductos = document.createElement("div");
    listaProductos.id = "listaProductos";

    contentProductos.appendChild(hProductos);
    contentProductos.appendChild(busqueda);
    contentProductos.appendChild(botonBuscar);
    contentProductos.appendChild(botonCrear);
    contentProductos.appendChild(listaProductos);

    content.appendChild(contentProductos);

    listarProductos();
}

async function listarProductos() {
    const listaProductos = document.getElementById("listaProductos");
    const productos = await obtenerProductos();

    for (let producto of productos) {
        const productoDiv = document.createElement("div");
        productoDiv.textContent = producto.nombre_producto;
        listaProductos.appendChild(productoDiv);
    }
}

async function obtenerProductos() {
    const productos = await fetch("/productos");
    const data = await productos.json();
    return Array.isArray(data) ? data : [];
}

async function crearProducto() {
    const producto = await fetch("/productos", {
        method: "POST",
    });
}

async function eliminarProducto(id) {
    const producto = await fetch(`/productos/${id}`, {
        method: "DELETE",
    });
}

async function editarProducto(id) {
    const producto = await fetch(`/productos/${id}`, {
        method: "PUT",
    });
}
