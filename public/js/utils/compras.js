async function obtenerCompras() {
    const compras = await fetch("/compras");
    const data = await compras.json();
    return Array.isArray(data) ? data : [];
}

async function eliminarCompra(id) {
    const response = await fetch(`/compras/${id}`, {
        method: "DELETE",
        headers: {
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
    });

    const result = await response.json();

    if (response.ok) {
        alert("Compra eliminada correctamente");
        listarCompras();
    } else {
        alert("Error: " + (result.message || "No se pudo eliminar la compra"));
    }
}

async function editarCompra(id) {
    const compra = await fetch(`/compras/${id}`, {
        method: "PUT",
    });
}
