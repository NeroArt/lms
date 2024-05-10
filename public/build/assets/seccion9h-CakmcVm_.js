let E=parseInt(localStorage.getItem("vista_indice"));if(localStorage.getItem("indicesViews")){let e=localStorage.getItem("indicesViews"),t=JSON.parse(e),i=t[26];console.log(i.id),console.log(i.vista_guardada);let a=t.find(c=>c.id===E),v=i.id,l=i.vista_guardada===1;v!=E&&l&&b(a.variable_ruta),v!=E&&!l&&b(a.variable_ruta)}else alert("No se ha creado ningun curso, se te redirecionara al panel de control!!"),window.location.href=route("home");function b(e){window.location.href=route(e)}let O=localStorage.getItem("dataObjetivos"),N=[{id:1,descripcion:"a.	Indicará alcances e instrucciones de la evaluación:  "},{id:2,descripcion:"b.	Indicará el tiempo para realizar la evaluación: "},{id:3,descripcion:"c.	Aclarará las dudas que se presenten"}],I=JSON.parse(O),o,r,d,u,p,m;[...I];localStorage.getItem("copiaGetDataInicio9h")?o=JSON.parse(localStorage.getItem("copiaGetDataInicio9h")):o=[...N];localStorage.getItem("habilitarInputs9h")?(r=JSON.parse(localStorage.getItem("habilitarInputs9h")),d=JSON.parse(localStorage.getItem("valorEtapa_encuadre9h")),m=JSON.parse(localStorage.getItem("valorMaterial_equipo_apoyo9h")),u=JSON.parse(localStorage.getItem("duracion9h")),p=JSON.parse(localStorage.getItem("tecnicas9h"))):(r=!0,d="",m="",u="",p="");let f=0,q=8;console.log(f);console.log(I);let s=document.getElementById("selectRequerimiento"),n=0,h=document.getElementById("requerimientos_id"),S=document.getElementById("myForm");S.style.display="none";o.map(e=>{let t=document.createElement("option");t.text=e.descripcion,t.value=e.id,s.add(t)});I?I.forEach(function(e){f=e.cursos_id,console.log(f)}):console.log("El array no existe en el Local Storage");s.onchange=function(){let e=Number(this.value);e!==0?S.style.display="block":S.style.display="none",n=o.find(a=>a.id===e);let t="";e===1&&(t+=`
        <div class="mb-3">
        <div class="name">Redactar el objetivo de esta evaluación:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=t,y()),e===2&&(t+=`
        <div class="mb-3">
        <div class="name">Indicar el tiempo para realizar la evaluación:</div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required placeholder="Ejemplo: 15 minutos">
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=t,y()),e===3&&(t+=`
        <div class="mb-3">
        <div class="name">Redactar la actividad:</div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required placeholder="Ejemplo: c.	Aclarará las dudas que se presenten">
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=t,y()),h.value=n.id;let i=this.options[this.selectedIndex];h.text=i.text,console.log("El objeto seleccionado es: ",n)};document.getElementById("myForm").addEventListener("submit",e=>{e.preventDefault();const t=route("seccion9h-store"),i=new FormData(e.target),a=Object.fromEntries(i.entries());a.descripcion=h.value,a.momento_aplicacion=h.text,a.seccion_encuadre=q,a.cursos_id=f,a.indice=n.id,console.log(a);const v={method:"POST",headers:{"Content-Type":"application/json","X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').getAttribute("content")},body:JSON.stringify(a)};fetch(t,v).then(l=>l.json()).then(l=>{console.log(l),S.style.display="none",document.getElementById("divRequerimientos").innerHTML="",console.log("indice para eliminar "+n),o=o.filter(g=>g.id!=n.id),localStorage.setItem("copiaGetDataInicio9h",JSON.stringify(o)),console.log("Despues de el for each",o),s.innerHTML="";let c=document.createElement("option");c.text="Escoja una opción",c.value=0,s.add(c),o.map(g=>{let _=document.createElement("option");_.text=g.descripcion,_.value=g.id,s.add(_)})}),r=!1,localStorage.setItem("habilitarInputs9h",JSON.stringify(r)),d=document.getElementById("etapa_encuadre").value,localStorage.setItem("valorEtapa_encuadre9h",JSON.stringify(d)),m=document.getElementById("material_equipo_apoyo").value,localStorage.setItem("valorMaterial_equipo_apoyo9h",JSON.stringify(m)),u=document.getElementById("duracion").value,localStorage.setItem("duracion9h",JSON.stringify(u)),p=document.getElementById("tecnicas").value,localStorage.setItem("tecnicas9h",JSON.stringify(p)),y()});const y=()=>{if(r===!0)console.log("Estan habilitados los Inputs");else{var e=document.getElementById("etapa_encuadre"),t=document.getElementById("material_equipo_apoyo"),i=document.getElementById("duracion"),a=document.getElementById("tecnicas");e.value=d,t.value=m,i.value=u,a.value=p,e.readOnly=!0,t.readOnly=!0,i.readOnly=!0,a.readOnly=!0}};
