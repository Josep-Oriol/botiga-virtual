import { asset } from "../admin/panelAdmin.js";

document.addEventListener("DOMContentLoaded", function () {
    const carritoProductos = document.getElementById("carritoProductos");
    const carritoTotal = document.getElementById("carritoTotal");

    if (carritoProductos) {
        mostrarCarrito(carritoProductos);
        actualizarContadores();
    }

    const buttonProducto = document.getElementById("añadir-al-carrito");
    if (buttonProducto) {
        buttonProducto.addEventListener("click", () => {
            agregarAlCarrito(buttonProducto);
            mostrarNotificacion("Producto añadido al carrito", "success");
        });
    }

    const buttonVaciarCarrito = document.getElementById("vaciar-carrito");
    if (buttonVaciarCarrito) {
        buttonVaciarCarrito.addEventListener("click", () => {
            vaciarCarrito();
            mostrarCarrito(carritoProductos);
            actualizarContadores();
            mostrarNotificacion("Carrito vaciado", "info");
        });
    }

    document.addEventListener("click", function (e) {
        const target = e.target;

        if (target.id === "eliminar-producto") {
            const id = parseInt(target.value);
            eliminarProducto(id);
            document.getElementById(`productoContent-${id}`).remove();
            actualizarContadores();
            mostrarNotificacion("Producto eliminado", "info");
        }

        if (
            target.id === "aumentar-cantidad-carrito" ||
            target.id === "disminuir-cantidad-carrito"
        ) {
            const id = parseInt(target.value);
            const cantidad = target.id === "aumentar-cantidad-carrito" ? 1 : -1;
            actualizarCantidad(id, cantidad);
            actualizarContadores();
        }
    });
});

function agregarAlCarrito(buttonProducto) {
    const carrito = JSON.parse(localStorage.getItem("carrito")) || [];
    const producto = JSON.parse(buttonProducto.value);
    producto.cantidad = 1;

    // Ensure the image path is properly set
    if (producto.foto_portada_producto) {
        producto.imagen = `/storage/${producto.foto_portada_producto}`;
    }

    const productoExistente = carrito.find((item) => item.id === producto.id);
    if (productoExistente) {
        productoExistente.cantidad++;
    } else {
        carrito.push(producto);
    }

    localStorage.setItem("carrito", JSON.stringify(carrito));
    actualizarContadores();
}

function mostrarCarrito(carritoProductos) {
    const carrito = JSON.parse(localStorage.getItem("carrito")) || [];

    if (carrito.length === 0) {
        carritoProductos.innerHTML = `
            <div class="flex flex-col items-center justify-center py-12 text-gray-400">
                <svg class="w-16 h-16 mb-4 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <p class="text-lg">Tu carrito está vacío</p>
                <a href="/ver-productos" class="mt-4 text-primary hover:underline">Continuar comprando</a>
            </div>
        `;
        return;
    }

    carritoProductos.innerHTML = "";
    carrito.forEach((producto) => {
        const productoDiv = document.createElement("div");
        productoDiv.id = `productoContent-${producto.id}`;
        productoDiv.className =
            "bg-custom-dark3 rounded-xl overflow-hidden shadow-lg transition-all duration-300 hover:shadow-xl hover:scale-[1.02] mb-4 last:mb-0";

        productoDiv.innerHTML = `
            <div class="flex flex-col sm:flex-row gap-6 p-4" id="productoDiv-${
                producto.id
            }">
                <div class="sm:w-1/4 flex-shrink-0">
                    <img src="${producto.imagen}" 
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
                    <p class="text-primary font-bold text-xl">${(
                        producto.precio_producto * (producto.cantidad || 1)
                    ).toFixed(2)}€</p>
                </div>
                <div class="sm:w-1/4 flex flex-col justify-between gap-4 flex-shrink-0">
                    <button class="text-red-500 hover:text-red-400 transition-colors flex items-center justify-center gap-2 p-2 rounded-lg hover:bg-red-500/10" 
                            id="eliminar-producto" value="${producto.id}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        Eliminar
                    </button>
                    <div class="flex items-center justify-center gap-3 bg-custom-dark2/50 p-2 rounded-lg">
                        <button class="w-8 h-8 flex items-center justify-center text-primary hover:bg-primary/10 rounded-lg transition-all" 
                                id="disminuir-cantidad-carrito" value="${
                                    producto.id
                                }" 
                                ${
                                    producto.cantidad <= 1 ? "disabled" : ""
                                }>-</button>
                        <span class="text-lg font-bold text-white">${
                            producto.cantidad || 1
                        }</span>
                        <button class="w-8 h-8 flex items-center justify-center text-primary hover:bg-primary/10 rounded-lg transition-all" 
                                id="aumentar-cantidad-carrito" value="${
                                    producto.id
                                }">+</button>
                    </div>
                </div>
            </div>
        `;
        carritoProductos.appendChild(productoDiv);
    });
}

function eliminarProducto(id) {
    const carrito = JSON.parse(localStorage.getItem("carrito")) || [];
    const index = carrito.findIndex((producto) => producto.id === id);
    if (index !== -1) {
        carrito.splice(index, 1);
        localStorage.setItem("carrito", JSON.stringify(carrito));
    }
    mostrarCarrito(carritoProductos);
    actualizarContadores();
    mostrarNotificacion("Carrito vaciado", "info");
}

function actualizarCantidad(id, cambio) {
    const carrito = JSON.parse(localStorage.getItem("carrito")) || [];
    const producto = carrito.find((item) => item.id === id);

    if (producto) {
        producto.cantidad = (producto.cantidad || 1) + cambio;
        if (producto.cantidad < 1) producto.cantidad = 1;
        localStorage.setItem("carrito", JSON.stringify(carrito));
        mostrarCarrito(document.getElementById("carritoProductos"));
    }
}

function vaciarCarrito() {
    localStorage.removeItem("carrito");
}

function actualizarContadores() {
    const carrito = JSON.parse(localStorage.getItem("carrito")) || [];
    const totalProductos = document.getElementById("totalProductos");
    const totalPrecio = document.getElementById("totalPrecio");

    if (totalProductos) {
        totalProductos.innerHTML = carrito.reduce(
            (total, producto) => total + (producto.cantidad || 1),
            0
        );
    }

    if (totalPrecio) {
        const total = carrito.reduce(
            (sum, producto) =>
                sum + producto.precio_producto * (producto.cantidad || 1),
            0
        );
        totalPrecio.innerHTML = total.toFixed(2) + "€";
    }
}

function mostrarNotificacion(mensaje, tipo) {
    const notificacion = document.createElement("div");
    notificacion.className = `fixed bottom-4 right-4 p-4 rounded-lg shadow-lg text-white transform transition-all duration-300 translate-y-0 z-50 ${
        tipo === "success"
            ? "bg-green-500"
            : tipo === "error"
            ? "bg-red-500"
            : "bg-blue-500"
    }`;
    notificacion.innerHTML = mensaje;
    document.body.appendChild(notificacion);

    setTimeout(() => {
        notificacion.classList.add("translate-y-full", "opacity-0");
        setTimeout(() => notificacion.remove(), 300);
    }, 2000);
}
