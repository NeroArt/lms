let vista_indice = localStorage.getItem('vista_indice') ? parseInt(localStorage.getItem('vista_indice')) : 1;

if (localStorage.getItem('indicesViews')) {
    let views = localStorage.getItem("indicesViews");
    let view = JSON.parse(views);

    // Busca la sección correcta usando vista_indice
    let seccion_actual = view[0];

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
    localStorage.setItem('vista_indice', JSON.stringify(vista_indice));
    const indicesViews = [
        {
            id:1,
            nombre_vista_actual:'seccion1',
            vista_guardada:0,
            variable_ruta:'seccion1.create'
        },
        {
            id:2,
            nombre_vista_actual:'seccion2',
            vista_guardada:0,
            variable_ruta:'seccion2.create'
        },
        {
            id:3,
            nombre_vista_actual:'seccion3',
            vista_guardada:0,
            variable_ruta:'seccion1.create'
        },
        {
            id:4,
            nombre_vista_actual:'seccion3b',
            vista_guardada:0,
            variable_ruta:'seccion3b-create'
        },
        {
            id:5,
            nombre_vista_actual:'seccion3c',
            vista_guardada:0,
            variable_ruta:'seccion3c-create'
        },
        {
            id:6,
            nombre_vista_actual:'seccion3d',
            vista_guardada:0,
            variable_ruta:'seccion3d-create'
        },
        {
            id:7,
            nombre_vista_actual:'seccion4',
            vista_guardada:0,
            variable_ruta:'seccion4-create'
        },
        {
            id:8,
            nombre_vista_actual:'seccion5',
            vista_guardada:0,
            variable_ruta:'seccion5-create'
        },
        {
            id:9,
            nombre_vista_actual:'seccion6',
            vista_guardada:0,
            variable_ruta:'seccion6-create'
        },
        {
            id:10,
            nombre_vista_actual:'secciona7a',
            vista_guardada:0,
            variable_ruta:'seccion7a-create'
        },
        {
            id:11,
            nombre_vista_actual:'seccion7b',
            vista_guardada:0,
            variable_ruta:'seccion7b-create'
        },
        {
            id:12,
            nombre_vista_actual:'seccion7c',
            vista_guardada:0,
            variable_ruta:'seccion7c-create'
        },
        {
            id:13,
            nombre_vista_actual:'seccion7d',
            vista_guardada:0,
            variable_ruta:'seccion7d-create'
        },
        {
            id:14,
            nombre_vista_actual:'seccion8a',
            vista_guardada:0,
            variable_ruta:'seccion8a-create'
        },
        {
            id:15,
            nombre_vista_actual:'seccion8b',
            vista_guardada:0,
            variable_ruta:'seccion8b-create'
        },
        {
            id:16,
            nombre_vista_actual:'seccion8c',
            vista_guardada:0,
            variable_ruta:'seccion8c-create'
        },
        {
            id:17,
            nombre_vista_actual:'seccion8d',
            vista_guardada:0,
            variable_ruta:'seccion8d-create'
        },
        {
            id:18,
            nombre_vista_actual:'seccion8e',
            vista_guardada:0,
            variable_ruta:'seccion8e-create'
        },
        {
            id:19,
            nombre_vista_actual:'seccion8f',
            vista_guardada:0,
            variable_ruta:'seccion8f-create'
        },
        {
            id:20,
            nombre_vista_actual:'seccion9a',
            vista_guardada:0,
            variable_ruta:'seccion9a-create'
        },
        {
            id:21,
            nombre_vista_actual:'seccion9b',
            vista_guardada:0,
            variable_ruta:'seccion9b-create'
        },
        {
            id:22,
            nombre_vista_actual:'seccion9c',
            vista_guardada:0,
            variable_ruta:'seccion9c-create'
        },
        {
            id:23,
            nombre_vista_actual:'seccion9d',
            vista_guardada:0,
            variable_ruta:'seccion9d-create'
        },
        {
            id:24,
            nombre_vista_actual:'seccion9e',
            vista_guardada:0,
            variable_ruta:'seccion9e-create'
        },
        {
            id:25,
            nombre_vista_actual:'seccion9f',
            vista_guardada:0,
            variable_ruta:'seccion9f-create'
        },
        {
            id:26,
            nombre_vista_actual:'seccion9g',
            vista_guardada:0,
            variable_ruta:'seccion9g-create'
        },
        {
            id:27,
            nombre_vista_actual:'seccion9h',
            vista_guardada:0,
            variable_ruta:'seccion9h-create'
        },
        {
            id:28,
            nombre_vista_actual:'seccion9i',
            vista_guardada:0,
            variable_ruta:'seccion9i-create'
        },
        {
            id:29,
            nombre_vista_actual:'seccion9j',
            vista_guardada:0,
            variable_ruta:'seccion9j-create'
        },
        {
            id:30,
            nombre_vista_actual:'seccion9k',
            vista_guardada:0,
            variable_ruta:'seccion9k-create'
        }
    ]
    localStorage.setItem('indicesViews', JSON.stringify(indicesViews));
}



const save1 = document.getElementById("save1");

save1.addEventListener("click", (event) => {
    let views = localStorage.getItem("indicesViews");
    let view = JSON.parse(views);
    view[0].vista_guardada = 1;
    console.log(view);
    localStorage.setItem('indicesViews', JSON.stringify(view));
    vista_indice++;
    localStorage.setItem('vista_indice', JSON.stringify(vista_indice));
});



function redireccionSeccion (variable_ruta) {
    window.location.href = route(variable_ruta); // Redirige a otra página
}

