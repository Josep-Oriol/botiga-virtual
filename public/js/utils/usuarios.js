import { asset } from "../admin/panelAdmin.js";

export async function listarUsuarios() {
    const listaUsuarios = document.getElementById("listadoUsuarios");
    listaUsuarios.innerHTML = "";

    const usuarios = await obtenerUsuarios();
    //const estadisticas = await obtenerEstadisticas();

    /*const totalProductos = document.getElementById("totalProductos");
    totalProductos.textContent = estadisticas.total_productos;

    const totalProductosActivos = document.getElementById(
        "totalProductosActivos"
    );
    totalProductosActivos.textContent = estadisticas.productos_activos;

    const totalProductosInactivos = document.getElementById(
        "totalProductosInactivos"
    );
    totalProductosInactivos.textContent = estadisticas.productos_inactivos;*/

    for (let usuario of usuarios) {
        const usuarioDiv = document.createElement("div");
        usuarioDiv.classList.add(
            "flex",
            "justify-between",
            "items-center",
            "mt-4",
            "p-4",
            "border-gray-700",
            "rounded-lg",
            "shadow-md",
            "bg-custom-dark1",
            "cursor-default"
        );

        const divDatos = document.createElement("div");
        divDatos.classList.add("flex", "gap-4");

        const nombreUsuario = document.createElement("h3");
        nombreUsuario.textContent = usuario.nombre_usuario;

        const emailUsuario = document.createElement("p");
        emailUsuario.textContent = usuario.email_usuario;
        emailUsuario.classList.add("text-primary");

        const estadoUsuario = document.createElement("p");

        if (usuario.activo_usuario) {
            estadoUsuario.textContent = "Activo";
            estadoUsuario.classList.add("rounded-md", "bg-green-500");
        } else {
            estadoUsuario.textContent = "Inactivo";
            estadoUsuario.classList.add("rounded-md", "bg-red-500");
        }

        const divEstado = document.createElement("div");
        divEstado.classList.add("flex", "gap-4");
        divEstado.appendChild(estadoUsuario);

        const divIcons = document.createElement("div");
        divIcons.classList.add("flex", "gap-4", "pr-4");

        const editarUsuario = document.createElement("img");
        editarUsuario.src = asset("icons/admin/edit.svg");
        editarUsuario.classList.add("cursor-pointer");
        editarUsuario.addEventListener("click", () => {
            window.location.href = `/usuarios/${usuario.id}/edit`;
        });

        const verUsuario = document.createElement("img");
        verUsuario.src = asset("icons/admin/eye.svg");
        verUsuario.classList.add("cursor-pointer");
        verUsuario.addEventListener("click", () => {
            window.location.href = `/usuarios/${usuario.id}`;
        });

        const confirmarEliminarUsuario = document.createElement("img");
        confirmarEliminarUsuario.src = asset("icons/admin/trash.svg");
        confirmarEliminarUsuario.classList.add("cursor-pointer");
        confirmarEliminarUsuario.addEventListener("click", () => {
            eliminarUsuario(usuario.id);
        });

        divDatos.appendChild(nombreUsuario);
        divDatos.appendChild(emailUsuario);

        divIcons.appendChild(editarUsuario);
        divIcons.appendChild(verUsuario);
        divIcons.appendChild(confirmarEliminarUsuario);

        usuarioDiv.appendChild(divDatos);
        divEstado.appendChild(divIcons);
        usuarioDiv.appendChild(divEstado);
        listaUsuarios.appendChild(usuarioDiv);
    }
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
