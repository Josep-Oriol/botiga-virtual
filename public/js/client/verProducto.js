document.addEventListener("DOMContentLoaded", function () {
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
        const stock = await comprobarStock(idProducto);
        if (stock) {
            cantidadCarritoValor.textContent = cantidad + 1;
        } else {
            alert("No hay stock suficiente");
        }
    });
});

async function comprobarStock(id) {
    const response = await fetch(`/comprobar-stock/${id}`);
    const data = await response.json();
    return data;
}
