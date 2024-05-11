let vista_indice =parseInt(localStorage.getItem('vista_indice'));

if (localStorage.getItem('indicesViews')) {
    let views = localStorage.getItem("indicesViews");
    let view = JSON.parse(views);

    // Busca la sección correcta usando vista_indice
    let seccion_actual = view[17];

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

let getDataObjetivos = localStorage.getItem("dataObjetivos");
//Creamos una array con las opciones a elegir
let arrayDataInicio8e = [
    { id: 1, descripcion: 'a)	Mencionará el objetivo de la técnica:' },
    { id: 2, descripcion: 'b)	Presentará la actividad a desarrollar: ' },
    { id: 3, descripcion: 'c)	Mencionará el tema/planteamiento/reto a discutir: ' },
    { id: 4, descripcion: 'd)	Indicará las instrucciones de la actividad:' },
    { id: 5, descripcion: 'e)	Indicará el tiempo que se asignó a la actividad: ' },
    { id: 6, descripcion: 'f)	Dividirá al grupo en subgrupos' },
    { id: 7, descripcion: 'g)	Establecerá reglas de operación con la participación del grupo. ' },
    { id: 8, descripcion: 'h)	Abrirá la discusión recordando el tema a ser discutido' },
    { id: 9, descripcion: 'i)	Propiciará la discusión de los equipos' },
    { id: 10, descripcion: 'j)	Moderará la discusión' },
    { id: 11, descripcion: 'k)	Utilizará ejemplos relacionados con los temas y las situaciones cotidianas ' },
    { id: 12, descripcion: 'l)	Desarrollará junto con el grupo las conclusiones acerca del tema discutido y su utilidad:' }
];

consultarAvances();

// Conviértela en un array de objetos JavaScript
let arrayDataObjetivos = JSON.parse(getDataObjetivos);
let copiaGetDataInicio8e;
let habilitarInputs8e;
let valorEtapa_encuadre8e;
let duracion8e;
let tecnicas8e;
let valorMaterial_equipo_apoyo8e;
let cantidad;

let copiaGetDataObjetivos = [...arrayDataObjetivos];
if (localStorage.getItem('copiaGetDataInicio8e')) {
    copiaGetDataInicio8e = JSON.parse(localStorage.getItem('copiaGetDataInicio8e'));
  }else{
    copiaGetDataInicio8e = [...arrayDataInicio8e];
    localStorage.setItem('copiaGetDataInicio8e', JSON.stringify(copiaGetDataInicio8e));
  }

  if (localStorage.getItem('habilitarInputs8e')) {
    habilitarInputs8e = JSON.parse(localStorage.getItem('habilitarInputs8e'));
    valorEtapa_encuadre8e = JSON.parse(localStorage.getItem('valorEtapa_encuadre8e')); 
    valorMaterial_equipo_apoyo8e = JSON.parse(localStorage.getItem('valorMaterial_equipo_apoyo8e'));
    duracion8e = JSON.parse(localStorage.getItem('duracion8e'));
    tecnicas8e = JSON.parse(localStorage.getItem('tecnicas8e'));
  }else{
    habilitarInputs8e = true;
    valorEtapa_encuadre8e='';
    valorMaterial_equipo_apoyo8e='';
    duracion8e='';
    tecnicas8e='';
  }


// Acceder a la propiedad 'cursos_id'
let cursos_id = 0;
let seccion_encuadre = 5;

console.log(cursos_id); // Imprime el valor de 'cursos_id'


console.log(arrayDataObjetivos);
let selectRequerimiento = document.getElementById("selectRequerimiento");
let indice = 0;
let requerimientos_id = document.getElementById("requerimientos_id");


// Ve si esta habilitado el beneficiario
let BeneficiarioHabilitado = document.getElementById("myForm");
BeneficiarioHabilitado.style.display = "none";

// Ahora puedes acceder y manipular los datos
copiaGetDataInicio8e.map((requerimiento) => {
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
    indice = copiaGetDataInicio8e.find(
        (objeto) => objeto.id === valorSeleccionado
    );
    let content = "";
    if(valorSeleccionado === 1){
        content += `
        <div class="mb-3">
        <div class="name">Copiar objetivo particular afectivo/relacional social</div>
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
        <div class="name">Redactar beneficio/propósito</div>
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
        <div class="name">Redactar la actividad a desarrollar:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        <div class="name">Subtemas a desarrollar:</div>
        <div id="divSubtemas">
        </div>
        `;
    
    document.getElementById("divRequerimientos").innerHTML = content;
    consultarSubtemas();
    habilitarContenido();
    }
    if( valorSeleccionado === 4){
        content += `
        
        <div class="mb-3">
        <div class="name">Redactar la actividad a desarrollar:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Redactar las instrucciones:</div>
        </div>
        <label for="">Cantidad de Instrucciones</label>
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
        <div class="name">Indicar cuanto tiempo dura esta actividad:</div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required placeholder="Ejemplo: 15 minutos">
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
        <div class="name">Redactar la actividad</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required placeholder="Ejemplo: El instructor creara dos grupos entre los participantes."></textarea>
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
        <div class="name">Redactar la actividad:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required placeholder="Ejemplo: El instructor recordara las reglas estipuladas"></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Redactar algunas de las reglas que vas a estipular:</div>
        </div>
        <label for="">Cantidad de Reglas</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas" required>
        <br>
        <div id="divReglas">
        </div>
        `;
    
    document.getElementById("divRequerimientos").innerHTML = content;
    habilitarPreguntas();
    habilitarContenido();
    }
    if( valorSeleccionado === 8){
        content += `
        <div class="mb-3">
        <div class="name">Redactar introducción a la actividad</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required"></textarea>
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
    if( valorSeleccionado === 9){
        content += `
        <div class="mb-3">
        <div class="name">Redactar la actividad</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required placeholder="Ejemplo: El instructor brindara las condiciones que propicien el dialogo y la discusión entre los participantes"></textarea>
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
    if( valorSeleccionado === 10){
        content += `
        <div class="mb-3">
        <div class="name">Redactar la actividad</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required placeholder="Ejemplo: El instructor recordará las normas a fin de que la discusión se realice en un ambiente de respeto"></textarea>
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
        <div class="name">Redactar la actividad:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required placeholder="Ejemplo: El instructor ejemplificara las situaciones cotidianas"></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Redactar aquí 2 ejemplos relacionados con las situaciones cotidianas:</div>
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
    if( valorSeleccionado === 12){
        content += `
        <div class="mb-3">
        <div class="name">Redactar una breve conclusión del tema</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required"></textarea>
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


const habilitarContenido = () => {

    if (habilitarInputs8e === true) {
       console.log('Estan habilitados los Inputs');
    } else {
        var inputEtapa = document.getElementById('etapa_encuadre');
        var inputMaterialEquipo = document.getElementById('material_equipo_apoyo');
        var inputDuracion = document.getElementById('duracion');
        var inputTecnicas = document.getElementById('tecnicas');
        inputEtapa.value = valorEtapa_encuadre8e;
        inputMaterialEquipo.value = valorMaterial_equipo_apoyo8e;
        inputDuracion.value = duracion8e;
        inputTecnicas.value = tecnicas8e;
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

document.getElementById("myForm").addEventListener("submit", (event) => {
    event.preventDefault();
    const url = route("seccion8e-store");
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
            copiaGetDataInicio8e = copiaGetDataInicio8e.filter(obj => obj.id != indice.id);
            localStorage.setItem('copiaGetDataInicio8e', JSON.stringify(copiaGetDataInicio8e));
            location.reload();
      
            
            console.log('Despues de el for each',copiaGetDataInicio8e); // Imprime el array después de eliminar los elementos
            selectRequerimiento.innerHTML = "";

            let opcionDefecto = document.createElement("option");
            opcionDefecto.text = "Escoja una opción";
            opcionDefecto.value = 0;
            selectRequerimiento.add(opcionDefecto);

            copiaGetDataInicio8e.map((requerimiento) => {
                let opcion = document.createElement("option");
                opcion.text = requerimiento.descripcion;
                opcion.value = requerimiento.id;
                selectRequerimiento.add(opcion);
            });

        });

    habilitarInputs8e=false;
    localStorage.setItem('habilitarInputs8e', JSON.stringify(habilitarInputs8e));

    valorEtapa_encuadre8e = document.getElementById("etapa_encuadre").value;
    localStorage.setItem('valorEtapa_encuadre8e', JSON.stringify(valorEtapa_encuadre8e));

    valorMaterial_equipo_apoyo8e = document.getElementById("material_equipo_apoyo").value;
    localStorage.setItem('valorMaterial_equipo_apoyo8e', JSON.stringify(valorMaterial_equipo_apoyo8e));

    duracion8e = document.getElementById("duracion").value;
    localStorage.setItem('duracion8e', JSON.stringify(duracion8e));

    tecnicas8e = document.getElementById("tecnicas").value;
    localStorage.setItem('tecnicas8e', JSON.stringify(tecnicas8e));
    habilitarContenido();

    let views = localStorage.getItem("indicesViews");
    let view = JSON.parse(views);
    view[17].vista_guardada = 0;
    console.log(view);
    localStorage.setItem('indicesViews', JSON.stringify(view));
    let CursoId = localStorage.getItem('curso_id');
    let nombreVista = view[17].nombre_vista_actual;
    let url2 = route('actualizar-seguimiento', { nombreVista, CursoId });
    
    fetch(url2)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            
        });
});

const consultarSubtemas = () => {
    let CursoId = cursos_id;
    let url = route('seccion8e-getSubtemas', {
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

function consultarAvances() {
    let views = localStorage.getItem("indicesViews");
    let view = JSON.parse(views);

    let CursoId = localStorage.getItem('curso_id');
    let nombreVista = view[17].nombre_vista_actual;
    let url = route('seguimiento8e', { nombreVista, CursoId });
    
    fetch(url)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data.alcanzado) {
                // Incrementa vista_indice si alcanzado es true
                view[17].vista_guardada = 1;
                console.log(view);
                localStorage.setItem('indicesViews', JSON.stringify(view));
                vista_indice++;
                localStorage.setItem('vista_indice', JSON.stringify(vista_indice));
                localStorage.removeItem('copiaGetDataInicio8e');
                localStorage.removeItem('valorEtapa_encuadre8e');
                localStorage.removeItem('valorMaterial_equipo_apoyo8e');
                localStorage.removeItem('duracion8e');
                localStorage.removeItem('tecnicas8e');
                localStorage.removeItem('habilitarInputs8e');
                window.location.href = route('seccion8f-create'); // Redirige a otra página
            }
        });
}