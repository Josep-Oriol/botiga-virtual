import { asset } from "../admin/panelAdmin.js";
import { usuarioAutenticado } from "../utils/auth.js";
import {
    agregarCarrito,
    obtenerCarrito,
    eliminarCarrito,
    obtenerProducto,
    eliminarProductoCarrito,
    comprobarStock,
    sumarCantidadProducto,
    actualizarCarrito,
} from "../utils/carrito.js";

async function eliminarProducto(id) {
    if (usuarioAutenticado()) {
        const divProducto = document.getElementById(`producto-${id}`);
        divProducto.remove();
        const response = await eliminarProductoCarrito(id);
        if (response.ok) {
            alert("Producto eliminado correctamente");
        } else {
            alert("Error al eliminar el producto");
        }
    } else {
        const carrito = JSON.parse(localStorage.getItem("carrito")) || [];
        const nuevoCarrito = carrito.filter((producto) => producto.id !== id);
        localStorage.setItem("carrito", JSON.stringify(nuevoCarrito));
    }
}

async function sumarCantidad(id) {
    const cantidadElement = document.getElementById(`cantidad-${id}`);
    const cantidadActual = parseInt(cantidadElement.textContent);
    cantidadElement.textContent = cantidadActual + cantidad;
}

document.addEventListener("DOMContentLoaded", function () {
    const vaciarCarritoBtn = document.getElementById("vaciar-carrito");
    const comprarBtn = document.getElementById("comprar-carrito");

    listarCarrito();

    comprarBtn.addEventListener("click", async function () {
        if (usuarioAutenticado()) {
            console.log("comprar");
        }
    });
});

async function listarCarrito() {
    const divCarrito = document.getElementById("carritoProductos");
    if (usuarioAutenticado()) {
        const carrito = await obtenerCarrito();
        if (carrito.length > 0) {
            carrito.forEach(async (producto) => {
                const productoObtenido = await obtenerProducto(producto.id);
                divCarrito.innerHTML += `
                <div id="producto-${producto.id}" class="card p-4 w-full bg-custom-dark2 rounded-lg flex items-center justify-between">
                    <img src="${productoObtenido.foto_portada_producto}" alt="${productoObtenido.nombre_producto}" class="h-full w-auto bg-custom-dark3">
                    <div class="w-full">
                        <div class="flex justify-between">
                            <p class="text-white font-bold text-lg">${productoObtenido.nombre_producto}</p>
                            <button class="text-red-500 font-bold text-lg" onclick="eliminarProducto(${producto.id})">Eliminar</button>
                        </div>
                        <div class="flex justify-between">
                            <p class="text-primary font-bold text-lg">${productoObtenido.precio_producto}€</p>
                            <div class="flex items-center">
                                <button class="text-primary font-bold text-lg" onclick="sumarCantidadProducto(${producto.id}, ${producto.idUser}, -1)">-</button>
                                <p id="cantidad-${producto.id}" class="w-10 text-center">${producto.cantidad}</p>
                                <button class="text-primary font-bold text-lg" onclick="sumarCantidad(${producto.id})">+</button>
                            </div>
                        </div>
                    </div>
                </div>`;
            });
        } else {
            divCarrito.innerHTML = `
            <div class="alert alert-info" role="alert">
                No hay productos en el carrito
            </div>
            `;
        }
    } else {
        const carrito = JSON.parse(localStorage.getItem("carrito")) || [];
        console.log(carrito);
    }
}
