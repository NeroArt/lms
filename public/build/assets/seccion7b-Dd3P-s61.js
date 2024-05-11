let f=parseInt(localStorage.getItem("vista_indice"));if(localStorage.getItem("indicesViews")){let t=localStorage.getItem("indicesViews"),a=JSON.parse(t),e=a[10];console.log(e.id),console.log(e.vista_guardada);let n=a.find(o=>o.id===f),l=e.id,i=e.vista_guardada===1;l!=f&&i&&S(n.variable_ruta),l!=f&&!i&&S(n.variable_ruta)}else alert("No se ha creado ningun curso, se te redirecionara al panel de control!!"),window.location.href=route("home");function S(t){window.location.href=route(t)}let N=localStorage.getItem("dataObjetivos"),j=[{id:1,descripcion:"1.	El instructor presentará los objetivos del curso/sesión"},{id:2,descripcion:"2.	El instructor presentará la descripción general del desarrollo del curso/sesión"},{id:3,descripcion:"3.	El instructor dará a conocer el temario del curso"},{id:4,descripcion:"4.	El instructor creará minimo tres preguntas, relacionadas con el contexto/experiencia/capacitados"},{id:5,descripcion:"5.	El instructor explicará los beneficios del curso y su relación con la experiencia laboral y personal."},{id:6,descripcion:"6.	El instructor especificará el tipo de evaluaciones a realizar, los instrumentos a utilizar, el momento de aplicarlos y los criterios a utilizar."}];H();let q=JSON.parse(N),r,_,I,E,O;[...q];localStorage.getItem("copiaGetDataInicio")?r=JSON.parse(localStorage.getItem("copiaGetDataInicio")):(r=[...j],localStorage.setItem("copiaGetDataInicio",JSON.stringify(r)));localStorage.getItem("habilitarInputs")?(_=JSON.parse(localStorage.getItem("habilitarInputs")),I=JSON.parse(localStorage.getItem("valorEtapa_encuadre")),E=JSON.parse(localStorage.getItem("valorMaterial_equipo_apoyo"))):(_=!0,I="",E="");let d=0,B=2;console.log(d);console.log(q);let y=document.getElementById("selectRequerimiento"),v=0,x=document.getElementById("requerimientos_id"),w=document.getElementById("myForm");w.style.display="none";r.map(t=>{let a=document.createElement("option");a.text=t.descripcion,a.value=t.id,y.add(a)});q?q.forEach(function(t){d=t.cursos_id,console.log(d)}):console.log("El array no existe en el Local Storage");y.onchange=function(){let t=Number(this.value);t!==0?w.style.display="block":w.style.display="none",v=r.find(n=>n.id===t);let a="";t===1&&(a+=`
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
        `,document.getElementById("divRequerimientos").innerHTML=a,D(),T(),m()),t===2&&(a+=`
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
        `,document.getElementById("divRequerimientos").innerHTML=a,m(),J()),t===3&&(a+=`
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
        `,document.getElementById("divRequerimientos").innerHTML=a,m(),M()),t===4&&(a+=`
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
        `,document.getElementById("divRequerimientos").innerHTML=a,L(),m()),t===5&&(a+=`
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
        `,document.getElementById("divRequerimientos").innerHTML=a,m(),P()),t===6&&(a+=`
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

        `,document.getElementById("divRequerimientos").innerHTML=a,m(),R()),x.value=v.id;let e=this.options[this.selectedIndex];x.text=e.text,console.log("El objeto seleccionado es: ",v)};document.getElementById("myForm").addEventListener("submit",t=>{t.preventDefault();const a=route("seccion7b-store"),e=new FormData(t.target),n=Object.fromEntries(e.entries());n.descripcion=x.value,n.momento_aplicacion=x.text,n.seccion_encuadre=B,n.cursos_id=d,n.indice=v.id,n.porcentaje;let l=0;document.getElementById("divEvaluaciones")&&(l=3),n.evaluaciones=[];for(let s=0;s<l;s++){const c={};c.evaluacion=document.getElementById(`evaluacion[${s}]`).value,n.evaluaciones.push(c)}document.getElementById("cantidadPreguntas")&&(O=document.getElementById("cantidadPreguntas").value),n.actividades=[];for(let s=0;s<O;s++){const c={};c.actividad=document.getElementById(`actividad[${s}]`).value,n.actividades.push(c)}console.log(n);const i={method:"POST",headers:{"Content-Type":"application/json","X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').getAttribute("content")},body:JSON.stringify(n)};fetch(a,i).then(s=>s.json()).then(s=>{console.log(s),w.style.display="none",document.getElementById("divRequerimientos").innerHTML="",console.log("indice para eliminar "+v),r=r.filter(p=>p.id!=v.id),localStorage.setItem("copiaGetDataInicio",JSON.stringify(r)),location.reload(),console.log("Despues de el for each",copiaGetDataRequerimientos),y.innerHTML="";let c=document.createElement("option");c.text="Escoja una opción",c.value=0,y.add(c),r.map(p=>{let C=document.createElement("option");C.text=p.descripcion,C.value=p.id,y.add(C)})}),_=!1,localStorage.setItem("habilitarInputs",JSON.stringify(_)),I=document.getElementById("etapa_encuadre").value,localStorage.setItem("valorEtapa_encuadre",JSON.stringify(I)),E=document.getElementById("material_equipo_apoyo").value,localStorage.setItem("valorMaterial_equipo_apoyo",JSON.stringify(E)),m();let o=localStorage.getItem("indicesViews"),u=JSON.parse(o);u[10].vista_guardada=0,console.log(u),localStorage.setItem("indicesViews",JSON.stringify(u));let g=localStorage.getItem("curso_id"),h=u[10].nombre_vista_actual,b=route("actualizar-seguimiento",{nombreVista:h,CursoId:g});fetch(b).then(s=>s.json()).then(s=>{console.log(s)})});const D=()=>{let t=d,a=route("seccion7b-getGeneral",{CursoId:t});fetch(a).then(e=>e.json()).then(e=>{console.log(e);let n=document.getElementById("divObjetivoGeneral");e.data.map(l=>{let i=document.createElement("div");i.className="row";let o=document.createElement("label");o.textContent="Objetivo: "+l.descripcion,o.style.fontWeight="bold",i.appendChild(o),n.appendChild(i)})})},T=()=>{let t=d,a=route("seccion7b-getParticulares",{CursoId:t});fetch(a).then(e=>e.json()).then(e=>{console.log(e);let n=document.getElementById("divObjetivosParticulares");e.data.map(l=>{let i=document.createElement("div");i.className="row";let o=document.createElement("label");o.textContent="Objetivo: "+l.descripcion,o.style.fontWeight="bold",i.appendChild(o),n.appendChild(i)})})},M=()=>{let t=d,a=route("seccion7b-getTemario",{CursoId:t});fetch(a).then(e=>e.json()).then(e=>{console.log("Temario es:",e);let n=document.getElementById("divTemario");e.data.map(l=>{let i=document.createElement("div");i.className="row";let o=document.createElement("label");o.textContent=l,o.style.fontWeight="bold",i.appendChild(o),n.appendChild(i)})})},P=()=>{let t=d,a=route("seccion7b-getBeneficios",{CursoId:t});fetch(a).then(e=>e.json()).then(e=>{console.log("Beneficio es:",e);let n=document.getElementById("divBeneficios");e.data.map(l=>{let i=document.createElement("div");i.className="row";let o=document.createElement("label");o.textContent=l,o.style.fontWeight="bold",i.appendChild(o),n.appendChild(i)})})},R=()=>{let t=d,a=route("seccion7b-getEvaluaciones",{CursoId:t});fetch(a).then(e=>e.json()).then(e=>{console.log("Evaluacion es:",e);let n=document.getElementById("divEvaluaciones");e.data.map(l=>{let i=document.createElement("div");i.className="row";let o=document.createElement("div");o.className="col";let u=document.createElement("label");u.innerHTML="<b>Momento de aplicación:</b> "+l.momento_aplicacion,o.appendChild(u),i.appendChild(o);let g=document.createElement("div");g.className="col";let h=document.createElement("label");h.innerHTML="<b>Aspecto a evaluar:</b> "+l.aspecto,g.appendChild(h),i.appendChild(g);let b=document.createElement("div");b.className="col";let s=document.createElement("label");s.innerHTML="<b>Instrumento de evaluación:</b> "+l.instrumento_evaluacion,b.appendChild(s),i.appendChild(b);let c=document.createElement("div");c.className="col";let p=document.createElement("label");p.innerHTML="<b>Porcentaje de ponderación:</b> "+l.porcentaje+"%",c.appendChild(p),i.appendChild(c),n.appendChild(i)})})},J=()=>{let t=d,a=route("seccion7b-getDescripcionCurso",{CursoId:t});fetch(a).then(e=>e.json()).then(e=>{console.log(e);let n=document.getElementById("divDescripcionCurso");e.data.map(l=>{let i=document.createElement("div");i.className="row";let o=document.createElement("label");o.textContent="Descripcion: "+l.descripcion_curso,o.style.fontWeight="bold",i.appendChild(o),n.appendChild(i)})})},m=()=>{if(_===!0)console.log("Estan habilitados los Inputs");else{var t=document.getElementById("etapa_encuadre"),a=document.getElementById("material_equipo_apoyo");t.value=I,a.value=E,t.readOnly=!0,a.readOnly=!0}},L=()=>{document.getElementById("cantidadPreguntas").addEventListener("input",()=>{let t="";const a=event.target.value;for(let e=0;e<a;e++)t+=`
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
        `;document.getElementById("divPreguntas").innerHTML=t})};function H(){let t=localStorage.getItem("indicesViews"),a=JSON.parse(t),e=localStorage.getItem("curso_id"),n=a[10].nombre_vista_actual,l=route("seguimiento7b",{nombreVista:n,CursoId:e});fetch(l).then(i=>i.json()).then(i=>{console.log(i),i.alcanzado&&(a[10].vista_guardada=1,console.log(a),localStorage.setItem("indicesViews",JSON.stringify(a)),f++,localStorage.setItem("vista_indice",JSON.stringify(f)),localStorage.removeItem("copiaGetDataInicio"),localStorage.removeItem("valorEtapa_encuadre"),localStorage.removeItem("valorMaterial_equipo_apoyo"),localStorage.removeItem("habilitarInputs"),window.location.href=route("seccion7c-create"))})}
