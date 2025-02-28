import { buscarProducto } from "../utils/productos.js";
import { route } from "../admin/panelAdmin.js";

document.addEventListener("DOMContentLoaded", function () {
    const buscador = document.getElementById("buscarProducto");
    const resultadosBusqueda = document.getElementById("resultadosBusqueda");

    buscador.addEventListener("input", function () {
        const query = buscador.value;
        if (query.length > 1) {
            resultadosBusqueda.classList.remove("hidden");
            buscarProducto(query).then((productos) => {
                resultadosBusqueda.innerHTML = "";
                productos.forEach((producto) => {
                    const productoDiv = document.createElement("a");
                    productoDiv.className =
                        "p-2 hover:bg-custom-dark3 cursor-pointer hover:text-primary hover:bg-custom-dark3 transition-all duration-300";
                    productoDiv.textContent = producto.nombre_producto;
                    productoDiv.href = route(`ver-producto/${producto.id}`);
                    resultadosBusqueda.appendChild(productoDiv);
                });
            });
        } else {
            resultadosBusqueda.classList.add("hidden");
        }
    });
});
