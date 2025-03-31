import { route } from "../admin/panelAdmin.js";
import { usuarioAutenticado, isAdmin } from "../utils/auth.js";

document.addEventListener("DOMContentLoaded", function () {
    console.log("Header js cargado");

    const menuBtn = document.getElementById("mobile-menu-button");

    if (menuBtn) {
        menuBtn.addEventListener("click", function () {
            const menuMobile = document.getElementById("mobile-menu");
            if (menuMobile) {
                const isHidden = menuMobile.classList.toggle("hidden");
                menuBtn.setAttribute("aria-expanded", !isHidden);
            }
        });
    }

    // Account dropdown functionality
    const accountLink = document.getElementById("miCuenta");
    if (accountLink) {
        // Create dropdown menu
        const dropdownMenu = document.createElement("div");
        dropdownMenu.className =
            "absolute bg-custom-dark2/95 backdrop-blur-md rounded-lg shadow-lg border border-gray-700/50 mt-2 py-2 w-full hidden transition-all duration-200 z-50 flex flex-col gap-2";
        dropdownMenu.innerHTML = `
            <a href="/mi-perfil" class="block px-4 py-2 text-gray-300 hover:bg-custom-dark1 hover:text-white transition-colors">Mi perfil</a>
            <a href="/mis-pedidos" class="block px-4 py-2 text-gray-300 hover:bg-custom-dark1 hover:text-white transition-colors">Mis pedidos</a>`;

        if (usuarioAutenticado() && isAdmin()) {
            dropdownMenu.innerHTML += `
                <a href="/estadisticas" class="block px-4 py-2 text-gray-300 hover:bg-custom-dark1 hover:text-white transition-colors">Panel de administración</a>`;
        }
        dropdownMenu.innerHTML += `
            <div class="border-t border-gray-700 my-1 w-full"></div>
            <a href="/logout" class="block px-4 py-2 text-gray-300 hover:bg-custom-dark2 hover:text-white transition-colors">Cerrar sesión</a>
        `;

        const wrapper = document.createElement("div");
        wrapper.className = "relative";

        accountLink.parentNode.insertBefore(wrapper, accountLink);
        wrapper.appendChild(accountLink);
        wrapper.appendChild(dropdownMenu);

        let timeoutId;
        wrapper.addEventListener("mouseenter", function () {
            clearTimeout(timeoutId);
            dropdownMenu.classList.remove("hidden");
        });

        // Use a delay when mouse leaves to give user time to move to the dropdown
        wrapper.addEventListener("mouseleave", function () {
            timeoutId = setTimeout(() => {
                dropdownMenu.classList.add("hidden");
            }, 300); // 300ms delay before hiding
        });

        // Also handle the dropdown menu itself
        dropdownMenu.addEventListener("mouseenter", function () {
            clearTimeout(timeoutId);
        });

        dropdownMenu.addEventListener("mouseleave", function () {
            timeoutId = setTimeout(() => {
                dropdownMenu.classList.add("hidden");
            }, 300);
        });
    }
});
