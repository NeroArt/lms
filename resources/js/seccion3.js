document.getElementById("quantity").addEventListener("input", () => {
    let quantity = event.target.value;
    const maxQuantity = 3; // Establece el límite máximo de elementos

    // Verificar si quantity excede el límite máximo
    if (quantity > maxQuantity) {
        quantity = maxQuantity; // Establecer quantity al límite máximo
        event.target.value = maxQuantity; // Actualizar el valor del input
    }

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
    const idCurso = parseInt(document.getElementById("cursos_id").value)
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
        guest.cursos_id=idCurso;
        data.guests.push(guest);   
    }
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
        console.log(data.dataObjetivos);
        let dataObjetivos = data.dataObjetivos;
        localStorage.setItem('dataObjetivos', JSON.stringify(dataObjetivos));
        window.location.href = miRuta;
    });
    
});



