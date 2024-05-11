let u=parseInt(localStorage.getItem("vista_indice"));if(localStorage.getItem("indicesViews")){let e=localStorage.getItem("indicesViews"),t=JSON.parse(e),i=t[15];console.log(i.id),console.log(i.vista_guardada);let a=t.find(s=>s.id===u),c=i.id,n=i.vista_guardada===1;c!=u&&n&&N(a.variable_ruta),c!=u&&!n&&N(a.variable_ruta)}else alert("No se ha creado ningun curso, se te redirecionara al panel de control!!"),window.location.href=route("home");function N(e){window.location.href=route(e)}let R=localStorage.getItem("dataObjetivos"),x=[{id:1,descripcion:"a)	Indicará alcance/propósito/finalidad de la evaluación: "},{id:2,descripcion:"b)	Indicará las instrucciones de la evaluación: "},{id:3,descripcion:"c)	Indicará el tiempo para realizar la evaluación: "}],_=JSON.parse(R),l,p,v,g,I,y,w;L();[..._];localStorage.getItem("copiaGetDataInicio8c")?l=JSON.parse(localStorage.getItem("copiaGetDataInicio8c")):(l=[...x],localStorage.setItem("copiaGetDataInicio8c",JSON.stringify(l)));localStorage.getItem("habilitarInputs8c")?(p=JSON.parse(localStorage.getItem("habilitarInputs8c")),v=JSON.parse(localStorage.getItem("valorEtapa_encuadre8c")),y=JSON.parse(localStorage.getItem("valorMaterial_equipo_apoyo8c")),g=JSON.parse(localStorage.getItem("duracion8c")),I=JSON.parse(localStorage.getItem("tecnicas8c"))):(p=!0,v="",y="",g="",I="");let b=0,D=3;console.log(b);console.log(_);let m=document.getElementById("selectRequerimiento"),r=0,E=document.getElementById("requerimientos_id"),O=document.getElementById("myForm");O.style.display="none";l.map(e=>{let t=document.createElement("option");t.text=e.descripcion,t.value=e.id,m.add(t)});_?_.forEach(function(e){b=e.cursos_id,console.log(b)}):console.log("El array no existe en el Local Storage");m.onchange=function(){let e=Number(this.value);e!==0?O.style.display="block":O.style.display="none",r=l.find(a=>a.id===e);let t="";e===1&&(t+=`
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
        `,document.getElementById("divRequerimientos").innerHTML=t,S()),e===2&&(t+=`
        
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
        `,document.getElementById("divRequerimientos").innerHTML=t,j(),S()),e===3&&(t+=`
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
        `,document.getElementById("divRequerimientos").innerHTML=t,S()),E.value=r.id;let i=this.options[this.selectedIndex];E.text=i.text,console.log("El objeto seleccionado es: ",r)};document.getElementById("myForm").addEventListener("submit",e=>{e.preventDefault();const t=route("seccion8c-store"),i=new FormData(e.target),a=Object.fromEntries(i.entries());a.descripcion=E.value,a.momento_aplicacion=E.text,a.seccion_encuadre=D,a.cursos_id=b,a.indice=r.id,document.getElementById("cantidadReglas")&&(w=document.getElementById("cantidadReglas").value),a.actividades=[];for(let o=0;o<w;o++){const d={};d.actividad=document.getElementById(`actividad[${o}]`).value,a.actividades.push(d)}console.log(a);const c={method:"POST",headers:{"Content-Type":"application/json","X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').getAttribute("content")},body:JSON.stringify(a)};fetch(t,c).then(o=>o.json()).then(o=>{console.log(o),O.style.display="none",document.getElementById("divRequerimientos").innerHTML="",console.log("indice para eliminar "+r),l=l.filter(f=>f.id!=r.id),localStorage.setItem("copiaGetDataInicio8c",JSON.stringify(l)),location.reload(),console.log("Despues de el for each",l),m.innerHTML="";let d=document.createElement("option");d.text="Escoja una opción",d.value=0,m.add(d),l.map(f=>{let h=document.createElement("option");h.text=f.descripcion,h.value=f.id,m.add(h)})}),p=!1,localStorage.setItem("habilitarInputs8c",JSON.stringify(p)),v=document.getElementById("etapa_encuadre").value,localStorage.setItem("valorEtapa_encuadre8c",JSON.stringify(v)),y=document.getElementById("material_equipo_apoyo").value,localStorage.setItem("valorMaterial_equipo_apoyo8c",JSON.stringify(y)),g=document.getElementById("duracion").value,localStorage.setItem("duracion8c",JSON.stringify(g)),I=document.getElementById("tecnicas").value,localStorage.setItem("tecnicas8c",JSON.stringify(I)),S();let n=localStorage.getItem("indicesViews"),s=JSON.parse(n);s[15].vista_guardada=0,console.log(s),localStorage.setItem("indicesViews",JSON.stringify(s));let B=localStorage.getItem("curso_id"),J=s[15].nombre_vista_actual,q=route("actualizar-seguimiento",{nombreVista:J,CursoId:B});fetch(q).then(o=>o.json()).then(o=>{console.log(o)})});const S=()=>{if(p===!0)console.log("Estan habilitados los Inputs");else{var e=document.getElementById("etapa_encuadre"),t=document.getElementById("material_equipo_apoyo"),i=document.getElementById("duracion"),a=document.getElementById("tecnicas");e.value=v,t.value=y,i.value=g,a.value=I,e.readOnly=!0,t.readOnly=!0,i.readOnly=!0,a.readOnly=!0}},j=()=>{document.getElementById("cantidadReglas").addEventListener("input",()=>{let e="";const t=event.target.value;for(let i=0;i<t;i++)e+=`
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
        `;document.getElementById("divReglas").innerHTML=e})};function L(){let e=localStorage.getItem("indicesViews"),t=JSON.parse(e),i=localStorage.getItem("curso_id"),a=t[15].nombre_vista_actual,c=route("seguimiento8c",{nombreVista:a,CursoId:i});fetch(c).then(n=>n.json()).then(n=>{console.log(n),n.alcanzado&&(t[15].vista_guardada=1,console.log(t),localStorage.setItem("indicesViews",JSON.stringify(t)),u++,localStorage.setItem("vista_indice",JSON.stringify(u)),localStorage.removeItem("copiaGetDataInicio8c"),localStorage.removeItem("valorEtapa_encuadre8c"),localStorage.removeItem("valorMaterial_equipo_apoyo8c"),localStorage.removeItem("duracion8c"),localStorage.removeItem("tecnicas8c"),localStorage.removeItem("habilitarInputs8c"),window.location.href=route("seccion8d-create"))})}
