let vista_indice =parseInt(localStorage.getItem('vista_indice'));

if (localStorage.getItem('indicesViews')) {
    let views = localStorage.getItem("indicesViews");
    let view = JSON.parse(views);

    // Busca la sección correcta usando vista_indice
    let seccion_actual = view[3];

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



// Obtén la cadena JSON del Local Storage y su conversion a su valor original
let getDataObjetivos = localStorage.getItem("dataObjetivos");
let arrayDataObjetivos = JSON.parse(getDataObjetivos);
let dataCurso = localStorage.getItem("curso_id");
let curso_id2 = JSON.parse(dataCurso);

//se declaran las variables que se van a utilizar
const TemarioHabilitado = document.getElementById("myForm");
const selectObjetivo = document.getElementById("selectObjetivoParticular");
const dataobjetivo = document.getElementById("dataobjetivo");
const dataaccion = document.getElementById("dataaccion");
const datacondicion = document.getElementById("datacondicion");
const objetivos_id = document.getElementById("objetivos_id");
const curso_id = document.getElementById("curso_id");
const cantiTemas = document.getElementById("cantidadTemas");
const divTemas = document.getElementById("divTemas");

const cantidadTemas = document.getElementById('cantidadTemas');


cantidadTemas.addEventListener('input', function () {
    if (this.value < 1) {
        this.value = 1;
    }
    if (this.value > 15) {
        this.value = 15;
    }
});


TemarioHabilitado.style.display = "none";


//se oculta el formulario


const renderData = (idCurso) => {
    const url = route("seccion3b-getDataObj", {
        idCurso
    });

    fetch(url)
    .then((response) => response.json())
    .then((data) => {
        console.log(data);
        renderSelect(data.data);
    })
    .catch((error) => console.error("Error:", error));
}

renderData(parseInt(curso_id2));


//funcion para renderizar el select de objetivos
const renderSelect = (arrayData) => {

    renderOptionDefault('Escoja un Objetivo');
    if (arrayData.length > 0) {
        arrayData.map((objetivo) => {
            let opcion = document.createElement("option");
            opcion.text = objetivo.descripcion;
            opcion.value = objetivo.id;
            selectObjetivo.add(opcion);
            console.log('Este es el largo del array',arrayData.length);
        });
    }else{
        renderOptionDefault('No hay datos disponibles ve a la siguiente sección');
        consultarAvances();
    }
}

const renderOptionDefault = (texto) => {
    selectObjetivo.innerHTML = "";
    let opcionDefecto = document.createElement("option");
    opcionDefecto.text = texto;
    opcionDefecto.value = 0;
    selectObjetivo.add(opcionDefecto);

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
        cantiTemas.value = "";
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
                <input id="tema[${i}]" class="form-control" type="text" name="tema[${i}]" autocomplete="Tema" autocomplete="off" required>
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

        let views = localStorage.getItem("indicesViews");
        let view = JSON.parse(views);
        view[3].vista_guardada = 0;
        console.log(view);
        localStorage.setItem('indicesViews', JSON.stringify(view));
        let CursoId = localStorage.getItem('curso_id');
        let nombreVista = view[3].nombre_vista_actual;
        let url2 = route('actualizar-seguimiento', { nombreVista, CursoId });
        
        fetch(url2)
            .then(response => response.json())
            .then(data => {
                console.log(data);
                
            });

       
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

const manejarRespuesta = () => {
    renderData(parseInt(curso_id2));
    cleanForm();
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


function consultarAvances() {
    let views = localStorage.getItem("indicesViews");
    let view = JSON.parse(views);

    let CursoId = localStorage.getItem('curso_id');
    let nombreVista = view[3].nombre_vista_actual;
    let url = route('seguimiento3b', { nombreVista, CursoId });
    
    fetch(url)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data.alcanzado) {
                // Incrementa vista_indice si alcanzado es true
                view[3].vista_guardada = 1;
                console.log(view);
                localStorage.setItem('indicesViews', JSON.stringify(view));
                vista_indice++;
                localStorage.setItem('vista_indice', JSON.stringify(vista_indice));
                window.location.href = route('seccion3c-create'); // Redirige a otra página
            }
        });
}

