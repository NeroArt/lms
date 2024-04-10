
let cursoElement = document.querySelector('#cursos_id');
let curso_id = null;

if (cursoElement) {
    curso_id = cursoElement.value;
    localStorage.setItem('curso_id', curso_id);
}


console.log('curso_id', curso_id);