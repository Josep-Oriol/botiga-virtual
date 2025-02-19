export function contenidoCategorias() {
    listarCategorias();
}

export function setContenidoCategorias() {
    const titulo = document.getElementById("titulo");
    titulo.textContent = "Categorias";

    const tituloEstadisticas = document.getElementById("tituloEstadisticas");
    tituloEstadisticas.textContent = "Categorias Totales";

    const tituloActivos = document.getElementById("tituloActivos");
    tituloActivos.textContent = "Categorias Activas";

    const tituloInactivos = document.getElementById("tituloInactivos");
    tituloInactivos.textContent = "Categorias Inactivas";

    const tituloPopulares = document.getElementById("tituloPopulares");
    tituloPopulares.textContent = "Categroias Populares";

    const tituloListado = document.getElementById("tituloListado");
    tituloListado.textContent = "Listado de Categorias";

    const crear = document.getElementById("crear");
    crear.textContent = "Añadir nueva categoria";
}

async function listarCategorias() {
    const listaCategorias = document.getElementById("tabla");
    listaCategorias.innerHTML = "";
    const categorias = await obtenerCategorias();

    for (let categoria of categorias) {
        const categoriaDiv = document.createElement("div");
        categoriaDiv.classList.add(
            "flex",
            "justify-between",
            "items-center",
            "pt-4",
            "border-gray-700",
            "rounded-lg",
            "shadow-md",
            "bg-gray-800",
            "cursor-pointer"
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
        editarCategoria.src = "{{asset('icons/admin/edit.svg') }}";

        const verCategoria = document.createElement("img");
        verCategoria.src = "{{asset('icons/admin/eye.svg') }}";

        const confirmarEliminarCategoria = document.createElement("img");
        confirmarEliminarCategoria.src = "{{asset('icons/admin/trash.svg') }}";
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
    const categorias = await fetch("/categorias");
    const data = await categorias.json();
    console.log(data);

    return Array.isArray(data) ? data : [];
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
