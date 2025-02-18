import { content } from "./panelAdmin.js";

export function contenidoProductos() {
    listarProductos();
}

async function listarProductos() {
    const listaProductos = document.getElementById("tabla");
    listaProductos.innerHTML = "";
    const productos = await obtenerProductos();

    for (let producto of productos) {
        const productoDiv = document.createElement("div");
        productoDiv.classList.add(
            "flex",
            "justify-between",
            "items-center",
            "pt-4",
            "border-gray-700",
            "rounded-lg",
            "shadow-md",
            "bg-gray-800",
            "cursor-pointer"
        );

        const divDatos = document.createElement("div");
        divDatos.classList.add("flex", "gap-4");

        const nombreProducto = document.createElement("h3");
        nombreProducto.textContent = producto.nombre_producto;

        const precioProducto = document.createElement("p");
        precioProducto.textContent = producto.precio_producto + "€";
        precioProducto.classList.add("text-primary");

        const divIcons = document.createElement("div");
        divIcons.classList.add("flex", "gap-2", "pr-4");
        const editarProducto = document.createElement("img");
        editarProducto.src = "{{asset('icons/admin/edit.svg') }}";

        const verProducto = document.createElement("img");
        verProducto.src = "{{asset('icons/admin/eye.svg') }}";

        const confirmarEliminarProducto = document.createElement("img");
        confirmarEliminarProducto.src = "{{asset('icons/admin/trash.svg') }}";
        confirmarEliminarProducto.addEventListener("click", () => {
            eliminarProducto(producto.id);
        });

        divDatos.appendChild(nombreProducto);
        divDatos.appendChild(precioProducto);

        divIcons.appendChild(editarProducto);
        divIcons.appendChild(verProducto);
        divIcons.appendChild(confirmarEliminarProducto);

        productoDiv.appendChild(divDatos);
        productoDiv.appendChild(divIcons);
        listaProductos.appendChild(productoDiv);
    }
}

export function popupCrearProducto() {
    // Verificar si ya existe el modal y eliminarlo para evitar duplicaciones
    let existingModal = document.getElementById("popupOverlay");
    if (existingModal) {
        existingModal.remove();
    }

    const modalOverlay = document.createElement("div");
    modalOverlay.id = "popupOverlay";
    modalOverlay.className =
        "fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50";

    const modalContent = document.createElement("div");
    modalContent.className = "bg-custom-dark3 p-6 rounded-lg shadow-lg w-96";

    const modalTitle = document.createElement("h2");
    modalTitle.className = "text-xl font-semibold text-white mb-4";
    modalTitle.innerText = "Añadir Nuevo Producto";

    const form = document.createElement("form");
    form.className = "space-y-4";

    form.appendChild(
        createInputField("nombre_producto", "Nombre del Producto")
    );
    form.appendChild(
        createInputField(
            "descripcion_producto",
            "Descripción del Producto",
            "textarea"
        )
    );
    form.appendChild(
        createInputField("codigo_producto", "Código del Producto")
    );
    form.appendChild(createInputField("precio_producto", "Precio", "number"));
    form.appendChild(createInputField("stock_producto", "Stock", "number"));

    // Checkbox Producto Destacado
    const checkboxDiv = document.createElement("div");
    checkboxDiv.className = "flex items-center gap-2";
    const checkbox = document.createElement("input");
    checkbox.type = "checkbox";
    checkbox.id = "destacado_producto";
    checkbox.className = "form-checkbox h-5 w-5 text-primary";
    const checkboxLabel = document.createElement("label");
    checkboxLabel.htmlFor = "destacado_producto";
    checkboxLabel.className = "text-white";
    checkboxLabel.innerText = "Destacar Producto";
    checkboxDiv.appendChild(checkbox);
    checkboxDiv.appendChild(checkboxLabel);
    form.appendChild(checkboxDiv);

    const buttonsDiv = document.createElement("div");
    buttonsDiv.className = "flex justify-end gap-2";

    const cancelButton = document.createElement("button");
    cancelButton.innerText = "Cancelar";
    cancelButton.className =
        "bg-gray-600 hover:bg-gray-500 text-white px-4 py-2 rounded";
    cancelButton.onclick = function (event) {
        event.preventDefault();
        document.getElementById("popupOverlay").remove();
    };

    const saveButton = document.createElement("button");
    saveButton.innerText = "Guardar";
    saveButton.className =
        "bg-primary hover:bg-blue-500 text-white px-4 py-2 rounded";
    saveButton.type = "submit";
    saveButton.onclick = async function (event) {
        event.preventDefault();
        await crearProducto();
    };

    buttonsDiv.appendChild(cancelButton);
    buttonsDiv.appendChild(saveButton);
    form.appendChild(buttonsDiv);

    modalContent.appendChild(modalTitle);
    modalContent.appendChild(form);
    modalOverlay.appendChild(modalContent);

    document.body.appendChild(modalOverlay);
}

function createInputField(id, label, type = "text") {
    const div = document.createElement("div");
    div.className = "flex flex-col";

    const inputLabel = document.createElement("label");
    inputLabel.htmlFor = id;
    inputLabel.className = "text-white text-sm mb-1";
    inputLabel.innerText = label;

    let inputElement;
    if (type === "textarea") {
        inputElement = document.createElement("textarea");
        inputElement.rows = 3;
    } else {
        inputElement = document.createElement("input");
        inputElement.type = type;
    }

    inputElement.id = id;
    inputElement.className =
        "p-2 bg-custom-dark2 border border-gray-600 rounded text-white focus:outline-none focus:border-primary";

    div.appendChild(inputLabel);
    div.appendChild(inputElement);

    return div;
}

async function obtenerProductos() {
    const productos = await fetch("/productos");
    const data = await productos.json();
    return Array.isArray(data) ? data : [];
}

async function crearProducto() {
    try {
        const data = {
            nombre_producto: document.getElementById("nombre_producto").value,
            descripcion_producto: document.getElementById(
                "descripcion_producto"
            ).value,
            codigo_producto: document.getElementById("codigo_producto").value,
            precio_producto: parseFloat(
                document.getElementById("precio_producto").value
            ),
            stock_producto: parseInt(
                document.getElementById("stock_producto").value
            ),
            destacado_producto: document.getElementById("destacado_producto")
                .checked
                ? 1
                : 0,
        };

        const response = await fetch("/productos", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
            body: JSON.stringify(data),
        });

        const result = await response.json();

        if (response.ok) {
            alert("Producto creado correctamente");
            document.getElementById("popupOverlay").remove(); // Cerrar modal si fue exitoso
        } else {
            alert(
                "Error: " + (result.message || "No se pudo crear el producto")
            );
        }
    } catch (error) {
        console.error("Error al crear producto:", error);
        alert("Ocurrió un error al crear el producto");
    }
}

async function eliminarProducto(id) {
    const response = await fetch(`/productos/${id}`, {
        method: "DELETE",
        headers: {
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
    });

    const result = await response.json();

    if (response.ok) {
        alert("Producto eliminado correctamente");
        listarProductos();
    } else {
        alert(
            "Error: " + (result.message || "No se pudo eliminar el producto")
        );
    }
}

async function editarProducto(id) {
    const producto = await fetch(`/productos/${id}`, {
        method: "PUT",
    });
}
