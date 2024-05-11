let vista_indice =parseInt(localStorage.getItem('vista_indice'));

if (localStorage.getItem('indicesViews')) {
    let views = localStorage.getItem("indicesViews");
    let view = JSON.parse(views);

    // Busca la sección correcta usando vista_indice
    let seccion_actual = view[15];

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
let arrayDataInicio8c = [
    { id: 1, descripcion: 'a)	Indicará alcance/propósito/finalidad de la evaluación: ' },
    { id: 2, descripcion: 'b)	Indicará las instrucciones de la evaluación: ' },
    { id: 3, descripcion: 'c)	Indicará el tiempo para realizar la evaluación: ' }
];



// Conviértela en un array de objetos JavaScript
let arrayDataObjetivos = JSON.parse(getDataObjetivos);
let copiaGetDataInicio8c;
let habilitarInputs8c;
let valorEtapa_encuadre8c;
let duracion8c;
let tecnicas8c;
let valorMaterial_equipo_apoyo8c;
let cantidad;
consultarAvances();

let copiaGetDataObjetivos = [...arrayDataObjetivos];
if (localStorage.getItem('copiaGetDataInicio8c')) {
    copiaGetDataInicio8c = JSON.parse(localStorage.getItem('copiaGetDataInicio8c'));
  }else{
    copiaGetDataInicio8c = [...arrayDataInicio8c];
    localStorage.setItem('copiaGetDataInicio8c', JSON.stringify(copiaGetDataInicio8c));
  }

  if (localStorage.getItem('habilitarInputs8c')) {
    habilitarInputs8c = JSON.parse(localStorage.getItem('habilitarInputs8c'));
    valorEtapa_encuadre8c = JSON.parse(localStorage.getItem('valorEtapa_encuadre8c')); 
    valorMaterial_equipo_apoyo8c = JSON.parse(localStorage.getItem('valorMaterial_equipo_apoyo8c'));
    duracion8c = JSON.parse(localStorage.getItem('duracion8c'));
    tecnicas8c = JSON.parse(localStorage.getItem('tecnicas8c'));
  }else{
    habilitarInputs8c = true;
    valorEtapa_encuadre8c='';
    valorMaterial_equipo_apoyo8c='';
    duracion8c='';
    tecnicas8c='';
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
copiaGetDataInicio8c.map((requerimiento) => {
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
    indice = copiaGetDataInicio8c.find(
        (objeto) => objeto.id === valorSeleccionado
    );
    let content = "";
    if(valorSeleccionado === 1){
        content += `
        <div class="mb-3">
        <div class="name">Redactar el objetivo de esta evaluación:</div>
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
        <div class="name">Redactar para que sirve esta evaluación:</div>
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
        <div class="name">Indicar cuanto tiempo dura esta evaluación:</div>
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
   
    requerimientos_id.value = indice.id;
    let selectedOption = this.options[this.selectedIndex];
    requerimientos_id.text = selectedOption.text;
    console.log("El objeto seleccionado es: ", indice);
};

document.getElementById("myForm").addEventListener("submit", (event) => {
    event.preventDefault();
    const url = route("seccion8c-store");
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
            copiaGetDataInicio8c = copiaGetDataInicio8c.filter(obj => obj.id != indice.id);
            localStorage.setItem('copiaGetDataInicio8c', JSON.stringify(copiaGetDataInicio8c));
            location.reload();
      
            
            console.log('Despues de el for each',copiaGetDataInicio8c); // Imprime el array después de eliminar los elementos
            selectRequerimiento.innerHTML = "";

            let opcionDefecto = document.createElement("option");
            opcionDefecto.text = "Escoja una opción";
            opcionDefecto.value = 0;
            selectRequerimiento.add(opcionDefecto);

            copiaGetDataInicio8c.map((requerimiento) => {
                let opcion = document.createElement("option");
                opcion.text = requerimiento.descripcion;
                opcion.value = requerimiento.id;
                selectRequerimiento.add(opcion);
            });

        });

    habilitarInputs8c=false;
    localStorage.setItem('habilitarInputs8c', JSON.stringify(habilitarInputs8c));
    valorEtapa_encuadre8c = document.getElementById("etapa_encuadre").value;
    localStorage.setItem('valorEtapa_encuadre8c', JSON.stringify(valorEtapa_encuadre8c));
    valorMaterial_equipo_apoyo8c = document.getElementById("material_equipo_apoyo").value;
    localStorage.setItem('valorMaterial_equipo_apoyo8c', JSON.stringify(valorMaterial_equipo_apoyo8c));
    duracion8c = document.getElementById("duracion").value;
    localStorage.setItem('duracion8c', JSON.stringify(duracion8c));
    tecnicas8c = document.getElementById("tecnicas").value;
    localStorage.setItem('tecnicas8c', JSON.stringify(tecnicas8c));
    habilitarContenido();

    let views = localStorage.getItem("indicesViews");
    let view = JSON.parse(views);
    view[15].vista_guardada = 0;
    console.log(view);
    localStorage.setItem('indicesViews', JSON.stringify(view));
    let CursoId = localStorage.getItem('curso_id');
    let nombreVista = view[15].nombre_vista_actual;
    let url2 = route('actualizar-seguimiento', { nombreVista, CursoId });
    
    fetch(url2)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            
        });
    
});

const habilitarContenido = () => {

    if (habilitarInputs8c === true) {
       console.log('Estan habilitados los Inputs');
    } else {
        var inputEtapa = document.getElementById('etapa_encuadre');
        var inputMaterialEquipo = document.getElementById('material_equipo_apoyo');
        var inputDuracion = document.getElementById('duracion');
        var inputTecnicas = document.getElementById('tecnicas');
        inputEtapa.value = valorEtapa_encuadre8c;
        inputMaterialEquipo.value = valorMaterial_equipo_apoyo8c;
        inputDuracion.value = duracion8c;
        inputTecnicas.value = tecnicas8c;
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
    let nombreVista = view[15].nombre_vista_actual;
    let url = route('seguimiento8c', { nombreVista, CursoId });
    
    fetch(url)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data.alcanzado) {
                // Incrementa vista_indice si alcanzado es true
                view[15].vista_guardada = 1;
                console.log(view);
                localStorage.setItem('indicesViews', JSON.stringify(view));
                vista_indice++;
                localStorage.setItem('vista_indice', JSON.stringify(vista_indice));
                localStorage.removeItem('copiaGetDataInicio8c');
                localStorage.removeItem('valorEtapa_encuadre8c');
                localStorage.removeItem('valorMaterial_equipo_apoyo8c');
                localStorage.removeItem('duracion8c');
                localStorage.removeItem('tecnicas8c');
                localStorage.removeItem('habilitarInputs8c');
                window.location.href = route('seccion8d-create'); // Redirige a otra página
            }
        });
}