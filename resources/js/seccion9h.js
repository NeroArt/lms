// Obtén la cadena JSON del Local Storage
let getDataObjetivos = localStorage.getItem("dataObjetivos");


//Creamos una array con las opciones a elegir
let arrayDataInicio9h = [
    { id: 1, descripcion: 'a.	Indicará alcances e instrucciones de la evaluación:  ' },
    { id: 2, descripcion: 'b.	Indicará el tiempo para realizar la evaluación: ' },
    { id: 3, descripcion: 'c.	Aclarará las dudas que se presenten' }
];

// Conviértela en un array de objetos JavaScript
let arrayDataObjetivos = JSON.parse(getDataObjetivos);
let copiaGetDataInicio9h;
let habilitarInputs9h;
let valorEtapa_encuadre9h;
let duracion9h;
let tecnicas9h;
let valorMaterial_equipo_apoyo9h;
let cantidad;

let copiaGetDataObjetivos = [...arrayDataObjetivos];
if (localStorage.getItem('copiaGetDataInicio9h')) {
    copiaGetDataInicio9h = JSON.parse(localStorage.getItem('copiaGetDataInicio9h'));
  }else{
    copiaGetDataInicio9h = [...arrayDataInicio9h];
  }

  if (localStorage.getItem('habilitarInputs9h')) {
    habilitarInputs9h = JSON.parse(localStorage.getItem('habilitarInputs9h'));
    valorEtapa_encuadre9h = JSON.parse(localStorage.getItem('valorEtapa_encuadre9h')); 
    valorMaterial_equipo_apoyo9h = JSON.parse(localStorage.getItem('valorMaterial_equipo_apoyo9h'));
    duracion9h = JSON.parse(localStorage.getItem('duracion9h'));
    tecnicas9h = JSON.parse(localStorage.getItem('tecnicas9h'));
  }else{
    habilitarInputs9h = true;
    valorEtapa_encuadre9h='';
    valorMaterial_equipo_apoyo9h='';
    duracion9h='';
    tecnicas9h='';
  }


// Acceder a la propiedad 'cursos_id'
let cursos_id = 0;
let seccion_encuadre = 8;

console.log(cursos_id); // Imprime el valor de 'cursos_id'


console.log(arrayDataObjetivos);
let selectRequerimiento = document.getElementById("selectRequerimiento");
let indice = 0;
let requerimientos_id = document.getElementById("requerimientos_id");


// Ve si esta habilitado el beneficiario
let BeneficiarioHabilitado = document.getElementById("myForm");
BeneficiarioHabilitado.style.display = "none";

// Ahora puedes acceder y manipular los datos
copiaGetDataInicio9h.map((requerimiento) => {
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
    indice = copiaGetDataInicio9h.find(
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
        <div class="name">Indicar el tiempo para realizar la evaluación:</div>
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
    if( valorSeleccionado === 3){
        content += `
        <div class="mb-3">
        <div class="name">Redactar la actividad:</div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required placeholder="Ejemplo: c.	Aclarará las dudas que se presenten">
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
    const url = route("seccion9h-store");
    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData.entries());
  
    data.descripcion = requerimientos_id.value;
    data.momento_aplicacion = requerimientos_id.text;
    data.seccion_encuadre = seccion_encuadre;
    data.cursos_id = cursos_id;
    data.indice=indice.id;

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
            copiaGetDataInicio9h = copiaGetDataInicio9h.filter(obj => obj.id != indice.id);
            localStorage.setItem('copiaGetDataInicio9h', JSON.stringify(copiaGetDataInicio9h));
            //location.reload();
         
            
            console.log('Despues de el for each',copiaGetDataInicio9h); // Imprime el array después de eliminar los elementos
            selectRequerimiento.innerHTML = "";

            let opcionDefecto = document.createElement("option");
            opcionDefecto.text = "Escoja una opción";
            opcionDefecto.value = 0;
            selectRequerimiento.add(opcionDefecto);

            copiaGetDataInicio9h.map((requerimiento) => {
                let opcion = document.createElement("option");
                opcion.text = requerimiento.descripcion;
                opcion.value = requerimiento.id;
                selectRequerimiento.add(opcion);
            });

        });

        habilitarInputs9h=false;
    localStorage.setItem('habilitarInputs9h', JSON.stringify(habilitarInputs9h));
    valorEtapa_encuadre9h = document.getElementById("etapa_encuadre").value;
    localStorage.setItem('valorEtapa_encuadre9h', JSON.stringify(valorEtapa_encuadre9h));
    valorMaterial_equipo_apoyo9h = document.getElementById("material_equipo_apoyo").value;
    localStorage.setItem('valorMaterial_equipo_apoyo9h', JSON.stringify(valorMaterial_equipo_apoyo9h));
    duracion9h = document.getElementById("duracion").value;
    localStorage.setItem('duracion9h', JSON.stringify(duracion9h));
    tecnicas9h = document.getElementById("tecnicas").value;
    localStorage.setItem('tecnicas9h', JSON.stringify(tecnicas9h));
    habilitarContenido();
    
});

const habilitarContenido = () => {

    if (habilitarInputs9h === true) {
       console.log('Estan habilitados los Inputs');
    } else {
        var inputEtapa = document.getElementById('etapa_encuadre');
        var inputMaterialEquipo = document.getElementById('material_equipo_apoyo');
        var inputDuracion = document.getElementById('duracion');
        var inputTecnicas = document.getElementById('tecnicas');
        inputEtapa.value = valorEtapa_encuadre9h;
        inputMaterialEquipo.value = valorMaterial_equipo_apoyo9h;
        inputDuracion.value = duracion9h;
        inputTecnicas.value = tecnicas9h;
        inputEtapa.readOnly = true;
        inputMaterialEquipo.readOnly = true;
        inputDuracion.readOnly = true;
        inputTecnicas.readOnly = true;
    }

}