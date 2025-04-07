import { obtenerCarrito } from "../utils/carrito.js";

document.addEventListener("DOMContentLoaded", function () {
    const formularioPago = document.getElementById("payment-form");
    const nombreTitular = document.getElementById("cardholder_name");
    const numeroTarjeta = document.getElementById("card_number");
    const fechaExpiracion = document.getElementById("expiry_date");
    const codigoSeguridad = document.getElementById("cvv");
    const botonAplicar = document.getElementById("apply-coupon");
    const codigoCupon = document.getElementById("coupon_code");
    const mensajeCupon = document.getElementById("coupon-message");
    const totalProductos = document.getElementById("total-productos");
    const totalPrecio = document.getElementById("total-precio");

    cargarDatosCarrito();

    numeroTarjeta.addEventListener("input", function (e) {
        let valor = e.target.value.replace(/\D/g, "");
        let valorFormateado = "";

        for (let i = 0; i < valor.length; i++) {
            if (i > 0 && i % 4 === 0) {
                valorFormateado += " ";
            }
            valorFormateado += valor[i];
        }

        e.target.value = valorFormateado.substring(0, 19);
    });

    fechaExpiracion.addEventListener("input", function (e) {
        let valor = e.target.value.replace(/\D/g, "");
        let valorFormateado = "";

        if (valor.length > 0) {
            valorFormateado = valor.substring(0, 2);
            if (valor.length > 2) {
                valorFormateado += "/" + valor.substring(2, 4);
            }
        }

        e.target.value = valorFormateado;
    });

    codigoSeguridad.addEventListener("input", function (e) {
        let valor = e.target.value.replace(/\D/g, "");
        e.target.value = valor.substring(0, 4);
    });

    if (botonAplicar) {
        botonAplicar.addEventListener("click", function () {
            aplicarCupon();
        });
    }

    formularioPago.addEventListener("submit", function (e) {
        if (!validarFormulario()) {
            e.preventDefault();
        }
    });

    function validarFormulario() {
        let esValido = true;

        if (!nombreTitular.value.trim()) {
            mostrarError(nombreTitular, "El nombre del titular es obligatorio");
            esValido = false;
        } else {
            quitarError(nombreTitular);
        }

        const valorNumeroTarjeta = numeroTarjeta.value.replace(/\s/g, "");
        if (!valorNumeroTarjeta) {
            mostrarError(numeroTarjeta, "El número de tarjeta es obligatorio");
            esValido = false;
        } else if (!validarNumeroTarjeta(valorNumeroTarjeta)) {
            mostrarError(numeroTarjeta, "Número de tarjeta inválido");
            esValido = false;
        } else {
            quitarError(numeroTarjeta);
        }

        const valorFecha = fechaExpiracion.value;
        if (!valorFecha) {
            mostrarError(
                fechaExpiracion,
                "La fecha de expiración es obligatoria"
            );
            esValido = false;
        } else if (!validarFechaExpiracion(valorFecha)) {
            mostrarError(fechaExpiracion, "Fecha de expiración inválida");
            esValido = false;
        } else {
            quitarError(fechaExpiracion);
        }

        const valorCVV = codigoSeguridad.value;
        if (!valorCVV) {
            mostrarError(
                codigoSeguridad,
                "El código de seguridad es obligatorio"
            );
            esValido = false;
        } else if (valorCVV.length < 3) {
            mostrarError(
                codigoSeguridad,
                "El CVV debe tener al menos 3 dígitos"
            );
            esValido = false;
        } else {
            quitarError(codigoSeguridad);
        }

        return esValido;
    }

    function validarNumeroTarjeta(numero) {
        if (!/^\d{15,16}$/.test(numero)) {
            return false;
        }

        let suma = 0;
        let debeMultiplicar = false;

        for (let i = numero.length - 1; i >= 0; i--) {
            let digito = parseInt(numero.charAt(i));

            if (debeMultiplicar) {
                digito *= 2;
                if (digito > 9) {
                    digito -= 9;
                }
            }

            suma += digito;
            debeMultiplicar = !debeMultiplicar;
        }

        return suma % 10 === 0;
    }

    function validarFechaExpiracion(fecha) {
        const partes = fecha.split("/");
        if (partes.length !== 2) return false;

        const mes = parseInt(partes[0], 10);
        const año = parseInt("20" + partes[1], 10);

        if (isNaN(mes) || isNaN(año)) return false;
        if (mes < 1 || mes > 12) return false;

        const ahora = new Date();
        const añoActual = ahora.getFullYear();
        const mesActual = ahora.getMonth() + 1;

        if (año < añoActual) return false;
        if (año === añoActual && mes < mesActual) return false;

        return true;
    }

    function aplicarCupon() {
        const codigo = codigoCupon.value.trim();

        if (!codigo) {
            mostrarMensajeCupon(
                "Por favor, introduce un código de cupón",
                "error"
            );
            return;
        }

        fetch("/api/validate-coupon", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
            body: JSON.stringify({ code: codigo }),
        })
            .then((response) => response.json())
            .then((datos) => {
                if (datos.valid) {
                    mostrarMensajeCupon(
                        `Cupón aplicado: ${datos.discount}% de descuento`,
                        "success"
                    );
                    actualizarTotalConDescuento(datos.discount);
                } else {
                    mostrarMensajeCupon("Código de cupón inválido", "error");
                }
            })
            .catch((error) => {
                console.error("Error:", error);
                mostrarMensajeCupon("Error al validar el cupón", "error");
            });

        // Para pruebas sin backend:
        // simularValidacionCupon(codigo);
    }

    function simularValidacionCupon(codigo) {
        const cuponesValidos = {
            DESCUENTO10: 10,
            DESCUENTO20: 20,
            WELCOME: 15,
        };

        if (cuponesValidos[codigo]) {
            mostrarMensajeCupon(
                `Cupón aplicado: ${cuponesValidos[codigo]}% de descuento`,
                "success"
            );
            actualizarTotalConDescuento(cuponesValidos[codigo]);
        } else {
            mostrarMensajeCupon("Código de cupón inválido", "error");
        }
    }

    function actualizarTotalConDescuento(porcentajeDescuento) {
        let totalActual = parseFloat(
            totalPrecio.textContent.replace("€", "").replace(",", ".")
        );
        if (isNaN(totalActual)) totalActual = 0;

        const descuento = (totalActual * porcentajeDescuento) / 100;
        const nuevoTotal = totalActual - descuento;

        totalPrecio.textContent = nuevoTotal.toFixed(2) + "€";
    }

    function mostrarMensajeCupon(mensaje, tipo) {
        mensajeCupon.textContent = mensaje;
        mensajeCupon.classList.remove(
            "hidden",
            "text-green-500",
            "text-red-500"
        );

        if (tipo === "success") {
            mensajeCupon.classList.add("text-green-500");
        } else {
            mensajeCupon.classList.add("text-red-500");
        }
    }

    async function cargarDatosCarrito() {
        const carrito = await obtenerCarrito();
        let total = 0;
        let total_productos = 0;

        for (const producto of carrito) {
            const precioProducto = parseFloat(producto.precio);
            const cantidad = producto.cantidad;

            total_productos += cantidad;
            if (!isNaN(precioProducto)) {
                total += precioProducto * producto.cantidad;
            }
        }

        totalProductos.textContent = total_productos;
        totalPrecio.textContent = total.toFixed(2) + "€";
    }

    function mostrarError(input, mensaje) {
        const padre = input.parentElement;
        let elementoError = padre.querySelector(".error-message");

        if (!elementoError) {
            elementoError = document.createElement("p");
            elementoError.className = "error-message text-red-500 text-sm mt-1";
            padre.appendChild(elementoError);
        }

        elementoError.textContent = mensaje;
        input.classList.add("border-red-500");
    }

    function quitarError(input) {
        const padre = input.parentElement;
        const elementoError = padre.querySelector(".error-message");

        if (elementoError) {
            elementoError.remove();
        }

        input.classList.remove("border-red-500");
    }
});
