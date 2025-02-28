document.addEventListener("DOMContentLoaded", function () {
    console.log("DOMContentLoaded carrito");
    const carritoProductos = document.getElementById("carritoProductos");
    const carritoTotal = document.getElementById("carritoTotal");

    if (carritoProductos) {
        mostrarCarrito(carritoProductos);
        totalProductos();
        totalPrecio();
    }

    const buttonProducto = document.getElementById("añadir-al-carrito");
    if (buttonProducto) {
        buttonProducto.addEventListener(
            "click",
            agregarAlCarrito(buttonProducto)
        );
    }

    const buttonVaciarCarrito = document.getElementById("vaciar-carrito");
    if (buttonVaciarCarrito) {
        buttonVaciarCarrito.addEventListener("click", () => {
            const totalProductos = document.getElementById("totalProductos");
            const totalPrecio = document.getElementById("totalPrecio");
            vaciarCarrito();
            carritoProductos.innerHTML = "";
            totalProductos.innerHTML = 0;
            totalPrecio.innerHTML = 0 + "€";
        });
    }
});

function agregarAlCarrito(buttonProducto) {
    const carrito = JSON.parse(localStorage.getItem("carrito")) || [];
    const producto = JSON.parse(buttonProducto.value);
    carrito.push(producto);
    localStorage.setItem("carrito", JSON.stringify(carrito));
}

function mostrarCarrito(carritoProductos) {
    const carrito = JSON.parse(localStorage.getItem("carrito")) || [];
    carritoProductos.innerHTML = "";

    carrito.forEach((producto) => {
        const productoDiv = document.createElement("div");
        productoDiv.id = `productoContent-${producto.id}`;

        productoDiv.innerHTML = `
            <div class="flex flex-row justify-between gap-4 bg-custom-dark3 p-4 rounded-md cursor-pointer" id="productoDiv-${producto.id}">
                <img src="${producto.imagen}" alt="${producto.nombre_producto}" class="w-1/3 h-auto">
                <div class="w-1/3 flex flex-col gap-4">
                    <h1>${producto.nombre_producto}</h1>
                    <p class="text-sm flex-wrap">${producto.descripcion_producto}</p>
                    <p class="text-primary font-bold px-2">${producto.precio_producto}€</p>
                </div>
                <div class="w-1/3 flex flex-col justify-between gap-4">
                    <div class="flex justify-end">
                        <button class="bg-custom-dark3 text-red-500 p-2 rounded-md flex w-fit hover:underline" id="eliminar-producto" value="${producto.id}">Eliminar</button>
                    </div>
                    <div class="flex justify-end gap-2">
                        <button class="bg-custom-dark3 text-primary p-2 rounded-md flex w-fit hover:underline" id="aumentar-cantidad-carrito" value="${producto.id}">+</button>
                        <p class="text-primary font-bold text-right px-2">${producto.cantidad_producto}</p>
                        <button class="bg-custom-dark3 text-primary p-2 rounded-md flex w-fit hover:underline" id="disminuir-cantidad-carrito" value="${producto.id}">-</button>
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
    }
}

function vaciarCarrito() {
    const carrito = JSON.parse(localStorage.getItem("carrito")) || [];
    carrito.length = 0;
    localStorage.clear();
}

function totalProductos() {
    const carrito = JSON.parse(localStorage.getItem("carrito")) || [];
    const totalProductos = document.getElementById("totalProductos");
    totalProductos.innerHTML = carrito.length;
}

function totalPrecio() {
    const carrito = JSON.parse(localStorage.getItem("carrito")) || [];
    const totalPrecio = document.getElementById("totalPrecio");
    let total = 0;
    carrito.forEach((producto) => {
        total += parseFloat(producto.precio_producto);
    });
    totalPrecio.innerHTML = total.toFixed(2) + "€";
}
