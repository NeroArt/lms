let f=parseInt(localStorage.getItem("vista_indice"));if(localStorage.getItem("indicesViews")){let e=localStorage.getItem("indicesViews"),a=JSON.parse(e),o=a[7];console.log(o.id),console.log(o.vista_guardada);let t=a.find(s=>s.id===f),r=o.id,n=o.vista_guardada===1;r!=f&&n&&y(t.variable_ruta),r!=f&&!n&&y(t.variable_ruta)}else alert("No se ha creado ningun curso, se te redirecionara al panel de control!!"),window.location.href=route("home");function y(e){window.location.href=route(e)}let E=localStorage.getItem("dataObjetivos"),b=[{id:1,descripcion:"Inicio"},{id:2,descripcion:"Intermedio"},{id:3,descripcion:"Cierre"}],u=JSON.parse(E);[...u];let i;localStorage.getItem("copiaGetDataEvaluaciones")?i=JSON.parse(localStorage.getItem("copiaGetDataEvaluaciones")):i=[...b];let p=0;console.log(p);console.log(u);let l=document.getElementById("selectRequerimiento"),c=0,m=document.getElementById("requerimientos_id"),v=document.getElementById("myForm");v.style.display="none";i.map(e=>{let a=document.createElement("option");a.text=e.descripcion,a.value=e.id,l.add(a)});u?u.forEach(function(e){p=e.cursos_id,console.log(p)}):console.log("El array no existe en el Local Storage");l.onchange=function(){let e=Number(this.value);e!==0?v.style.display="block":v.style.display="none",c=i.find(t=>t.id===e),m.value=c.id;let a=this.options[this.selectedIndex];m.text=a.text,console.log("El objeto seleccionado es: ",c);let o="";o+=`
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
        `,document.getElementById("divRequerimientos").innerHTML=o};document.getElementById("myForm").addEventListener("submit",e=>{e.preventDefault();const a=route("seccion5-store"),o=new FormData(e.target),t=Object.fromEntries(o.entries());t.descripcion=m.value,t.momento_aplicacion=m.text,t.cursos_id=p,t.porcentaje,console.log(t);const r={method:"POST",headers:{"Content-Type":"application/json","X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').getAttribute("content")},body:JSON.stringify(t)};fetch(a,r).then(n=>n.json()).then(n=>{console.log(n),v.style.display="none",document.getElementById("divRequerimientos").innerHTML="",console.log("indice para eliminar "+c),i=i.filter(d=>d.id!=c.id),localStorage.setItem("copiaGetDataEvaluaciones",JSON.stringify(i)),console.log("Despues de el for each",i),l.innerHTML="";let s=document.createElement("option");s.text="Escoja un Requerimiento",s.value=0,l.add(s),i.map(d=>{let g=document.createElement("option");g.text=d.descripcion,g.value=d.id,l.add(g)})})});
