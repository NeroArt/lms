// Obtén la cadena JSON del Local Storage
let getDataObjetivos = localStorage.getItem("dataObjetivos");


//Creamos una array con las opciones a elegir
let arrayDataInicio8c = [
    { id: 1, descripcion: 'a.	Presentará el objetivo del tema:  ' },
    { id: 2, descripcion: 'b.	Realizará una introducción general al contenido temático:' },
    { id: 3, descripcion: 'c.	Recuperará la experiencia previa de los participantes, preguntando sobre sus conocimientos previos del contenido temático:' },
    { id: 4, descripcion: 'd.	Desarrollará el contenido ' },
    { id: 5, descripcion: 'e.	Utilizará ejemplos relacionados con los temas y las situaciones cotidianas' },
    { id: 6, descripcion: 'f.	Resolverá las dudas que se presenten y/o manifiesten los participantes:' },
    { id: 7, descripcion: 'g.	Realizará la síntesis haciendo énfasis en los aspectos sobresalientes, invitando a los participantes a participar:' },
    { id: 8, descripcion: 'h.	Planteará preguntas dirigidas que verifiquen la comprensión del tema ' },
    { id: 9, descripcion: 'i.	Promoverá comentarios sobre la utilidad y aplicación de los temas en su vida profesional y personal:' },
    { id: 10, descripcion: 'j.	Mencionará las referencias bibliográficas que ha utilizado en el desarrollo de su tema.' }
];

// Conviértela en un array de objetos JavaScript
let arrayDataObjetivos = JSON.parse(getDataObjetivos);
let copiaGetDataInicio8a;
let habilitarInputs8a;
let valorEtapa_encuadre8a;
let duracion8a;
let tecnicas8a;
let valorMaterial_equipo_apoyo8a;
let cantidad;

let copiaGetDataObjetivos = [...arrayDataObjetivos];
if (localStorage.getItem('copiaGetDataInicio8a')) {
    copiaGetDataInicio8a = JSON.parse(localStorage.getItem('copiaGetDataInicio8a'));
  }else{
    copiaGetDataInicio8a = [...arrayDataInicio8c];
  }

  if (localStorage.getItem('habilitarInputs8a')) {
    habilitarInputs8a = JSON.parse(localStorage.getItem('habilitarInputs8a'));
    valorEtapa_encuadre8a = JSON.parse(localStorage.getItem('valorEtapa_encuadre8a')); 
    valorMaterial_equipo_apoyo8a = JSON.parse(localStorage.getItem('valorMaterial_equipo_apoyo8a'));
    duracion8a = JSON.parse(localStorage.getItem('duracion8a'));
    tecnicas8a = JSON.parse(localStorage.getItem('tecnicas8a'));
  }else{
    habilitarInputs8a = true;
    valorEtapa_encuadre8a='';
    valorMaterial_equipo_apoyo8a='';
    duracion8a='';
    tecnicas8a='';
  }


// Acceder a la propiedad 'cursos_id'
let cursos_id = 0;
let seccion_encuadre = 1;

console.log(cursos_id); // Imprime el valor de 'cursos_id'


console.log(arrayDataObjetivos);
let selectRequerimiento = document.getElementById("selectRequerimiento");
let indice = 0;
let requerimientos_id = document.getElementById("requerimientos_id");


// Ve si esta habilitado el beneficiario
let BeneficiarioHabilitado = document.getElementById("myForm");
BeneficiarioHabilitado.style.display = "none";

// Ahora puedes acceder y manipular los datos
copiaGetDataInicio8a.map((requerimiento) => {
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
    indice = copiaGetDataInicio8a.find(
        (objeto) => objeto.id === valorSeleccionado
    );
    let content = "";
    if(valorSeleccionado === 1){
        content += `
        <div class="mb-3">
        <div class="name">Escribir el objetivo particular cognitivo:</div>
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
        <div class="name">Redactar la introducción de los temas a tratar, de 8 a 10 renglones.</div>
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
    if( valorSeleccionado === 3){
        content += `
        <div class="mb-3">
        <div class="name">Redactar aquí al menos 3 preguntas para recuperar la experiencia:</div>
        </div>
        <label for="">Cantidad de Preguntas</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas">
        <br>
        <div id="divReglas">
        </div>
        `;
    
    document.getElementById("divRequerimientos").innerHTML = content;
    habilitarPreguntas();
    habilitarContenido();
    }
    if( valorSeleccionado === 4){
        content += `
        <div class="mb-3">
        <div class="name">Subtemas:</div>
        <div id="divSubtemas">
        </div>
        `;
    
    document.getElementById("divRequerimientos").innerHTML = content;
    consultarSubtemas();
    habilitarContenido();
    }
    if( valorSeleccionado === 5){
        content += `
        <div class="mb-3">
        <div class="name">Redactar aquí 3 ejemplos relacionados con las situaciones cotidianas:</div>

        <label for="">Cantidad de ejemplos</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas">
        <br>
        <div id="divReglas">
        </div>
        `;
    
    document.getElementById("divRequerimientos").innerHTML = content;
    habilitarPreguntas();
    habilitarContenido();
    }
    if( valorSeleccionado === 6){
        content += `
        <div class="mb-3">
        <div class="name">Redactar actividad:</div>
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
    if( valorSeleccionado === 7){
        content += `
        <div class="mb-3">
        <div class="name">Redactar la síntesis aquí:</div>
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
    if( valorSeleccionado === 8){
        content += `
        <div class="mb-3">
        <div class="name">Redactar por lo menos 3 preguntas:</div>

        <label for="">Cantidad de preguntas</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas">
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
        <div class="name">Redactar por lo menos 2 preguntas:</div>

        <label for="">Cantidad de preguntas</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas">
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
        <div class="name">Redactar las referencias:</div>

        <label for="">Cantidad de referencias bibliográficas</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas">
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
    const url = route("seccion8a-store");
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
            copiaGetDataInicio8a = copiaGetDataInicio8a.filter(obj => obj.id != indice.id);
            localStorage.setItem('copiaGetDataInicio8a', JSON.stringify(copiaGetDataInicio8a));
            location.reload();
         
            
            console.log('Despues de el for each',copiaGetDataInicio8a); // Imprime el array después de eliminar los elementos
            selectRequerimiento.innerHTML = "";

            let opcionDefecto = document.createElement("option");
            opcionDefecto.text = "Escoja una opción";
            opcionDefecto.value = 0;
            selectRequerimiento.add(opcionDefecto);

            copiaGetDataInicio8a.map((requerimiento) => {
                let opcion = document.createElement("option");
                opcion.text = requerimiento.descripcion;
                opcion.value = requerimiento.id;
                selectRequerimiento.add(opcion);
            });

        });

    habilitarInputs8a=false;
    localStorage.setItem('habilitarInputs8a', JSON.stringify(habilitarInputs8a));
    valorEtapa_encuadre8a = document.getElementById("etapa_encuadre").value;
    localStorage.setItem('valorEtapa_encuadre8a', JSON.stringify(valorEtapa_encuadre8a));
    valorMaterial_equipo_apoyo8a = document.getElementById("material_equipo_apoyo").value;
    localStorage.setItem('valorMaterial_equipo_apoyo8a', JSON.stringify(valorMaterial_equipo_apoyo8a));
    duracion8a = document.getElementById("duracion").value;
    localStorage.setItem('duracion8a', JSON.stringify(duracion8a));
    tecnicas8a = document.getElementById("tecnicas").value;
    localStorage.setItem('tecnicas8a', JSON.stringify(tecnicas8a));
    habilitarContenido();
    
});

const consultarSubtemas = () => {
    let CursoId = cursos_id;
    let url = route('seccion8a-getSubtemas', {
         CursoId
        });
    let i = 0; // Variable para incrementar el id de los inputs
    fetch(url)
        .then((response) => response.json())
        .then((data) => {
            console.log(data);
            let divContenedor = document.getElementById('divSubtemas');
                data.data.map((objetivo) => {
                    let divRow = document.createElement("div");
                    divRow.className = "row"; // Esto añade la clase 'row' al div
                
                    let label = document.createElement("label");
                    label.textContent = "Subtema: " + objetivo;
                    label.style.fontWeight = 'bold'; // Esto hace que el texto sea en negrita

                    let input = document.createElement("input"); // Crea un elemento input
                    input.className = "form-control"; // Define la clase del input
                    input.type = "text"; // Define el tipo de input
                    input.id = "actividad[" + i + "]"; // Define el id del input
                    input.placeholder = "Describe el subtema aquí"; // Define el placeholder del input
                
                    divRow.appendChild(label); // Añade el label al div
                    divRow.appendChild(input); // Añade el input al div
                    divContenedor.appendChild(divRow); // Añade el div al contenedor

                    i++; // Incrementa el id para el próximo input
                    cantidad = i;
                });                
        });
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
                <textarea id="actividad[${i}]" class="form-control" type="text" name="actividad[${i}]" autocomplete="actividad"></textarea>
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

const habilitarContenido = () => {

    if (habilitarInputs8a === true) {
       console.log('Estan habilitados los Inputs');
    } else {
        var inputEtapa = document.getElementById('etapa_encuadre');
        var inputMaterialEquipo = document.getElementById('material_equipo_apoyo');
        var inputDuracion = document.getElementById('duracion');
        var inputTecnicas = document.getElementById('tecnicas');
        inputEtapa.value = valorEtapa_encuadre8a;
        inputMaterialEquipo.value = valorMaterial_equipo_apoyo8a;
        inputDuracion.value = duracion8a;
        inputTecnicas.value = tecnicas8a;
        inputEtapa.readOnly = true;
        inputMaterialEquipo.readOnly = true;
        inputDuracion.readOnly = true;
        inputTecnicas.readOnly = true;
    }

}