let a=parseInt(localStorage.getItem("vista_indice"));localStorage.getItem("curso_id")&&(document.getElementById("cursos_id").value=parseInt(localStorage.getItem("curso_id")));if(localStorage.getItem("indicesViews")){let o=localStorage.getItem("indicesViews"),i=JSON.parse(o),e=i[1];console.log(e.id),console.log(e.vista_guardada);let l=i.find(t=>t.id===a),c=e.id,s=e.vista_guardada===1;c!=a&&s&&d(l.variable_ruta),c!=a&&!s&&d(l.variable_ruta)}else alert("No se ha creado ningun curso, se te redirecionara al panel de control!!"),window.location.href=route("home");let n=document.querySelector("#cursos_id"),r=null;n&&(r=n.value,localStorage.setItem("curso_id",r));console.log("curso_id",r);const u=document.getElementById("save2");u.addEventListener("click",o=>{let i=localStorage.getItem("indicesViews"),e=JSON.parse(i);e[1].vista_guardada=1,console.log(e),localStorage.setItem("indicesViews",JSON.stringify(e)),a++,localStorage.setItem("vista_indice",JSON.stringify(a));let l=localStorage.getItem("curso_id"),c=e[1].nombre_vista_actual,s=route("actualizar-seguimiento",{nombreVista:c,CursoId:l});fetch(s).then(t=>t.json()).then(t=>{console.log(t)})});function d(o){window.location.href=route(o)}
