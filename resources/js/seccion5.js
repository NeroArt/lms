// Obtén la cadena JSON del Local Storage
let getDataObjetivos = localStorage.getItem("dataObjetivos");

//Creamos una array con las opciones a elegir
let arrayDataEvaluaciones = [
    { id: 1, descripcion: 'Inicio' },
    { id: 2, descripcion: 'Intermedio' },
    { id: 3, descripcion: 'Cierre' },
];



// Conviértela en un array de objetos JavaScript
let arrayDataObjetivos = JSON.parse(getDataObjetivos);


let copiaGetDataObjetivos = [...arrayDataObjetivos];
let copiaGetDataEvaluaciones;
if (localStorage.getItem('copiaGetDataEvaluaciones')) {
    copiaGetDataEvaluaciones = JSON.parse(localStorage.getItem('copiaGetDataEvaluaciones'));
  }else{
    copiaGetDataEvaluaciones = [...arrayDataEvaluaciones];
  }


// Acceder a la propiedad 'cursos_id'
let cursos_id = 0;

console.log(cursos_id); // Imprime el valor de 'cursos_id'


console.log(arrayDataObjetivos);
let selectRequerimiento = document.getElementById("selectRequerimiento");
let indice = 0;
let requerimientos_id = document.getElementById("requerimientos_id");


// Ve si esta habilitado el beneficiario
let BeneficiarioHabilitado = document.getElementById("myForm");
BeneficiarioHabilitado.style.display = "none";

// Ahora puedes acceder y manipular los datos
copiaGetDataEvaluaciones.map((requerimiento) => {
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
    indice = copiaGetDataEvaluaciones.find(
        (objeto) => objeto.id === valorSeleccionado
    );
    requerimientos_id.value = indice.id;
    let selectedOption = this.options[this.selectedIndex];
    requerimientos_id.text = selectedOption.text;
    console.log("El objeto seleccionado es: ", indice);
    let content = "";
    
        content += `
        <div class="mb-3">
        <div class="name">Aspecto a evaluar:</div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="aspecto" class="form-control" type="text" name="aspecto" autocomplete="aspecto">
                <span class="focus-input100 "></span>
        <span class="symbol-input100">
            <i class="fa fa-envelope"></i>
        </span>
            </div>
        </div>
        
        <div class="mb-3">
        <div class="name">Porcentaje:</div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="porcentaje" class="form-control" type="number" name="porcentaje" autocomplete="aspecto">
                <span class="focus-input100 "></span>
        <span class="symbol-input100">
            <i class="fa fa-envelope"></i>
        </span>
            </div>
        </div>

        <div class="mb-3">
        <div class="name">Instrumento de Evaluación: </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="instrumento_evaluacion" class="form-control" type="text" name="instrumento_evaluacion" autocomplete="instrumento_evaluacion">
                <span class="focus-input100 "></span>
        <span class="symbol-input100">
            <i class="fa fa-envelope"></i>
        </span>
            </div>
        </div>
        `;
    
    document.getElementById("divRequerimientos").innerHTML = content;

};


document.getElementById("myForm").addEventListener("submit", (event) => {
    event.preventDefault();
    const url = route("seccion5-store");
    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData.entries());
  
 
  

    data.descripcion = requerimientos_id.value;
    data.momento_aplicacion = requerimientos_id.text;
    data.cursos_id = cursos_id;
    let porcentaje = data.porcentaje;
    parseInt(porcentaje);
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
            copiaGetDataEvaluaciones = copiaGetDataEvaluaciones.filter(obj => obj.id != indice.id);
            localStorage.setItem('copiaGetDataEvaluaciones', JSON.stringify(copiaGetDataEvaluaciones));
          
            
            
            console.log('Despues de el for each',copiaGetDataEvaluaciones); // Imprime el array después de eliminar los elementos
            selectRequerimiento.innerHTML = "";

            let opcionDefecto = document.createElement("option");
            opcionDefecto.text = "Escoja un Requerimiento";
            opcionDefecto.value = 0;
            selectRequerimiento.add(opcionDefecto);

            copiaGetDataEvaluaciones.map((requerimiento) => {
                let opcion = document.createElement("option");
                opcion.text = requerimiento.descripcion;
                opcion.value = requerimiento.id;
                selectRequerimiento.add(opcion);
            });

        });


    
});
