let q=parseInt(localStorage.getItem("vista_indice"));if(localStorage.getItem("indicesViews")){let a=localStorage.getItem("indicesViews"),e=JSON.parse(a),i=e[13];console.log(i.id),console.log(i.vista_guardada);let t=e.find(n=>n.id===q),r=i.id,d=i.vista_guardada===1;r!=q&&d&&_(t.variable_ruta),r!=q&&!d&&_(t.variable_ruta)}else alert("No se ha creado ningun curso, se te redirecionara al panel de control!!"),window.location.href=route("home");function _(a){window.location.href=route(a)}let B=localStorage.getItem("dataObjetivos"),x=[{id:1,descripcion:"a.	Presentará el objetivo del tema:  "},{id:2,descripcion:"b.	Realizará una introducción general al contenido temático:"},{id:3,descripcion:"c.	Recuperará la experiencia previa de los participantes, preguntando sobre sus conocimientos previos del contenido temático:"},{id:4,descripcion:"d.	Desarrollará el contenido "},{id:5,descripcion:"e.	Utilizará ejemplos relacionados con los temas y las situaciones cotidianas"},{id:6,descripcion:"f.	Resolverá las dudas que se presenten y/o manifiesten los participantes:"},{id:7,descripcion:"g.	Realizará la síntesis haciendo énfasis en los aspectos sobresalientes, invitando a los participantes a participar:"},{id:8,descripcion:"h.	Planteará preguntas dirigidas que verifiquen la comprensión del tema "},{id:9,descripcion:"i.	Promoverá comentarios sobre la utilidad y aplicación de los temas en su vida profesional y personal:"},{id:10,descripcion:"j.	Mencionará las referencias bibliográficas que ha utilizado en el desarrollo de su tema."}],R=JSON.parse(B),s,v,g,f,y,b,h;[...R];localStorage.getItem("copiaGetDataInicio8a")?s=JSON.parse(localStorage.getItem("copiaGetDataInicio8a")):s=[...x];localStorage.getItem("habilitarInputs8a")?(v=JSON.parse(localStorage.getItem("habilitarInputs8a")),g=JSON.parse(localStorage.getItem("valorEtapa_encuadre8a")),b=JSON.parse(localStorage.getItem("valorMaterial_equipo_apoyo8a")),f=JSON.parse(localStorage.getItem("duracion8a")),y=JSON.parse(localStorage.getItem("tecnicas8a"))):(v=!0,g="",b="",f="",y="");let I=0,O=1;console.log(I);console.log(R);let p=document.getElementById("selectRequerimiento"),u=0,E=document.getElementById("requerimientos_id"),S=document.getElementById("myForm");S.style.display="none";s.map(a=>{let e=document.createElement("option");e.text=a.descripcion,e.value=a.id,p.add(e)});R?R.forEach(function(a){I=a.cursos_id,console.log(I)}):console.log("El array no existe en el Local Storage");p.onchange=function(){let a=Number(this.value);a!==0?S.style.display="block":S.style.display="none",u=s.find(t=>t.id===a);let e="";a===1&&(e+=`
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
        `,document.getElementById("divRequerimientos").innerHTML=e,o()),a===2&&(e+=`
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
        `,document.getElementById("divRequerimientos").innerHTML=e,o()),a===3&&(e+=`
        <div class="mb-3">
        <div class="name">Redactar aquí al menos 3 preguntas para recuperar la experiencia:</div>
        </div>
        <label for="">Cantidad de Preguntas</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas" required>
        <br>
        <div id="divReglas">
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,m(),o()),a===4&&(e+=`
        <div class="mb-3">
        <div class="name">Subtemas:</div>
        <div id="divSubtemas">
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,N(),o()),a===5&&(e+=`
        <div class="mb-3">
        <div class="name">Redactar aquí 3 ejemplos relacionados con las situaciones cotidianas:</div>

        <label for="">Cantidad de ejemplos</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas" required>
        <br>
        <div id="divReglas">
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,m(),o()),a===6&&(e+=`
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
        `,document.getElementById("divRequerimientos").innerHTML=e,o()),a===7&&(e+=`
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
        `,document.getElementById("divRequerimientos").innerHTML=e,o()),a===8&&(e+=`
        <div class="mb-3">
        <div class="name">Redactar por lo menos 3 preguntas:</div>

        <label for="">Cantidad de preguntas</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas" required>
        <br>
        <div id="divReglas">
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,m(),o()),a===9&&(e+=`
        <div class="mb-3">
        <div class="name">Redactar por lo menos 2 preguntas:</div>

        <label for="">Cantidad de preguntas</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas" required>
        <br>
        <div id="divReglas">
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,m(),o()),a===10&&(e+=`
        <div class="mb-3">
        <div class="name">Redactar las referencias:</div>

        <label for="">Cantidad de referencias bibliográficas</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas" required>
        <br>
        <div id="divReglas">
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,m(),o()),E.value=u.id;let i=this.options[this.selectedIndex];E.text=i.text,console.log("El objeto seleccionado es: ",u)};document.getElementById("myForm").addEventListener("submit",a=>{a.preventDefault();const e=route("seccion8a-store"),i=new FormData(a.target),t=Object.fromEntries(i.entries());t.descripcion=E.value,t.momento_aplicacion=E.text,t.seccion_encuadre=O,t.cursos_id=I,t.indice=u.id,document.getElementById("cantidadReglas")&&(h=document.getElementById("cantidadReglas").value),t.actividades=[];for(let d=0;d<h;d++){const n={};n.actividad=document.getElementById(`actividad[${d}]`).value,t.actividades.push(n)}console.log(t);const r={method:"POST",headers:{"Content-Type":"application/json","X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').getAttribute("content")},body:JSON.stringify(t)};fetch(e,r).then(d=>d.json()).then(d=>{console.log(d),S.style.display="none",document.getElementById("divRequerimientos").innerHTML="",console.log("indice para eliminar "+u),s=s.filter(c=>c.id!=u.id),localStorage.setItem("copiaGetDataInicio8a",JSON.stringify(s)),location.reload(),console.log("Despues de el for each",s),p.innerHTML="";let n=document.createElement("option");n.text="Escoja una opción",n.value=0,p.add(n),s.map(c=>{let l=document.createElement("option");l.text=c.descripcion,l.value=c.id,p.add(l)})}),v=!1,localStorage.setItem("habilitarInputs8a",JSON.stringify(v)),g=document.getElementById("etapa_encuadre").value,localStorage.setItem("valorEtapa_encuadre8a",JSON.stringify(g)),b=document.getElementById("material_equipo_apoyo").value,localStorage.setItem("valorMaterial_equipo_apoyo8a",JSON.stringify(b)),f=document.getElementById("duracion").value,localStorage.setItem("duracion8a",JSON.stringify(f)),y=document.getElementById("tecnicas").value,localStorage.setItem("tecnicas8a",JSON.stringify(y)),o()});const N=()=>{let a=I,e=route("seccion8a-getSubtemas",{CursoId:a}),i=0;fetch(e).then(t=>t.json()).then(t=>{console.log(t);let r=document.getElementById("divSubtemas");t.data.map(d=>{let n=document.createElement("div");n.className="row";let c=document.createElement("label");c.textContent="Subtema: "+d,c.style.fontWeight="bold";let l=document.createElement("input");l.className="form-control",l.type="text",l.id="actividad["+i+"]",l.placeholder="Describe el subtema aquí",n.appendChild(c),n.appendChild(l),r.appendChild(n),i++,h=i})})},m=()=>{document.getElementById("cantidadReglas").addEventListener("input",()=>{let a="";const e=event.target.value;for(let i=0;i<e;i++)a+=`
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
        `;document.getElementById("divReglas").innerHTML=a})},o=()=>{if(v===!0)console.log("Estan habilitados los Inputs");else{var a=document.getElementById("etapa_encuadre"),e=document.getElementById("material_equipo_apoyo"),i=document.getElementById("duracion"),t=document.getElementById("tecnicas");a.value=g,e.value=b,i.value=f,t.value=y,a.readOnly=!0,e.readOnly=!0,i.readOnly=!0,t.readOnly=!0}};
