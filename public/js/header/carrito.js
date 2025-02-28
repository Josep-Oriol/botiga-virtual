function agregarAlCarrito(idProducto) {
    const carrito = JSON.parse(localStorage.getItem("carrito")) || [];
    const producto = {
        id: idProducto,
        cantidad: 1,
    };
}
