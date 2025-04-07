import { asset } from "../admin/panelAdmin.js";
import { usuarioAutenticado } from "../utils/auth.js";
import {
    agregarCarrito,
    obtenerCarrito,
    eliminarCarrito,
    obtenerProducto,
    sumarCantidadProducto,
    comprobarStock,
    eliminarProductoCarrito,
} from "../utils/carrito.js";

document.addEventListener("DOMContentLoaded", async function () {
    const vaciarCarritoBtn = document.getElementById("vaciar-carrito");
    const comprarBtn = document.getElementById("comprar-carrito");

    await listarCarrito();

    const totalProductos = document.getElementById("totalProductos");
    const totalCarrito = document.getElementById("totalPrecio");

    const restarBtns = document.querySelectorAll(".restar");
    const sumarBtns = document.querySelectorAll(".sumar");
    const eliminarBtns = document.querySelectorAll(".eliminar");

    restarBtns.forEach((btn) => {
        btn.addEventListener("click", async function () {
            const productoId = this.getAttribute("data-producto-id");
            const cantidad = this.nextElementSibling;
            const cantidadActual = parseInt(cantidad.textContent);
            if (cantidadActual > 1) {
                if (usuarioAutenticado()) {
                    cantidad.textContent = cantidadActual - 1;
                    await sumarCantidadProducto(productoId, -1);
                } else {
                    cantidad.textContent = cantidadActual - 1;
                    const carrito = JSON.parse(localStorage.getItem("carrito"));
                    const index = carrito.findIndex(
                        (producto) => producto.id === parseInt(productoId)
                    );
                    carrito[index].cantidad = cantidadActual - 1;
                    localStorage.setItem("carrito", JSON.stringify(carrito));
                }
            }
        });
    });

    sumarBtns.forEach((btn) => {
        btn.addEventListener("click", async function () {
            const productoId = this.getAttribute("data-producto-id");
            const cantidad = this.previousElementSibling;
            const cantidadActual = parseInt(cantidad.textContent);
            const stock = await comprobarStock(productoId, cantidadActual + 1);
            if (stock) {
                if (usuarioAutenticado()) {
                    cantidad.textContent = cantidadActual + 1;
                    await sumarCantidadProducto(productoId, 1);
                } else {
                    cantidad.textContent = cantidadActual + 1;
                    const carrito = JSON.parse(localStorage.getItem("carrito"));
                    const index = carrito.findIndex(
                        (producto) => producto.id === parseInt(productoId)
                    );
                    carrito[index].cantidad = cantidadActual + 1;
                    localStorage.setItem("carrito", JSON.stringify(carrito));
                }
            } else {
                alert("No hay stock suficiente");
            }
        });
    });

    eliminarBtns.forEach((btn) => {
        btn.addEventListener("click", async function () {
            const productoId = parseInt(this.value);
            if (usuarioAutenticado()) {
                await eliminarProductoCarrito(productoId);
            } else {
                const carrito = JSON.parse(localStorage.getItem("carrito"));
                const index = carrito.findIndex(
                    (producto) => producto.id === parseInt(productoId)
                );
                carrito.splice(index, 1);
                localStorage.setItem("carrito", JSON.stringify(carrito));
            }
            document.getElementById(`productoContent-${productoId}`).remove();
        });
    });

    vaciarCarritoBtn.addEventListener("click", async function () {
        if (usuarioAutenticado()) {
            await eliminarCarrito();
            location.reload();
        } else {
            localStorage.removeItem("carrito");
            location.reload();
        }
    });

    comprarBtn.addEventListener("click", async function () {
        if (usuarioAutenticado()) {
            // lógica de compra acá
        }
    });
});

async function listarCarrito() {
    const divCarrito = document.getElementById("carritoProductos");

    if (usuarioAutenticado()) {
        const carrito = await obtenerCarrito();

        if (carrito.length > 0) {
            for (const dato of carrito) {
                const producto = await obtenerProducto(dato.fk_id_producto);

                const productoDiv = document.createElement("div");
                cartaProducto(divCarrito, productoDiv, dato, producto);
            }
        } else {
            divCarrito.innerHTML = `
            <div class="flex flex-col items-center justify-center py-12 text-gray-400">
                <svg class="w-16 h-16 mb-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <p class="text-lg">Tu carrito está vacío</p>
                <a href="/ver-productos" class="mt-4 text-primary hover:underline">Continuar comprando</a>
            </div>`;
        }
    } else {
        const carrito = JSON.parse(localStorage.getItem("carrito")) || [];
        if (carrito.length > 0) {
            for (const dato of carrito) {
                const producto = await obtenerProducto(dato.id);
                const productoDiv = document.createElement("div");
                cartaProducto(divCarrito, productoDiv, dato, producto);
            }
        } else {
            divCarrito.innerHTML = `
            <div class="flex flex-col items-center justify-center py-12 text-gray-400">
                <svg class="w-16 h-16 mb-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <p class="text-lg">Tu carrito está vacío</p>
                <a href="/ver-productos" class="mt-4 text-primary hover:underline">Continuar comprando</a>
            </div>`;
        }
    }
}

function cartaProducto(divCarrito, div, dato, producto) {
    const rutaImagen = `/storage/${producto.imagen_producto}`;
    div.id = `productoContent-${producto.id}`;
    div.className =
        "divProductoCarrito bg-custom-dark3 rounded-xl overflow-hidden shadow-lg transition-all duration-300 hover:shadow-xl hover:scale-[1.02] mb-4 last:mb-0";

    div.innerHTML = `
        <div class="flex flex-col sm:flex-row gap-6 p-4" id="productoDiv-${
            producto.id
        }">
            <div class="sm:w-1/4 flex-shrink-0">
                <img src="${rutaImagen}" 
                    alt="${producto.nombre_producto}" 
                    class="w-full h-32 object-contain rounded-lg">
            </div>
            <div class="sm:w-1/2 flex flex-col justify-between flex-grow">
                <div>
                    <h3 class="text-lg font-bold text-white mb-2">${
                        producto.nombre_producto
                    }</h3>
                    <p class="text-sm text-gray-400 line-clamp-2">${
                        producto.descripcion_producto
                    }</p>
                </div>
                <p class="text-primary font-bold text-xl">Precio por unidad:${
                    producto.precio_producto
                }€</p>
                <p id="cantidad-${producto.id}" 
                    class="text-primary font-bold text-xl">Precio total del producto: ${
                        producto.precio_producto * dato.cantidad
                    }</p>
            </div>
            <div class="sm:w-1/4 flex flex-col justify-between gap-4 flex-shrink-0">
                <button class="eliminar text-red-500 hover:text-red-400 transition-colors flex items-center justify-center gap-2 p-2 rounded-lg hover:bg-red-500/10" value="${
                    producto.id
                }">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                    Eliminar
                </button>
                <div class="flex items-center justify-center gap-3 bg-custom-dark2/50 p-2 rounded-lg">
                    <button class="restar w-8 h-8 flex items-center justify-center text-primary hover:bg-primary/10 rounded-lg transition-all" data-producto-id="${
                        producto.id
                    }">-</button>
                    <span class="cantidad text-lg font-bold text-white">${
                        dato.cantidad
                    }</span>
                    <button class="sumar w-8 h-8 flex items-center justify-center text-primary hover:bg-primary/10 rounded-lg transition-all" data-producto-id="${
                        producto.id
                    }">+</button>
                </div>
            </div>
        </div>`;

    if (divCarrito) {
        divCarrito.appendChild(div);
    }
}
