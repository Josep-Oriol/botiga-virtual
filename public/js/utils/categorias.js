import { asset } from "../admin/panelAdmin.js";

export function contenidoCategorias() {
    listarCategorias();
}

export function initializeImagePreview() {
    const imageInput = document.getElementById("imagen_categoria");
    const preview = document.getElementById("image-preview");

    if (!imageInput || !preview) return;

    const previewImg = preview.querySelector("img");

    imageInput.addEventListener("change", function (e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                previewImg.src = e.target.result;
                preview.classList.remove("hidden");
            };
            reader.readAsDataURL(file);
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

export async function setMasVendidas(filtro) {
    const canvas = document.getElementById("masVendidas");
    const ctx = canvas.getContext("2d");
    const data = await categoriasMasVendidas(filtro);
    console.log(data);

    const resizeCanvas = () => {
        const container = canvas.parentElement;
        canvas.width = container.clientWidth;
        canvas.height = container.clientHeight;
    };

    resizeCanvas();
    window.addEventListener("resize", resizeCanvas());

    const padding = 60;
    const chartWidth = canvas.width * 0.5;
    const startX = (canvas.width - chartWidth) / 2;
    const barWidth = chartWidth / data.length;
    const maxRevenue = Math.max(
        ...data.map((item) => parseFloat(item.total_ingresos))
    );

    ctx.clearRect(0, 0, canvas.width, canvas.height);

    const colors = ["#3B82F6", "#10B981"];

    data.forEach((item, index) => {
        const x = startX + index * barWidth + barWidth * 0.15;
        const barWidthActual = barWidth * 0.7;
        const color = colors[index % colors.length];

        const revenueHeight =
            (parseFloat(item.total_ingresos) / maxRevenue) *
            (canvas.height - padding * 2.5);

        ctx.fillStyle = color;
        ctx.fillRect(
            x,
            canvas.height - padding - revenueHeight,
            barWidthActual,
            revenueHeight
        );

        // Ventas valores
        ctx.fillStyle = "#ffffff";
        ctx.font = "bold 14px Arial";
        ctx.textAlign = "center";
        ctx.fillText(
            "€" + parseFloat(item.total_ingresos).toFixed(2),
            x + barWidthActual / 2,
            canvas.height - padding - revenueHeight - 10
        );

        // Nombre categorias
        ctx.fillStyle = color;
        ctx.font = "bold 13px Arial";
        ctx.textAlign = "center";
        ctx.fillText(
            item.nombre_categoria,
            x + barWidthActual / 2,
            canvas.height - padding / 2
        );
    });

    // Linea suelo
    ctx.beginPath();
    ctx.strokeStyle = "#ffffff";
    ctx.lineWidth = 1;
    ctx.moveTo(startX - 20, canvas.height - padding);
    ctx.lineTo(startX + chartWidth + 20, canvas.height - padding);
    ctx.stroke();
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

export async function categoriasMasVendidas(filtro) {
    const categorias = await fetch(`/categorias-mas-vendidas?filtro=${filtro}`);
    const data = await categorias.json();
    return Array.isArray(data) ? data : [];
}
