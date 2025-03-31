import { asset } from "../admin/panelAdmin.js";
import { usuarioAutenticado } from "../utils/auth.js";
import {
    agregarCarrito,
    obtenerCarrito,
    eliminarCarrito,
} from "../utils/carrito.js";

document.addEventListener("DOMContentLoaded", function () {
    const vaciarCarritoBtn = document.getElementById("vaciar-carrito");
    const comprarBtn = document.getElementById("comprar-carrito");

    listarCarrito();

    comprarBtn.addEventListener("click", async function () {
        if (usuarioAutenticado()) {
        }
    });
});

async function listarCarrito() {
    const divCarrito = document.getElementById("carritoProductos");
    if (usuarioAutenticado()) {
        const carrito = await obtenerCarrito();
        if (carrito.length > 0) {
            carrito.forEach((producto) => {
                divCarrito.innerHTML += `vale es 
                <div class="card p-2 w-full bg-custom-dark2 roudned-lg">
                    <p>${producto.id}</p>
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
