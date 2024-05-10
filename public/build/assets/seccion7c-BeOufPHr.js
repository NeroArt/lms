let I=parseInt(localStorage.getItem("vista_indice"));if(localStorage.getItem("indicesViews")){let e=localStorage.getItem("indicesViews"),a=JSON.parse(e),t=a[11];console.log(t.id),console.log(t.vista_guardada);let i=a.find(n=>n.id===I),l=t.id,u=t.vista_guardada===1;l!=I&&u&&E(i.variable_ruta),l!=I&&!u&&E(i.variable_ruta)}else alert("No se ha creado ningun curso, se te redirecionara al panel de control!!"),window.location.href=route("home");function E(e){window.location.href=route(e)}let x=localStorage.getItem("dataObjetivos"),S=[{id:1,descripcion:"1.	El instructor acordará con el grupo las expectativas del curso/ sesión"},{id:2,descripcion:"2.	El instructor acordará con el grupo las reglas de operación del curso/sesión"},{id:3,descripcion:"3.	El instructor realizará el contrato de aprendizaje de acuerdo con los objetivos"}],g=JSON.parse(x),c,r,p,q;[...g];localStorage.getItem("copiaGetDataInicio7c")?c=JSON.parse(localStorage.getItem("copiaGetDataInicio7c")):c=[...S];localStorage.getItem("habilitarInputs7c")?(r=JSON.parse(localStorage.getItem("habilitarInputs7c")),p=JSON.parse(localStorage.getItem("valorEtapa_encuadre7c"))):(r=!0,p="");let f=0,w=3;console.log(f);console.log(g);let d=document.getElementById("selectRequerimiento"),o=0,y=document.getElementById("requerimientos_id"),b=document.getElementById("myForm");b.style.display="none";c.map(e=>{let a=document.createElement("option");a.text=e.descripcion,a.value=e.id,d.add(a)});g?g.forEach(function(e){f=e.cursos_id,console.log(f)}):console.log("El array no existe en el Local Storage");d.onchange=function(){let e=Number(this.value);e!==0?b.style.display="block":b.style.display="none",o=c.find(i=>i.id===e);let a="";e===1&&(a+=`
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
        `,document.getElementById("divRequerimientos").innerHTML=a,v()),e===2&&(a+=`
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
        `,document.getElementById("divRequerimientos").innerHTML=a,h(),v()),e===3&&(a+=`
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
        `,document.getElementById("divRequerimientos").innerHTML=a,v()),y.value=o.id;let t=this.options[this.selectedIndex];y.text=t.text,console.log("El objeto seleccionado es: ",o)};document.getElementById("myForm").addEventListener("submit",e=>{e.preventDefault();const a=route("seccion7c-store"),t=new FormData(e.target),i=Object.fromEntries(t.entries());i.descripcion=y.value,i.momento_aplicacion=y.text,i.seccion_encuadre=w,i.cursos_id=f,i.indice=o.id;let l=0;document.getElementById("divDescripciones")&&(l=3),i.descripciones=[];for(let n=0;n<l;n++){const s={};s.descripcion=document.getElementById(`descripcion[${n}]`).value,i.descripciones.push(s)}document.getElementById("cantidadReglas")&&(q=document.getElementById("cantidadReglas").value),i.actividades=[];for(let n=0;n<q;n++){const s={};s.actividad=document.getElementById(`actividad[${n}]`).value,i.actividades.push(s)}console.log(i);const u={method:"POST",headers:{"Content-Type":"application/json","X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').getAttribute("content")},body:JSON.stringify(i)};fetch(a,u).then(n=>n.json()).then(n=>{console.log(n),b.style.display="none",document.getElementById("divRequerimientos").innerHTML="",console.log("indice para eliminar "+o),c=c.filter(m=>m.id!=o.id),localStorage.setItem("copiaGetDataInicio7c",JSON.stringify(c)),location.reload(),console.log("Despues de el for each",c),d.innerHTML="";let s=document.createElement("option");s.text="Escoja una opción",s.value=0,d.add(s),c.map(m=>{let _=document.createElement("option");_.text=m.descripcion,_.value=m.id,d.add(_)})}),r=!1,localStorage.setItem("habilitarInputs7c",JSON.stringify(r)),p=document.getElementById("etapa_encuadre").value,localStorage.setItem("valorEtapa_encuadre7c",JSON.stringify(p)),v()});const v=()=>{if(r===!0)console.log("Estan habilitados los Inputs");else{var e=document.getElementById("etapa_encuadre");e.value=p,e.readOnly=!0}},h=()=>{document.getElementById("cantidadReglas").addEventListener("input",()=>{let e="";const a=event.target.value;for(let t=0;t<a;t++)e+=`
        <div class="mb-3">
        <div class="name">Describir la regla </div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad[${t}]" class="form-control" type="text" name="actividad[${t}]" autocomplete="actividad" required></textarea>
                <span class="focus-input100 "></span>
            <span class="symbol-input100">
            <i class="fa fa-envelope"></i>
            </span>
            </div>
        </div>
        `;document.getElementById("divReglas").innerHTML=e})};
