import { comprobarStock, agregarCarrito } from "../utils/carrito.js";
import { usuarioAutenticado } from "../utils/auth.js";

document.addEventListener("DOMContentLoaded", function () {
    const agregarBtn = document.getElementById("añadir-al-carrito");
    const producto = JSON.parse(agregarBtn.value);

    const idProducto = window.location.pathname.split("/").pop();

    const cantidadCarrito = document.getElementById("cantidad-carrito");
    const cantidadCarritoValor = document.getElementById(
        "cantidad-carrito-valor"
    );
    const disminuirCantidadCarrito = document.getElementById(
        "disminuir-cantidad-carrito"
    );
    const aumentarCantidadCarrito = document.getElementById(
        "aumentar-cantidad-carrito"
    );

    disminuirCantidadCarrito.addEventListener("click", function () {
        const cantidad = parseInt(cantidadCarritoValor.textContent);
        if (cantidad > 1) {
            cantidadCarritoValor.textContent = cantidad - 1;
        }
    });

    aumentarCantidadCarrito.addEventListener("click", async function () {
        const cantidad = parseInt(cantidadCarritoValor.textContent);
        const stock = await comprobarStock(idProducto, cantidad + 1);
        if (stock) {
            cantidadCarritoValor.textContent = cantidad + 1;
        } else {
            alert("No hay stock suficiente");
        }
    });

    agregarBtn.addEventListener("click", async function () {
        const cantidad = parseInt(cantidadCarritoValor.textContent);
        const stock = await comprobarStock(producto.id, cantidad);

        if (stock) {
            if (usuarioAutenticado()) {
                agregarCarrito(producto, cantidad);
                alert("Producto añadido al carrito database");
            } else {
                const carrito =
                    JSON.parse(localStorage.getItem("carrito")) || [];
                if (producto.foto_portada_producto) {
                    producto.imagen = `/storage/${producto.foto_portada_producto}`;
                }

                const productoExistente = carrito.find(
                    (item) => item.id === producto.id
                );
                if (productoExistente) {
                    productoExistente.cantidad++;
                } else {
                    carrito.push(producto);
                }

                localStorage.setItem("carrito", JSON.stringify(carrito));
                alert("Producto añadido al carrito local");
            }
        } else {
            alert("No hay stock suficiente");
        }
    });
});
