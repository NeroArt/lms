let u=parseInt(localStorage.getItem("vista_indice"));if(localStorage.getItem("indicesViews")){let e=localStorage.getItem("indicesViews"),t=JSON.parse(e),i=t[16];console.log(i.id),console.log(i.vista_guardada);let a=t.find(d=>d.id===u),c=i.id,n=i.vista_guardada===1;c!=u&&n&&N(a.variable_ruta),c!=u&&!n&&N(a.variable_ruta)}else alert("No se ha creado ningun curso, se te redirecionara al panel de control!!"),window.location.href=route("home");function N(e){window.location.href=route(e)}let x=localStorage.getItem("dataObjetivos"),R=[{id:1,descripcion:"a)	Explicará objetivo de la técnica:  "},{id:2,descripcion:"b)	Dará las instrucciones de la técnica:  "},{id:3,descripcion:"c)	Mencionará el tiempo para realizarla:  "}];M();let _=JSON.parse(x),l,p,v,g,I,y,w;[..._];localStorage.getItem("copiaGetDataInicio8d")?l=JSON.parse(localStorage.getItem("copiaGetDataInicio8d")):(l=[...R],localStorage.setItem("copiaGetDataInicio8d",JSON.stringify(l)));localStorage.getItem("habilitarInputs8d")?(p=JSON.parse(localStorage.getItem("habilitarInputs8d")),v=JSON.parse(localStorage.getItem("valorEtapa_encuadre8d")),y=JSON.parse(localStorage.getItem("valorMaterial_equipo_apoyo8d")),g=JSON.parse(localStorage.getItem("duracion8d")),I=JSON.parse(localStorage.getItem("tecnicas8d"))):(p=!0,v="",y="",g="",I="");let b=0,j=4;console.log(b);console.log(_);let m=document.getElementById("selectRequerimiento"),r=0,E=document.getElementById("requerimientos_id"),h=document.getElementById("myForm");h.style.display="none";l.map(e=>{let t=document.createElement("option");t.text=e.descripcion,t.value=e.id,m.add(t)});_?_.forEach(function(e){b=e.cursos_id,console.log(b)}):console.log("El array no existe en el Local Storage");m.onchange=function(){let e=Number(this.value);e!==0?h.style.display="block":h.style.display="none",r=l.find(a=>a.id===e);let t="";e===1&&(t+=`
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
        `,document.getElementById("divRequerimientos").innerHTML=t,S()),e===2&&(t+=`
        
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
        `,document.getElementById("divRequerimientos").innerHTML=t,D(),S()),e===3&&(t+=`
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
        `,document.getElementById("divRequerimientos").innerHTML=t,S()),E.value=r.id;let i=this.options[this.selectedIndex];E.text=i.text,console.log("El objeto seleccionado es: ",r)};document.getElementById("myForm").addEventListener("submit",e=>{e.preventDefault();const t=route("seccion8d-store"),i=new FormData(e.target),a=Object.fromEntries(i.entries());a.descripcion=E.value,a.momento_aplicacion=E.text,a.seccion_encuadre=j,a.cursos_id=b,a.indice=r.id,document.getElementById("cantidadReglas")&&(w=document.getElementById("cantidadReglas").value),a.actividades=[];for(let o=0;o<w;o++){const s={};s.actividad=document.getElementById(`actividad[${o}]`).value,a.actividades.push(s)}console.log(a);const c={method:"POST",headers:{"Content-Type":"application/json","X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').getAttribute("content")},body:JSON.stringify(a)};fetch(t,c).then(o=>o.json()).then(o=>{console.log(o),h.style.display="none",document.getElementById("divRequerimientos").innerHTML="",console.log("indice para eliminar "+r),l=l.filter(f=>f.id!=r.id),localStorage.setItem("copiaGetDataInicio8d",JSON.stringify(l)),location.reload(),console.log("Despues de el for each",l),m.innerHTML="";let s=document.createElement("option");s.text="Escoja una opción",s.value=0,m.add(s),l.map(f=>{let O=document.createElement("option");O.text=f.descripcion,O.value=f.id,m.add(O)})}),p=!1,localStorage.setItem("habilitarInputs8d",JSON.stringify(p)),v=document.getElementById("etapa_encuadre").value,localStorage.setItem("valorEtapa_encuadre8d",JSON.stringify(v)),y=document.getElementById("material_equipo_apoyo").value,localStorage.setItem("valorMaterial_equipo_apoyo8d",JSON.stringify(y)),g=document.getElementById("duracion").value,localStorage.setItem("duracion8d",JSON.stringify(g)),I=document.getElementById("tecnicas").value,localStorage.setItem("tecnicas8d",JSON.stringify(I)),S();let n=localStorage.getItem("indicesViews"),d=JSON.parse(n);d[16].vista_guardada=0,console.log(d),localStorage.setItem("indicesViews",JSON.stringify(d));let B=localStorage.getItem("curso_id"),J=d[16].nombre_vista_actual,q=route("actualizar-seguimiento",{nombreVista:J,CursoId:B});fetch(q).then(o=>o.json()).then(o=>{console.log(o)})});const S=()=>{if(p===!0)console.log("Estan habilitados los Inputs");else{var e=document.getElementById("etapa_encuadre"),t=document.getElementById("material_equipo_apoyo"),i=document.getElementById("duracion"),a=document.getElementById("tecnicas");e.value=v,t.value=y,i.value=g,a.value=I,e.readOnly=!0,t.readOnly=!0,i.readOnly=!0,a.readOnly=!0}},D=()=>{document.getElementById("cantidadReglas").addEventListener("input",()=>{let e="";const t=event.target.value;for(let i=0;i<t;i++)e+=`
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
        `;document.getElementById("divReglas").innerHTML=e})};function M(){let e=localStorage.getItem("indicesViews"),t=JSON.parse(e),i=localStorage.getItem("curso_id"),a=t[16].nombre_vista_actual,c=route("seguimiento8d",{nombreVista:a,CursoId:i});fetch(c).then(n=>n.json()).then(n=>{console.log(n),n.alcanzado&&(t[16].vista_guardada=1,console.log(t),localStorage.setItem("indicesViews",JSON.stringify(t)),u++,localStorage.setItem("vista_indice",JSON.stringify(u)),localStorage.removeItem("copiaGetDataInicio8d"),localStorage.removeItem("valorEtapa_encuadre8d"),localStorage.removeItem("valorMaterial_equipo_apoyo8d"),localStorage.removeItem("duracion8d"),localStorage.removeItem("tecnicas8d"),localStorage.removeItem("habilitarInputs8d"),window.location.href=route("seccion8e-create"))})}
