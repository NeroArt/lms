let getDataObjetivos = localStorage.getItem("dataObjetivos");
let cursos_id;
let seccion_encuadre = 2;
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
    const url = route("seccion9b-store");
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
});
