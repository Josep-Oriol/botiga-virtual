import { categoriasDestacadas } from "./utils/categorias.js";
import { productosDestacados } from "./utils/productos.js";
import { asset, route } from "./admin/panelAdmin.js";

document.addEventListener("DOMContentLoaded", function () {
    const categoriasDestacadasDiv = document.getElementById(
        "categoriasDestacadas"
    );
    const productosDestacados = document.getElementById("productosDestacados");

    mostrarCategoriasDestacadas(categoriasDestacadasDiv);
    mostrarProductosDestacados(productosDestacados);
});

async function mostrarCategoriasDestacadas(container) {
    const categorias = await categoriasDestacadas();
    for (const categoria of categorias) {
        container.innerHTML += `
        <div class="bg-custom-dark3 px-8 py-4 rounded-lg flex flex-col items-center justify-center hover:-translate-y-2 transition-all duration-300 cursor-pointer">
            <img src="${categoria.imagen_categoria}" alt="${categoria.nombre_categoria}">
            <h3>${categoria.nombre_categoria}</h3>
        </div>`;
    }
}

async function mostrarProductosDestacados(container) {
    container.className = "flex gap-6 w-full";

    const productos = await productosDestacados();

    for (const producto of productos) {
        const productDiv = document.createElement("div");
        productDiv.className =
            "w-[400px] h-[400px] bg-custom-dark3 rounded-lg flex flex-col items-center justify-between hover:-translate-y-2 transition-all duration-300 cursor-pointer pb-4 shadow-lg";

        // Imagen del producto
        const img = document.createElement("img");
        img.src = asset(producto.imagen_producto);
        img.alt = producto.nombre_producto;
        img.className = "w-full h-40 object-cover rounded-t-lg";

        // Contenedor de información
        const infoDiv = document.createElement("div");
        infoDiv.className = "flex flex-col flex-1 justify-between w-full p-4";

        // Contenedor de título y precio
        const rowDiv = document.createElement("div");
        rowDiv.className = "flex flex-col justify-between w-full py-2";

        // Título del producto
        const h3 = document.createElement("h3");
        h3.textContent = producto.nombre_producto;
        h3.className = "text-lg font-semibold text-center truncate w-full";

        // Precio
        const p = document.createElement("p");
        p.className = "text-primary font-bold";
        p.textContent = `${producto.precio_producto}€`;

        // Botón "Ver más"
        const a = document.createElement("a");
        a.href = route(`ver-producto/${producto.id}`);
        a.className =
            "bg-primary px-4 py-2 rounded-lg font-bold hover:bg-blue-600 text-center block mt-auto";
        a.textContent = "Ver más";

        rowDiv.appendChild(h3);
        rowDiv.appendChild(p);

        infoDiv.appendChild(rowDiv);
        infoDiv.appendChild(a);

        productDiv.appendChild(img);
        productDiv.appendChild(infoDiv);

        container.appendChild(productDiv);
    }
}
