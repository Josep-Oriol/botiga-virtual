export async function setMasVendidas(selectedOption) {
    const estadisticas = await fetch("/estadisticas-masVendidas");
    const data = await estadisticas.json();
    console.log(data);
}
