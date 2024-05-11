let g=parseInt(localStorage.getItem("vista_indice"));if(localStorage.getItem("indicesViews")){let a=localStorage.getItem("indicesViews"),e=JSON.parse(a),i=e[13];console.log(i.id),console.log(i.vista_guardada);let t=e.find(o=>o.id===g),c=i.id,n=i.vista_guardada===1;c!=g&&n&&w(t.variable_ruta),c!=g&&!n&&w(t.variable_ruta)}else alert("No se ha creado ningun curso, se te redirecionara al panel de control!!"),window.location.href=route("home");function w(a){window.location.href=route(a)}let J=localStorage.getItem("dataObjetivos"),j=[{id:1,descripcion:"a.	Presentará el objetivo del tema:  "},{id:2,descripcion:"b.	Realizará una introducción general al contenido temático:"},{id:3,descripcion:"c.	Recuperará la experiencia previa de los participantes, preguntando sobre sus conocimientos previos del contenido temático:"},{id:4,descripcion:"d.	Desarrollará el contenido "},{id:5,descripcion:"e.	Utilizará ejemplos relacionados con los temas y las situaciones cotidianas"},{id:6,descripcion:"f.	Resolverá las dudas que se presenten y/o manifiesten los participantes:"},{id:7,descripcion:"g.	Realizará la síntesis haciendo énfasis en los aspectos sobresalientes, invitando a los participantes a participar:"},{id:8,descripcion:"h.	Planteará preguntas dirigidas que verifiquen la comprensión del tema "},{id:9,descripcion:"i.	Promoverá comentarios sobre la utilidad y aplicación de los temas en su vida profesional y personal:"},{id:10,descripcion:"j.	Mencionará las referencias bibliográficas que ha utilizado en el desarrollo de su tema."}];L();let h=JSON.parse(J),d,y,b,I,S,E,x;[...h];localStorage.getItem("copiaGetDataInicio8a")?d=JSON.parse(localStorage.getItem("copiaGetDataInicio8a")):(d=[...j],localStorage.setItem("copiaGetDataInicio8a",JSON.stringify(d)));localStorage.getItem("habilitarInputs8a")?(y=JSON.parse(localStorage.getItem("habilitarInputs8a")),b=JSON.parse(localStorage.getItem("valorEtapa_encuadre8a")),E=JSON.parse(localStorage.getItem("valorMaterial_equipo_apoyo8a")),I=JSON.parse(localStorage.getItem("duracion8a")),S=JSON.parse(localStorage.getItem("tecnicas8a"))):(y=!0,b="",E="",I="",S="");let R=0,M=1;console.log(R);console.log(h);let f=document.getElementById("selectRequerimiento"),m=0,q=document.getElementById("requerimientos_id"),O=document.getElementById("myForm");O.style.display="none";d.map(a=>{let e=document.createElement("option");e.text=a.descripcion,e.value=a.id,f.add(e)});h?h.forEach(function(a){R=a.cursos_id,console.log(R)}):console.log("El array no existe en el Local Storage");f.onchange=function(){let a=Number(this.value);a!==0?O.style.display="block":O.style.display="none",m=d.find(t=>t.id===a);let e="";a===1&&(e+=`
        <div class="mb-3">
        <div class="name">Escribir el objetivo particular cognitivo:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,s()),a===2&&(e+=`
        <div class="mb-3">
        <div class="name">Redactar la introducción de los temas a tratar, de 8 a 10 renglones.</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,s()),a===3&&(e+=`
        <div class="mb-3">
        <div class="name">Redactar aquí al menos 3 preguntas para recuperar la experiencia:</div>
        </div>
        <label for="">Cantidad de Preguntas</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas" required>
        <br>
        <div id="divReglas">
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,v(),s()),a===4&&(e+=`
        <div class="mb-3">
        <div class="name">Subtemas:</div>
        <div id="divSubtemas">
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,C(),s()),a===5&&(e+=`
        <div class="mb-3">
        <div class="name">Redactar aquí 3 ejemplos relacionados con las situaciones cotidianas:</div>

        <label for="">Cantidad de ejemplos</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas" required>
        <br>
        <div id="divReglas">
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,v(),s()),a===6&&(e+=`
        <div class="mb-3">
        <div class="name">Redactar actividad:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required placeholder="Ejemplo: Aclaración de dudas"></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,s()),a===7&&(e+=`
        <div class="mb-3">
        <div class="name">Redactar la síntesis aquí:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,s()),a===8&&(e+=`
        <div class="mb-3">
        <div class="name">Redactar por lo menos 3 preguntas:</div>

        <label for="">Cantidad de preguntas</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas" required>
        <br>
        <div id="divReglas">
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,v(),s()),a===9&&(e+=`
        <div class="mb-3">
        <div class="name">Redactar por lo menos 2 preguntas:</div>

        <label for="">Cantidad de preguntas</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas" required>
        <br>
        <div id="divReglas">
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,v(),s()),a===10&&(e+=`
        <div class="mb-3">
        <div class="name">Redactar las referencias:</div>

        <label for="">Cantidad de referencias bibliográficas</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas" required>
        <br>
        <div id="divReglas">
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,v(),s()),q.value=m.id;let i=this.options[this.selectedIndex];q.text=i.text,console.log("El objeto seleccionado es: ",m)};document.getElementById("myForm").addEventListener("submit",a=>{a.preventDefault();const e=route("seccion8a-store"),i=new FormData(a.target),t=Object.fromEntries(i.entries());t.descripcion=q.value,t.momento_aplicacion=q.text,t.seccion_encuadre=M,t.cursos_id=R,t.indice=m.id,document.getElementById("cantidadReglas")&&(x=document.getElementById("cantidadReglas").value),t.actividades=[];for(let l=0;l<x;l++){const u={};u.actividad=document.getElementById(`actividad[${l}]`).value,t.actividades.push(u)}console.log(t);const c={method:"POST",headers:{"Content-Type":"application/json","X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').getAttribute("content")},body:JSON.stringify(t)};fetch(e,c).then(l=>l.json()).then(l=>{console.log(l),O.style.display="none",document.getElementById("divRequerimientos").innerHTML="",console.log("indice para eliminar "+m),d=d.filter(_=>_.id!=m.id),localStorage.setItem("copiaGetDataInicio8a",JSON.stringify(d)),location.reload(),console.log("Despues de el for each",d),f.innerHTML="";let u=document.createElement("option");u.text="Escoja una opción",u.value=0,f.add(u),d.map(_=>{let B=document.createElement("option");B.text=_.descripcion,B.value=_.id,f.add(B)})}),y=!1,localStorage.setItem("habilitarInputs8a",JSON.stringify(y)),b=document.getElementById("etapa_encuadre").value,localStorage.setItem("valorEtapa_encuadre8a",JSON.stringify(b)),E=document.getElementById("material_equipo_apoyo").value,localStorage.setItem("valorMaterial_equipo_apoyo8a",JSON.stringify(E)),I=document.getElementById("duracion").value,localStorage.setItem("duracion8a",JSON.stringify(I)),S=document.getElementById("tecnicas").value,localStorage.setItem("tecnicas8a",JSON.stringify(S)),s();let n=localStorage.getItem("indicesViews"),o=JSON.parse(n);o[13].vista_guardada=0,console.log(o),localStorage.setItem("indicesViews",JSON.stringify(o));let p=localStorage.getItem("curso_id"),r=o[13].nombre_vista_actual,N=route("actualizar-seguimiento",{nombreVista:r,CursoId:p});fetch(N).then(l=>l.json()).then(l=>{console.log(l)})});const C=()=>{let a=R,e=route("seccion8a-getSubtemas",{CursoId:a}),i=0;fetch(e).then(t=>t.json()).then(t=>{console.log(t);let c=document.getElementById("divSubtemas");t.data.map(n=>{let o=document.createElement("div");o.className="row";let p=document.createElement("label");p.textContent="Subtema: "+n,p.style.fontWeight="bold";let r=document.createElement("input");r.className="form-control",r.type="text",r.id="actividad["+i+"]",r.placeholder="Describe el subtema aquí",o.appendChild(p),o.appendChild(r),c.appendChild(o),i++,x=i})})},v=()=>{document.getElementById("cantidadReglas").addEventListener("input",()=>{let a="";const e=event.target.value;for(let i=0;i<e;i++)a+=`
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
        `;document.getElementById("divReglas").innerHTML=a})},s=()=>{if(y===!0)console.log("Estan habilitados los Inputs");else{var a=document.getElementById("etapa_encuadre"),e=document.getElementById("material_equipo_apoyo"),i=document.getElementById("duracion"),t=document.getElementById("tecnicas");a.value=b,e.value=E,i.value=I,t.value=S,a.readOnly=!0,e.readOnly=!0,i.readOnly=!0,t.readOnly=!0}};function L(){let a=localStorage.getItem("indicesViews"),e=JSON.parse(a),i=localStorage.getItem("curso_id"),t=e[13].nombre_vista_actual,c=route("seguimiento8a",{nombreVista:t,CursoId:i});fetch(c).then(n=>n.json()).then(n=>{console.log(n),n.alcanzado&&(e[13].vista_guardada=1,console.log(e),localStorage.setItem("indicesViews",JSON.stringify(e)),g++,localStorage.setItem("vista_indice",JSON.stringify(g)),localStorage.removeItem("copiaGetDataInicio8a"),localStorage.removeItem("valorEtapa_encuadre8a"),localStorage.removeItem("valorMaterial_equipo_apoyo8a"),localStorage.removeItem("duracion8a"),localStorage.removeItem("tecnicas8a"),localStorage.removeItem("habilitarInputs8a"),window.location.href=route("seccion8b-create"))})}
