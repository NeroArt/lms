let vista_indice =parseInt(localStorage.getItem('vista_indice'));

if (localStorage.getItem('indicesViews')) {
    let views = localStorage.getItem("indicesViews");
    let view = JSON.parse(views);

    // Busca la sección correcta usando vista_indice
    let seccion_actual = view[9];

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
// Conviértela en un array de objetos JavaScript
let arrayDataObjetivos = JSON.parse(getDataObjetivos);
let cursos_id = 0;
let seccion_encuadre = 1;
console.log(cursos_id); // Imprime el valor de 'cursos_id'

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

document.getElementById("cantidadRequerimientos").addEventListener("input", () => {
    let content = "";
    const cantidadRequerimientos = event.target.value;
    for (let i = 0; i < cantidadRequerimientos; i++) {
        content += `
        <hr class="separador">
        <div class="mb-3">
        <div class="name">Actividad </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="actividad[${i}]" class="form-control" type="text" name="actividad[${i}]" autocomplete="actividad" required>
                <span class="focus-input100 "></span>
        <span class="symbol-input100">
            <i class="fa fa-envelope"></i>
        </span>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Duración </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="duracion[${i}]" class="form-control" type="text" name="duracion[${i}]" autocomplete="duracion" required>
                <span class="focus-input100 "></span>
        <span class="symbol-input100">
            <i class="fa fa-envelope"></i>
        </span>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Técnicas </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="tecnicas[${i}]" class="form-control" type="text" name="tecnicas[${i}]" autocomplete="tecnicas" required>
                <span class="focus-input100 "></span>
        <span class="symbol-input100">
            <i class="fa fa-envelope"></i>
        </span>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Material y Equipo de Apoyo </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="material_equipo_apoyo[${i}]" class="form-control" type="text" name="material_equipo_apoyo[${i}]" autocomplete="material_equipo_apoyo" required>
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
    const url = route("seccion7a-store");
    const cantidadRequerimientos = document.getElementById("cantidadRequerimientos").value;
    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData.entries());
    data.cursos_id = cursos_id;
    data.seccion_encuadre = seccion_encuadre;
    data.requerimientos = [];
    for (let i = 0; i < cantidadRequerimientos; i++) {
        const constanterequerimiento = {};
        constanterequerimiento.actividad = document.getElementById(`actividad[${i}]`).value;
        constanterequerimiento.duracion = document.getElementById(`duracion[${i}]`).value;
        constanterequerimiento.tecnicas = document.getElementById(`tecnicas[${i}]`).value;
        constanterequerimiento.material_equipo_apoyo = document.getElementById(`material_equipo_apoyo[${i}]`).value;
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
            document.getElementById(`divRequerimientos`).innerHTML = "";
        });
});