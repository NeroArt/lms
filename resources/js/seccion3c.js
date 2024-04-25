const getDataObjetivos = localStorage.getItem("dataObjetivos");
const arrayDataObjetivos = JSON.parse(getDataObjetivos);
const selectObjetivo3c = document.getElementById("selectObjetivoParticular3c");
const selectTemas = document.getElementById("selectTemas");
const cantidadSubtemas = document.getElementById("cantidadSubtemas")
const SubtemarioHabilitado = document.getElementById("FormSubtemas");
const curso_id = document.getElementById("curso_id");
SubtemarioHabilitado.style.display = "none";
let arrayTemas;
let idTema = 0;
let CursoId = 0;

cantidadSubtemas.addEventListener('input', function () {
    if (this.value < 1) {
        this.value = 1;
    }
    if (this.value > 15) {
        this.value = 15;
    }
});

const createOption = (text, value) => {
    let option = document.createElement("option");
    option.text = text;
    option.value = value;
    return option;
}

arrayDataObjetivos.map(objetivo => selectObjetivo3c.add(createOption(objetivo.descripcion, objetivo.id)));

selectObjetivo3c.onchange = function () {
    let IdObjetivo = Number(this.value);
    let objetivoEncontrado = arrayDataObjetivos.find(objeto => objeto.id === IdObjetivo);
    CursoId = objetivoEncontrado.cursos_id;
    let url = route('seccion3c-getTemas', { IdObjetivo, CursoId });

    fetch(url)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            arrayTemas = data.data;
            cleanFormSubtemas();

            if (arrayTemas.length === 0) {
                selectTemas.add(createOption("No hay temas, si no encuentra mas temas al escoger objetivos, pase a la siguiente sección", 0));    
            }else{
                selectTemas.add(createOption("Escoja un Tema", 0));
                arrayTemas.map(tema => selectTemas.add(createOption(tema.tema, tema.id)));
            }
        });
};

selectTemas.onchange = function () {
    let valorSeleccionado = Number(this.value);
    SubtemarioHabilitado.style.display = valorSeleccionado !== 0 ? "block" : "none";
    idTema = valorSeleccionado;
};

document.getElementById("cantidadSubtemas").addEventListener("input", () => {
    let content = "";
    const cantidadTemas = event.target.value;
    for (let i = 0; i < cantidadTemas; i++) {
        content += `<div class="mb-3"><div class="name ">Subtema ${i+1}</div><div class="input-group wrap-input100 validate-input" ><input id="subtema[${i}]" class="form-control" type="text" name="subtema[${i}]" autocomplete="Subtema" required><span class="focus-input100 "></span><span class="symbol-input100"><i class="fa fa-envelope"></i></span></div></div>`;
    }
    document.getElementById("divSubtemas").innerHTML = content;
});

document.getElementById("FormSubtemas").addEventListener("submit", (event) => {
    event.preventDefault();
    const url = route("seccion3c-store");
    const cantidadSubtemas = document.getElementById("cantidadSubtemas").value;
    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData.entries());

    data.subtemas = Array.from({length: cantidadSubtemas}, (_, i) => ({subtema: document.getElementById(`subtema[${i}]`).value, id: idTema}));

    const requestOptions = {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
        },
        body: JSON.stringify(data),
    };

    fetch(url, requestOptions)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            cleanFormSubtemas();
            selectTemas.add(createOption("Escoja un objetivo", 0));
        });
});

const cleanFormSubtemas = () => {
    SubtemarioHabilitado.style.display = "none";
    document.getElementById("divSubtemas").innerHTML = "";
    document.getElementById("cantidadSubtemas").value='';
    selectTemas.innerHTML = "";
}

