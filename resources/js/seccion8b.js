let vista_indice =parseInt(localStorage.getItem('vista_indice'));

if (localStorage.getItem('indicesViews')) {
    let views = localStorage.getItem("indicesViews");
    let view = JSON.parse(views);

    // Busca la sección correcta usando vista_indice
    let seccion_actual = view[14];

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

// Obtén la cadena JSON del Local Storage
let getDataObjetivos = localStorage.getItem("dataObjetivos");
//Creamos una array con las opciones a elegir
let arrayDataInicio8b = [
    { id: 1, descripcion: 'a.	Presentará objetivo de la actividad a desarrollar:  ' },
    { id: 2, descripcion: 'b.	Recuperará la experiencia previa de los participantes:' },
    { id: 3, descripcion: 'c.	Presentará la actividad a desarrollar y mencionará el propósito de la misma:' },
    { id: 4, descripcion: 'd.	Ejemplificará la actividad a desarrollar  ' },
    { id: 5, descripcion: 'e.	Resolverá dudas sobre la demostración realizada' },
    { id: 6, descripcion: 'f.	Permitirá que los participantes realicen la práctica:' },
    { id: 7, descripcion: 'g.	Retroalimentará sobre la práctica:' },
    { id: 8, descripcion: 'h.	Usará ejemplos relacionados con los temas y situaciones cotidianas.' },
    { id: 9, descripcion: 'i.	Preguntará por los conocimientos adquiridos y la utilidad de lo aprendido en su actividad' },
    { id: 10, descripcion: 'j.	Recordará al grupo las reglas de operación acordadas' },
    { id: 11, descripcion: 'k.	Mencionará al grupo los logros alcanzados y lo que falta por abordar' }
];

consultarAvances();

// Conviértela en un array de objetos JavaScript
let arrayDataObjetivos = JSON.parse(getDataObjetivos);
let copiaGetDataInicio8b;
let habilitarInputs8b;
let valorEtapa_encuadre8b;
let duracion8b;
let tecnicas8b;
let valorMaterial_equipo_apoyo8b;
let cantidad;

let copiaGetDataObjetivos = [...arrayDataObjetivos];
if (localStorage.getItem('copiaGetDataInicio8b')) {
    copiaGetDataInicio8b = JSON.parse(localStorage.getItem('copiaGetDataInicio8b'));
  }else{
    copiaGetDataInicio8b = [...arrayDataInicio8b];
    localStorage.setItem('copiaGetDataInicio8b', JSON.stringify(copiaGetDataInicio8b));
  }

  if (localStorage.getItem('habilitarInputs8b')) {
    habilitarInputs8b = JSON.parse(localStorage.getItem('habilitarInputs8b'));
    valorEtapa_encuadre8b = JSON.parse(localStorage.getItem('valorEtapa_encuadre8b')); 
    valorMaterial_equipo_apoyo8b = JSON.parse(localStorage.getItem('valorMaterial_equipo_apoyo8b'));
    duracion8b = JSON.parse(localStorage.getItem('duracion8b'));
    tecnicas8b = JSON.parse(localStorage.getItem('tecnicas8b'));
  }else{
    habilitarInputs8b = true;
    valorEtapa_encuadre8b='';
    valorMaterial_equipo_apoyo8b='';
    duracion8b='';
    tecnicas8b='';
  }


// Acceder a la propiedad 'cursos_id'
let cursos_id = 0;
let seccion_encuadre = 2;

console.log(cursos_id); // Imprime el valor de 'cursos_id'


console.log(arrayDataObjetivos);
let selectRequerimiento = document.getElementById("selectRequerimiento");
let indice = 0;
let requerimientos_id = document.getElementById("requerimientos_id");


// Ve si esta habilitado el beneficiario
let BeneficiarioHabilitado = document.getElementById("myForm");
BeneficiarioHabilitado.style.display = "none";

// Ahora puedes acceder y manipular los datos
copiaGetDataInicio8b.map((requerimiento) => {
    let opcion = document.createElement("option");
    opcion.text = requerimiento.descripcion;
    opcion.value = requerimiento.id;
    selectRequerimiento.add(opcion);
});

/*Entontramos el valor de cursos_id*/
if (arrayDataObjetivos) {
    // Recorrer cada objeto en el array
    arrayDataObjetivos.forEach(function(objeto) {
        // Acceder a la propiedad 'tipo_objetivo'
        cursos_id = objeto.cursos_id;
        console.log(cursos_id); // Imprime el valor de 'tipo_objetivo'
    });
} else {
    console.log('El array no existe en el Local Storage');
}

selectRequerimiento.onchange = function () {
    let valorSeleccionado = Number(this.value);
    
    if (valorSeleccionado !== 0) {
        BeneficiarioHabilitado.style.display = "block";
    } else {
        BeneficiarioHabilitado.style.display = "none";
    }
    indice = copiaGetDataInicio8b.find(
        (objeto) => objeto.id === valorSeleccionado
    );
    let content = "";
    if(valorSeleccionado === 1){
        content += `
        <div class="mb-3">
        <div class="name">Escribir el objetivo particular psicomotriz:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        `;

    document.getElementById("divRequerimientos").innerHTML = content;
    habilitarContenido();
    }
    if( valorSeleccionado === 2){
        content += `
        <div class="mb-3">
        <div class="name">Redactar aquí al menos 3 preguntas para recuperar la experiencia:</div>
        </div>
        <label for="">Cantidad de Preguntas</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas" required>
        <br>
        <div id="divReglas">
        </div>
        `;
    
    document.getElementById("divRequerimientos").innerHTML = content;
    habilitarPreguntas();
    habilitarContenido();
    }
    if( valorSeleccionado === 3){
        content += `
        <div class="mb-3">
        <div class="name">Escribir la actividad a realizar, y su propósito:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        `;

    document.getElementById("divRequerimientos").innerHTML = content;
    habilitarContenido();
    }
    if( valorSeleccionado === 4){
        content += `
        <div class="mb-3">
        <div class="name">Redactar las actividades a desarrollar:</div>
        </div>
        <label for="">Cantidad de Ejemplos</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas" required>
        <br>
        <div id="divReglas">
        </div>
        `;
    
    document.getElementById("divRequerimientos").innerHTML = content;
    habilitarPreguntas();
    habilitarContenido();
    }
    if( valorSeleccionado === 5){
        content += `
        <div class="mb-3">
        <div class="name">Escribir la actividad a realizar:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required placeholder="Ejemplo: Aclaración de dudas"></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        `;

    document.getElementById("divRequerimientos").innerHTML = content;
    habilitarContenido();
    }
    if( valorSeleccionado === 6){
        content += `
        <div class="mb-3">
        <div class="name">Redactar actividad:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required placeholder="Ejemplo: Desarrollar la práctica entre los participantes"></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        `;
    
    document.getElementById("divRequerimientos").innerHTML = content;
    habilitarContenido();
    }
    if( valorSeleccionado === 7){
        content += `
        <div class="mb-3">
        <div class="name">Redactar actividad:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required placeholder="Ejemplo: El instructor resolverá las dudas y problemáticas generadas durante la práctica"></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        `;
    
    document.getElementById("divRequerimientos").innerHTML = content;
    habilitarContenido();
    }
    if( valorSeleccionado === 8){
        content += `
        <div class="mb-3">
        <div class="name">Redactar aquí 3 ejemplos relacionados con las situaciones cotidianas:</div>

        <label for="">Cantidad de ejemplos</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas" required>
        <br>
        <div id="divReglas">
        </div>
        `;
    
    document.getElementById("divRequerimientos").innerHTML = content;
    habilitarPreguntas();
    habilitarContenido();
    }
    if( valorSeleccionado === 9){
        content += `
        <div class="mb-3">
        <div class="name">Redactar aquí al menos 3 preguntas para recuperar la experiencia:</div>

        <label for="">Cantidad de preguntas</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas" required>
        <br>
        <div id="divReglas">
        </div>
        `;
    
    document.getElementById("divRequerimientos").innerHTML = content;
    habilitarPreguntas();
    habilitarContenido();
    }
    if( valorSeleccionado === 10){        
        content += `
        <div class="mb-3">
        <div class="name">Redactar la actividad:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required placeholder="Ejemplo: El instructor recordará a los participantes las reglas ya establecidas."></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        `;

    document.getElementById("divRequerimientos").innerHTML = content;
    habilitarContenido();
    }
    if( valorSeleccionado === 11){
        content += `
        <div class="mb-3">
        <div class="name">Redactar aquí los logros y lo que falta por abordar:</div>

        <label for="">Cantidad de actividades</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas" required>
        <br>
        <div id="divReglas">
        </div>
        `;
    
    document.getElementById("divRequerimientos").innerHTML = content;
    habilitarPreguntas();
    habilitarContenido();
    }

    requerimientos_id.value = indice.id;
    let selectedOption = this.options[this.selectedIndex];
    requerimientos_id.text = selectedOption.text;
    console.log("El objeto seleccionado es: ", indice);
};

document.getElementById("myForm").addEventListener("submit", (event) => {
    event.preventDefault();
    const url = route("seccion8b-store");
    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData.entries());
  
    data.descripcion = requerimientos_id.value;
    data.momento_aplicacion = requerimientos_id.text;
    data.seccion_encuadre = seccion_encuadre;
    data.cursos_id = cursos_id;
    data.indice=indice.id;


    if(document.getElementById("cantidadReglas")){
        cantidad = document.getElementById("cantidadReglas").value;
    }
    data.actividades = [];
    for (let i = 0; i < cantidad; i++) {
        const constanterequerimiento = {};
        constanterequerimiento.actividad = document.getElementById(`actividad[${i}]`).value;
        data.actividades.push(constanterequerimiento);
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
            BeneficiarioHabilitado.style.display = "none";
            document.getElementById(`divRequerimientos`).innerHTML = "";
            console.log("indice para eliminar " + indice);
            
            // Eliminamos los elementos
            copiaGetDataInicio8b = copiaGetDataInicio8b.filter(obj => obj.id != indice.id);
            localStorage.setItem('copiaGetDataInicio8b', JSON.stringify(copiaGetDataInicio8b));
            location.reload();
         
            
            console.log('Despues de el for each',copiaGetDataInicio8b); // Imprime el array después de eliminar los elementos
            selectRequerimiento.innerHTML = "";

            let opcionDefecto = document.createElement("option");
            opcionDefecto.text = "Escoja una opción";
            opcionDefecto.value = 0;
            selectRequerimiento.add(opcionDefecto);

            copiaGetDataInicio8b.map((requerimiento) => {
                let opcion = document.createElement("option");
                opcion.text = requerimiento.descripcion;
                opcion.value = requerimiento.id;
                selectRequerimiento.add(opcion);
            });

        });

    habilitarInputs8b=false;
    localStorage.setItem('habilitarInputs8b', JSON.stringify(habilitarInputs8b));
    valorEtapa_encuadre8b = document.getElementById("etapa_encuadre").value;
    localStorage.setItem('valorEtapa_encuadre8b', JSON.stringify(valorEtapa_encuadre8b));
    valorMaterial_equipo_apoyo8b = document.getElementById("material_equipo_apoyo").value;
    localStorage.setItem('valorMaterial_equipo_apoyo8b', JSON.stringify(valorMaterial_equipo_apoyo8b));
    duracion8b = document.getElementById("duracion").value;
    localStorage.setItem('duracion8b', JSON.stringify(duracion8b));
    tecnicas8b = document.getElementById("tecnicas").value;
    localStorage.setItem('tecnicas8b', JSON.stringify(tecnicas8b));
    habilitarContenido();

    let views = localStorage.getItem("indicesViews");
    let view = JSON.parse(views);
    view[14].vista_guardada = 0;
    console.log(view);
    localStorage.setItem('indicesViews', JSON.stringify(view));
    let CursoId = localStorage.getItem('curso_id');
    let nombreVista = view[14].nombre_vista_actual;
    let url2 = route('actualizar-seguimiento', { nombreVista, CursoId });
    
    fetch(url2)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            
        });
    
    
});

const habilitarContenido = () => {

    if (habilitarInputs8b === true) {
       console.log('Estan habilitados los Inputs');
    } else {
        var inputEtapa = document.getElementById('etapa_encuadre');
        var inputMaterialEquipo = document.getElementById('material_equipo_apoyo');
        var inputDuracion = document.getElementById('duracion');
        var inputTecnicas = document.getElementById('tecnicas');
        inputEtapa.value = valorEtapa_encuadre8b;
        inputMaterialEquipo.value = valorMaterial_equipo_apoyo8b;
        inputDuracion.value = duracion8b;
        inputTecnicas.value = tecnicas8b;
        inputEtapa.readOnly = true;
        inputMaterialEquipo.readOnly = true;
        inputDuracion.readOnly = true;
        inputTecnicas.readOnly = true;
    }

}

const habilitarPreguntas = () => {
    document.getElementById("cantidadReglas").addEventListener("input", () => {
    let content = "";
    const cantidadReglas = event.target.value;
    for (let i = 0; i < cantidadReglas; i++) {
        content += `
        <div class="mb-3">
        <div class="name">Redactar </div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad[${i}]" class="form-control" type="text" name="actividad[${i}]" autocomplete="actividad" required></textarea>
                <span class="focus-input100 "></span>
            <span class="symbol-input100">
            <i class="fa fa-envelope"></i>
            </span>
            </div>
        </div>
        `;
    }
    document.getElementById("divReglas").innerHTML = content;
});
}

function consultarAvances() {
    let views = localStorage.getItem("indicesViews");
    let view = JSON.parse(views);

    let CursoId = localStorage.getItem('curso_id');
    let nombreVista = view[14].nombre_vista_actual;
    let url = route('seguimiento8b', { nombreVista, CursoId });
    
    fetch(url)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data.alcanzado) {
                // Incrementa vista_indice si alcanzado es true
                view[14].vista_guardada = 1;
                console.log(view);
                localStorage.setItem('indicesViews', JSON.stringify(view));
                vista_indice++;
                localStorage.setItem('vista_indice', JSON.stringify(vista_indice));
                localStorage.removeItem('copiaGetDataInicio8b');
                localStorage.removeItem('valorEtapa_encuadre8b');
                localStorage.removeItem('valorMaterial_equipo_apoyo8b');
                localStorage.removeItem('duracion8b');
                localStorage.removeItem('tecnicas8b');
                localStorage.removeItem('habilitarInputs8b');
                window.location.href = route('seccion8c-create'); // Redirige a otra página
            }
        });
}