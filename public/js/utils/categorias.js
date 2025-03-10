import { asset } from "../admin/panelAdmin.js";

export function contenidoCategorias() {
    listarCategorias();
}

export function initializeImagePreview() {
    const imageInput = document.getElementById("imagen_categoria");
    const preview = document.getElementById("image-preview");
    const previewImg = preview.querySelector("img");

    // Add remove button
    const removeButton = document.createElement("button");
    removeButton.type = "button";
    removeButton.className =
        "absolute top-2 right-2 bg-red-500 hover:bg-red-600 text-white rounded-full p-1 transition-colors duration-200";
    removeButton.innerHTML = `
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>
    `;
    removeButton.addEventListener("click", () => {
        imageInput.value = "";
        preview.classList.add("hidden");
        previewImg.src = "";
    });

    preview.classList.add("relative");
    preview.appendChild(removeButton);

    imageInput.addEventListener("change", function (e) {
        const file = e.target.files[0];

        if (file) {
            const imageUrl = URL.createObjectURL(file);
            previewImg.src = imageUrl;
            preview.classList.remove("hidden");
        } else {
            preview.classList.add("hidden");
            previewImg.src = "";
        }
    });
}

export async function listarCategorias() {
    const listaCategorias = document.getElementById("listadoCategorias");
    listaCategorias.innerHTML = "";
    const categorias = await obtenerCategorias();

    for (let categoria of categorias) {
        const categoriaDiv = document.createElement("div");
        categoriaDiv.classList.add(
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

        const nombreCategoria = document.createElement("h3");
        nombreCategoria.textContent = categoria.nombre_categoria;

        const codigoCategoria = document.createElement("p");
        codigoCategoria.textContent = categoria.codigo_categoria;
        codigoCategoria.classList.add("text-primary");

        const divIcons = document.createElement("div");
        divIcons.classList.add("flex", "gap-2", "pr-4");

        const editarCategoria = document.createElement("img");
        editarCategoria.src = asset("icons/admin/edit.svg");
        editarCategoria.classList.add("cursor-pointer");
        editarCategoria.addEventListener("click", () => {
            window.location.href = `/categorias/${categoria.id}/edit`;
        });

        const verCategoria = document.createElement("img");
        verCategoria.src = asset("icons/admin/eye.svg");
        verCategoria.classList.add("cursor-pointer");
        verCategoria.addEventListener("click", () => {
            window.location.href = `/categorias/${categoria.id}`;
        });

        const confirmarEliminarCategoria = document.createElement("img");
        confirmarEliminarCategoria.src = asset("icons/admin/trash.svg");
        confirmarEliminarCategoria.classList.add("cursor-pointer");
        confirmarEliminarCategoria.addEventListener("click", () => {
            eliminarCategoria(categoria.id);
        });

        divDatos.appendChild(nombreCategoria);
        divDatos.appendChild(codigoCategoria);

        divIcons.appendChild(editarCategoria);
        divIcons.appendChild(verCategoria);
        divIcons.appendChild(confirmarEliminarCategoria);

        categoriaDiv.appendChild(divDatos);
        categoriaDiv.appendChild(divIcons);
        listaCategorias.appendChild(categoriaDiv);
    }
}

async function obtenerCategorias() {
    try {
        const response = await fetch("/categorias");
        return await response.json();
    } catch (error) {
        console.error("Error al obtener categorías:", error);
        return [];
    }
}

async function eliminarCategoria(id) {
    const response = await fetch(`/categorias/${id}`, {
        method: "DELETE",
        headers: {
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
    });

    const result = await response.json();

    if (response.ok) {
        alert("Categoría eliminada correctamente");
        listarCategorias();
    } else {
        alert(
            "Error: " + (result.message || "No se pudo eliminar la categoría")
        );
    }
}

export async function buscarCategoria(nombre) {
    const categorias = await fetch(`/categorias-buscar?nombre=${nombre}`);
    const data = await categorias.json();
    return Array.isArray(data) ? data : [];
}

export async function categoriasDestacadas() {
    const categorias = await fetch(`/categorias-destacadas`);
    const data = await categorias.json();
    return Array.isArray(data) ? data : [];
}
