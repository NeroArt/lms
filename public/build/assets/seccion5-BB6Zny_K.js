let r=parseInt(localStorage.getItem("vista_indice"));if(localStorage.getItem("indicesViews")){let e=localStorage.getItem("indicesViews"),t=JSON.parse(e),a=t[7];console.log(a.id),console.log(a.vista_guardada);let o=t.find(c=>c.id===r),l=a.id,n=a.vista_guardada===1;l!=r&&n&&I(o.variable_ruta),l!=r&&!n&&I(o.variable_ruta)}else alert("No se ha creado ningun curso, se te redirecionara al panel de control!!"),window.location.href=route("home");function I(e){window.location.href=route(e)}let h=localStorage.getItem("dataObjetivos"),w=[{id:1,descripcion:"Inicio"},{id:2,descripcion:"Intermedio"},{id:3,descripcion:"Cierre"}],m=JSON.parse(h);[...m];let i;localStorage.getItem("copiaGetDataEvaluaciones")?i=JSON.parse(localStorage.getItem("copiaGetDataEvaluaciones")):(i=[...w],localStorage.setItem("copiaGetDataEvaluaciones",JSON.stringify(i)));let v=0;console.log(v);console.log(m);let d=document.getElementById("selectRequerimiento"),u=0,g=document.getElementById("requerimientos_id"),f=document.getElementById("myForm");f.style.display="none";i.map(e=>{let t=document.createElement("option");t.text=e.descripcion,t.value=e.id,d.add(t)});m?m.forEach(function(e){v=e.cursos_id,console.log(v)}):console.log("El array no existe en el Local Storage");d.onchange=function(){let e=Number(this.value);e!==0?f.style.display="block":f.style.display="none",u=i.find(o=>o.id===e),g.value=u.id;let t=this.options[this.selectedIndex];g.text=t.text,console.log("El objeto seleccionado es: ",u);let a="";a+=`
        <div class="mb-3">
        <div class="name">Aspecto a evaluar:</div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="aspecto" class="form-control" type="text" name="aspecto" autocomplete="aspecto" required>
                <span class="focus-input100 "></span>
        <span class="symbol-input100">
            <i class="fa fa-envelope"></i>
        </span>
            </div>
        </div>
        
        <div class="mb-3">
        <div class="name">Porcentaje:</div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="porcentaje" class="form-control" type="number" name="porcentaje" autocomplete="aspecto" required>
                <span class="focus-input100 "></span>
        <span class="symbol-input100">
            <i class="fa fa-envelope"></i>
        </span>
            </div>
        </div>

        <div class="mb-3">
        <div class="name">Instrumento de Evaluación: </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="instrumento_evaluacion" class="form-control" type="text" name="instrumento_evaluacion" autocomplete="instrumento_evaluacion" required>
                <span class="focus-input100 "></span>
        <span class="symbol-input100">
            <i class="fa fa-envelope"></i>
        </span>
            </div>
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=a};document.getElementById("myForm").addEventListener("submit",e=>{e.preventDefault();const t=route("seccion5-store"),a=new FormData(e.target),o=Object.fromEntries(a.entries());o.descripcion=g.value,o.momento_aplicacion=g.text,o.cursos_id=v,o.porcentaje,console.log(o);const l={method:"POST",headers:{"Content-Type":"application/json","X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').getAttribute("content")},body:JSON.stringify(o)};fetch(t,l).then(s=>s.json()).then(s=>{console.log(s),f.style.display="none",document.getElementById("divRequerimientos").innerHTML="",console.log("indice para eliminar "+u),i=i.filter(p=>p.id!=u.id),localStorage.setItem("copiaGetDataEvaluaciones",JSON.stringify(i)),console.log("Despues de el for each",i),d.innerHTML="";let y=document.createElement("option");y.text="Escoja un Requerimiento",y.value=0,d.add(y),i.map(p=>{let S=document.createElement("option");S.text=p.descripcion,S.value=p.id,d.add(S)})});let n=localStorage.getItem("indicesViews"),c=JSON.parse(n);c[7].vista_guardada=0,console.log(c),localStorage.setItem("indicesViews",JSON.stringify(c));let _=localStorage.getItem("curso_id"),b=c[7].nombre_vista_actual,E=route("actualizar-seguimiento",{nombreVista:b,CursoId:_});fetch(E).then(s=>s.json()).then(s=>{console.log(s)}),O()});function O(){let e=localStorage.getItem("indicesViews"),t=JSON.parse(e),a=localStorage.getItem("curso_id"),o=t[7].nombre_vista_actual,l=route("seguimiento5",{nombreVista:o,CursoId:a});fetch(l).then(n=>n.json()).then(n=>{console.log(n),n.alcanzado&&(t[7].vista_guardada=1,console.log(t),localStorage.setItem("indicesViews",JSON.stringify(t)),r++,localStorage.setItem("vista_indice",JSON.stringify(r)),localStorage.removeItem("copiaGetDataEvaluaciones"),window.location.href=route("seccion6-create"))})}
