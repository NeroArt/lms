let r=parseInt(localStorage.getItem("vista_indice"));if(localStorage.getItem("indicesViews")){let e=localStorage.getItem("indicesViews"),n=JSON.parse(e),o=n[22];console.log(o.id),console.log(o.vista_guardada);let t=n.find(d=>d.id===r),a=o.id,c=o.vista_guardada===1;a!=r&&c&&l(t.variable_ruta),a!=r&&!c&&l(t.variable_ruta)}else alert("No se ha creado ningun curso, se te redirecionara al panel de control!!"),window.location.href=route("home");function l(e){window.location.href=route(e)}let u=localStorage.getItem("dataObjetivos"),i,g=4,s=JSON.parse(u);s?s.forEach(function(e){i=e.cursos_id,console.log(i)}):console.log("El array no existe en el Local Storage");let m=i,f=route("seccion9d-getDescripcionCurso",{CursoId:m});fetch(f).then(e=>e.json()).then(e=>{console.log(e);let n=document.getElementById("divDescripcionCurso");e.data.map(o=>{let t=document.createElement("div");t.className="row";let a=document.createElement("label");a.textContent="Descripcion: "+o.descripcion_curso,a.style.fontWeight="bold",t.appendChild(a),n.appendChild(t)})});document.getElementById("myForm").addEventListener("submit",e=>{e.preventDefault();const n=route("seccion9d-store"),o=new FormData(e.target),t=Object.fromEntries(o.entries());t.seccion_encuadre=g,t.cursos_id=i,console.log(t);const a={method:"POST",headers:{"Content-Type":"application/json","X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').getAttribute("content")},body:JSON.stringify(t)};fetch(n,a).then(c=>c.json()).then(c=>{console.log(c)})});
