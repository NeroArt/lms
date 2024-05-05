let vista_indice =parseInt(localStorage.getItem('vista_indice'));

if (localStorage.getItem('indicesViews')) {
    let views = localStorage.getItem("indicesViews");
    let view = JSON.parse(views);

    // Busca la sección correcta usando vista_indice
    let seccion_actual = view[5];

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

// Conviértela en un array de objetos JavaScript
let arrayDataObjetivos = JSON.parse(getDataObjetivos);
let copiaGetDataObjetivos3d;

if(localStorage.getItem("copiaGetDataObjetivos3d"))
{
    copiaGetDataObjetivos3d = JSON.parse(localStorage.getItem("copiaGetDataObjetivos3d"));
}else{
    copiaGetDataObjetivos3d = [...arrayDataObjetivos];
    localStorage.setItem("copiaGetDataObjetivos3d", JSON.stringify(copiaGetDataObjetivos3d));
}

let selectRequerimiento = document.getElementById("selectObjetivoParticular");
let indice = 0;
let requerimientos_id = document.getElementById("objetivos_id");
let cantidad;


// Ve si esta habilitado el beneficiario
let BeneficiarioHabilitado = document.getElementById("myForm");
BeneficiarioHabilitado.style.display = "none";

//Navegamos en el array y mostramos los options en el select
copiaGetDataObjetivos3d.map((requerimiento) => {
    let opcion = document.createElement("option");
    opcion.text = requerimiento.descripcion;
    opcion.value = requerimiento.id;
    selectRequerimiento.add(opcion);
});

selectRequerimiento.onchange = function () {
    let valorSeleccionado = Number(this.value);
    
    if (valorSeleccionado !== 0) {
        BeneficiarioHabilitado.style.display = "block";
    } else {
        BeneficiarioHabilitado.style.display = "none";
    }
    indice = copiaGetDataObjetivos3d.find(
        (objeto) => objeto.id === valorSeleccionado
    );
    let content = "";
    content += `
    <label for="">Cantidad de Beneficios</label>
    <input type="number" name="cantidadPreguntas" name="cantidadPreguntas" id="cantidadPreguntas" required>
    <br>
    <label for="exampleInputName" class="form-label">Preguntas:</label>
    <div id="divPreguntas">
    </div>
    `;

    document.getElementById("divBeneficios").innerHTML = content;
    habilitarPreguntas();
    requerimientos_id.value = indice.id;
    let selectedOption = this.options[this.selectedIndex];
    requerimientos_id.text = selectedOption.text;
    console.log("El objeto seleccionado es: ", indice);
};


document.getElementById("myForm").addEventListener("submit", (event) => {
    event.preventDefault();
    const url = route("seccion3d-store");
    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData.entries());
  
    data.indice=indice.id;
    if(document.getElementById("cantidadPreguntas")){
        cantidad = document.getElementById("cantidadPreguntas").value;
    }
    data.beneficios = [];
    for (let i = 0; i < cantidad; i++) {
        const constanterequerimiento = {};
        constanterequerimiento.beneficio = document.getElementById(`actividad[${i}]`).value;
        data.beneficios.push(constanterequerimiento);
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
            document.getElementById(`divBeneficios`).innerHTML = "";
            console.log("indice para eliminar " + indice);
            
            // Eliminamos los elementos
            copiaGetDataObjetivos3d = copiaGetDataObjetivos3d.filter(obj => obj.id != indice.id);
            localStorage.setItem('copiaGetDataObjetivos3d', JSON.stringify(copiaGetDataObjetivos3d));
            //location.reload();
         
            
            console.log('Despues de el for each',copiaGetDataObjetivos3d); // Imprime el array después de eliminar los elementos
            selectRequerimiento.innerHTML = "";

            let opcionDefecto = document.createElement("option");
            opcionDefecto.text = "Escoja una opción";
            opcionDefecto.value = 0;
            selectRequerimiento.add(opcionDefecto);

            copiaGetDataObjetivos3d.map((requerimiento) => {
                let opcion = document.createElement("option");
                opcion.text = requerimiento.descripcion;
                opcion.value = requerimiento.id;
                selectRequerimiento.add(opcion);
            });

        });
    
});


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

