let vista_indice =parseInt(localStorage.getItem('vista_indice'));

if (localStorage.getItem('indicesViews')) {
    let views = localStorage.getItem("indicesViews");
    let view = JSON.parse(views);

    // Busca la sección correcta usando vista_indice
    let seccion_actual = view[11];

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
let arrayDataInicio7c = [
    { id: 1, descripcion: '1.	El instructor acordará con el grupo las expectativas del curso/ sesión' },
    { id: 2, descripcion: '2.	El instructor acordará con el grupo las reglas de operación del curso/sesión' },
    { id: 3, descripcion: '3.	El instructor realizará el contrato de aprendizaje de acuerdo con los objetivos' }
];

consultarAvances();
// Conviértela en un array de objetos JavaScript
let arrayDataObjetivos = JSON.parse(getDataObjetivos);
let copiaGetDataInicio7c;
let habilitarInputs7c;
let valorEtapa_encuadre7c;
let valorMaterial_equipo_apoyo;
let cantidad;

let copiaGetDataObjetivos = [...arrayDataObjetivos];
if (localStorage.getItem('copiaGetDataInicio7c')) {
    copiaGetDataInicio7c = JSON.parse(localStorage.getItem('copiaGetDataInicio7c'));
  }else{
    copiaGetDataInicio7c = [...arrayDataInicio7c];
    localStorage.setItem('copiaGetDataInicio7c', JSON.stringify(copiaGetDataInicio7c));
  }

  if (localStorage.getItem('habilitarInputs7c')) {
    habilitarInputs7c = JSON.parse(localStorage.getItem('habilitarInputs7c'));
    valorEtapa_encuadre7c = JSON.parse(localStorage.getItem('valorEtapa_encuadre7c'));
  }else{
    habilitarInputs7c = true;
    valorEtapa_encuadre7c='';
  }


// Acceder a la propiedad 'cursos_id'
let cursos_id = 0;
let seccion_encuadre = 3;

console.log(cursos_id); // Imprime el valor de 'cursos_id'


console.log(arrayDataObjetivos);
let selectRequerimiento = document.getElementById("selectRequerimiento");
let indice = 0;
let requerimientos_id = document.getElementById("requerimientos_id");


// Ve si esta habilitado el beneficiario
let BeneficiarioHabilitado = document.getElementById("myForm");
BeneficiarioHabilitado.style.display = "none";

// Ahora puedes acceder y manipular los datos
copiaGetDataInicio7c.map((requerimiento) => {
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
    indice = copiaGetDataInicio7c.find(
        (objeto) => objeto.id === valorSeleccionado
    );
    let content = "";
    if(valorSeleccionado === 1){
        content += `
        <div class="mb-3">
        <div class="name">Descripción de la Etapa de Encuadre:</div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="etapa_encuadre" class="form-control" type="text" name="etapa_encuadre" autocomplete="etapa_encuadre" required>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Describir la Actividad: </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Duración (Indicar los minutos de duración): </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="duracion" class="form-control" type="number" name="duracion" autocomplete="duracion" required>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Técnicas: </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="tecnicas" class="form-control" type="text" name="tecnicas" autocomplete="tecnicas" required>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Material y Equipo de Apoyo:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="material_equipo_apoyo" class="form-control" type="text" name="material_equipo_apoyo" autocomplete="material_equipo_apoyo" required></textarea>
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
        <div class="name">Descripción de la Etapa de Encuadre:</div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="etapa_encuadre" class="form-control" type="text" name="etapa_encuadre" autocomplete="etapa_encuadre" required>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Duración (Indicar los minutos de duración): </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="duracion" class="form-control" type="number" name="duracion" autocomplete="duracion" required>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Técnicas: </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="tecnicas" class="form-control" type="text" name="tecnicas" autocomplete="tecnicas" required>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Material y Equipo de Apoyo:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="material_equipo_apoyo" class="form-control" type="text" name="material_equipo_apoyo" autocomplete="material_equipo_apoyo" required></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                    <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        <br>
        <label for="">Cantidad de Preguntas</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas" required>
        <br>
        <label for="exampleInputName" class="form-label">Reglas:</label>
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
        <div class="name">Descripción de la Etapa de Encuadre:</div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="etapa_encuadre" class="form-control" type="text" name="etapa_encuadre" autocomplete="etapa_encuadre" required>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        <div class="name">Duración (Indicar los minutos de duración): </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="duracion" class="form-control" type="number" name="duracion" autocomplete="duracion" required>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Técnicas: </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="tecnicas" class="form-control" type="text" name="tecnicas" autocomplete="tecnicas" required>
            </div>
        </div>
        
        <div class="mb-3">
        <div class="name">Material y Equipo de Apoyo:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="material_equipo_apoyo" class="form-control" type="text" name="material_equipo_apoyo" autocomplete="material_equipo_apoyo" required></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                    <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        <div id="divDescripciones"></div>
        <div class="mb-3">
        <div class="name">a)	Indicará alcances e instrucciones del contrato (Redactar para que sirve este contrato):</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="descripcion[0]" class="form-control" type="text" name="descripcion[0]" autocomplete="descripcion[0]" required></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                    <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">b)	Indicará el tiempo para realizarlo (Redactar cuanto tiempo tienen para llenarlo): </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="descripcion[1]" class="form-control" type="text" name="descripcion[1]" autocomplete="descripcion[1]" required>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                    <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">c)	Aclarará las dudas que se presenten (Redactar la actividad):</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="descripcion[2]" class="form-control" type="text" name="descripcion[2]" autocomplete="descripcion[2]" placeholder="Ejemplo: Aclarar las dudas que se presenten" required></textarea>
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

    requerimientos_id.value = indice.id;
    let selectedOption = this.options[this.selectedIndex];
    requerimientos_id.text = selectedOption.text;
    console.log("El objeto seleccionado es: ", indice);
};

document.getElementById("myForm").addEventListener("submit", (event) => {
    event.preventDefault();
    const url = route("seccion7c-store");
    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData.entries());
  
    data.descripcion = requerimientos_id.value;
    data.momento_aplicacion = requerimientos_id.text;
    data.seccion_encuadre = seccion_encuadre;
    data.cursos_id = cursos_id;
    data.indice=indice.id;
    let cantidadDescripciones = 0;
    if(document.getElementById("divDescripciones")){
        cantidadDescripciones = 3;
    }
    data.descripciones = [];
    for (let i = 0; i < cantidadDescripciones; i++) {
        const constanterequerimiento = {};
        constanterequerimiento.descripcion = document.getElementById(`descripcion[${i}]`).value;
        data.descripciones.push(constanterequerimiento);
    }


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
            copiaGetDataInicio7c = copiaGetDataInicio7c.filter(obj => obj.id != indice.id);
            localStorage.setItem('copiaGetDataInicio7c', JSON.stringify(copiaGetDataInicio7c));
            location.reload();
         
            
            console.log('Despues de el for each',copiaGetDataInicio7c); // Imprime el array después de eliminar los elementos
            selectRequerimiento.innerHTML = "";

            let opcionDefecto = document.createElement("option");
            opcionDefecto.text = "Escoja una opción";
            opcionDefecto.value = 0;
            selectRequerimiento.add(opcionDefecto);

            copiaGetDataInicio7c.map((requerimiento) => {
                let opcion = document.createElement("option");
                opcion.text = requerimiento.descripcion;
                opcion.value = requerimiento.id;
                selectRequerimiento.add(opcion);
            });

        });

    habilitarInputs7c=false;
    localStorage.setItem('habilitarInputs7c', JSON.stringify(habilitarInputs7c));
    valorEtapa_encuadre7c = document.getElementById("etapa_encuadre").value;
    localStorage.setItem('valorEtapa_encuadre7c', JSON.stringify(valorEtapa_encuadre7c));
    habilitarContenido();

    let views = localStorage.getItem("indicesViews");
    let view = JSON.parse(views);
    view[11].vista_guardada = 0;
    console.log(view);
    localStorage.setItem('indicesViews', JSON.stringify(view));
    let CursoId = localStorage.getItem('curso_id');
    let nombreVista = view[11].nombre_vista_actual;
    let url2 = route('actualizar-seguimiento', { nombreVista, CursoId });
    
    fetch(url2)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            
        });
    
});

const habilitarContenido = () => {

    if (habilitarInputs7c === true) {
       console.log('Estan habilitados los Inputs');
    } else {
        var inputEtapa = document.getElementById('etapa_encuadre');
        inputEtapa.value = valorEtapa_encuadre7c;
        inputEtapa.readOnly = true;
    }

}

const habilitarPreguntas = () => {
    document.getElementById("cantidadReglas").addEventListener("input", () => {
    let content = "";
    const cantidadReglas = event.target.value;
    for (let i = 0; i < cantidadReglas; i++) {
        content += `
        <div class="mb-3">
        <div class="name">Describir la regla </div>
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
    let nombreVista = view[11].nombre_vista_actual;
    let url = route('seguimiento7c', { nombreVista, CursoId });
    
    fetch(url)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data.alcanzado) {
                // Incrementa vista_indice si alcanzado es true
                view[11].vista_guardada = 1;
                console.log(view);
                localStorage.setItem('indicesViews', JSON.stringify(view));
                vista_indice++;
                localStorage.setItem('vista_indice', JSON.stringify(vista_indice));
                localStorage.removeItem('copiaGetDataInicio7c');
                localStorage.removeItem('valorEtapa_encuadre7c');
                localStorage.removeItem('habilitarInputs7c');
                window.location.href = route('seccion7d-create'); // Redirige a otra página
            }
        });
}
