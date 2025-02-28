import { buscarProducto } from "../utils/productos.js";
import { route } from "../admin/panelAdmin.js";

document.addEventListener("DOMContentLoaded", function () {
    const buscador = document.getElementById("buscarProducto");
    const resultadosBusqueda = document.getElementById("resultadosBusqueda");

    buscador.addEventListener("input", function () {
        const query = buscador.value;
        if (query.length > 1) {
            buscarProducto(query).then((productos) => {
                if (productos.length > 0) {
                    resultadosBusqueda.classList.remove("hidden");
                    resultadosBusqueda.innerHTML = "";
                    productos.forEach((producto) => {
                        const productoDiv = document.createElement("a");
                        productoDiv.className =
                            "p-2 hover:bg-custom-dark3 cursor-pointer hover:text-primary hover:bg-custom-dark3 transition-all duration-300";
                        productoDiv.textContent = producto.nombre_producto;
                        productoDiv.href = route(`ver-producto/${producto.id}`);
                        resultadosBusqueda.appendChild(productoDiv);
                    });
                } else {
                    resultadosBusqueda.classList.add("hidden");
                }
            });
        } else {
            resultadosBusqueda.classList.add("hidden");
        }
    });

    buscador.addEventListener("keydown", function (e) {
        if (e.key === "Enter") {
            e.preventDefault();
            window.location.href = route(`ver-producto/${productos[0].id}`);
        }
    });
});
