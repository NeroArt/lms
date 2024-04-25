// Obtén la cadena JSON del Local Storage y conviértela en un array de objetos JavaScript
const arrayDataObjetivos = JSON.parse(localStorage.getItem("dataObjetivos"));
let copiaGetDataObjetivos = [...arrayDataObjetivos];

const selectObjetivo = document.getElementById("selectObjetivoParticular");
const dataobjetivo = document.getElementById("dataobjetivo");
const dataaccion = document.getElementById("dataaccion");
const datacondicion = document.getElementById("datacondicion");
const objetivos_id = document.getElementById("objetivos_id");
let indice = 0;
let indicesAEliminar = [];

// Ve si esta habilitado el beneficiario
const BeneficiarioHabilitado = document.getElementById("myForm");
BeneficiarioHabilitado.style.display = "none";

// Ahora puedes acceder y manipular los datos
arrayDataObjetivos.forEach((objetivo) => {
    const opcion = document.createElement("option");
    opcion.text = objetivo.descripcion;
    opcion.value = objetivo.id;
    selectObjetivo.add(opcion);
});

selectObjetivo.onchange = function () {
    const valorSeleccionado = Number(this.value);
    BeneficiarioHabilitado.style.display = valorSeleccionado !== 0 ? "block" : "none";

    const objetoEncontrado = arrayDataObjetivos.find(
        (objeto) => objeto.id === valorSeleccionado
    );

    dataobjetivo.innerText = objetoEncontrado.sujeto;
    dataaccion.innerText = objetoEncontrado.accion;
    datacondicion.innerText = objetoEncontrado.condicion;
    objetivos_id.value = objetoEncontrado.id;

    indice = arrayDataObjetivos.findIndex(
        (objetivo) => objetivo.id === objetoEncontrado.id
    );
};

document.getElementById("cantidadBeneficios").addEventListener("input", () => {
    const cantidadBeneficios = event.target.value;
    document.getElementById("divBeneficios").innerHTML = Array(cantidadBeneficios).fill().map((_, i) => `
        <div class="mb-3">
            <div class="name">Beneficio </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="beneficio[${i}]" class="form-control" type="text" name="beneficio[${i}]" autocomplete="Beneficio" required>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                    <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
    `).join('');
});

document.getElementById("myForm").addEventListener("submit", async (event) => {
    event.preventDefault();
    const url = route("seccion3d-store");
    const cantidadBeneficios = document.getElementById("cantidadBeneficios").value;
    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData.entries());

    data.beneficios = Array(cantidadBeneficios).fill().map((_, i) => ({
        beneficio: document.getElementById(`beneficio[${i}]`).value,
        objetivos_id: objetivos_id.value
    }));

    const requestOptions = {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
        },
        body: JSON.stringify(data),
    };

    const response = await fetch(url, requestOptions);
    const responseData = await response.json();

    BeneficiarioHabilitado.style.display = "none";
    document.getElementById(`divBeneficios`).innerHTML = "";

    indicesAEliminar.push(indice);
    indicesAEliminar.sort((a, b) => b - a);
    indicesAEliminar.forEach((indice) => copiaGetDataObjetivos.splice(indice, 1));

    selectObjetivo.innerHTML = "";
    const opcionDefecto = document.createElement("option");
    opcionDefecto.text = "Escoja un Objetivo";
    opcionDefecto.value = 0;
    selectObjetivo.add(opcionDefecto);

    if (copiaGetDataObjetivos.length > 0) {
        copiaGetDataObjetivos.forEach((objetivo) => {
            const opcion = document.createElement("option");
            opcion.text = objetivo.descripcion;
            opcion.value = objetivo.id;
            selectObjetivo.add(opcion);
        });                
    } else {
        indicesAEliminar = [];
    }
});