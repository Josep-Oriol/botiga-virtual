import { asset } from "../admin/panelAdmin.js";

export function contenidoPedidos() {
    listarPedidos();
}

export async function listarCompras() {
    const listaCompras = document.getElementById("listadoCompras");
    listaCompras.innerHTML = "";
    const compras = await obtenerCompras();

    for (let compra of compras) {
        const compraDiv = document.createElement("div");
        compraDiv.classList.add(
            "flex",
            "justify-between",
            "items-center",
            "mt-4",
            "p-4",
            "border-gray-700",
            "rounded-lg",
            "shadow-md",
            "bg-custom-dark1"
        );

        const divDatos = document.createElement("div");
        divDatos.classList.add("flex", "gap-4");

        const nombreCompra = document.createElement("h3");
        nombreCompra.textContent = compra.nombre_compra;

        const codigoCompra = document.createElement("p");
        codigoCompra.textContent = compra.codigo_compra;
        codigoCompra.classList.add("text-primary");

        const divIcons = document.createElement("div");
        divIcons.classList.add("flex", "gap-2", "pr-4");

        const editarCompra = document.createElement("img");
        editarCompra.src = asset("icons/admin/edit.svg");
        editarCompra.classList.add("cursor-pointer");
        editarCompra.addEventListener("click", () => {
            window.location.href = `/compras/${compra.id}/edit`;
        });

        const verCompra = document.createElement("img");
        verCompra.src = asset("icons/admin/eye.svg");
        verCompra.classList.add("cursor-pointer");
        verCompra.addEventListener("click", () => {
            window.location.href = `/compras/${compra.id}`;
        });

        const confirmarEliminarCompra = document.createElement("img");
        confirmarEliminarCompra.src = asset("icons/admin/trash.svg");
        confirmarEliminarCompra.classList.add("cursor-pointer");
        confirmarEliminarCompra.addEventListener("click", () => {
            eliminarCompra(compra.id);
        });

        divDatos.appendChild(nombreCompra);
        divDatos.appendChild(codigoCompra);

        divIcons.appendChild(editarCompra);
        divIcons.appendChild(verCompra);
        divIcons.appendChild(confirmarEliminarCompra);

        compraDiv.appendChild(divDatos);
        compraDiv.appendChild(divIcons);
        listaCompras.appendChild(compraDiv);
    }
}

async function obtenerCompras() {
    const compras = await fetch("/compras");
    const data = await compras.json();
    console.log(data);

    return Array.isArray(data) ? data : [];
}

async function eliminarCompra(id) {
    const response = await fetch(`/compras/${id}`, {
        method: "DELETE",
        headers: {
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
    });

    const result = await response.json();

    if (response.ok) {
        alert("Compra eliminada correctamente");
        listarCompras();
    } else {
        alert("Error: " + (result.message || "No se pudo eliminar la compra"));
    }
}
