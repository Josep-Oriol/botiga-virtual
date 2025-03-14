import { usuarioAutenticado, isAdmin, getIdUser } from "./auth.js";

export async function agregarCarrito(producto, cantidad) {
    const idUser = getIdUser();
    const precio = parseFloat(producto.precio_producto) * cantidad;

    const response = await fetch("/carrito-agregar", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                .content,
        },
        body: JSON.stringify({
            usuario_id: idUser,
            producto_id: producto.id,
            cantidad: cantidad,
            precio: precio,
        }),
    });
}

export async function comprobarStock(id, cantidad) {
    const response = await fetch(`/comprobar-stock/${id}/${cantidad}`);
    const data = await response.json();
    return data;
}
