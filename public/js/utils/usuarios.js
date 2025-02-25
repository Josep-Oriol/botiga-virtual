export function setContenidoProductos() {
    const titulo = document.getElementById("titulo");
    titulo.textContent = "Productos";

    const tituloEstadisticas = document.getElementById("tituloEstadisticas");
    tituloEstadisticas.textContent = "Productos Totales";

    const tituloActivos = document.getElementById("tituloActivos");
    tituloActivos.textContent = "Productos Activos";

    const tituloInactivos = document.getElementById("tituloInactivos");
    tituloInactivos.textContent = "Productos Inactivos";

    const tituloPopulares = document.getElementById("tituloPopulares");
    tituloPopulares.textContent = "Productos Populares";

    const tituloListado = document.getElementById("tituloListado");
    tituloListado.textContent = "Listado de Productos";

    const crear = document.getElementById("crear");
    crear.innerHTML = "";
    const plusCrear = document.createElement("img");
    plusCrear.src = asset("icons/admin/plus.svg");
    crear.appendChild(plusCrear);
    crear.innerHTML += "Añadir nuevo producto";
}

async function obtenerUsuarios() {
    const usuarios = await fetch("/usuarios");
    const data = await usuarios.json();
    return Array.isArray(data) ? data : [];
}

async function eliminarUsuario(id) {
    const response = await fetch(`/usuarios/${id}`, {
        method: "DELETE",
        headers: {
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
    });

    const result = await response.json();

    if (response.ok) {
        alert("Usuario eliminado correctamente");
        listarUsuarios();
    } else {
        alert("Error: " + (result.message || "No se pudo eliminar el usuario"));
    }
}

async function editarUsuario(id) {
    const usuario = await fetch(`/usuarios/${id}`, {
        method: "PUT",
    });
}

async function registrarUsuario(usuario) {
    const response = await fetch("/usuarios", {
        method: "POST",
        body: JSON.stringify(usuario),
    });
}
