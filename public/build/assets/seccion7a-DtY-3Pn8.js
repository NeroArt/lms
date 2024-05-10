let d=parseInt(localStorage.getItem("vista_indice"));if(localStorage.getItem("indicesViews")){let a=localStorage.getItem("indicesViews"),n=JSON.parse(a),e=n[9];console.log(e.id),console.log(e.vista_guardada);let s=n.find(t=>t.id===d),i=e.id,c=e.vista_guardada===1;i!=d&&c&&r(s.variable_ruta),i!=d&&!c&&r(s.variable_ruta)}else alert("No se ha creado ningun curso, se te redirecionara al panel de control!!"),window.location.href=route("home");function r(a){window.location.href=route(a)}let p=localStorage.getItem("dataObjetivos"),u=JSON.parse(p),l=0,m=1;console.log(l);u?u.forEach(function(a){l=a.cursos_id,console.log(l)}):console.log("El array no existe en el Local Storage");document.getElementById("cantidadRequerimientos").addEventListener("input",()=>{let a="";const n=event.target.value;for(let e=0;e<n;e++)a+=`
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
        `;document.getElementById("divRequerimientos").innerHTML=a});document.getElementById("myForm").addEventListener("submit",a=>{a.preventDefault();const n=route("seccion7a-store"),e=document.getElementById("cantidadRequerimientos").value,s=new FormData(a.target),i=Object.fromEntries(s.entries());i.cursos_id=l,i.seccion_encuadre=m,i.requerimientos=[];for(let t=0;t<e;t++){const o={};o.actividad=document.getElementById(`actividad[${t}]`).value,o.duracion=document.getElementById(`duracion[${t}]`).value,o.tecnicas=document.getElementById(`tecnicas[${t}]`).value,o.material_equipo_apoyo=document.getElementById(`material_equipo_apoyo[${t}]`).value,i.requerimientos.push(o)}console.log(i);const c={method:"POST",headers:{"Content-Type":"application/json","X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').getAttribute("content")},body:JSON.stringify(i)};fetch(n,c).then(t=>t.json()).then(t=>{console.log(t),document.getElementById("divRequerimientos").innerHTML=""})});
