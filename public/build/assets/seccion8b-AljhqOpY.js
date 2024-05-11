let m=parseInt(localStorage.getItem("vista_indice"));if(localStorage.getItem("indicesViews")){let a=localStorage.getItem("indicesViews"),e=JSON.parse(a),i=e[14];console.log(i.id),console.log(i.vista_guardada);let t=e.find(r=>r.id===m),s=i.id,d=i.vista_guardada===1;s!=m&&d&&O(t.variable_ruta),s!=m&&!d&&O(t.variable_ruta)}else alert("No se ha creado ningun curso, se te redirecionara al panel de control!!"),window.location.href=route("home");function O(a){window.location.href=route(a)}let j=localStorage.getItem("dataObjetivos"),J=[{id:1,descripcion:"a.	Presentará objetivo de la actividad a desarrollar:  "},{id:2,descripcion:"b.	Recuperará la experiencia previa de los participantes:"},{id:3,descripcion:"c.	Presentará la actividad a desarrollar y mencionará el propósito de la misma:"},{id:4,descripcion:"d.	Ejemplificará la actividad a desarrollar  "},{id:5,descripcion:"e.	Resolverá dudas sobre la demostración realizada"},{id:6,descripcion:"f.	Permitirá que los participantes realicen la práctica:"},{id:7,descripcion:"g.	Retroalimentará sobre la práctica:"},{id:8,descripcion:"h.	Usará ejemplos relacionados con los temas y situaciones cotidianas."},{id:9,descripcion:"i.	Preguntará por los conocimientos adquiridos y la utilidad de lo aprendido en su actividad"},{id:10,descripcion:"j.	Recordará al grupo las reglas de operación acordadas"},{id:11,descripcion:"k.	Mencionará al grupo los logros alcanzados y lo que falta por abordar"}];L();let E=JSON.parse(j),n,g,b,f,y,I,x;[...E];localStorage.getItem("copiaGetDataInicio8b")?n=JSON.parse(localStorage.getItem("copiaGetDataInicio8b")):(n=[...J],localStorage.setItem("copiaGetDataInicio8b",JSON.stringify(n)));localStorage.getItem("habilitarInputs8b")?(g=JSON.parse(localStorage.getItem("habilitarInputs8b")),b=JSON.parse(localStorage.getItem("valorEtapa_encuadre8b")),I=JSON.parse(localStorage.getItem("valorMaterial_equipo_apoyo8b")),f=JSON.parse(localStorage.getItem("duracion8b")),y=JSON.parse(localStorage.getItem("tecnicas8b"))):(g=!0,b="",I="",f="",y="");let R=0,M=2;console.log(R);console.log(E);let v=document.getElementById("selectRequerimiento"),u=0,_=document.getElementById("requerimientos_id"),q=document.getElementById("myForm");q.style.display="none";n.map(a=>{let e=document.createElement("option");e.text=a.descripcion,e.value=a.id,v.add(e)});E?E.forEach(function(a){R=a.cursos_id,console.log(R)}):console.log("El array no existe en el Local Storage");v.onchange=function(){let a=Number(this.value);a!==0?q.style.display="block":q.style.display="none",u=n.find(t=>t.id===a);let e="";a===1&&(e+=`
        <div class="mb-3">
        <div class="name">Escribir el objetivo particular psicomotriz:</div>
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
        <div class="name">Redactar aquí al menos 3 preguntas para recuperar la experiencia:</div>
        </div>
        <label for="">Cantidad de Preguntas</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas" required>
        <br>
        <div id="divReglas">
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,p(),o()),a===3&&(e+=`
        <div class="mb-3">
        <div class="name">Escribir la actividad a realizar, y su propósito:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,o()),a===4&&(e+=`
        <div class="mb-3">
        <div class="name">Redactar las actividades a desarrollar:</div>
        </div>
        <label for="">Cantidad de Ejemplos</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas" required>
        <br>
        <div id="divReglas">
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,p(),o()),a===5&&(e+=`
        <div class="mb-3">
        <div class="name">Escribir la actividad a realizar:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required placeholder="Ejemplo: Aclaración de dudas"></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,o()),a===6&&(e+=`
        <div class="mb-3">
        <div class="name">Redactar actividad:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required placeholder="Ejemplo: Desarrollar la práctica entre los participantes"></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,o()),a===7&&(e+=`
        <div class="mb-3">
        <div class="name">Redactar actividad:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required placeholder="Ejemplo: El instructor resolverá las dudas y problemáticas generadas durante la práctica"></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,o()),a===8&&(e+=`
        <div class="mb-3">
        <div class="name">Redactar aquí 3 ejemplos relacionados con las situaciones cotidianas:</div>

        <label for="">Cantidad de ejemplos</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas" required>
        <br>
        <div id="divReglas">
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,p(),o()),a===9&&(e+=`
        <div class="mb-3">
        <div class="name">Redactar aquí al menos 3 preguntas para recuperar la experiencia:</div>

        <label for="">Cantidad de preguntas</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas" required>
        <br>
        <div id="divReglas">
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,p(),o()),a===10&&(e+=`
        <div class="mb-3">
        <div class="name">Redactar la actividad:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required placeholder="Ejemplo: El instructor recordará a los participantes las reglas ya establecidas."></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,o()),a===11&&(e+=`
        <div class="mb-3">
        <div class="name">Redactar aquí los logros y lo que falta por abordar:</div>

        <label for="">Cantidad de actividades</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas" required>
        <br>
        <div id="divReglas">
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,p(),o()),_.value=u.id;let i=this.options[this.selectedIndex];_.text=i.text,console.log("El objeto seleccionado es: ",u)};document.getElementById("myForm").addEventListener("submit",a=>{a.preventDefault();const e=route("seccion8b-store"),i=new FormData(a.target),t=Object.fromEntries(i.entries());t.descripcion=_.value,t.momento_aplicacion=_.text,t.seccion_encuadre=M,t.cursos_id=R,t.indice=u.id,document.getElementById("cantidadReglas")&&(x=document.getElementById("cantidadReglas").value),t.actividades=[];for(let l=0;l<x;l++){const c={};c.actividad=document.getElementById(`actividad[${l}]`).value,t.actividades.push(c)}console.log(t);const s={method:"POST",headers:{"Content-Type":"application/json","X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').getAttribute("content")},body:JSON.stringify(t)};fetch(e,s).then(l=>l.json()).then(l=>{console.log(l),q.style.display="none",document.getElementById("divRequerimientos").innerHTML="",console.log("indice para eliminar "+u),n=n.filter(S=>S.id!=u.id),localStorage.setItem("copiaGetDataInicio8b",JSON.stringify(n)),location.reload(),console.log("Despues de el for each",n),v.innerHTML="";let c=document.createElement("option");c.text="Escoja una opción",c.value=0,v.add(c),n.map(S=>{let h=document.createElement("option");h.text=S.descripcion,h.value=S.id,v.add(h)})}),g=!1,localStorage.setItem("habilitarInputs8b",JSON.stringify(g)),b=document.getElementById("etapa_encuadre").value,localStorage.setItem("valorEtapa_encuadre8b",JSON.stringify(b)),I=document.getElementById("material_equipo_apoyo").value,localStorage.setItem("valorMaterial_equipo_apoyo8b",JSON.stringify(I)),f=document.getElementById("duracion").value,localStorage.setItem("duracion8b",JSON.stringify(f)),y=document.getElementById("tecnicas").value,localStorage.setItem("tecnicas8b",JSON.stringify(y)),o();let d=localStorage.getItem("indicesViews"),r=JSON.parse(d);r[14].vista_guardada=0,console.log(r),localStorage.setItem("indicesViews",JSON.stringify(r));let B=localStorage.getItem("curso_id"),w=r[14].nombre_vista_actual,N=route("actualizar-seguimiento",{nombreVista:w,CursoId:B});fetch(N).then(l=>l.json()).then(l=>{console.log(l)})});const o=()=>{if(g===!0)console.log("Estan habilitados los Inputs");else{var a=document.getElementById("etapa_encuadre"),e=document.getElementById("material_equipo_apoyo"),i=document.getElementById("duracion"),t=document.getElementById("tecnicas");a.value=b,e.value=I,i.value=f,t.value=y,a.readOnly=!0,e.readOnly=!0,i.readOnly=!0,t.readOnly=!0}},p=()=>{document.getElementById("cantidadReglas").addEventListener("input",()=>{let a="";const e=event.target.value;for(let i=0;i<e;i++)a+=`
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
        `;document.getElementById("divReglas").innerHTML=a})};function L(){let a=localStorage.getItem("indicesViews"),e=JSON.parse(a),i=localStorage.getItem("curso_id"),t=e[14].nombre_vista_actual,s=route("seguimiento8b",{nombreVista:t,CursoId:i});fetch(s).then(d=>d.json()).then(d=>{console.log(d),d.alcanzado&&(e[14].vista_guardada=1,console.log(e),localStorage.setItem("indicesViews",JSON.stringify(e)),m++,localStorage.setItem("vista_indice",JSON.stringify(m)),localStorage.removeItem("copiaGetDataInicio8b"),localStorage.removeItem("valorEtapa_encuadre8b"),localStorage.removeItem("valorMaterial_equipo_apoyo8b"),localStorage.removeItem("duracion8b"),localStorage.removeItem("tecnicas8b"),localStorage.removeItem("habilitarInputs8b"),window.location.href=route("seccion8c-create"))})}
