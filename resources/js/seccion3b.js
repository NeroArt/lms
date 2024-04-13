// Obtén la cadena JSON del Local Storage y su conversion a su valor original
let getDataObjetivos = localStorage.getItem("dataObjetivos");
let arrayDataObjetivos = JSON.parse(getDataObjetivos);

let getObjRestantes = localStorage.getItem("objRestantes");
let arrayObjRestantes = JSON.parse(getObjRestantes);

let getBandera = localStorage.getItem("bandera");
let valorBandera = JSON.parse(getBandera);

//se declaran las variables que se van a utilizar
let TemarioHabilitado = document.getElementById("myForm");
let selectObjetivo = document.getElementById("selectObjetivoParticular");
let dataobjetivo = document.getElementById("dataobjetivo");
let dataaccion = document.getElementById("dataaccion");
let datacondicion = document.getElementById("datacondicion");
let objetivos_id = document.getElementById("objetivos_id");
let curso_id = document.getElementById("curso_id");
let cantiTemas = document.getElementById("cantidadTemas");
let divTemas = document.getElementById("divTemas");

//se oculta el formulario
TemarioHabilitado.style.display = "none";

//funcion para renderizar el select de objetivos
const renderSelect = (arrayData) => {
    selectObjetivo.innerHTML = "";

    let opcionDefecto = document.createElement("option");
    opcionDefecto.text = "Escoja un Objetivo";
    opcionDefecto.value = 0;
    selectObjetivo.add(opcionDefecto);

    if (arrayData.length > 0) {
        arrayData.map((objetivo) => {
            let opcion = document.createElement("option");
            opcion.text = objetivo.descripcion;
            opcion.value = objetivo.id;
            selectObjetivo.add(opcion);
        });
    }


}

// validacion de la bandera para renderizar el select de objetivos
if (valorBandera) {
    renderSelect(arrayObjRestantes);
}else{
    renderSelect(arrayDataObjetivos);
}

/*Obtenemos el valor seleccionado a traves del evento onchange, donde el evento se dispara cuando cambia el valor del select*/
selectObjetivo.addEventListener("change", function () {
    let valorSeleccionado = Number(this.value);

    if (valorSeleccionado !== 0) {
        TemarioHabilitado.style.display = "block";
        let objetoEncontrado = findObject(valorSeleccionado);

        
        dataobjetivo.innerText = objetoEncontrado.sujeto;
        dataaccion.innerText = objetoEncontrado.accion;
        datacondicion.innerText = objetoEncontrado.condicion;
        objetivos_id.value = objetoEncontrado.id;
        curso_id.value = objetoEncontrado.cursos_id;
    } else {
        TemarioHabilitado.style.display = "none";
        cleanForm();
    }
});

//funcion para buscar un objeto en el array de objetivos
const findObject = (id) => {
    return arrayDataObjetivos.find((objetivo) => objetivo.id === id);
}

//evento para obtener la cantidad de temas
cantiTemas.addEventListener("input", () => {
    const cantidadTemas = event.target.value;
    renderTemas(cantidadTemas);
});

//funcion para renderizar los temas
const renderTemas = (cantidadTemas) => {
    let content = "";
    for (let i = 0; i < cantidadTemas; i++) {
        content += `
        <div class="mb-3">
        <div class="name ">Tema ${i + 1}</div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="tema[${i}]" class="form-control" type="text" name="tema[${i}]" autocomplete="Tema" autocomplete="off">
                <span class="focus-input100 "></span>
        <span class="symbol-input100">
            <i class="fa fa-envelope"></i>
        </span>
            </div>
        </div>
        `;
    }
    divTemas.innerHTML = content;
}

TemarioHabilitado.addEventListener("submit", (event) => {
    event.preventDefault();
    const url = route("seccion3b-store");
    const cantidadTemas = document.getElementById("cantidadTemas").value;
    const data = obtenerData(event, cantidadTemas);

    const requestOptions = obtenerRequestOptions(data);

    fetch(url, requestOptions)
        .then((response) => response.json())
        .then(manejarRespuesta)
        .catch((error) => console.error("Error:", error));
});

const obtenerData = (event, cantidadTemas) => {
    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData.entries());

    data.temas = [];
    data.idCurso = parseInt(curso_id.value);
    for (let i = 0; i < cantidadTemas; i++) {
        const constantetema = {};
        constantetema.tema = document.getElementById(`tema[${i}]`).value;
        constantetema.objetivos_id = objetivos_id.value;
        data.temas.push(constantetema);
    }
    return data;
}

const obtenerRequestOptions = (data) => {
    return {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
        body: JSON.stringify(data),
    };
}

const manejarRespuesta = (data) => {
    
    cleanForm();

    let objRestantes = data.data;
    valorBandera = true;
    localStorage.setItem("objRestantes", JSON.stringify(objRestantes));
    localStorage.setItem('bandera', JSON.stringify(valorBandera));

    renderSelect(objRestantes);
}

// funcion para limpiar el formulario
const cleanForm = () => {
    TemarioHabilitado.style.display = "none";
    document.getElementById(`divTemas`).innerHTML = "";
    document.getElementById('cantidadTemas').value = "";
    dataobjetivo.innerText = "";
    dataaccion.innerText = "";
    datacondicion.innerText = "";
}

