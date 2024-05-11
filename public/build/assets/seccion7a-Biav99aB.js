let s=parseInt(localStorage.getItem("vista_indice"));if(localStorage.getItem("indicesViews")){let a=localStorage.getItem("indicesViews"),o=JSON.parse(a),e=o[9];console.log(e.id),console.log(e.vista_guardada);let c=o.find(u=>u.id===s),i=e.id,l=e.vista_guardada===1;i!=s&&l&&p(c.variable_ruta),i!=s&&!l&&p(c.variable_ruta)}else alert("No se ha creado ningun curso, se te redirecionara al panel de control!!"),window.location.href=route("home");function p(a){window.location.href=route(a)}let y=localStorage.getItem("dataObjetivos"),m=JSON.parse(y),d=0,_=1;console.log(d);m?m.forEach(function(a){d=a.cursos_id,console.log(d)}):console.log("El array no existe en el Local Storage");document.getElementById("cantidadRequerimientos").addEventListener("input",()=>{let a="";const o=event.target.value;for(let e=0;e<o;e++)a+=`
        <hr class="separador">
        <div class="mb-3">
        <div class="name">Actividad </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="actividad[${e}]" class="form-control" type="text" name="actividad[${e}]" autocomplete="actividad" required>
                <span class="focus-input100 "></span>
        <span class="symbol-input100">
            <i class="fa fa-envelope"></i>
        </span>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Duración </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="duracion[${e}]" class="form-control" type="text" name="duracion[${e}]" autocomplete="duracion" required>
                <span class="focus-input100 "></span>
        <span class="symbol-input100">
            <i class="fa fa-envelope"></i>
        </span>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Técnicas </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="tecnicas[${e}]" class="form-control" type="text" name="tecnicas[${e}]" autocomplete="tecnicas" required>
                <span class="focus-input100 "></span>
        <span class="symbol-input100">
            <i class="fa fa-envelope"></i>
        </span>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Material y Equipo de Apoyo </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="material_equipo_apoyo[${e}]" class="form-control" type="text" name="material_equipo_apoyo[${e}]" autocomplete="material_equipo_apoyo" required>
                <span class="focus-input100 "></span>
        <span class="symbol-input100">
            <i class="fa fa-envelope"></i>
        </span>
            </div>
        </div>
        `;document.getElementById("divRequerimientos").innerHTML=a});document.getElementById("myForm").addEventListener("submit",a=>{a.preventDefault();const o=route("seccion7a-store"),e=document.getElementById("cantidadRequerimientos").value,c=new FormData(a.target),i=Object.fromEntries(c.entries());i.cursos_id=d,i.seccion_encuadre=_,i.requerimientos=[];for(let t=0;t<e;t++){const n={};n.actividad=document.getElementById(`actividad[${t}]`).value,n.duracion=document.getElementById(`duracion[${t}]`).value,n.tecnicas=document.getElementById(`tecnicas[${t}]`).value,n.material_equipo_apoyo=document.getElementById(`material_equipo_apoyo[${t}]`).value,i.requerimientos.push(n)}console.log(i);const l={method:"POST",headers:{"Content-Type":"application/json","X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').getAttribute("content")},body:JSON.stringify(i)};fetch(o,l).then(t=>t.json()).then(t=>{console.log(t),document.getElementById("divRequerimientos").innerHTML=""});let u=localStorage.getItem("indicesViews"),r=JSON.parse(u);r[9].vista_guardada=1,console.log(r),localStorage.setItem("indicesViews",JSON.stringify(r)),s++,localStorage.setItem("vista_indice",JSON.stringify(s));let v=localStorage.getItem("curso_id"),g=r[9].nombre_vista_actual,f=route("actualizar-seguimiento",{nombreVista:g,CursoId:v});fetch(f).then(t=>t.json()).then(t=>{console.log(t)}),window.location.href=route("seccion7b-create")});
