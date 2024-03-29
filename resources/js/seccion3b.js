// Obtén la cadena JSON del Local Storage
let getDataObjetivos = localStorage.getItem("dataObjetivos");

// Conviértela en un array de objetos JavaScript
let arrayDataObjetivos = JSON.parse(getDataObjetivos);
let copiaGetDataObjetivos = [...arrayDataObjetivos];

console.log(arrayDataObjetivos);
let selectObjetivo = document.getElementById("selectObjetivoParticular");
let dataobjetivo = document.getElementById("dataobjetivo");
let dataaccion = document.getElementById("dataaccion");
let datacondicion = document.getElementById("datacondicion");
let objetivos_id = document.getElementById("objetivos_id");
let indice = 0;
let indicesAEliminar = [];

// Ve si esta habilitado el temario
let TemarioHabilitado = document.getElementById("myForm");
TemarioHabilitado.style.display = "none";

// Ahora puedes acceder y manipular los datos
arrayDataObjetivos.map((objetivo) => {
    let opcion = document.createElement("option");
    opcion.text = objetivo.descripcion;
    opcion.value = objetivo.id;
    selectObjetivo.add(opcion);
});
/*Obtenemos el valor seleccionado a traves del evento onchange, donde el evento se dispara cuando cambia el valor del select*/
selectObjetivo.onchange = function () {
    let valorSeleccionado = Number(this.value);

    if (valorSeleccionado !== 0) {
        TemarioHabilitado.style.display = "block";
    } else {
        TemarioHabilitado.style.display = "none";
    }
    let objetoEncontrado = arrayDataObjetivos.find(
        (objeto) => objeto.id === valorSeleccionado
    );
    console.log("El objeto seleccionado es: ", objetoEncontrado);
    dataobjetivo.innerText = objetoEncontrado.sujeto;
    dataaccion.innerText = objetoEncontrado.accion;
    datacondicion.innerText = objetoEncontrado.condicion;
    objetivos_id.value = objetoEncontrado.id;

    let objetoBuscadoIndex = objetoEncontrado.id;
    indice = arrayDataObjetivos.findIndex(
        (objetivo) => objetivo.id === objetoBuscadoIndex
    );
};
/*Codigo para formulario dinamico de Temas*/

document.getElementById("cantidadTemas").addEventListener("input", () => {
    let content = "";
    const cantidadTemas = event.target.value;
    for (let i = 0; i < cantidadTemas; i++) {
        content += `
        <div class="mb-3">
        <div class="name ">Tema </div>
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
    document.getElementById("divTemas").innerHTML = content;
});

document.getElementById("myForm").addEventListener("submit", (event) => {
    event.preventDefault();
    const url = route("seccion3b-store");
    const cantidadTemas = document.getElementById("cantidadTemas").value;
    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData.entries());

    data.temas = [];
    for (let i = 0; i < cantidadTemas; i++) {
        const constantetema = {};
        constantetema.tema = document.getElementById(`tema[${i}]`).value;
        constantetema.objetivos_id = objetivos_id.value;
        data.temas.push(constantetema);
    }
    console.log(data);

    const requestOptions = {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
        body: JSON.stringify(data),
    };

    fetch(url, requestOptions)
        .then((response) => response.json())
        .then((data) => {
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
                copiaGetDataObjetivos.map((objetivo) => {
                    let opcion = document.createElement("option");
                    opcion.text = objetivo.descripcion;
                    opcion.value = objetivo.id;
                    selectObjetivo.add(opcion);
                });                
            }else {
                indicesAEliminar = [];
            }

        });
});
