let vista_indice =parseInt(localStorage.getItem('vista_indice'));
if(localStorage.getItem('curso_id')){
    document.getElementById("cursos_id").value = parseInt(localStorage.getItem('curso_id'));
}
if (localStorage.getItem('indicesViews')) {
    let views = localStorage.getItem("indicesViews");
    let view = JSON.parse(views);

    // Busca la sección correcta usando vista_indice
    let seccion_actual = view[1];


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

let cursoElement = document.querySelector('#cursos_id');
let curso_id = null;

if (cursoElement) {
    curso_id = cursoElement.value;
    localStorage.setItem('curso_id', curso_id);
}

console.log('curso_id', curso_id);

const save2 = document.getElementById("save2");

save2.addEventListener("click", (event) => {
    let views = localStorage.getItem("indicesViews");
    let view = JSON.parse(views);
    view[1].vista_guardada = 1;
    console.log(view);
    localStorage.setItem('indicesViews', JSON.stringify(view));
    vista_indice++;
    localStorage.setItem('vista_indice', JSON.stringify(vista_indice));

    let CursoId = localStorage.getItem('curso_id');
    let nombreVista = view[1].nombre_vista_actual;
    let url = route('actualizar-seguimiento', { nombreVista, CursoId });
    
    fetch(url)
        .then(response => response.json())
        .then(data => {
            console.log(data);
            
        });
});

function redireccionSeccion (variable_ruta) {
    window.location.href = route(variable_ruta); // Redirige a otra página
}
