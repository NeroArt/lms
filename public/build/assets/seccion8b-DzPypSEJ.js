let S=parseInt(localStorage.getItem("vista_indice"));if(localStorage.getItem("indicesViews")){let a=localStorage.getItem("indicesViews"),e=JSON.parse(a),t=e[14];console.log(t.id),console.log(t.vista_guardada);let i=e.find(o=>o.id===S),b=t.id,n=t.vista_guardada===1;b!=S&&n&&_(i.variable_ruta),b!=S&&!n&&_(i.variable_ruta)}else alert("No se ha creado ningun curso, se te redirecionara al panel de control!!"),window.location.href=route("home");function _(a){window.location.href=route(a)}let B=localStorage.getItem("dataObjetivos"),h=[{id:1,descripcion:"a.	Presentará objetivo de la actividad a desarrollar:  "},{id:2,descripcion:"b.	Recuperará la experiencia previa de los participantes:"},{id:3,descripcion:"c.	Presentará la actividad a desarrollar y mencionará el propósito de la misma:"},{id:4,descripcion:"d.	Ejemplificará la actividad a desarrollar  "},{id:5,descripcion:"e.	Resolverá dudas sobre la demostración realizada"},{id:6,descripcion:"f.	Permitirá que los participantes realicen la práctica:"},{id:7,descripcion:"g.	Retroalimentará sobre la práctica:"},{id:8,descripcion:"h.	Usará ejemplos relacionados con los temas y situaciones cotidianas."},{id:9,descripcion:"i.	Preguntará por los conocimientos adquiridos y la utilidad de lo aprendido en su actividad"},{id:10,descripcion:"j.	Recordará al grupo las reglas de operación acordadas"},{id:11,descripcion:"k.	Mencionará al grupo los logros alcanzados y lo que falta por abordar"}],f=JSON.parse(B),l,p,u,m,v,g,x;[...f];localStorage.getItem("copiaGetDataInicio8b")?l=JSON.parse(localStorage.getItem("copiaGetDataInicio8b")):l=[...h];localStorage.getItem("habilitarInputs8b")?(p=JSON.parse(localStorage.getItem("habilitarInputs8b")),u=JSON.parse(localStorage.getItem("valorEtapa_encuadre8b")),g=JSON.parse(localStorage.getItem("valorMaterial_equipo_apoyo8b")),m=JSON.parse(localStorage.getItem("duracion8b")),v=JSON.parse(localStorage.getItem("tecnicas8b"))):(p=!0,u="",g="",m="",v="");let I=0,O=2;console.log(I);console.log(f);let r=document.getElementById("selectRequerimiento"),s=0,E=document.getElementById("requerimientos_id"),R=document.getElementById("myForm");R.style.display="none";l.map(a=>{let e=document.createElement("option");e.text=a.descripcion,e.value=a.id,r.add(e)});f?f.forEach(function(a){I=a.cursos_id,console.log(I)}):console.log("El array no existe en el Local Storage");r.onchange=function(){let a=Number(this.value);a!==0?R.style.display="block":R.style.display="none",s=l.find(i=>i.id===a);let e="";a===1&&(e+=`
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
        `,document.getElementById("divRequerimientos").innerHTML=e,d()),a===2&&(e+=`
        <div class="mb-3">
        <div class="name">Redactar aquí al menos 3 preguntas para recuperar la experiencia:</div>
        </div>
        <label for="">Cantidad de Preguntas</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas" required>
        <br>
        <div id="divReglas">
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,c(),d()),a===3&&(e+=`
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
        `,document.getElementById("divRequerimientos").innerHTML=e,d()),a===4&&(e+=`
        <div class="mb-3">
        <div class="name">Redactar las actividades a desarrollar:</div>
        </div>
        <label for="">Cantidad de Ejemplos</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas" required>
        <br>
        <div id="divReglas">
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,c(),d()),a===5&&(e+=`
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
        `,document.getElementById("divRequerimientos").innerHTML=e,d()),a===6&&(e+=`
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
        `,document.getElementById("divRequerimientos").innerHTML=e,d()),a===7&&(e+=`
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
        `,document.getElementById("divRequerimientos").innerHTML=e,d()),a===8&&(e+=`
        <div class="mb-3">
        <div class="name">Redactar aquí 3 ejemplos relacionados con las situaciones cotidianas:</div>

        <label for="">Cantidad de ejemplos</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas" required>
        <br>
        <div id="divReglas">
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,c(),d()),a===9&&(e+=`
        <div class="mb-3">
        <div class="name">Redactar aquí al menos 3 preguntas para recuperar la experiencia:</div>

        <label for="">Cantidad de preguntas</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas" required>
        <br>
        <div id="divReglas">
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,c(),d()),a===10&&(e+=`
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
        `,document.getElementById("divRequerimientos").innerHTML=e,d()),a===11&&(e+=`
        <div class="mb-3">
        <div class="name">Redactar aquí los logros y lo que falta por abordar:</div>

        <label for="">Cantidad de actividades</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas" required>
        <br>
        <div id="divReglas">
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,c(),d()),E.value=s.id;let t=this.options[this.selectedIndex];E.text=t.text,console.log("El objeto seleccionado es: ",s)};document.getElementById("myForm").addEventListener("submit",a=>{a.preventDefault();const e=route("seccion8b-store"),t=new FormData(a.target),i=Object.fromEntries(t.entries());i.descripcion=E.value,i.momento_aplicacion=E.text,i.seccion_encuadre=O,i.cursos_id=I,i.indice=s.id,document.getElementById("cantidadReglas")&&(x=document.getElementById("cantidadReglas").value),i.actividades=[];for(let n=0;n<x;n++){const o={};o.actividad=document.getElementById(`actividad[${n}]`).value,i.actividades.push(o)}console.log(i);const b={method:"POST",headers:{"Content-Type":"application/json","X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').getAttribute("content")},body:JSON.stringify(i)};fetch(e,b).then(n=>n.json()).then(n=>{console.log(n),R.style.display="none",document.getElementById("divRequerimientos").innerHTML="",console.log("indice para eliminar "+s),l=l.filter(y=>y.id!=s.id),localStorage.setItem("copiaGetDataInicio8b",JSON.stringify(l)),location.reload(),console.log("Despues de el for each",l),r.innerHTML="";let o=document.createElement("option");o.text="Escoja una opción",o.value=0,r.add(o),l.map(y=>{let q=document.createElement("option");q.text=y.descripcion,q.value=y.id,r.add(q)})}),p=!1,localStorage.setItem("habilitarInputs8b",JSON.stringify(p)),u=document.getElementById("etapa_encuadre").value,localStorage.setItem("valorEtapa_encuadre8b",JSON.stringify(u)),g=document.getElementById("material_equipo_apoyo").value,localStorage.setItem("valorMaterial_equipo_apoyo8b",JSON.stringify(g)),m=document.getElementById("duracion").value,localStorage.setItem("duracion8b",JSON.stringify(m)),v=document.getElementById("tecnicas").value,localStorage.setItem("tecnicas8b",JSON.stringify(v)),d()});const d=()=>{if(p===!0)console.log("Estan habilitados los Inputs");else{var a=document.getElementById("etapa_encuadre"),e=document.getElementById("material_equipo_apoyo"),t=document.getElementById("duracion"),i=document.getElementById("tecnicas");a.value=u,e.value=g,t.value=m,i.value=v,a.readOnly=!0,e.readOnly=!0,t.readOnly=!0,i.readOnly=!0}},c=()=>{document.getElementById("cantidadReglas").addEventListener("input",()=>{let a="";const e=event.target.value;for(let t=0;t<e;t++)a+=`
        <div class="mb-3">
        <div class="name">Redactar </div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad[${t}]" class="form-control" type="text" name="actividad[${t}]" autocomplete="actividad" required></textarea>
                <span class="focus-input100 "></span>
            <span class="symbol-input100">
            <i class="fa fa-envelope"></i>
            </span>
            </div>
        </div>
        `;document.getElementById("divReglas").innerHTML=a})};
