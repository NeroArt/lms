let vista_indice =parseInt(localStorage.getItem('vista_indice'));

if (localStorage.getItem('indicesViews')) {
    let views = localStorage.getItem("indicesViews");
    let view = JSON.parse(views);

    // Busca la sección correcta usando vista_indice
    let seccion_actual = view[5];

    console.log(seccion_actual.id);
    console.log(seccion_actual.vista_guardada);
    let seccion_correcta = view.find(seccion => seccion.id === vista_indice);

    // Obtén la vista actual
    let vista_actual = seccion_actual.id;

    // Verifica si la vista ha sido guardada
    let vista_guardada = seccion_actual.vista_guardada === 1;

    // Si la vista no ha sido guardada, redirige a la vista correcta
    if (vista_actual != vista_indice && vista_guardada) {
        redireccionSeccion(seccion_correcta.variable_ruta);
    }
    if (vista_actual != vista_indice && !vista_guardada) {
        redireccionSeccion(seccion_correcta.variable_ruta);
    }
}else{
    alert('No se ha creado ningun curso, se te redirecionara al panel de control!!');
    window.location.href = route('home'); // Redirige a otra página
}

function redireccionSeccion (variable_ruta) {
    window.location.href = route(variable_ruta); // Redirige a otra página
}

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