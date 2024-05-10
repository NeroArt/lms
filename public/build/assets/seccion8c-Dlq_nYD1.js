let _=parseInt(localStorage.getItem("vista_indice"));if(localStorage.getItem("indicesViews")){let e=localStorage.getItem("indicesViews"),a=JSON.parse(e),i=a[15];console.log(i.id),console.log(i.vista_guardada);let t=a.find(c=>c.id===_),v=i.id,n=i.vista_guardada===1;v!=_&&n&&O(t.variable_ruta),v!=_&&!n&&O(t.variable_ruta)}else alert("No se ha creado ningun curso, se te redirecionara al panel de control!!"),window.location.href=route("home");function O(e){window.location.href=route(e)}let B=localStorage.getItem("dataObjetivos"),q=[{id:1,descripcion:"a)	Indicará alcance/propósito/finalidad de la evaluación: "},{id:2,descripcion:"b)	Indicará las instrucciones de la evaluación: "},{id:3,descripcion:"c)	Indicará el tiempo para realizar la evaluación: "}],f=JSON.parse(B),o,s,r,u,m,p,h;[...f];localStorage.getItem("copiaGetDataInicio8c")?o=JSON.parse(localStorage.getItem("copiaGetDataInicio8c")):o=[...q];localStorage.getItem("habilitarInputs8c")?(s=JSON.parse(localStorage.getItem("habilitarInputs8c")),r=JSON.parse(localStorage.getItem("valorEtapa_encuadre8c")),p=JSON.parse(localStorage.getItem("valorMaterial_equipo_apoyo8c")),u=JSON.parse(localStorage.getItem("duracion8c")),m=JSON.parse(localStorage.getItem("tecnicas8c"))):(s=!0,r="",p="",u="",m="");let I=0,R=3;console.log(I);console.log(f);let d=document.getElementById("selectRequerimiento"),l=0,S=document.getElementById("requerimientos_id"),b=document.getElementById("myForm");b.style.display="none";o.map(e=>{let a=document.createElement("option");a.text=e.descripcion,a.value=e.id,d.add(a)});f?f.forEach(function(e){I=e.cursos_id,console.log(I)}):console.log("El array no existe en el Local Storage");d.onchange=function(){let e=Number(this.value);e!==0?b.style.display="block":b.style.display="none",l=o.find(t=>t.id===e);let a="";e===1&&(a+=`
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
        `,document.getElementById("divRequerimientos").innerHTML=a,y()),e===2&&(a+=`
        
        <div class="mb-3">
        <div class="name">Redactar para que sirve esta evaluación:</div>
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
        <label for="">Cantidad de Preguntas</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas" required>
        <br>
        <div id="divReglas">
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=a,x(),y()),e===3&&(a+=`
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
        `,document.getElementById("divRequerimientos").innerHTML=a,y()),S.value=l.id;let i=this.options[this.selectedIndex];S.text=i.text,console.log("El objeto seleccionado es: ",l)};document.getElementById("myForm").addEventListener("submit",e=>{e.preventDefault();const a=route("seccion8c-store"),i=new FormData(e.target),t=Object.fromEntries(i.entries());t.descripcion=S.value,t.momento_aplicacion=S.text,t.seccion_encuadre=R,t.cursos_id=I,t.indice=l.id,document.getElementById("cantidadReglas")&&(h=document.getElementById("cantidadReglas").value),t.actividades=[];for(let n=0;n<h;n++){const c={};c.actividad=document.getElementById(`actividad[${n}]`).value,t.actividades.push(c)}console.log(t);const v={method:"POST",headers:{"Content-Type":"application/json","X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').getAttribute("content")},body:JSON.stringify(t)};fetch(a,v).then(n=>n.json()).then(n=>{console.log(n),b.style.display="none",document.getElementById("divRequerimientos").innerHTML="",console.log("indice para eliminar "+l),o=o.filter(g=>g.id!=l.id),localStorage.setItem("copiaGetDataInicio8c",JSON.stringify(o)),location.reload(),console.log("Despues de el for each",o),d.innerHTML="";let c=document.createElement("option");c.text="Escoja una opción",c.value=0,d.add(c),o.map(g=>{let E=document.createElement("option");E.text=g.descripcion,E.value=g.id,d.add(E)})}),s=!1,localStorage.setItem("habilitarInputs8c",JSON.stringify(s)),r=document.getElementById("etapa_encuadre").value,localStorage.setItem("valorEtapa_encuadre8c",JSON.stringify(r)),p=document.getElementById("material_equipo_apoyo").value,localStorage.setItem("valorMaterial_equipo_apoyo8c",JSON.stringify(p)),u=document.getElementById("duracion").value,localStorage.setItem("duracion8c",JSON.stringify(u)),m=document.getElementById("tecnicas").value,localStorage.setItem("tecnicas8c",JSON.stringify(m)),y()});const y=()=>{if(s===!0)console.log("Estan habilitados los Inputs");else{var e=document.getElementById("etapa_encuadre"),a=document.getElementById("material_equipo_apoyo"),i=document.getElementById("duracion"),t=document.getElementById("tecnicas");e.value=r,a.value=p,i.value=u,t.value=m,e.readOnly=!0,a.readOnly=!0,i.readOnly=!0,t.readOnly=!0}},x=()=>{document.getElementById("cantidadReglas").addEventListener("input",()=>{let e="";const a=event.target.value;for(let i=0;i<a;i++)e+=`
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
