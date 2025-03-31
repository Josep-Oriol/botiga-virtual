document.addEventListener("DOMContentLoaded", () => {
    const piezas = document.querySelectorAll(".pieza");
    const zonas = document.querySelectorAll(".dropzone");
    const mensaje = document.getElementById("mensaje");
    const btnEnviar = document.getElementById("enviar");
    const btnReiniciar = document.getElementById("reiniciar");

    piezas.forEach((pieza) => {
        pieza.addEventListener("dragstart", (e) => {
            e.dataTransfer.setData("text/plain", pieza.id);
        });
    });

    zonas.forEach((zona) => {
        zona.addEventListener("dragover", (e) => {
            e.preventDefault();
            zona.classList.add("border-green-500");
        });

        zona.addEventListener("dragleave", () => {
            zona.classList.remove("border-green-500");
        });

        zona.addEventListener("drop", (e) => {
            e.preventDefault();
            zona.textContent = "";
            const piezaId = e.dataTransfer.getData("text/plain");
            const pieza = document.getElementById(piezaId);

            if (zona.children.length === 0) {
                zona.appendChild(pieza);
            }

            zona.classList.remove("border-green-500");
        });
    });

    btnEnviar.addEventListener("click", () => {
        let correctas = 0;

        zonas.forEach((zona) => {
            const pieza = zona.querySelector(".pieza");
            if (pieza && pieza.dataset.match === zona.id) {
                correctas++;
            }
        });

        if (correctas === zonas.length) {
            mensaje.textContent = "Correcto";
            mensaje.classList.remove("text-red-500");
            mensaje.classList.add("text-green-500");
        } else {
            mensaje.textContent = "Error";
            mensaje.classList.remove("text-green-500");
            mensaje.classList.add("text-red-500");
        }
    });

    btnReiniciar.addEventListener("click", () => {
        const contenedor = document.querySelector(".contenedor-piezas");
        piezas.forEach((pieza) => contenedor.appendChild(pieza));
        mensaje.textContent = "";
    });
});
