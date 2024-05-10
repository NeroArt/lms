let _=parseInt(localStorage.getItem("vista_indice"));if(localStorage.getItem("indicesViews")){let e=localStorage.getItem("indicesViews"),t=JSON.parse(e),i=t[16];console.log(i.id),console.log(i.vista_guardada);let a=t.find(l=>l.id===_),v=i.id,o=i.vista_guardada===1;v!=_&&o&&O(a.variable_ruta),v!=_&&!o&&O(a.variable_ruta)}else alert("No se ha creado ningun curso, se te redirecionara al panel de control!!"),window.location.href=route("home");function O(e){window.location.href=route(e)}let B=localStorage.getItem("dataObjetivos"),x=[{id:1,descripcion:"a)	Explicará objetivo de la técnica:  "},{id:2,descripcion:"b)	Dará las instrucciones de la técnica:  "},{id:3,descripcion:"c)	Mencionará el tiempo para realizarla:  "}],f=JSON.parse(B),n,s,r,u,m,p,h;[...f];localStorage.getItem("copiaGetDataInicio8d")?n=JSON.parse(localStorage.getItem("copiaGetDataInicio8d")):n=[...x];localStorage.getItem("habilitarInputs8d")?(s=JSON.parse(localStorage.getItem("habilitarInputs8d")),r=JSON.parse(localStorage.getItem("valorEtapa_encuadre8d")),p=JSON.parse(localStorage.getItem("valorMaterial_equipo_apoyo8d")),u=JSON.parse(localStorage.getItem("duracion8d")),m=JSON.parse(localStorage.getItem("tecnicas8d"))):(s=!0,r="",p="",u="",m="");let I=0,R=4;console.log(I);console.log(f);let c=document.getElementById("selectRequerimiento"),d=0,S=document.getElementById("requerimientos_id"),E=document.getElementById("myForm");E.style.display="none";n.map(e=>{let t=document.createElement("option");t.text=e.descripcion,t.value=e.id,c.add(t)});f?f.forEach(function(e){I=e.cursos_id,console.log(I)}):console.log("El array no existe en el Local Storage");c.onchange=function(){let e=Number(this.value);e!==0?E.style.display="block":E.style.display="none",d=n.find(a=>a.id===e);let t="";e===1&&(t+=`
        <div class="mb-3">
        <div class="name">Redactar la actividad:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" placeholder="Ejemplo: Que el participante se relaje y aumente su entusiasmo" required></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=t,y()),e===2&&(t+=`
        
        <div class="mb-3">
        <div class="name">Redactar la actividad a desarrollar:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Redactar las instrucciones:</div>
        </div>
        <label for="">Cantidad de Instrucciones</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas" required>
        <br>
        <div id="divReglas">
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=t,q(),y()),e===3&&(t+=`
        <div class="mb-3">
        <div class="name">Indicar cuanto tiempo dura esta evaluación:</div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required placeholder="Ejemplo: 15 minutos">
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=t,y()),S.value=d.id;let i=this.options[this.selectedIndex];S.text=i.text,console.log("El objeto seleccionado es: ",d)};document.getElementById("myForm").addEventListener("submit",e=>{e.preventDefault();const t=route("seccion8d-store"),i=new FormData(e.target),a=Object.fromEntries(i.entries());a.descripcion=S.value,a.momento_aplicacion=S.text,a.seccion_encuadre=R,a.cursos_id=I,a.indice=d.id,document.getElementById("cantidadReglas")&&(h=document.getElementById("cantidadReglas").value),a.actividades=[];for(let o=0;o<h;o++){const l={};l.actividad=document.getElementById(`actividad[${o}]`).value,a.actividades.push(l)}console.log(a);const v={method:"POST",headers:{"Content-Type":"application/json","X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').getAttribute("content")},body:JSON.stringify(a)};fetch(t,v).then(o=>o.json()).then(o=>{console.log(o),E.style.display="none",document.getElementById("divRequerimientos").innerHTML="",console.log("indice para eliminar "+d),n=n.filter(g=>g.id!=d.id),localStorage.setItem("copiaGetDataInicio8d",JSON.stringify(n)),location.reload(),console.log("Despues de el for each",n),c.innerHTML="";let l=document.createElement("option");l.text="Escoja una opción",l.value=0,c.add(l),n.map(g=>{let b=document.createElement("option");b.text=g.descripcion,b.value=g.id,c.add(b)})}),s=!1,localStorage.setItem("habilitarInputs8d",JSON.stringify(s)),r=document.getElementById("etapa_encuadre").value,localStorage.setItem("valorEtapa_encuadre8d",JSON.stringify(r)),p=document.getElementById("material_equipo_apoyo").value,localStorage.setItem("valorMaterial_equipo_apoyo8d",JSON.stringify(p)),u=document.getElementById("duracion").value,localStorage.setItem("duracion8d",JSON.stringify(u)),m=document.getElementById("tecnicas").value,localStorage.setItem("tecnicas8d",JSON.stringify(m)),y()});const y=()=>{if(s===!0)console.log("Estan habilitados los Inputs");else{var e=document.getElementById("etapa_encuadre"),t=document.getElementById("material_equipo_apoyo"),i=document.getElementById("duracion"),a=document.getElementById("tecnicas");e.value=r,t.value=p,i.value=u,a.value=m,e.readOnly=!0,t.readOnly=!0,i.readOnly=!0,a.readOnly=!0}},q=()=>{document.getElementById("cantidadReglas").addEventListener("input",()=>{let e="";const t=event.target.value;for(let i=0;i<t;i++)e+=`
        <div class="mb-3">
        <div class="name">Redactar </div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad[${i}]" class="form-control" type="text" name="actividad[${i}]" autocomplete="actividad" required></textarea>
                <span class="focus-input100 "></span>
            <span class="symbol-input100">
            <i class="fa fa-envelope"></i>
            </span>
            </div>
        </div>
        `;document.getElementById("divReglas").innerHTML=e})};
