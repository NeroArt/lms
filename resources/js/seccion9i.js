let vista_indice =parseInt(localStorage.getItem('vista_indice'));

if (localStorage.getItem('indicesViews')) {
    let views = localStorage.getItem("indicesViews");
    let view = JSON.parse(views);

    // Busca la sección correcta usando vista_indice
    let seccion_actual = view[27];

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
let cursos_id;
let seccion_encuadre = 9;
let arrayDataObjetivos = JSON.parse(getDataObjetivos);
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



document.getElementById("myForm").addEventListener("submit", (event) => {
    event.preventDefault();
    const url = route("seccion9i-store");
    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData.entries());
  
    data.seccion_encuadre = seccion_encuadre;
    data.cursos_id = cursos_id;


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
        })

        let views = localStorage.getItem("indicesViews");
        let view = JSON.parse(views);
        view[27].vista_guardada = 1;
        console.log(view);
        localStorage.setItem('indicesViews', JSON.stringify(view));
        vista_indice++;
        localStorage.setItem('vista_indice', JSON.stringify(vista_indice));
    
        let CursoId = localStorage.getItem('curso_id');
        let nombreVista = view[27].nombre_vista_actual;
        let url2 = route('actualizar-seguimiento', { nombreVista, CursoId });
        
        fetch(url2)
            .then(response => response.json())
            .then(data => {
                console.log(data);
                
            });

    window.location.href = route('seccion9j-create');
  
});
