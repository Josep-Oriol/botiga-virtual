import { usuarioAutenticado, isAdmin, getIdUser } from "./auth.js";

export async function agregarCarrito(producto, cantidad) {
    const idUser = getIdUser();

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
            precio: producto.precio_producto,
        }),
    });
}

export async function eliminarProductoCarrito(idProducto) {
    const idUser = getIdUser();
    const response = await fetch(
        `/carrito-eliminar-producto/${idProducto}/${idUser}`,
        {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
        }
    );
}

export async function actualizarCarrito(idProducto, idUser, cantidad) {
    const response = await fetch(
        `/carrito-actualizar/${idProducto}/${idUser}`,
        {
            method: "PUT",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
            body: JSON.stringify({
                cantidad: cantidad,
            }),
        }
    );
}

export async function comprobarProducto(idProducto) {
    const idUser = getIdUser();
    const response = await fetch(`/comprobar-producto/${idProducto}/${idUser}`);
    const data = await response.json();
    return data;
}

export async function obtenerCarrito() {
    const idUser = getIdUser();
    const response = await fetch(`/carrito/${idUser}`);

    const data = await response.json();

    console.log(data);

    return data;
}

export async function eliminarCarrito() {
    const idUser = getIdUser();
    const response = await fetch(`/carrito-vaciar/${idUser}`, {
        method: "DELETE",
        headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                .content,
        },
    });
}

export async function comprobarStock(id, cantidad) {
    const response = await fetch(`/comprobar-stock/${id}/${cantidad}`);
    const data = await response.json();
    return data;
}

export async function sumarCantidadProducto(idProducto, cantidad) {
    const idUser = getIdUser();
    const response = await fetch(
        `/sumar-cantidad-producto/${idProducto}/${idUser}/${cantidad}`,
        {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]'
                ).content,
            },
        }
    );
    return await response.json();
}
