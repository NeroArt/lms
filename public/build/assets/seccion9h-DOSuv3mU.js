let d=parseInt(localStorage.getItem("vista_indice"));if(localStorage.getItem("indicesViews")){let t=localStorage.getItem("indicesViews"),e=JSON.parse(t),o=e[26];console.log(o.id),console.log(o.vista_guardada);let a=e.find(s=>s.id===d),c=o.id,l=o.vista_guardada===1;c!=d&&l&&N(a.variable_ruta),c!=d&&!l&&N(a.variable_ruta)}else alert("No se ha creado ningun curso, se te redirecionara al panel de control!!"),window.location.href=route("home");function N(t){window.location.href=route(t)}let B=localStorage.getItem("dataObjetivos"),j=[{id:1,descripcion:"a.	Indicará alcances e instrucciones de la evaluación:  "},{id:2,descripcion:"b.	Indicará el tiempo para realizar la evaluación: "},{id:3,descripcion:"c.	Aclarará las dudas que se presenten"}];D();let S=JSON.parse(B),i,m,p,g,v,I;[...S];localStorage.getItem("copiaGetDataInicio9h")?i=JSON.parse(localStorage.getItem("copiaGetDataInicio9h")):(i=[...j],localStorage.setItem("copiaGetDataInicio9h",JSON.stringify(i)));localStorage.getItem("habilitarInputs9h")?(m=JSON.parse(localStorage.getItem("habilitarInputs9h")),p=JSON.parse(localStorage.getItem("valorEtapa_encuadre9h")),I=JSON.parse(localStorage.getItem("valorMaterial_equipo_apoyo9h")),g=JSON.parse(localStorage.getItem("duracion9h")),v=JSON.parse(localStorage.getItem("tecnicas9h"))):(m=!0,p="",I="",g="",v="");let f=0,x=8;console.log(f);console.log(S);let u=document.getElementById("selectRequerimiento"),r=0,_=document.getElementById("requerimientos_id"),O=document.getElementById("myForm");O.style.display="none";i.map(t=>{let e=document.createElement("option");e.text=t.descripcion,e.value=t.id,u.add(e)});S?S.forEach(function(t){f=t.cursos_id,console.log(f)}):console.log("El array no existe en el Local Storage");u.onchange=function(){let t=Number(this.value);t!==0?O.style.display="block":O.style.display="none",r=i.find(a=>a.id===t);let e="";t===1&&(e+=`
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
        `,document.getElementById("divRequerimientos").innerHTML=e,y()),t===2&&(e+=`
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
        `,document.getElementById("divRequerimientos").innerHTML=e,y()),t===3&&(e+=`
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
        `,document.getElementById("divRequerimientos").innerHTML=e,y()),_.value=r.id;let o=this.options[this.selectedIndex];_.text=o.text,console.log("El objeto seleccionado es: ",r)};document.getElementById("myForm").addEventListener("submit",t=>{t.preventDefault();const e=route("seccion9h-store"),o=new FormData(t.target),a=Object.fromEntries(o.entries());a.descripcion=_.value,a.momento_aplicacion=_.text,a.seccion_encuadre=x,a.cursos_id=f,a.indice=r.id,console.log(a);const c={method:"POST",headers:{"Content-Type":"application/json","X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').getAttribute("content")},body:JSON.stringify(a)};fetch(e,c).then(n=>n.json()).then(n=>{console.log(n),O.style.display="none",document.getElementById("divRequerimientos").innerHTML="",console.log("indice para eliminar "+r),i=i.filter(h=>h.id!=r.id),localStorage.setItem("copiaGetDataInicio9h",JSON.stringify(i)),location.reload(),console.log("Despues de el for each",i),u.innerHTML="";let b=document.createElement("option");b.text="Escoja una opción",b.value=0,u.add(b),i.map(h=>{let E=document.createElement("option");E.text=h.descripcion,E.value=h.id,u.add(E)})}),m=!1,localStorage.setItem("habilitarInputs9h",JSON.stringify(m)),p=document.getElementById("etapa_encuadre").value,localStorage.setItem("valorEtapa_encuadre9h",JSON.stringify(p)),I=document.getElementById("material_equipo_apoyo").value,localStorage.setItem("valorMaterial_equipo_apoyo9h",JSON.stringify(I)),g=document.getElementById("duracion").value,localStorage.setItem("duracion9h",JSON.stringify(g)),v=document.getElementById("tecnicas").value,localStorage.setItem("tecnicas9h",JSON.stringify(v)),y();let l=localStorage.getItem("indicesViews"),s=JSON.parse(l);s[26].vista_guardada=0,console.log(s),localStorage.setItem("indicesViews",JSON.stringify(s));let w=localStorage.getItem("curso_id"),J=s[26].nombre_vista_actual,q=route("actualizar-seguimiento",{nombreVista:J,CursoId:w});fetch(q).then(n=>n.json()).then(n=>{console.log(n)})});const y=()=>{if(m===!0)console.log("Estan habilitados los Inputs");else{var t=document.getElementById("etapa_encuadre"),e=document.getElementById("material_equipo_apoyo"),o=document.getElementById("duracion"),a=document.getElementById("tecnicas");t.value=p,e.value=I,o.value=g,a.value=v,t.readOnly=!0,e.readOnly=!0,o.readOnly=!0,a.readOnly=!0}};function D(){let t=localStorage.getItem("indicesViews"),e=JSON.parse(t),o=localStorage.getItem("curso_id"),a=e[26].nombre_vista_actual,c=route("seguimiento9h",{nombreVista:a,CursoId:o});fetch(c).then(l=>l.json()).then(l=>{console.log(l),l.alcanzado&&(e[26].vista_guardada=1,console.log(e),localStorage.setItem("indicesViews",JSON.stringify(e)),d++,localStorage.setItem("vista_indice",JSON.stringify(d)),localStorage.removeItem("copiaGetDataInicio9h"),localStorage.removeItem("valorEtapa_encuadre9h"),localStorage.removeItem("valorMaterial_equipo_apoyo9h"),localStorage.removeItem("duracion9h"),localStorage.removeItem("tecnicas9h"),localStorage.removeItem("habilitarInputs9h"),window.location.href=route("seccion9i-create"))})}
