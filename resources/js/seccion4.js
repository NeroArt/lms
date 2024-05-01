let vista_indice =parseInt(localStorage.getItem('vista_indice'));

if (localStorage.getItem('indicesViews')) {
    let views = localStorage.getItem("indicesViews");
    let view = JSON.parse(views);

    // Busca la sección correcta usando vista_indice
    let seccion_actual = view[6];

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
let arrayDataRequerimientos = [
    { id: 1, descripcion: 'Requerimientos en instalaciones, mobiliario y su distribución' },
    { id: 2, descripcion: 'Requerimientos en equipo de apoyo y su distribución' },
    { id: 3, descripcion: 'Requerimientos en materiales didácticos de apoyo' },
    { id: 4, descripcion: 'Requerimientos humanos' },
    { id: 5, descripcion: 'Otros (Todo el material extra que no se pueda incluir en las columnas anteriores)' },
    { id: 6, descripcion: 'Material y equipo para las medidas de: salud/seguridad/higiene/ protección civil' },
];



// Conviértela en un array de objetos JavaScript
let arrayDataObjetivos = JSON.parse(getDataObjetivos);

let copiaGetDataRequerimientos;


if (localStorage.getItem('copiaGetDataRequerimientos')) {
    copiaGetDataRequerimientos = JSON.parse(localStorage.getItem('copiaGetDataRequerimientos'));
  }else{
    copiaGetDataRequerimientos = [...arrayDataRequerimientos];
  }

// Acceder a la propiedad 'cursos_id'
let cursos_id = 0;

console.log(cursos_id); // Imprime el valor de 'cursos_id'


console.log(copiaGetDataRequerimientos);
let selectRequerimiento = document.getElementById("selectRequerimiento");
let indice = 0;
let requerimientos_id = document.getElementById("requerimientos_id");


// Ve si esta habilitado el beneficiario
let BeneficiarioHabilitado = document.getElementById("myForm");
BeneficiarioHabilitado.style.display = "none";

// Ahora puedes acceder y manipular los datos
copiaGetDataRequerimientos.map((requerimiento) => {
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
    indice = copiaGetDataRequerimientos.find(
        (objeto) => objeto.id === valorSeleccionado
    );
    requerimientos_id.value = indice.id;
    console.log("El objeto seleccionado es: ", indice);

};
/*Codigo para formulario dinamico de Beneficios*/

document.getElementById("cantidadRequerimientos").addEventListener("input", () => {
    let content = "";
    const cantidadRequerimientos = event.target.value;
    for (let i = 0; i < cantidadRequerimientos; i++) {
        content += `
        <div class="mb-3">
        <div class="name">Requerimiento </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="requerimiento[${i}]" class="form-control" type="text" name="requerimiento[${i}]" autocomplete="Requerimiento" required>
                <span class="focus-input100 "></span>
        <span class="symbol-input100">
            <i class="fa fa-envelope"></i>
        </span>
            </div>
        </div>
        `;
    }
    document.getElementById("divRequerimientos").innerHTML = content;
});

document.getElementById("myForm").addEventListener("submit", (event) => {
    event.preventDefault();
    const url = route("seccion4-store");
    const cantidadRequerimientos = document.getElementById("cantidadRequerimientos").value;
    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData.entries());

    data.requerimientos = [];
    for (let i = 0; i < cantidadRequerimientos; i++) {
        const constanterequerimiento = {};
        constanterequerimiento.requerimiento = document.getElementById(`requerimiento[${i}]`).value;
        constanterequerimiento.requerimientos_id = requerimientos_id.value;
        constanterequerimiento.cursos_id = cursos_id;
        data.requerimientos.push(constanterequerimiento);
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
            copiaGetDataRequerimientos = copiaGetDataRequerimientos.filter(obj => obj.id != indice.id);
            localStorage.setItem('copiaGetDataRequerimientos', JSON.stringify(copiaGetDataRequerimientos));
           
            
            console.log('Despues de el for each',copiaGetDataRequerimientos); // Imprime el array después de eliminar los elementos
            selectRequerimiento.innerHTML = "";

            let opcionDefecto = document.createElement("option");
            opcionDefecto.text = "Escoja un Requerimiento";
            opcionDefecto.value = 0;
            selectRequerimiento.add(opcionDefecto);

            copiaGetDataRequerimientos.map((requerimiento) => {
                let opcion = document.createElement("option");
                opcion.text = requerimiento.descripcion;
                opcion.value = requerimiento.id;
                selectRequerimiento.add(opcion);
            });
            


        });
});
