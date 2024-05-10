let R=parseInt(localStorage.getItem("vista_indice"));if(localStorage.getItem("indicesViews")){let a=localStorage.getItem("indicesViews"),e=JSON.parse(a),t=e[17];console.log(t.id),console.log(t.vista_guardada);let i=e.find(d=>d.id===R),r=t.id,s=t.vista_guardada===1;r!=R&&s&&h(i.variable_ruta),r!=R&&!s&&h(i.variable_ruta)}else alert("No se ha creado ningun curso, se te redirecionara al panel de control!!"),window.location.href=route("home");function h(a){window.location.href=route(a)}let _=localStorage.getItem("dataObjetivos"),B=[{id:1,descripcion:"a)	Mencionará el objetivo de la técnica:"},{id:2,descripcion:"b)	Presentará la actividad a desarrollar: "},{id:3,descripcion:"c)	Mencionará el tema/planteamiento/reto a discutir: "},{id:4,descripcion:"d)	Indicará las instrucciones de la actividad:"},{id:5,descripcion:"e)	Indicará el tiempo que se asignó a la actividad: "},{id:6,descripcion:"f)	Dividirá al grupo en subgrupos"},{id:7,descripcion:"g)	Establecerá reglas de operación con la participación del grupo. "},{id:8,descripcion:"h)	Abrirá la discusión recordando el tema a ser discutido"},{id:9,descripcion:"i)	Propiciará la discusión de los equipos"},{id:10,descripcion:"j)	Moderará la discusión"},{id:11,descripcion:"k)	Utilizará ejemplos relacionados con los temas y las situaciones cotidianas "},{id:12,descripcion:"l)	Desarrollará junto con el grupo las conclusiones acerca del tema discutido y su utilidad:"}],I=JSON.parse(_),o,v,m,g,f,y,S;[...I];localStorage.getItem("copiaGetDataInicio8e")?o=JSON.parse(localStorage.getItem("copiaGetDataInicio8e")):o=[...B];localStorage.getItem("habilitarInputs8e")?(v=JSON.parse(localStorage.getItem("habilitarInputs8e")),m=JSON.parse(localStorage.getItem("valorEtapa_encuadre8e")),y=JSON.parse(localStorage.getItem("valorMaterial_equipo_apoyo8e")),g=JSON.parse(localStorage.getItem("duracion8e")),f=JSON.parse(localStorage.getItem("tecnicas8e"))):(v=!0,m="",y="",g="",f="");let b=0,O=5;console.log(b);console.log(I);let u=document.getElementById("selectRequerimiento"),p=0,E=document.getElementById("requerimientos_id"),x=document.getElementById("myForm");x.style.display="none";o.map(a=>{let e=document.createElement("option");e.text=a.descripcion,e.value=a.id,u.add(e)});I?I.forEach(function(a){b=a.cursos_id,console.log(b)}):console.log("El array no existe en el Local Storage");u.onchange=function(){let a=Number(this.value);a!==0?x.style.display="block":x.style.display="none",p=o.find(i=>i.id===a);let e="";a===1&&(e+=`
        <div class="mb-3">
        <div class="name">Copiar objetivo particular afectivo/relacional social</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,n()),a===2&&(e+=`
        <div class="mb-3">
        <div class="name">Redactar beneficio/propósito</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,n()),a===3&&(e+=`
        
        <div class="mb-3">
        <div class="name">Redactar la actividad a desarrollar:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        <div class="name">Subtemas a desarrollar:</div>
        <div id="divSubtemas">
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,w(),n()),a===4&&(e+=`
        
        <div class="mb-3">
        <div class="name">Redactar la actividad a desarrollar:</div>
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
        `,document.getElementById("divRequerimientos").innerHTML=e,q(),n()),a===5&&(e+=`
        <div class="mb-3">
        <div class="name">Indicar cuanto tiempo dura esta actividad:</div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required placeholder="Ejemplo: 15 minutos">
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,n()),a===6&&(e+=`
        <div class="mb-3">
        <div class="name">Redactar la actividad</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required placeholder="Ejemplo: El instructor creara dos grupos entre los participantes."></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,n()),a===7&&(e+=`
        
        <div class="mb-3">
        <div class="name">Redactar la actividad:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required placeholder="Ejemplo: El instructor recordara las reglas estipuladas"></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Redactar algunas de las reglas que vas a estipular:</div>
        </div>
        <label for="">Cantidad de Reglas</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas" required>
        <br>
        <div id="divReglas">
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,q(),n()),a===8&&(e+=`
        <div class="mb-3">
        <div class="name">Redactar introducción a la actividad</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required"></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,n()),a===9&&(e+=`
        <div class="mb-3">
        <div class="name">Redactar la actividad</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required placeholder="Ejemplo: El instructor brindara las condiciones que propicien el dialogo y la discusión entre los participantes"></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,n()),a===10&&(e+=`
        <div class="mb-3">
        <div class="name">Redactar la actividad</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required placeholder="Ejemplo: El instructor recordará las normas a fin de que la discusión se realice en un ambiente de respeto"></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,n()),a===11&&(e+=`
        
        <div class="mb-3">
        <div class="name">Redactar la actividad:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required placeholder="Ejemplo: El instructor ejemplificara las situaciones cotidianas"></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Redactar aquí 2 ejemplos relacionados con las situaciones cotidianas:</div>
        </div>
        <label for="">Cantidad de Ejemplos</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas" required>
        <br>
        <div id="divReglas">
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,q(),n()),a===12&&(e+=`
        <div class="mb-3">
        <div class="name">Redactar una breve conclusión del tema</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required"></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=e,n()),E.value=p.id;let t=this.options[this.selectedIndex];E.text=t.text,console.log("El objeto seleccionado es: ",p)};const n=()=>{if(v===!0)console.log("Estan habilitados los Inputs");else{var a=document.getElementById("etapa_encuadre"),e=document.getElementById("material_equipo_apoyo"),t=document.getElementById("duracion"),i=document.getElementById("tecnicas");a.value=m,e.value=y,t.value=g,i.value=f,a.readOnly=!0,e.readOnly=!0,t.readOnly=!0,i.readOnly=!0}},q=()=>{document.getElementById("cantidadReglas").addEventListener("input",()=>{let a="";const e=event.target.value;for(let t=0;t<e;t++)a+=`
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
        `;document.getElementById("divReglas").innerHTML=a})};document.getElementById("myForm").addEventListener("submit",a=>{a.preventDefault();const e=route("seccion8e-store"),t=new FormData(a.target),i=Object.fromEntries(t.entries());i.descripcion=E.value,i.momento_aplicacion=E.text,i.seccion_encuadre=O,i.cursos_id=b,i.indice=p.id,document.getElementById("cantidadReglas")&&(S=document.getElementById("cantidadReglas").value),i.actividades=[];for(let s=0;s<S;s++){const d={};d.actividad=document.getElementById(`actividad[${s}]`).value,i.actividades.push(d)}console.log(i);const r={method:"POST",headers:{"Content-Type":"application/json","X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').getAttribute("content")},body:JSON.stringify(i)};fetch(e,r).then(s=>s.json()).then(s=>{console.log(s),x.style.display="none",document.getElementById("divRequerimientos").innerHTML="",console.log("indice para eliminar "+p),o=o.filter(c=>c.id!=p.id),localStorage.setItem("copiaGetDataInicio8e",JSON.stringify(o)),location.reload(),console.log("Despues de el for each",o),u.innerHTML="";let d=document.createElement("option");d.text="Escoja una opción",d.value=0,u.add(d),o.map(c=>{let l=document.createElement("option");l.text=c.descripcion,l.value=c.id,u.add(l)})}),v=!1,localStorage.setItem("habilitarInputs8e",JSON.stringify(v)),m=document.getElementById("etapa_encuadre").value,localStorage.setItem("valorEtapa_encuadre8e",JSON.stringify(m)),y=document.getElementById("material_equipo_apoyo").value,localStorage.setItem("valorMaterial_equipo_apoyo8e",JSON.stringify(y)),g=document.getElementById("duracion").value,localStorage.setItem("duracion8e",JSON.stringify(g)),f=document.getElementById("tecnicas").value,localStorage.setItem("tecnicas8e",JSON.stringify(f)),n()});const w=()=>{let a=b,e=route("seccion8e-getSubtemas",{CursoId:a}),t=0;fetch(e).then(i=>i.json()).then(i=>{console.log(i);let r=document.getElementById("divSubtemas");i.data.map(s=>{let d=document.createElement("div");d.className="row";let c=document.createElement("label");c.textContent="Subtema: "+s,c.style.fontWeight="bold";let l=document.createElement("input");l.className="form-control",l.type="text",l.id="actividad["+t+"]",l.placeholder="Describe el subtema aquí",d.appendChild(c),d.appendChild(l),r.appendChild(d),t++,S=t})})};
