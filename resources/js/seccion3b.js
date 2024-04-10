// Obtén la cadena JSON del Local Storage
let getDataObjetivos = localStorage.getItem("dataObjetivos");

/* Conviértela en un array de objetos JavaScript y se crea una copia del array original*/
let arrayDataObjetivos = JSON.parse(getDataObjetivos);
let copiaGetDataObjetivos = [...arrayDataObjetivos];


//se declaran las variables que se van a utilizar
let TemarioHabilitado = document.getElementById("myForm");
let selectObjetivo = document.getElementById("selectObjetivoParticular");
let dataobjetivo = document.getElementById("dataobjetivo");
let dataaccion = document.getElementById("dataaccion");
let datacondicion = document.getElementById("datacondicion");
let objetivos_id = document.getElementById("objetivos_id");
let cantiTemas = document.getElementById("cantidadTemas");
let divTemas = document.getElementById("divTemas");
let indice = 0;
let indicesAEliminar = [];
TemarioHabilitado.style.display = "none";

//funcion para renderizar el select de objetivos
const renderSelect = (arrayData) => {
    arrayData.map((objetivo) => {
        let opcion = document.createElement("option");
        opcion.text = objetivo.descripcion;
        opcion.value = objetivo.id;
        selectObjetivo.add(opcion);
    });
}

//se llama a la funcion para renderizar el select de objetivos
renderSelect(arrayDataObjetivos);

/*Obtenemos el valor seleccionado a traves del evento onchange, donde el evento se dispara cuando cambia el valor del select*/
selectObjetivo.addEventListener("change", function () {
    let valorSeleccionado = Number(this.value);

    if (valorSeleccionado !== 0) {
        TemarioHabilitado.style.display = "block";
    } else {
        TemarioHabilitado.style.display = "none";
    }
    let objetoEncontrado = findObject(valorSeleccionado);

    console.log("El objeto seleccionado es: ", objetoEncontrado);
    dataobjetivo.innerText = objetoEncontrado.sujeto;
    dataaccion.innerText = objetoEncontrado.accion;
    datacondicion.innerText = objetoEncontrado.condicion;
    objetivos_id.value = objetoEncontrado.id;

    let objetoBuscadoIndex = objetoEncontrado.id;
    indice = findIndice(objetoBuscadoIndex);
});

//funcion para buscar un objeto en el array de objetivos
const findObject = (id) => {
    return arrayDataObjetivos.find((objetivo) => objetivo.id === id);
}

//funcion para buscar el indice de un objeto en el array de objetivos
const findIndice = (id) => {
    return arrayDataObjetivos.findIndex((objetivo) => objetivo.id === id);
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
                <input id="tema[${i}]" class="form-control" type="text" name="tema[${i}]" autocomplete="Tema">
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
    console.log(data);

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

    console.log(data);
    TemarioHabilitado.style.display = "none";
    document.getElementById(`divTemas`).innerHTML = "";
    console.log("indice para eliminar " + indice);
    
    indicesAEliminar.push(indice);
    
    // Ordenamos los índices en orden descendente (esto es importante para no desordenar los índices al eliminar)
    indicesAEliminar.sort((a, b) => b - a);

    // Eliminamos los elementos
    indicesAEliminar.forEach((indice) => {
        copiaGetDataObjetivos.splice(indice, 1);
    });

    console.log(copiaGetDataObjetivos); // Imprime el array después de eliminar los elementos4
    selectObjetivo.innerHTML = "";

    let opcionDefecto = document.createElement("option");
    opcionDefecto.text = "Escoja un Objetivo";
    opcionDefecto.value = 0;
    selectObjetivo.add(opcionDefecto);

    if (copiaGetDataObjetivos.length > 0) {
        renderSelect(copiaGetDataObjetivos);
    }else {
        indicesAEliminar = [];
    }
}

