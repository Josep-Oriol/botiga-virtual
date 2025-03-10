import { buscarProducto } from "../utils/productos.js";
import { route } from "../admin/panelAdmin.js";

document.addEventListener("DOMContentLoaded", function () {
    const buscador = document.getElementById("buscarProducto");
    const resultadosBusqueda = document.getElementById("resultadosBusqueda");
    const filtrosVerProductos = document.getElementById("filtros-ver-productos");

    buscador.addEventListener("input", function () {
        const query = buscador.value;
        if (query.length > 1) {
            buscarProducto(query).then((productos) => {
                if (productos.length > 0) {
                    resultadosBusqueda.classList.remove("hidden");
                    resultadosBusqueda.innerHTML = "";
                    productos.forEach((producto) => {
                        const productoDiv = document.createElement("a");
                        productoDiv.className = "flex items-center gap-3 p-3 hover:bg-custom-dark3 cursor-pointer group transition-all duration-300 border-b border-gray-700 last:border-0";
                        productoDiv.href = route(`ver-producto/${producto.id}`);
                        
                        const imgContainer = document.createElement("div");
                        imgContainer.className = "w-10 h-10 bg-custom-dark3 rounded-lg overflow-hidden flex-shrink-0";
                        
                        const img = document.createElement("img");
                        img.src = producto.imagen_producto || '/images/placeholder.png';
                        img.className = "w-full h-full object-cover";
                        img.alt = producto.nombre_producto;
                        imgContainer.appendChild(img);

                        const infoContainer = document.createElement("div");
                        infoContainer.className = "flex-grow";
                        
                        const nombre = document.createElement("p");
                        nombre.className = "text-white group-hover:text-primary transition-colors";
                        nombre.textContent = producto.nombre_producto;
                        
                        const precio = document.createElement("p");
                        precio.className = "text-sm text-gray-400";
                        precio.textContent = `${producto.precio_producto}€`;
                        
                        infoContainer.appendChild(nombre);
                        infoContainer.appendChild(precio);

                        productoDiv.appendChild(imgContainer);
                        productoDiv.appendChild(infoContainer);
                        resultadosBusqueda.appendChild(productoDiv);
                    });
                } else {
                    resultadosBusqueda.classList.remove("hidden");
                    resultadosBusqueda.innerHTML = `
                        <div class="p-4 text-center text-gray-400">
                            No se encontraron resultados
                        </div>
                    `;
                }
            });
        } else {
            resultadosBusqueda.classList.add("hidden");
        }
    });

    document.addEventListener('click', function(e) {
        if (!buscador.contains(e.target) && !resultadosBusqueda.contains(e.target)) {
            resultadosBusqueda.classList.add('hidden');
        }
    });

    buscador.addEventListener("keydown", function (e) {
        if (e.key === "Enter") {
            e.preventDefault();
            let query = buscador.value.trim();

            if (query.length > 1) {
                window.location.href = route(`ver-productos?nombre=${query}`);
            }
        }
    });

    if (filtrosVerProductos) {
        const btnAplicarFiltros = document.getElementById("btn-aplicar-filtros");
        btnAplicarFiltros.addEventListener("click", function () {
            window.location.href = route(`ver-productos`);
        });
    }
});
