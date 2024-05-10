let r=parseInt(localStorage.getItem("vista_indice"));if(localStorage.getItem("indicesViews")){let e=localStorage.getItem("indicesViews"),o=JSON.parse(e),t=o[8];console.log(t.id),console.log(t.vista_guardada);let n=o.find(i=>i.id===r),a=t.id,s=t.vista_guardada===1;a!=r&&s&&d(n.variable_ruta),a!=r&&!s&&d(n.variable_ruta)}else alert("No se ha creado ningun curso, se te redirecionara al panel de control!!"),window.location.href=route("home");function d(e){window.location.href=route(e)}let m=localStorage.getItem("dataObjetivos"),u=JSON.parse(m),c=0;console.log(c);u?u.forEach(function(e){c=e.cursos_id,console.log(c)}):console.log("El array no existe en el Local Storage");document.getElementById("cantidadRequerimientos").addEventListener("input",()=>{let e="";const o=event.target.value;for(let t=0;t<o;t++)e+=`
        <div class="mb-3">
        <div class="name">Actividad </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="actividad[${t}]" class="form-control" type="text" name="actividad[${t}]" autocomplete="actividad" required>
                <span class="focus-input100 "></span>
        <span class="symbol-input100">
            <i class="fa fa-envelope"></i>
        </span>
            </div>
        </div>
        `;document.getElementById("divRequerimientos").innerHTML=e});document.getElementById("myForm").addEventListener("submit",e=>{e.preventDefault();const o=route("seccion6-store"),t=document.getElementById("cantidadRequerimientos").value,n=new FormData(e.target),a=Object.fromEntries(n.entries());a.cursos_id=c,a.requerimientos=[];for(let i=0;i<t;i++){const l={};l.requerimiento=document.getElementById(`actividad[${i}]`).value,a.requerimientos.push(l)}console.log(a);const s={method:"POST",headers:{"Content-Type":"application/json","X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').getAttribute("content")},body:JSON.stringify(a)};fetch(o,s).then(i=>i.json()).then(i=>{console.log(i),document.getElementById("divRequerimientos").innerHTML=""})});
