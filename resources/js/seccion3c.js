
// Obtén la cadena JSON del Local Storage
let getDataObjetivos = localStorage.getItem("dataObjetivos");

// Conviértela en un array de objetos JavaScript
let arrayDataObjetivos = JSON.parse(getDataObjetivos);
let copiaGetDataObjetivos = [...arrayDataObjetivos];

console.log(arrayDataObjetivos);
let selectObjetivo3c = document.getElementById("selectObjetivoParticular3c");
let selectTemas = document.getElementById("selectTemas");

//let objetivos_id = document.getElementById("objetivos_id");
let indice = 0;
let indicesAEliminar = [];
let CursoId = 0;

// Ve si esta habilitado el temario
let SubtemarioHabilitado = document.getElementById("FormSubtemas");
SubtemarioHabilitado.style.display = "none";

// Ahora puedes acceder y manipular los datos
arrayDataObjetivos.map((objetivo) => {
    let opcion = document.createElement("option");
    opcion.text = objetivo.descripcion;
    opcion.value = objetivo.id;
    selectObjetivo3c.add(opcion);
});

selectObjetivo3c.onchange = function () {
    let IdObjetivo = Number(this.value);
    let objetivoEncontrado = arrayDataObjetivos.find(
        (objeto) => objeto.id === IdObjetivo
    );
    console.log("El objeto seleccionado es: ", objetivoEncontrado); 
    CursoId = objetivoEncontrado.cursos_id;

    console.log(IdObjetivo, CursoId);
    
    let url = route('seccion3c-getTemas', {
         IdObjetivo,
         CursoId
        });



    fetch(url)
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            selectTemas.innerHTML = "";
            let opcionDefecto = document.createElement("option");
            opcionDefecto.text = "Escoja un Objetivo";
            opcionDefecto.value = 0;
            selectTemas.add(opcionDefecto);

          
                data.data.map((tema) => {
                    let opcion = document.createElement("option");
                    opcion.text = tema.tema;
                    opcion.value = tema.id;
                    selectTemas.add(opcion);
                });                
        });



};


selectTemas.onchange = function () {
    let valorSeleccionado = Number(this.value);

    if (valorSeleccionado !== 0) {
        SubtemarioHabilitado.style.display = "block";
    } else {
        SubtemarioHabilitado.style.display = "none";
    }



};


document.getElementById("cantidadSubtemas").addEventListener("input", () => {
    let content = "";
    const cantidadTemas = event.target.value;
    
    for (let i = 0; i < cantidadTemas; i++) {
        content += `
        <div class="mb-3">
        <div class="name ">Subtema </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="subtema[${i}]" class="form-control" type="text" name="subtema[${i}]" autocomplete="Subtema">
                <span class="focus-input100 "></span>
        <span class="symbol-input100">
            <i class="fa fa-envelope"></i>
        </span>
            </div>
        </div>
        `;
    }
    document.getElementById("divSubtemas").innerHTML = content;
    
   console.log(cantidadTemas);
});