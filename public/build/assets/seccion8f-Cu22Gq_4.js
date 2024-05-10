let _=parseInt(localStorage.getItem("vista_indice"));if(localStorage.getItem("indicesViews")){let e=localStorage.getItem("indicesViews"),a=JSON.parse(e),i=a[18];console.log(i.id),console.log(i.vista_guardada);let t=a.find(l=>l.id===_),g=i.id,n=i.vista_guardada===1;g!=_&&n&&O(t.variable_ruta),g!=_&&!n&&O(t.variable_ruta)}else alert("No se ha creado ningun curso, se te redirecionara al panel de control!!"),window.location.href=route("home");function O(e){window.location.href=route(e)}let q=localStorage.getItem("dataObjetivos"),B=[{id:1,descripcion:"a)	Indicará alcances, estrategias e instrucciones de la evaluación: "},{id:2,descripcion:"b)	Indicará las instrucciones de la evaluación: "},{id:3,descripcion:"c)	Indicará el tiempo para realizar la evaluación:  "},{id:4,descripcion:"d)	Aclarará las dudas que se presenten."}],y=JSON.parse(q),o,r,u,p,m,v,h;[...y];localStorage.getItem("copiaGetDataInicio8f")?o=JSON.parse(localStorage.getItem("copiaGetDataInicio8f")):o=[...B];localStorage.getItem("habilitarInputs8f")?(r=JSON.parse(localStorage.getItem("habilitarInputs8f")),u=JSON.parse(localStorage.getItem("valorEtapa_encuadre8f")),v=JSON.parse(localStorage.getItem("valorMaterial_equipo_apoyo8f")),p=JSON.parse(localStorage.getItem("duracion8f")),m=JSON.parse(localStorage.getItem("tecnicas8f"))):(r=!0,u="",v="",p="",m="");let I=0,x=6;console.log(I);console.log(y);let d=document.getElementById("selectRequerimiento"),c=0,S=document.getElementById("requerimientos_id"),b=document.getElementById("myForm");b.style.display="none";o.map(e=>{let a=document.createElement("option");a.text=e.descripcion,a.value=e.id,d.add(a)});y?y.forEach(function(e){I=e.cursos_id,console.log(I)}):console.log("El array no existe en el Local Storage");d.onchange=function(){let e=Number(this.value);e!==0?b.style.display="block":b.style.display="none",c=o.find(t=>t.id===e);let a="";e===1&&(a+=`
        <div class="mb-3">
        <div class="name">Redactar el objetivo de esta evaluación</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=a,s()),e===2&&(a+=`
        
        <div class="mb-3">
        <div class="name">Redactar para que sirve esta evaluación e Instrucciones:</div>
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
        `,document.getElementById("divRequerimientos").innerHTML=a,R(),s()),e===3&&(a+=`
        
        <div class="mb-3">
        <div class="name">Indicar cuanto durara la evaluación:</div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required placeholder="Ejemplo: 10 minutos">
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        <div class="name">Subtemas a desarrollar:</div>
        <div id="divSubtemas">
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=a,s()),e===4&&(a+=`
        <div class="mb-3">
        <div class="name">Redactar la actividad:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required placeholder="Ejemplo: El instructor aclarará las dudas que se presenten"></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=a,s()),S.value=c.id;let i=this.options[this.selectedIndex];S.text=i.text,console.log("El objeto seleccionado es: ",c)};document.getElementById("myForm").addEventListener("submit",e=>{e.preventDefault();const a=route("seccion8f-store"),i=new FormData(e.target),t=Object.fromEntries(i.entries());t.descripcion=S.value,t.momento_aplicacion=S.text,t.seccion_encuadre=x,t.cursos_id=I,t.indice=c.id,document.getElementById("cantidadReglas")&&(h=document.getElementById("cantidadReglas").value),t.actividades=[];for(let n=0;n<h;n++){const l={};l.actividad=document.getElementById(`actividad[${n}]`).value,t.actividades.push(l)}console.log(t);const g={method:"POST",headers:{"Content-Type":"application/json","X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').getAttribute("content")},body:JSON.stringify(t)};fetch(a,g).then(n=>n.json()).then(n=>{console.log(n),b.style.display="none",document.getElementById("divRequerimientos").innerHTML="",console.log("indice para eliminar "+c),o=o.filter(f=>f.id!=c.id),localStorage.setItem("copiaGetDataInicio8f",JSON.stringify(o)),location.reload(),console.log("Despues de el for each",o),d.innerHTML="";let l=document.createElement("option");l.text="Escoja una opción",l.value=0,d.add(l),o.map(f=>{let E=document.createElement("option");E.text=f.descripcion,E.value=f.id,d.add(E)})}),r=!1,localStorage.setItem("habilitarInputs8f",JSON.stringify(r)),u=document.getElementById("etapa_encuadre").value,localStorage.setItem("valorEtapa_encuadre8f",JSON.stringify(u)),v=document.getElementById("material_equipo_apoyo").value,localStorage.setItem("valorMaterial_equipo_apoyo8f",JSON.stringify(v)),p=document.getElementById("duracion").value,localStorage.setItem("duracion8f",JSON.stringify(p)),m=document.getElementById("tecnicas").value,localStorage.setItem("tecnicas8f",JSON.stringify(m)),s()});const s=()=>{if(r===!0)console.log("Estan habilitados los Inputs");else{var e=document.getElementById("etapa_encuadre"),a=document.getElementById("material_equipo_apoyo"),i=document.getElementById("duracion"),t=document.getElementById("tecnicas");e.value=u,a.value=v,i.value=p,t.value=m,e.readOnly=!0,a.readOnly=!0,i.readOnly=!0,t.readOnly=!0}},R=()=>{document.getElementById("cantidadReglas").addEventListener("input",()=>{let e="";const a=event.target.value;for(let i=0;i<a;i++)e+=`
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
