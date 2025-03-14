export function usuarioAutenticado() {
    return window.user ? true : false;
}

export function isAdmin() {
    return window.user && window.user.tipo_usuario === "admin";
}

export function getIdUser() {
    return window.user.id;
}
