let vista_indice =parseInt(localStorage.getItem('vista_indice'));

if (localStorage.getItem('indicesViews')) {
    let views = localStorage.getItem("indicesViews");
    let view = JSON.parse(views);

    // Busca la sección correcta usando vista_indice
    let seccion_actual = view[10];

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
let arrayDataInicio = [
    { id: 1, descripcion: '1.	El instructor presentará los objetivos del curso/sesión' },
    { id: 2, descripcion: '2.	El instructor presentará la descripción general del desarrollo del curso/sesión' },
    { id: 3, descripcion: '3.	El instructor dará a conocer el temario del curso' },
    { id: 4, descripcion: '4.	El instructor creará minimo tres preguntas, relacionadas con el contexto/experiencia/capacitados' },
    { id: 5, descripcion: '5.	El instructor explicará los beneficios del curso y su relación con la experiencia laboral y personal.' },
    { id: 6, descripcion: '6.	El instructor especificará el tipo de evaluaciones a realizar, los instrumentos a utilizar, el momento de aplicarlos y los criterios a utilizar.' }
];



// Conviértela en un array de objetos JavaScript
let arrayDataObjetivos = JSON.parse(getDataObjetivos);
let copiaGetDataInicio;
let habilitarInputs;
let valorEtapa_encuadre;
let valorMaterial_equipo_apoyo;
let cantidad;

let copiaGetDataObjetivos = [...arrayDataObjetivos];
if (localStorage.getItem('copiaGetDataInicio')) {
    copiaGetDataInicio = JSON.parse(localStorage.getItem('copiaGetDataInicio'));
  }else{
    copiaGetDataInicio = [...arrayDataInicio];
  }

  if (localStorage.getItem('habilitarInputs')) {
    habilitarInputs = JSON.parse(localStorage.getItem('habilitarInputs'));
    valorEtapa_encuadre = JSON.parse(localStorage.getItem('valorEtapa_encuadre'));
    valorMaterial_equipo_apoyo = JSON.parse(localStorage.getItem('valorMaterial_equipo_apoyo'));
  }else{
    habilitarInputs = true;
    valorEtapa_encuadre='';
    valorMaterial_equipo_apoyo='';
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
copiaGetDataInicio.map((requerimiento) => {
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


/*Obtenemos el valor seleccionado a traves del evento onchange, donde el evento se dispara cuando cambia el valor del select*/
selectRequerimiento.onchange = function () {
    let valorSeleccionado = Number(this.value);
    
    if (valorSeleccionado !== 0) {
        BeneficiarioHabilitado.style.display = "block";
    } else {
        BeneficiarioHabilitado.style.display = "none";
    }
    indice = copiaGetDataInicio.find(
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
        <label for="exampleInputName" class="form-label">Objetivo General:</label>
        <div id="divObjetivoGeneral">
        </div>
        <br>
        <label for="exampleInputName" class="form-label">Objetivos Particulares:</label>
        <div id="divObjetivosParticulares">
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
        `;

    document.getElementById("divRequerimientos").innerHTML = content;
    consultarObjetivoGeneral();
    consultarObjetivosParticulares();
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
        <div class="name">Material y Equipo de Apoyo:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="material_equipo_apoyo" class="form-control" type="text" name="material_equipo_apoyo" autocomplete="material_equipo_apoyo" required></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                    <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        
        <div class="mb-3">
        <div class="name">Descripcion del Curso:</div>
        <div id="divDescripcionCurso"></div>
        
        <div class="mb-3">
        <div class="name">Duración (Indicar los minutos de duración): </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="duracion" class="form-control" type="number" name="duracion" autocomplete="duracion">
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Técnicas: </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="tecnicas" class="form-control" type="text" name="tecnicas" autocomplete="tecnicas" required>
            </div>
        </div>
        `;
    
    document.getElementById("divRequerimientos").innerHTML = content;
    habilitarContenido();
    consultarDescripcionCurso();
  
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
        <label for="exampleInputName" class="form-label">Temario del Curso:</label>
        <div id="divTemario">
        </div>
        <br>
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
        `;
    
    document.getElementById("divRequerimientos").innerHTML = content;
    habilitarContenido();
    consultarTemario();

    }
    if( valorSeleccionado === 4){
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
        <input type="number" name="cantidadPreguntas" name="cantidadPreguntas" id="cantidadPreguntas" required>
        <br>
        <label for="exampleInputName" class="form-label">Preguntas:</label>
        <div id="divPreguntas">
        </div>
        <br>
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
        `;
    
    document.getElementById("divRequerimientos").innerHTML = content;
    habilitarPreguntas();
    habilitarContenido();
    }
    if( valorSeleccionado === 5){
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
        <label for="exampleInputName" class="form-label">Beneficios del Curso:</label>
        <div id="divBeneficios">
        </div>
        <br>
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
        `;
    
    document.getElementById("divRequerimientos").innerHTML = content;
    habilitarContenido();
    consultarBeneficios();
    }
    if( valorSeleccionado === 6){
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
        <div class="name">Material y Equipo de Apoyo:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="material_equipo_apoyo" class="form-control" type="text" name="material_equipo_apoyo" autocomplete="material_equipo_apoyo" required></textarea>
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
        <br>
        <label for="exampleInputName" class="form-label">Evaluaciones del Curso:</label>
        <div id="divEvaluaciones">
        </div>
        <br>
        <div class="mb-3">
        <div class="name">Redactar Instrumento de evaluación Inicial, porcentaje y describir Finalidad/beneficio/ventaja: </div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="evaluacion[0]" class="form-control" type="text" name="evaluacion[0]" autocomplete="evaluacion" required> </textarea>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Redactar Instrumento de evaluación Intermedio, porcentaje y describir Finalidad/beneficio/ventaja: </div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="evaluacion[1]" class="form-control" type="text" name="evaluacion[1]" autocomplete="evaluacion" required></textarea>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Redactar Instrumento de evaluación Cierre, porcentaje y describir Finalidad/beneficio/ventaja: </div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="evaluacion[2]" class="form-control" type="text" name="evaluacion[2]" autocomplete="evaluacion" required></textarea>
            </div>
        </div>

        `;
    
    document.getElementById("divRequerimientos").innerHTML = content;
    habilitarContenido();
    consultarEvaluaciones();
    }
    requerimientos_id.value = indice.id;
    let selectedOption = this.options[this.selectedIndex];
    requerimientos_id.text = selectedOption.text;
    console.log("El objeto seleccionado es: ", indice);
    
    
        

};


document.getElementById("myForm").addEventListener("submit", (event) => {
    event.preventDefault();
    const url = route("seccion7b-store");
    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData.entries());
  
    data.descripcion = requerimientos_id.value;
    data.momento_aplicacion = requerimientos_id.text;
    data.seccion_encuadre = seccion_encuadre;
    data.cursos_id = cursos_id;
    data.indice=indice.id;
    let porcentaje = data.porcentaje;
    parseInt(porcentaje);
    let cantidadEvaluaciones = 0;
    if(document.getElementById("divEvaluaciones")){
        cantidadEvaluaciones = 3;
    }
    data.evaluaciones = [];
    for (let i = 0; i < cantidadEvaluaciones; i++) {
        const constanterequerimiento = {};
        constanterequerimiento.evaluacion = document.getElementById(`evaluacion[${i}]`).value;
        data.evaluaciones.push(constanterequerimiento);
    }


    if(document.getElementById("cantidadPreguntas")){
        cantidad = document.getElementById("cantidadPreguntas").value;
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
            copiaGetDataInicio = copiaGetDataInicio.filter(obj => obj.id != indice.id);
            localStorage.setItem('copiaGetDataInicio', JSON.stringify(copiaGetDataInicio));
            location.reload();
         
            
            console.log('Despues de el for each',copiaGetDataRequerimientos); // Imprime el array después de eliminar los elementos
            selectRequerimiento.innerHTML = "";

            let opcionDefecto = document.createElement("option");
            opcionDefecto.text = "Escoja una opción";
            opcionDefecto.value = 0;
            selectRequerimiento.add(opcionDefecto);

            copiaGetDataInicio.map((requerimiento) => {
                let opcion = document.createElement("option");
                opcion.text = requerimiento.descripcion;
                opcion.value = requerimiento.id;
                selectRequerimiento.add(opcion);
            });

        });

    habilitarInputs=false;
    localStorage.setItem('habilitarInputs', JSON.stringify(habilitarInputs));
    valorEtapa_encuadre = document.getElementById("etapa_encuadre").value;
    localStorage.setItem('valorEtapa_encuadre', JSON.stringify(valorEtapa_encuadre));
    valorMaterial_equipo_apoyo = document.getElementById("material_equipo_apoyo").value;
    localStorage.setItem('valorMaterial_equipo_apoyo', JSON.stringify(valorMaterial_equipo_apoyo));
    habilitarContenido();
    
});

const consultarObjetivoGeneral = () => {
    let CursoId = cursos_id;
    let url = route('seccion7b-getGeneral', {
         CursoId
        });

    fetch(url)
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            let divContenedor = document.getElementById('divObjetivoGeneral');
                data.data.map((objetivo) => {
                    let divRow = document.createElement("div");
                    divRow.className = "row"; // Esto añade la clase 'row' al div
                
                    let label = document.createElement("label");
                    label.textContent = "Objetivo: " + objetivo.descripcion;
                    label.style.fontWeight = 'bold'; // Esto hace que el texto sea en negrita
                
                    divRow.appendChild(label); // Añade el label al div
                    divContenedor.appendChild(divRow); // Añade el div al contenedor
                });                
        });

}

const consultarObjetivosParticulares = () => {
    let CursoId = cursos_id;
    let url = route('seccion7b-getParticulares', {
         CursoId
        });

    fetch(url)
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            let divContenedor = document.getElementById('divObjetivosParticulares');
                data.data.map((objetivo) => {
                    let divRow = document.createElement("div");
                    divRow.className = "row"; // Esto añade la clase 'row' al div
                
                    let label = document.createElement("label");
                    label.textContent = "Objetivo: " + objetivo.descripcion;
                    label.style.fontWeight = 'bold'; // Esto hace que el texto sea en negrita
                
                    divRow.appendChild(label); // Añade el label al div
                    divContenedor.appendChild(divRow); // Añade el div al contenedor
                });                
        });

}




const consultarTemario = () => {
    let CursoId = cursos_id;
    let url = route('seccion7b-getTemario', {
         CursoId
        });

    fetch(url)
        .then((response) => response.json())
        .then((data) => {
            console.log("Temario es:", data);
            let divContenedor = document.getElementById('divTemario');
                data.data.map((objetivo) => {
                    let divRow = document.createElement("div");
                    divRow.className = "row"; // Esto añade la clase 'row' al div
                
                    let label = document.createElement("label");
                    label.textContent = objetivo;
                    label.style.fontWeight = 'bold'; // Esto hace que el texto sea en negrita
                
                    divRow.appendChild(label); // Añade el label al div
                    divContenedor.appendChild(divRow); // Añade el div al contenedor
                });                
        });

}

const consultarBeneficios = () => {
    let CursoId = cursos_id;
    let url = route('seccion7b-getBeneficios', {
         CursoId
        });

    fetch(url)
        .then((response) => response.json())
        .then((data) => {
            console.log("Beneficio es:", data);
            let divContenedor = document.getElementById('divBeneficios');
                data.data.map((objetivo) => {
                    let divRow = document.createElement("div");
                    divRow.className = "row"; // Esto añade la clase 'row' al div
                
                    let label = document.createElement("label");
                    label.textContent = objetivo;
                    label.style.fontWeight = 'bold'; // Esto hace que el texto sea en negrita
                
                    divRow.appendChild(label); // Añade el label al div
                    divContenedor.appendChild(divRow); // Añade el div al contenedor
                });                
        });

}

const consultarEvaluaciones = () => {
    let CursoId = cursos_id;
    let url = route('seccion7b-getEvaluaciones', {
         CursoId
        });

    fetch(url)
        .then((response) => response.json())
        .then((data) => {
            console.log("Evaluacion es:", data);
            let divContenedor = document.getElementById('divEvaluaciones');
            data.data.map((objetivo) => {
                let divRow = document.createElement("div");
                divRow.className = "row"; // Esto añade la clase 'row' al div
            
                let divMomento = document.createElement("div");
                divMomento.className = "col";
                let labelMomento = document.createElement("label");
                labelMomento.innerHTML = "<b>Momento de aplicación:</b> "+objetivo.momento_aplicacion;
                divMomento.appendChild(labelMomento);
                divRow.appendChild(divMomento);
            
                let divAspecto = document.createElement("div");
                divAspecto.className = "col";
                let labelAspecto = document.createElement("label");
                labelAspecto.innerHTML = "<b>Aspecto a evaluar:</b> " + objetivo.aspecto;
                divAspecto.appendChild(labelAspecto);
                divRow.appendChild(divAspecto);

                let divInstrumento = document.createElement("div");
                divInstrumento.className = "col";
                let labelInstrumento = document.createElement("label");
                labelInstrumento.innerHTML = "<b>Instrumento de evaluación:</b> "+objetivo.instrumento_evaluacion;
                divInstrumento.appendChild(labelInstrumento);
                divRow.appendChild(divInstrumento);
            
                let divPorcentaje = document.createElement("div");
                divPorcentaje.className = "col";
                let labelPorcentaje = document.createElement("label");
                labelPorcentaje.innerHTML = "<b>Porcentaje de ponderación:</b> "+objetivo.porcentaje+"%";
                divPorcentaje.appendChild(labelPorcentaje);
                divRow.appendChild(divPorcentaje);
            
                divContenedor.appendChild(divRow); // Añade el div al contenedor
            });
            
        });

}


const consultarDescripcionCurso = () => {
    let CursoId = cursos_id;
    let url = route('seccion7b-getDescripcionCurso', {
         CursoId
        });

    fetch(url)
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            let divContenedor = document.getElementById('divDescripcionCurso');
                data.data.map((objetivo) => {
                    let divRow = document.createElement("div");
                    divRow.className = "row"; // Esto añade la clase 'row' al div
                
                    let label = document.createElement("label");
                    label.textContent = "Descripcion: " + objetivo.descripcion_curso;
                    label.style.fontWeight = 'bold'; // Esto hace que el texto sea en negrita
                
                    divRow.appendChild(label); // Añade el label al div
                    divContenedor.appendChild(divRow); // Añade el div al contenedor
                });                
        });

}

const habilitarContenido = () => {

    if (habilitarInputs === true) {
       console.log('Estan habilitados los Inputs');
    } else {
        var inputEtapa = document.getElementById('etapa_encuadre');
        var inputMaterialEquipo = document.getElementById('material_equipo_apoyo');
        inputEtapa.value = valorEtapa_encuadre;
        inputMaterialEquipo.value = valorMaterial_equipo_apoyo;
        inputEtapa.readOnly = true;
        inputMaterialEquipo.readOnly = true;
    }

}

const habilitarPreguntas = () => {
    document.getElementById("cantidadPreguntas").addEventListener("input", () => {
    let content = "";
    const cantidadPreguntas = event.target.value;
    for (let i = 0; i < cantidadPreguntas; i++) {
        content += `
        <div class="mb-3">
        <div class="name">Pregunta </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="actividad[${i}]" class="form-control" type="text" name="actividad[${i}]" autocomplete="actividad" required>
                <span class="focus-input100 "></span>
        <span class="symbol-input100">
            <i class="fa fa-envelope"></i>
        </span>
            </div>
        </div>
        `;
    }
    document.getElementById("divPreguntas").innerHTML = content;
});

}




