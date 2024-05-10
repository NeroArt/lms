let h=parseInt(localStorage.getItem("vista_indice"));if(localStorage.getItem("indicesViews")){let a=localStorage.getItem("indicesViews"),t=JSON.parse(a),e=t[10];console.log(e.id),console.log(e.vista_guardada);let o=t.find(i=>i.id===h),l=e.id,n=e.vista_guardada===1;l!=h&&n&&C(o.variable_ruta),l!=h&&!n&&C(o.variable_ruta)}else alert("No se ha creado ningun curso, se te redirecionara al panel de control!!"),window.location.href=route("home");function C(a){window.location.href=route(a)}let j=localStorage.getItem("dataObjetivos"),D=[{id:1,descripcion:"1.	El instructor presentará los objetivos del curso/sesión"},{id:2,descripcion:"2.	El instructor presentará la descripción general del desarrollo del curso/sesión"},{id:3,descripcion:"3.	El instructor dará a conocer el temario del curso"},{id:4,descripcion:"4.	El instructor creará minimo tres preguntas, relacionadas con el contexto/experiencia/capacitados"},{id:5,descripcion:"5.	El instructor explicará los beneficios del curso y su relación con la experiencia laboral y personal."},{id:6,descripcion:"6.	El instructor especificará el tipo de evaluaciones a realizar, los instrumentos a utilizar, el momento de aplicarlos y los criterios a utilizar."}],y=JSON.parse(j),r,b,f,g,B;[...y];localStorage.getItem("copiaGetDataInicio")?r=JSON.parse(localStorage.getItem("copiaGetDataInicio")):r=[...D];localStorage.getItem("habilitarInputs")?(b=JSON.parse(localStorage.getItem("habilitarInputs")),f=JSON.parse(localStorage.getItem("valorEtapa_encuadre")),g=JSON.parse(localStorage.getItem("valorMaterial_equipo_apoyo"))):(b=!0,f="",g="");let c=0,O=2;console.log(c);console.log(y);let v=document.getElementById("selectRequerimiento"),m=0,E=document.getElementById("requerimientos_id"),_=document.getElementById("myForm");_.style.display="none";r.map(a=>{let t=document.createElement("option");t.text=a.descripcion,t.value=a.id,v.add(t)});y?y.forEach(function(a){c=a.cursos_id,console.log(c)}):console.log("El array no existe en el Local Storage");v.onchange=function(){let a=Number(this.value);a!==0?_.style.display="block":_.style.display="none",m=r.find(o=>o.id===a);let t="";a===1&&(t+=`
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
        <label for="exampleInputName" class="form-label">Objetivo General:</label>
        <div id="divObjetivoGeneral">
        </div>
        <br>
        <label for="exampleInputName" class="form-label">Objetivos Particulares:</label>
        <div id="divObjetivosParticulares">
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
        `,document.getElementById("divRequerimientos").innerHTML=t,S(),N(),u()),a===2&&(t+=`
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
        <div class="name">Material y Equipo de Apoyo:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="material_equipo_apoyo" class="form-control" type="text" name="material_equipo_apoyo" autocomplete="material_equipo_apoyo" required></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                    <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        
        <div class="mb-3">
        <div class="name">Descripcion del Curso:</div>
        <div id="divDescripcionCurso"></div>
        
        <div class="mb-3">
        <div class="name">Duración (Indicar los minutos de duración): </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="duracion" class="form-control" type="number" name="duracion" autocomplete="duracion">
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Técnicas: </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="tecnicas" class="form-control" type="text" name="tecnicas" autocomplete="tecnicas" required>
            </div>
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=t,u(),R()),a===3&&(t+=`
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
        <label for="exampleInputName" class="form-label">Temario del Curso:</label>
        <div id="divTemario">
        </div>
        <br>
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
        `,document.getElementById("divRequerimientos").innerHTML=t,u(),T()),a===4&&(t+=`
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
        <input type="number" name="cantidadPreguntas" name="cantidadPreguntas" id="cantidadPreguntas" required>
        <br>
        <label for="exampleInputName" class="form-label">Preguntas:</label>
        <div id="divPreguntas">
        </div>
        <br>
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
        `,document.getElementById("divRequerimientos").innerHTML=t,L(),u()),a===5&&(t+=`
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
        <label for="exampleInputName" class="form-label">Beneficios del Curso:</label>
        <div id="divBeneficios">
        </div>
        <br>
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
        `,document.getElementById("divRequerimientos").innerHTML=t,u(),M()),a===6&&(t+=`
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
        <div class="name">Material y Equipo de Apoyo:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="material_equipo_apoyo" class="form-control" type="text" name="material_equipo_apoyo" autocomplete="material_equipo_apoyo" required></textarea>
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
        <br>
        <label for="exampleInputName" class="form-label">Evaluaciones del Curso:</label>
        <div id="divEvaluaciones">
        </div>
        <br>
        <div class="mb-3">
        <div class="name">Redactar Instrumento de evaluación Inicial, porcentaje y describir Finalidad/beneficio/ventaja: </div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="evaluacion[0]" class="form-control" type="text" name="evaluacion[0]" autocomplete="evaluacion" required> </textarea>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Redactar Instrumento de evaluación Intermedio, porcentaje y describir Finalidad/beneficio/ventaja: </div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="evaluacion[1]" class="form-control" type="text" name="evaluacion[1]" autocomplete="evaluacion" required></textarea>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Redactar Instrumento de evaluación Cierre, porcentaje y describir Finalidad/beneficio/ventaja: </div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="evaluacion[2]" class="form-control" type="text" name="evaluacion[2]" autocomplete="evaluacion" required></textarea>
            </div>
        </div>

        `,document.getElementById("divRequerimientos").innerHTML=t,u(),P()),E.value=m.id;let e=this.options[this.selectedIndex];E.text=e.text,console.log("El objeto seleccionado es: ",m)};document.getElementById("myForm").addEventListener("submit",a=>{a.preventDefault();const t=route("seccion7b-store"),e=new FormData(a.target),o=Object.fromEntries(e.entries());o.descripcion=E.value,o.momento_aplicacion=E.text,o.seccion_encuadre=O,o.cursos_id=c,o.indice=m.id,o.porcentaje;let l=0;document.getElementById("divEvaluaciones")&&(l=3),o.evaluaciones=[];for(let i=0;i<l;i++){const s={};s.evaluacion=document.getElementById(`evaluacion[${i}]`).value,o.evaluaciones.push(s)}document.getElementById("cantidadPreguntas")&&(B=document.getElementById("cantidadPreguntas").value),o.actividades=[];for(let i=0;i<B;i++){const s={};s.actividad=document.getElementById(`actividad[${i}]`).value,o.actividades.push(s)}console.log(o);const n={method:"POST",headers:{"Content-Type":"application/json","X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').getAttribute("content")},body:JSON.stringify(o)};fetch(t,n).then(i=>i.json()).then(i=>{console.log(i),_.style.display="none",document.getElementById("divRequerimientos").innerHTML="",console.log("indice para eliminar "+m),r=r.filter(d=>d.id!=m.id),localStorage.setItem("copiaGetDataInicio",JSON.stringify(r)),location.reload(),console.log("Despues de el for each",copiaGetDataRequerimientos),v.innerHTML="";let s=document.createElement("option");s.text="Escoja una opción",s.value=0,v.add(s),r.map(d=>{let p=document.createElement("option");p.text=d.descripcion,p.value=d.id,v.add(p)})}),b=!1,localStorage.setItem("habilitarInputs",JSON.stringify(b)),f=document.getElementById("etapa_encuadre").value,localStorage.setItem("valorEtapa_encuadre",JSON.stringify(f)),g=document.getElementById("material_equipo_apoyo").value,localStorage.setItem("valorMaterial_equipo_apoyo",JSON.stringify(g)),u()});const S=()=>{let a=c,t=route("seccion7b-getGeneral",{CursoId:a});fetch(t).then(e=>e.json()).then(e=>{console.log(e);let o=document.getElementById("divObjetivoGeneral");e.data.map(l=>{let n=document.createElement("div");n.className="row";let i=document.createElement("label");i.textContent="Objetivo: "+l.descripcion,i.style.fontWeight="bold",n.appendChild(i),o.appendChild(n)})})},N=()=>{let a=c,t=route("seccion7b-getParticulares",{CursoId:a});fetch(t).then(e=>e.json()).then(e=>{console.log(e);let o=document.getElementById("divObjetivosParticulares");e.data.map(l=>{let n=document.createElement("div");n.className="row";let i=document.createElement("label");i.textContent="Objetivo: "+l.descripcion,i.style.fontWeight="bold",n.appendChild(i),o.appendChild(n)})})},T=()=>{let a=c,t=route("seccion7b-getTemario",{CursoId:a});fetch(t).then(e=>e.json()).then(e=>{console.log("Temario es:",e);let o=document.getElementById("divTemario");e.data.map(l=>{let n=document.createElement("div");n.className="row";let i=document.createElement("label");i.textContent=l,i.style.fontWeight="bold",n.appendChild(i),o.appendChild(n)})})},M=()=>{let a=c,t=route("seccion7b-getBeneficios",{CursoId:a});fetch(t).then(e=>e.json()).then(e=>{console.log("Beneficio es:",e);let o=document.getElementById("divBeneficios");e.data.map(l=>{let n=document.createElement("div");n.className="row";let i=document.createElement("label");i.textContent=l,i.style.fontWeight="bold",n.appendChild(i),o.appendChild(n)})})},P=()=>{let a=c,t=route("seccion7b-getEvaluaciones",{CursoId:a});fetch(t).then(e=>e.json()).then(e=>{console.log("Evaluacion es:",e);let o=document.getElementById("divEvaluaciones");e.data.map(l=>{let n=document.createElement("div");n.className="row";let i=document.createElement("div");i.className="col";let s=document.createElement("label");s.innerHTML="<b>Momento de aplicación:</b> "+l.momento_aplicacion,i.appendChild(s),n.appendChild(i);let d=document.createElement("div");d.className="col";let p=document.createElement("label");p.innerHTML="<b>Aspecto a evaluar:</b> "+l.aspecto,d.appendChild(p),n.appendChild(d);let I=document.createElement("div");I.className="col";let x=document.createElement("label");x.innerHTML="<b>Instrumento de evaluación:</b> "+l.instrumento_evaluacion,I.appendChild(x),n.appendChild(I);let q=document.createElement("div");q.className="col";let w=document.createElement("label");w.innerHTML="<b>Porcentaje de ponderación:</b> "+l.porcentaje+"%",q.appendChild(w),n.appendChild(q),o.appendChild(n)})})},R=()=>{let a=c,t=route("seccion7b-getDescripcionCurso",{CursoId:a});fetch(t).then(e=>e.json()).then(e=>{console.log(e);let o=document.getElementById("divDescripcionCurso");e.data.map(l=>{let n=document.createElement("div");n.className="row";let i=document.createElement("label");i.textContent="Descripcion: "+l.descripcion_curso,i.style.fontWeight="bold",n.appendChild(i),o.appendChild(n)})})},u=()=>{if(b===!0)console.log("Estan habilitados los Inputs");else{var a=document.getElementById("etapa_encuadre"),t=document.getElementById("material_equipo_apoyo");a.value=f,t.value=g,a.readOnly=!0,t.readOnly=!0}},L=()=>{document.getElementById("cantidadPreguntas").addEventListener("input",()=>{let a="";const t=event.target.value;for(let e=0;e<t;e++)a+=`
        <div class="mb-3">
        <div class="name">Pregunta </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="actividad[${e}]" class="form-control" type="text" name="actividad[${e}]" autocomplete="actividad" required>
                <span class="focus-input100 "></span>
        <span class="symbol-input100">
            <i class="fa fa-envelope"></i>
        </span>
            </div>
        </div>
        `;document.getElementById("divPreguntas").innerHTML=a})};
