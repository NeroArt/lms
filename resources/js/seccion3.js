let id_curso = localStorage.getItem('curso_id');
let maxCantidad = document.getElementById('quantity');


maxCantidad.addEventListener('input', function () {
    if (this.value < 1) {
        this.value = 1;
    }
    if (this.value > 3) {
        this.value = 3;
    }
});


document.getElementById("quantity").addEventListener("input", () => {
    let quantity = event.target.value;
    

    let contentGuests = '';
    let contentObjetivos = '';

    for (let i = 0; i < quantity; i++) {
        // Divs e inputs para los guests
        contentGuests += `<div>
            <label>Descripción de Objetivo ${i+1}</label>
            <input type="text" id="descripcion[${i}]">
        </div>`;

        // Divs e inputs para los objetivos
        contentObjetivos += `
        <tr>
            <td>
                <input type="text" id="sujeto[${i}]" readonly value="El Participante">
            </td>
            <td>
                <input type="text" id="accion[${i}]">
            </td>
            <td>
                <input type="text" id="condicion[${i}]">
            </td>
            <input type="text" id="tipo_objetivo[${i}]" value="particular" hidden>
        </tr>`;
    }

    // Asignar contenido a los elementos div respectivos
    document.getElementById("divGuests").innerHTML = contentGuests;
    document.getElementById("divObjetivos").innerHTML = contentObjetivos;
});


document.getElementById("myForm").addEventListener("submit",(event)=>{
    event.preventDefault();

    const url = route('seccion3-store');
    
    const quantity=document.getElementById("quantity").value;
    
    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData.entries());
    
    data.guests= [];
    for (let i = 0; i < quantity; i++) {
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



