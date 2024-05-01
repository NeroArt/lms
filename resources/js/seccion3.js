let vista_indice =parseInt(localStorage.getItem('vista_indice'));

if (localStorage.getItem('indicesViews')) {
    let views = localStorage.getItem("indicesViews");
    let view = JSON.parse(views);

    // Busca la sección correcta usando vista_indice
    let seccion_actual = view[2];
    
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

let id_curso = localStorage.getItem('curso_id');

document.getElementById("myForm").addEventListener("submit",(event)=>{
    event.preventDefault();

    const url = route('seccion3-store');
    
  
    
    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData.entries());
    
    data.guests= [];
    for (let i = 0; i < 3; i++) {
        const guest= {};
        guest.tipo_objetivo=document.getElementById(`tipo_objetivo[${i}]`).value;
        guest.descripcion=document.getElementById(`descripcion[${i}]`).value;
        guest.sujeto=document.getElementById(`sujeto[${i}]`).value;
        guest.accion=document.getElementById(`accion[${i}]`).value;
        guest.condicion=document.getElementById(`condicion[${i}]`).value;
        guest.cursos_id=parseInt(id_curso);
        data.guests.push(guest);   
    }

    data.cursos_id=parseInt(id_curso);
    console.log(data);
    

    const requestOptions={
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify(data) 
        
    };

    fetch(url, requestOptions)
    .then(response=>response.json())
    .then(data=>{
        const miRuta = route('seccion3b-create');
        console.log(data);
        let dataObjetivos = data.dataObjetivos;
        let bandera = false;
        localStorage.setItem('dataObjetivos', JSON.stringify(dataObjetivos));
        localStorage.setItem('bandera', JSON.stringify(bandera));
        window.location.href = miRuta;
    });
    
});

function redireccionSeccion (variable_ruta) {
    window.location.href = route(variable_ruta); // Redirige a otra página
}

