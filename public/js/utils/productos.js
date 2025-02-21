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
    crear.innerHTML = "";
    const plusCrear = document.createElement("img");
    plusCrear.src = asset("icons/admin/plus.svg");
    crear.appendChild(plusCrear);
    crear.innerHTML += "Añadir nuevo producto";
}

async function listarProductos() {
    const listaProductos = document.getElementById("tabla");
    listaProductos.innerHTML = "";

    const productos = await obtenerProductos();
    //const estadisticas = await obtenerEstadisticas();

    /*const totalProductos = document.getElementById("totalProductos");
    totalProductos.textContent = estadisticas.total_productos;

    const totalProductosActivos = document.getElementById(
        "totalProductosActivos"
    );
    totalProductosActivos.textContent = estadisticas.productos_activos;

    const totalProductosInactivos = document.getElementById(
        "totalProductosInactivos"
    );
    totalProductosInactivos.textContent = estadisticas.productos_inactivos;*/

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
            "cursor-default"
        );

        const divDatos = document.createElement("div");
        divDatos.classList.add("flex", "gap-4");

        const nombreProducto = document.createElement("h3");
        nombreProducto.textContent = producto.nombre_producto;

        const precioProducto = document.createElement("p");
        precioProducto.textContent = producto.precio_producto + "€";
        precioProducto.classList.add("text-primary");

        const estadoProducto = document.createElement("p");
        if (producto.activo_producto) {
            estadoProducto.textContent = "Activo";
            estadoProducto.classList.add("rounded-md", "bg-green-500");
        } else {
            estadoProducto.textContent = "Inactivo";
            estadoProducto.classList.add("rounded-md", "bg-red-500");
        }

        const divEstado = document.createElement("div");
        divEstado.classList.add("flex", "gap-4");
        divEstado.appendChild(estadoProducto);

        const divIcons = document.createElement("div");
        divIcons.classList.add("flex", "gap-4", "pr-4");

        const editarProducto = document.createElement("img");
        editarProducto.src = asset("icons/admin/edit.svg");
        editarProducto.classList.add("cursor-pointer");
        editarProducto.addEventListener("click", () => {
            window.location.href = `/productos/${producto.id}/edit`;
        });

        const verProducto = document.createElement("img");
        verProducto.src = asset("icons/admin/eye.svg");
        verProducto.classList.add("cursor-pointer");
        verProducto.addEventListener("click", () => {
            window.location.href = `/productos/${producto.id}`;
        });

        const confirmarEliminarProducto = document.createElement("img");
        confirmarEliminarProducto.src = asset("icons/admin/trash.svg");
        confirmarEliminarProducto.classList.add("cursor-pointer");
        confirmarEliminarProducto.addEventListener("click", () => {
            eliminarProducto(producto.id);
        });

        divDatos.appendChild(nombreProducto);
        divDatos.appendChild(precioProducto);

        divIcons.appendChild(editarProducto);
        divIcons.appendChild(verProducto);
        divIcons.appendChild(confirmarEliminarProducto);

        productoDiv.appendChild(divDatos);
        divEstado.appendChild(divIcons);
        productoDiv.appendChild(divEstado);
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

async function obtenerEstadisticas() {
    const estadisticas = await fetch("/productos/estadisticas");
    const data = await estadisticas.json();
    console.log(data);

    return Array.isArray(data) ? data : [];
    //return data;
}
