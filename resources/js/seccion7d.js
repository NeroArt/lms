let cursos_id = localStorage.getItem('curso_id');

document.getElementById("myForm").addEventListener("submit", (event) => {
    event.preventDefault();
    const url = route("seccion7d-store");
    const formData = new FormData(event.target);
    const data = Object.fromEntries(formData.entries());
    data.seccion_encuadre = 4;
    data.cursos_id = cursos_id;
    data.actividades = [];
    for (let i = 0; i < 3; i++) {
        const constanterequerimiento = {};
        constanterequerimiento.actividad = document.getElementById(`actividad[${i}]`).value;
        data.actividades.push(constanterequerimiento);
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
        });
});
