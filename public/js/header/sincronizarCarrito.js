import {
    agregarCarrito,
    comprobarProducto,
    sumarCantidadProducto,
    obtenerProducto,
} from "../utils/carrito.js";

import { usuarioAutenticado } from "../utils/auth.js";

document.addEventListener("DOMContentLoaded", () => {
    console.log("sincronizarCarrito.js");
    if (usuarioAutenticado()) {
        const carrito = JSON.parse(localStorage.getItem("carrito")) || [];
        if (carrito.length > 0) {
            carrito.forEach(async (producto) => {
                let productoId = parseInt(producto.id);
                let productoActual = await obtenerProducto(productoId);
                const existe = await comprobarProducto(productoId);
                if (existe) {
                    const cantidad = producto.cantidad;
                    await sumarCantidadProducto(productoId, cantidad);
                } else {
                    const cantidad = producto.cantidad;
                    await agregarCarrito(productoActual, cantidad);
                }
            });
            localStorage.removeItem("carrito");
        }
    }
});
