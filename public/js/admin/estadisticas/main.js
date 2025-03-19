import { setMasVendidas } from "../../utils/estadisticas.js";

document.addEventListener("DOMContentLoaded", () => {
    const selectMasVendidas = document.getElementById("selectMasVendidas");
    const cavasMasVendidas = document.getElementById("masVendidas");

    setMasVendidas("hoy");

    if (selectMasVendidas) {
        selectMasVendidas.addEventListener("change", () => {
            const selectedOption = selectMasVendidas.value;
            setMasVendidas(selectedOption);
        });
    }
});
