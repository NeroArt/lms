// Obtén la cadena JSON del Local Storage
let getDataObjetivos = localStorage.getItem("dataObjetivos");
// Conviértela en un array de objetos JavaScript
let arrayDataObjetivos = JSON.parse(getDataObjetivos);
let cursos_id = 0;
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
        `;
    }
    document.getElementById("divRequerimientos").innerHTML = content;
});

document.getElementById("myForm").addEventListener("submit", (event) => {
    event.preventDefault();
    const url = route("seccion6-store");
    const cantidadRequerimientos = document.getElementById("cantidadRequerimientos").value;
    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData.entries());
    data.cursos_id = cursos_id;
    data.requerimientos = [];
    for (let i = 0; i < cantidadRequerimientos; i++) {
        const constanterequerimiento = {};
        constanterequerimiento.requerimiento = document.getElementById(`actividad[${i}]`).value;
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