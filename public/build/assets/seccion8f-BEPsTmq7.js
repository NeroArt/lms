let m=parseInt(localStorage.getItem("vista_indice"));if(localStorage.getItem("indicesViews")){let a=localStorage.getItem("indicesViews"),e=JSON.parse(a),i=e[18];console.log(i.id),console.log(i.vista_guardada);let t=e.find(s=>s.id===m),c=i.id,l=i.vista_guardada===1;c!=m&&l&&q(t.variable_ruta),c!=m&&!l&&q(t.variable_ruta)}else alert("No se ha creado ningun curso, se te redirecionara al panel de control!!"),window.location.href=route("home");function q(a){window.location.href=route(a)}let J=localStorage.getItem("dataObjetivos"),R=[{id:1,descripcion:"a)	Indicará alcances, estrategias e instrucciones de la evaluación: "},{id:2,descripcion:"b)	Indicará las instrucciones de la evaluación: "},{id:3,descripcion:"c)	Indicará el tiempo para realizar la evaluación:  "},{id:4,descripcion:"d)	Aclarará las dudas que se presenten."}];L();let _=JSON.parse(J),n,v,g,f,I,y,w;[..._];localStorage.getItem("copiaGetDataInicio8f")?n=JSON.parse(localStorage.getItem("copiaGetDataInicio8f")):(n=[...R],localStorage.setItem("copiaGetDataInicio8f",JSON.stringify(n)));localStorage.getItem("habilitarInputs8f")?(v=JSON.parse(localStorage.getItem("habilitarInputs8f")),g=JSON.parse(localStorage.getItem("valorEtapa_encuadre8f")),y=JSON.parse(localStorage.getItem("valorMaterial_equipo_apoyo8f")),f=JSON.parse(localStorage.getItem("duracion8f")),I=JSON.parse(localStorage.getItem("tecnicas8f"))):(v=!0,g="",y="",f="",I="");let b=0,j=6;console.log(b);console.log(_);let p=document.getElementById("selectRequerimiento"),r=0,E=document.getElementById("requerimientos_id"),h=document.getElementById("myForm");h.style.display="none";n.map(a=>{let e=document.createElement("option");e.text=a.descripcion,e.value=a.id,p.add(e)});_?_.forEach(function(a){b=a.cursos_id,console.log(b)}):console.log("El array no existe en el Local Storage");p.onchange=function(){let a=Number(this.value);a!==0?h.style.display="block":h.style.display="none",r=n.find(t=>t.id===a);let e="";a===1&&(e+=`
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
        `,document.getElementById("divRequerimientos").innerHTML=e,u()),a===2&&(e+=`
        
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
        `,document.getElementById("divRequerimientos").innerHTML=e,D(),u()),a===3&&(e+=`
        
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
        `,document.getElementById("divRequerimientos").innerHTML=e,u()),a===4&&(e+=`
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
        `,document.getElementById("divRequerimientos").innerHTML=e,u()),E.value=r.id;let i=this.options[this.selectedIndex];E.text=i.text,console.log("El objeto seleccionado es: ",r)};document.getElementById("myForm").addEventListener("submit",a=>{a.preventDefault();const e=route("seccion8f-store"),i=new FormData(a.target),t=Object.fromEntries(i.entries());t.descripcion=E.value,t.momento_aplicacion=E.text,t.seccion_encuadre=j,t.cursos_id=b,t.indice=r.id,document.getElementById("cantidadReglas")&&(w=document.getElementById("cantidadReglas").value),t.actividades=[];for(let o=0;o<w;o++){const d={};d.actividad=document.getElementById(`actividad[${o}]`).value,t.actividades.push(d)}console.log(t);const c={method:"POST",headers:{"Content-Type":"application/json","X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').getAttribute("content")},body:JSON.stringify(t)};fetch(e,c).then(o=>o.json()).then(o=>{console.log(o),h.style.display="none",document.getElementById("divRequerimientos").innerHTML="",console.log("indice para eliminar "+r),n=n.filter(S=>S.id!=r.id),localStorage.setItem("copiaGetDataInicio8f",JSON.stringify(n)),location.reload(),console.log("Despues de el for each",n),p.innerHTML="";let d=document.createElement("option");d.text="Escoja una opción",d.value=0,p.add(d),n.map(S=>{let O=document.createElement("option");O.text=S.descripcion,O.value=S.id,p.add(O)})}),v=!1,localStorage.setItem("habilitarInputs8f",JSON.stringify(v)),g=document.getElementById("etapa_encuadre").value,localStorage.setItem("valorEtapa_encuadre8f",JSON.stringify(g)),y=document.getElementById("material_equipo_apoyo").value,localStorage.setItem("valorMaterial_equipo_apoyo8f",JSON.stringify(y)),f=document.getElementById("duracion").value,localStorage.setItem("duracion8f",JSON.stringify(f)),I=document.getElementById("tecnicas").value,localStorage.setItem("tecnicas8f",JSON.stringify(I)),u();let l=localStorage.getItem("indicesViews"),s=JSON.parse(l);s[18].vista_guardada=0,console.log(s),localStorage.setItem("indicesViews",JSON.stringify(s));let N=localStorage.getItem("curso_id"),B=s[18].nombre_vista_actual,x=route("actualizar-seguimiento",{nombreVista:B,CursoId:N});fetch(x).then(o=>o.json()).then(o=>{console.log(o)})});const u=()=>{if(v===!0)console.log("Estan habilitados los Inputs");else{var a=document.getElementById("etapa_encuadre"),e=document.getElementById("material_equipo_apoyo"),i=document.getElementById("duracion"),t=document.getElementById("tecnicas");a.value=g,e.value=y,i.value=f,t.value=I,a.readOnly=!0,e.readOnly=!0,i.readOnly=!0,t.readOnly=!0}},D=()=>{document.getElementById("cantidadReglas").addEventListener("input",()=>{let a="";const e=event.target.value;for(let i=0;i<e;i++)a+=`
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
        `;document.getElementById("divReglas").innerHTML=a})};function L(){let a=localStorage.getItem("indicesViews"),e=JSON.parse(a),i=localStorage.getItem("curso_id"),t=e[18].nombre_vista_actual,c=route("seguimiento8f",{nombreVista:t,CursoId:i});fetch(c).then(l=>l.json()).then(l=>{console.log(l),l.alcanzado&&(e[18].vista_guardada=1,console.log(e),localStorage.setItem("indicesViews",JSON.stringify(e)),m++,localStorage.setItem("vista_indice",JSON.stringify(m)),localStorage.removeItem("copiaGetDataInicio8f"),localStorage.removeItem("valorEtapa_encuadre8f"),localStorage.removeItem("valorMaterial_equipo_apoyo8f"),localStorage.removeItem("duracion8f"),localStorage.removeItem("tecnicas8f"),localStorage.removeItem("habilitarInputs8f"),window.location.href=route("seccion9a-create"))})}
