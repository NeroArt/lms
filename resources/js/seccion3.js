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



