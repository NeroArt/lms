
// Obtén la cadena JSON del Local Storage
let getDataObjetivos = localStorage.getItem("dataObjetivos");

// Conviértela en un array de objetos JavaScript
let arrayDataObjetivos = JSON.parse(getDataObjetivos);
let copiaGetDataObjetivos = [...arrayDataObjetivos];
let arrayTemas;


let selectObjetivo3c = document.getElementById("selectObjetivoParticular3c");
let selectTemas = document.getElementById("selectTemas");
let idTema = 0;

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
     
    CursoId = objetivoEncontrado.cursos_id;
    
    let url = route('seccion3c-getTemas', {
         IdObjetivo,
         CursoId
        });

    fetch(url)
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            arrayTemas = data.data;
            
            cleanFormSubtemas();
            let opcionDefecto = document.createElement("option");
            opcionDefecto.text = "Escoja un Tema";
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
        idTema = valorSeleccionado;
    } else {
        SubtemarioHabilitado.style.display = "none";
    }

    console.log('idTema ' + idTema);
    console.log('arrayTema ' , arrayTemas);

    indice = arrayTemas.findIndex(
        (tema) => tema.id === idTema
    );

    console.log("indice para eliminar " + indice);




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
    
   
});


document.getElementById("FormSubtemas").addEventListener("submit", (event) => {
    event.preventDefault();
    const url = route("seccion3c-store");
    const cantidadSubtemas = document.getElementById("cantidadSubtemas").value;
    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData.entries());

    data.subtemas = [];
    for (let i = 0; i < cantidadSubtemas; i++) {
        const constantesubtema = {};
        constantesubtema.subtema = document.getElementById(`subtema[${i}]`).value;
        constantesubtema.id = idTema;
        data.subtemas.push(constantesubtema);
    }
    



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
            cleanFormSubtemas();
            destroyTemas();
        });
});

const cleanFormSubtemas = () => {
    SubtemarioHabilitado.style.display = "none";
    document.getElementById("divSubtemas").innerHTML = "";
    document.getElementById("cantidadSubtemas").value='';
    selectTemas.innerHTML = "";

}


const destroyTemas = () => {
    console.log("indice para eliminar " + indice);
            
    indicesAEliminar.push(indice);
    

    // Ordenamos los índices en orden descendente (esto es importante para no desordenar los índices al eliminar)
    indicesAEliminar.sort((a, b) => b - a);

    // Eliminamos los elementos
    indicesAEliminar.forEach((indice) => {
        arrayTemas.splice(indice, 1);
    });

    console.log(arrayTemas); // Imprime el array después de eliminar los elementos
    selectTemas.innerHTML = "";

    let opcionDefecto = document.createElement("option");
    opcionDefecto.text = "Escoja un tema";
    opcionDefecto.value = 0;
    selectTemas.add(opcionDefecto);

    if (arrayTemas.length > 0) {
        arrayTemas.map((tema) => {
            let opcion = document.createElement("option");
            opcion.text = tema.tema;
            opcion.value = tema.id;
            selectTemas.add(opcion);
        });                
    }else {
        indicesAEliminar = [];
    }
}


