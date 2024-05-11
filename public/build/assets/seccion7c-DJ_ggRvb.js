let r=parseInt(localStorage.getItem("vista_indice"));if(localStorage.getItem("indicesViews")){let e=localStorage.getItem("indicesViews"),a=JSON.parse(e),i=a[11];console.log(i.id),console.log(i.vista_guardada);let t=a.find(E=>E.id===r),l=i.id,s=i.vista_guardada===1;l!=r&&s&&q(t.variable_ruta),l!=r&&!s&&q(t.variable_ruta)}else alert("No se ha creado ningun curso, se te redirecionara al panel de control!!"),window.location.href=route("home");function q(e){window.location.href=route(e)}let O=localStorage.getItem("dataObjetivos"),N=[{id:1,descripcion:"1.	El instructor acordará con el grupo las expectativas del curso/ sesión"},{id:2,descripcion:"2.	El instructor acordará con el grupo las reglas de operación del curso/sesión"},{id:3,descripcion:"3.	El instructor realizará el contrato de aprendizaje de acuerdo con los objetivos"}];J();let y=JSON.parse(O),o,u,m,w;[...y];localStorage.getItem("copiaGetDataInicio7c")?o=JSON.parse(localStorage.getItem("copiaGetDataInicio7c")):(o=[...N],localStorage.setItem("copiaGetDataInicio7c",JSON.stringify(o)));localStorage.getItem("habilitarInputs7c")?(u=JSON.parse(localStorage.getItem("habilitarInputs7c")),m=JSON.parse(localStorage.getItem("valorEtapa_encuadre7c"))):(u=!0,m="");let b=0,R=3;console.log(b);console.log(y);let p=document.getElementById("selectRequerimiento"),d=0,I=document.getElementById("requerimientos_id"),_=document.getElementById("myForm");_.style.display="none";o.map(e=>{let a=document.createElement("option");a.text=e.descripcion,a.value=e.id,p.add(a)});y?y.forEach(function(e){b=e.cursos_id,console.log(b)}):console.log("El array no existe en el Local Storage");p.onchange=function(){let e=Number(this.value);e!==0?_.style.display="block":_.style.display="none",d=o.find(t=>t.id===e);let a="";e===1&&(a+=`
        <div class="mb-3">
        <div class="name">Descripción de la Etapa de Encuadre:</div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="etapa_encuadre" class="form-control" type="text" name="etapa_encuadre" autocomplete="etapa_encuadre" required>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Describir la Actividad: </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Duración (Indicar los minutos de duración): </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="duracion" class="form-control" type="number" name="duracion" autocomplete="duracion" required>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Técnicas: </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="tecnicas" class="form-control" type="text" name="tecnicas" autocomplete="tecnicas" required>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Material y Equipo de Apoyo:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="material_equipo_apoyo" class="form-control" type="text" name="material_equipo_apoyo" autocomplete="material_equipo_apoyo" required></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                    <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=a,f()),e===2&&(a+=`
        <div class="mb-3">
        <div class="name">Descripción de la Etapa de Encuadre:</div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="etapa_encuadre" class="form-control" type="text" name="etapa_encuadre" autocomplete="etapa_encuadre" required>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Duración (Indicar los minutos de duración): </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="duracion" class="form-control" type="number" name="duracion" autocomplete="duracion" required>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Técnicas: </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="tecnicas" class="form-control" type="text" name="tecnicas" autocomplete="tecnicas" required>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Material y Equipo de Apoyo:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="material_equipo_apoyo" class="form-control" type="text" name="material_equipo_apoyo" autocomplete="material_equipo_apoyo" required></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                    <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        <br>
        <label for="">Cantidad de Preguntas</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas" required>
        <br>
        <label for="exampleInputName" class="form-label">Reglas:</label>
        <div id="divReglas">
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=a,B(),f()),e===3&&(a+=`
        <div class="mb-3">
        <div class="name">Descripción de la Etapa de Encuadre:</div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="etapa_encuadre" class="form-control" type="text" name="etapa_encuadre" autocomplete="etapa_encuadre" required>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        <div class="name">Duración (Indicar los minutos de duración): </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="duracion" class="form-control" type="number" name="duracion" autocomplete="duracion" required>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Técnicas: </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="tecnicas" class="form-control" type="text" name="tecnicas" autocomplete="tecnicas" required>
            </div>
        </div>
        
        <div class="mb-3">
        <div class="name">Material y Equipo de Apoyo:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="material_equipo_apoyo" class="form-control" type="text" name="material_equipo_apoyo" autocomplete="material_equipo_apoyo" required></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                    <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        <div id="divDescripciones"></div>
        <div class="mb-3">
        <div class="name">a)	Indicará alcances e instrucciones del contrato (Redactar para que sirve este contrato):</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="descripcion[0]" class="form-control" type="text" name="descripcion[0]" autocomplete="descripcion[0]" required></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                    <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">b)	Indicará el tiempo para realizarlo (Redactar cuanto tiempo tienen para llenarlo): </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="descripcion[1]" class="form-control" type="text" name="descripcion[1]" autocomplete="descripcion[1]" required>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                    <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">c)	Aclarará las dudas que se presenten (Redactar la actividad):</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="descripcion[2]" class="form-control" type="text" name="descripcion[2]" autocomplete="descripcion[2]" placeholder="Ejemplo: Aclarar las dudas que se presenten" required></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                    <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=a,f()),I.value=d.id;let i=this.options[this.selectedIndex];I.text=i.text,console.log("El objeto seleccionado es: ",d)};document.getElementById("myForm").addEventListener("submit",e=>{e.preventDefault();const a=route("seccion7c-store"),i=new FormData(e.target),t=Object.fromEntries(i.entries());t.descripcion=I.value,t.momento_aplicacion=I.text,t.seccion_encuadre=R,t.cursos_id=b,t.indice=d.id;let l=0;document.getElementById("divDescripciones")&&(l=3),t.descripciones=[];for(let n=0;n<l;n++){const c={};c.descripcion=document.getElementById(`descripcion[${n}]`).value,t.descripciones.push(c)}document.getElementById("cantidadReglas")&&(w=document.getElementById("cantidadReglas").value),t.actividades=[];for(let n=0;n<w;n++){const c={};c.actividad=document.getElementById(`actividad[${n}]`).value,t.actividades.push(c)}console.log(t);const s={method:"POST",headers:{"Content-Type":"application/json","X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').getAttribute("content")},body:JSON.stringify(t)};fetch(a,s).then(n=>n.json()).then(n=>{console.log(n),_.style.display="none",document.getElementById("divRequerimientos").innerHTML="",console.log("indice para eliminar "+d),o=o.filter(g=>g.id!=d.id),localStorage.setItem("copiaGetDataInicio7c",JSON.stringify(o)),location.reload(),console.log("Despues de el for each",o),p.innerHTML="";let c=document.createElement("option");c.text="Escoja una opción",c.value=0,p.add(c),o.map(g=>{let S=document.createElement("option");S.text=g.descripcion,S.value=g.id,p.add(S)})}),u=!1,localStorage.setItem("habilitarInputs7c",JSON.stringify(u)),m=document.getElementById("etapa_encuadre").value,localStorage.setItem("valorEtapa_encuadre7c",JSON.stringify(m)),f();let E=localStorage.getItem("indicesViews"),v=JSON.parse(E);v[11].vista_guardada=0,console.log(v),localStorage.setItem("indicesViews",JSON.stringify(v));let x=localStorage.getItem("curso_id"),h=v[11].nombre_vista_actual,D=route("actualizar-seguimiento",{nombreVista:h,CursoId:x});fetch(D).then(n=>n.json()).then(n=>{console.log(n)})});const f=()=>{if(u===!0)console.log("Estan habilitados los Inputs");else{var e=document.getElementById("etapa_encuadre");e.value=m,e.readOnly=!0}},B=()=>{document.getElementById("cantidadReglas").addEventListener("input",()=>{let e="";const a=event.target.value;for(let i=0;i<a;i++)e+=`
        <div class="mb-3">
        <div class="name">Describir la regla </div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad[${i}]" class="form-control" type="text" name="actividad[${i}]" autocomplete="actividad" required></textarea>
                <span class="focus-input100 "></span>
            <span class="symbol-input100">
            <i class="fa fa-envelope"></i>
            </span>
            </div>
        </div>
        `;document.getElementById("divReglas").innerHTML=e})};function J(){let e=localStorage.getItem("indicesViews"),a=JSON.parse(e),i=localStorage.getItem("curso_id"),t=a[11].nombre_vista_actual,l=route("seguimiento7c",{nombreVista:t,CursoId:i});fetch(l).then(s=>s.json()).then(s=>{console.log(s),s.alcanzado&&(a[11].vista_guardada=1,console.log(a),localStorage.setItem("indicesViews",JSON.stringify(a)),r++,localStorage.setItem("vista_indice",JSON.stringify(r)),localStorage.removeItem("copiaGetDataInicio7c"),localStorage.removeItem("valorEtapa_encuadre7c"),localStorage.removeItem("habilitarInputs7c"),window.location.href=route("seccion7d-create"))})}
