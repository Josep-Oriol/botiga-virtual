import { asset } from "../admin/panelAdmin.js";

export function contenidoProductos() {
    listarProductos();
}

export function setContenidoProductos() {
    const titulo = document.getElementById("titulo");
    titulo.textContent = "Productos";

    const tituloEstadisticas = document.getElementById("tituloEstadisticas");
    tituloEstadisticas.textContent = "Productos Totales";

    const tituloActivos = document.getElementById("tituloActivos");
    tituloActivos.textContent = "Productos Activos";

    const tituloInactivos = document.getElementById("tituloInactivos");
    tituloInactivos.textContent = "Productos Inactivos";

    const tituloPopulares = document.getElementById("tituloPopulares");
    tituloPopulares.textContent = "Productos Populares";

    const tituloListado = document.getElementById("tituloListado");
    tituloListado.textContent = "Listado de Productos";

    const crear = document.getElementById("crear");
    crear.textContent = "Añadir nuevo producto";
}

async function listarProductos() {
    const listaProductos = document.getElementById("tabla");
    listaProductos.innerHTML = "";
    const productos = await obtenerProductos();

    for (let producto of productos) {
        const productoDiv = document.createElement("div");
        productoDiv.classList.add(
            "flex",
            "justify-between",
            "items-center",
            "mt-4",
            "p-4",
            "border-gray-700",
            "rounded-lg",
            "shadow-md",
            "bg-custom-dark1",
            "cursor-pointer"
        );

        const divDatos = document.createElement("div");
        divDatos.classList.add("flex", "gap-4");

        const nombreProducto = document.createElement("h3");
        nombreProducto.textContent = producto.nombre_producto;

        const precioProducto = document.createElement("p");
        precioProducto.textContent = producto.precio_producto + "€";
        precioProducto.classList.add("text-primary");

        const divIcons = document.createElement("div");
        divIcons.classList.add("flex", "gap-4", "pr-4");
        const editarProducto = document.createElement("img");
        editarProducto.src = asset("icons/admin/edit.svg");

        const verProducto = document.createElement("img");
        verProducto.src = asset("icons/admin/eye.svg");

        const confirmarEliminarProducto = document.createElement("img");
        confirmarEliminarProducto.src = asset("icons/admin/trash.svg");
        confirmarEliminarProducto.addEventListener("click", () => {
            eliminarProducto(producto.id);
        });

        divDatos.appendChild(nombreProducto);
        divDatos.appendChild(precioProducto);

        divIcons.appendChild(editarProducto);
        divIcons.appendChild(verProducto);
        divIcons.appendChild(confirmarEliminarProducto);

        productoDiv.appendChild(divDatos);
        productoDiv.appendChild(divIcons);
        listaProductos.appendChild(productoDiv);
    }
}

async function obtenerProductos() {
    const productos = await fetch("/productos");
    const data = await productos.json();
    return Array.isArray(data) ? data : [];
}

async function eliminarProducto(id) {
    const response = await fetch(`/productos/${id}`, {
        method: "DELETE",
        headers: {
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
    });

    const result = await response.json();

    if (response.ok) {
        alert("Producto eliminado correctamente");
        listarProductos();
    } else {
        alert(
            "Error: " + (result.message || "No se pudo eliminar el producto")
        );
    }
}

async function editarProducto(id) {
    const producto = await fetch(`/productos/${id}`, {
        method: "PUT",
    });
}
