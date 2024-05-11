let v=parseInt(localStorage.getItem("vista_indice"));if(localStorage.getItem("indicesViews")){let a=localStorage.getItem("indicesViews"),e=JSON.parse(a),i=e[17];console.log(i.id),console.log(i.vista_guardada);let t=e.find(o=>o.id===v),c=i.id,s=i.vista_guardada===1;c!=v&&s&&B(t.variable_ruta),c!=v&&!s&&B(t.variable_ruta)}else alert("No se ha creado ningun curso, se te redirecionara al panel de control!!"),window.location.href=route("home");function B(a){window.location.href=route(a)}let j=localStorage.getItem("dataObjetivos"),J=[{id:1,descripcion:"a)	Mencionará el objetivo de la técnica:"},{id:2,descripcion:"b)	Presentará la actividad a desarrollar: "},{id:3,descripcion:"c)	Mencionará el tema/planteamiento/reto a discutir: "},{id:4,descripcion:"d)	Indicará las instrucciones de la actividad:"},{id:5,descripcion:"e)	Indicará el tiempo que se asignó a la actividad: "},{id:6,descripcion:"f)	Dividirá al grupo en subgrupos"},{id:7,descripcion:"g)	Establecerá reglas de operación con la participación del grupo. "},{id:8,descripcion:"h)	Abrirá la discusión recordando el tema a ser discutido"},{id:9,descripcion:"i)	Propiciará la discusión de los equipos"},{id:10,descripcion:"j)	Moderará la discusión"},{id:11,descripcion:"k)	Utilizará ejemplos relacionados con los temas y las situaciones cotidianas "},{id:12,descripcion:"l)	Desarrollará junto con el grupo las conclusiones acerca del tema discutido y su utilidad:"}];T();let h=JSON.parse(j),d,f,y,b,I,S,O;[...h];localStorage.getItem("copiaGetDataInicio8e")?d=JSON.parse(localStorage.getItem("copiaGetDataInicio8e")):(d=[...J],localStorage.setItem("copiaGetDataInicio8e",JSON.stringify(d)));localStorage.getItem("habilitarInputs8e")?(f=JSON.parse(localStorage.getItem("habilitarInputs8e")),y=JSON.parse(localStorage.getItem("valorEtapa_encuadre8e")),S=JSON.parse(localStorage.getItem("valorMaterial_equipo_apoyo8e")),b=JSON.parse(localStorage.getItem("duracion8e")),I=JSON.parse(localStorage.getItem("tecnicas8e"))):(f=!0,y="",S="",b="",I="");let E=0,M=5;console.log(E);console.log(h);let g=document.getElementById("selectRequerimiento"),p=0,q=document.getElementById("requerimientos_id"),R=document.getElementById("myForm");R.style.display="none";d.map(a=>{let e=document.createElement("option");e.text=a.descripcion,e.value=a.id,g.add(e)});h?h.forEach(function(a){E=a.cursos_id,console.log(E)}):console.log("El array no existe en el Local Storage");g.onchange=function(){let a=Number(this.value);a!==0?R.style.display="block":R.style.display="none",p=d.find(t=>t.id===a);let e="";a===1&&(e+=`
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
        `,document.getElementById("divRequerimientos").innerHTML=e,L(),n()),a===4&&(e+=`
        
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
        `,document.getElementById("divRequerimientos").innerHTML=e,w(),n()),a===5&&(e+=`
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
        `,document.getElementById("divRequerimientos").innerHTML=e,w(),n()),a===8&&(e+=`
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
        `,document.getElementById("divRequerimientos").innerHTML=e,w(),n()),a===12&&(e+=`
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
        `,document.getElementById("divRequerimientos").innerHTML=e,n()),q.value=p.id;let i=this.options[this.selectedIndex];q.text=i.text,console.log("El objeto seleccionado es: ",p)};const n=()=>{if(f===!0)console.log("Estan habilitados los Inputs");else{var a=document.getElementById("etapa_encuadre"),e=document.getElementById("material_equipo_apoyo"),i=document.getElementById("duracion"),t=document.getElementById("tecnicas");a.value=y,e.value=S,i.value=b,t.value=I,a.readOnly=!0,e.readOnly=!0,i.readOnly=!0,t.readOnly=!0}},w=()=>{document.getElementById("cantidadReglas").addEventListener("input",()=>{let a="";const e=event.target.value;for(let i=0;i<e;i++)a+=`
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
        `;document.getElementById("divReglas").innerHTML=a})};document.getElementById("myForm").addEventListener("submit",a=>{a.preventDefault();const e=route("seccion8e-store"),i=new FormData(a.target),t=Object.fromEntries(i.entries());t.descripcion=q.value,t.momento_aplicacion=q.text,t.seccion_encuadre=M,t.cursos_id=E,t.indice=p.id,document.getElementById("cantidadReglas")&&(O=document.getElementById("cantidadReglas").value),t.actividades=[];for(let l=0;l<O;l++){const u={};u.actividad=document.getElementById(`actividad[${l}]`).value,t.actividades.push(u)}console.log(t);const c={method:"POST",headers:{"Content-Type":"application/json","X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').getAttribute("content")},body:JSON.stringify(t)};fetch(e,c).then(l=>l.json()).then(l=>{console.log(l),R.style.display="none",document.getElementById("divRequerimientos").innerHTML="",console.log("indice para eliminar "+p),d=d.filter(x=>x.id!=p.id),localStorage.setItem("copiaGetDataInicio8e",JSON.stringify(d)),location.reload(),console.log("Despues de el for each",d),g.innerHTML="";let u=document.createElement("option");u.text="Escoja una opción",u.value=0,g.add(u),d.map(x=>{let _=document.createElement("option");_.text=x.descripcion,_.value=x.id,g.add(_)})}),f=!1,localStorage.setItem("habilitarInputs8e",JSON.stringify(f)),y=document.getElementById("etapa_encuadre").value,localStorage.setItem("valorEtapa_encuadre8e",JSON.stringify(y)),S=document.getElementById("material_equipo_apoyo").value,localStorage.setItem("valorMaterial_equipo_apoyo8e",JSON.stringify(S)),b=document.getElementById("duracion").value,localStorage.setItem("duracion8e",JSON.stringify(b)),I=document.getElementById("tecnicas").value,localStorage.setItem("tecnicas8e",JSON.stringify(I)),n();let s=localStorage.getItem("indicesViews"),o=JSON.parse(s);o[17].vista_guardada=0,console.log(o),localStorage.setItem("indicesViews",JSON.stringify(o));let m=localStorage.getItem("curso_id"),r=o[17].nombre_vista_actual,N=route("actualizar-seguimiento",{nombreVista:r,CursoId:m});fetch(N).then(l=>l.json()).then(l=>{console.log(l)})});const L=()=>{let a=E,e=route("seccion8e-getSubtemas",{CursoId:a}),i=0;fetch(e).then(t=>t.json()).then(t=>{console.log(t);let c=document.getElementById("divSubtemas");t.data.map(s=>{let o=document.createElement("div");o.className="row";let m=document.createElement("label");m.textContent="Subtema: "+s,m.style.fontWeight="bold";let r=document.createElement("input");r.className="form-control",r.type="text",r.id="actividad["+i+"]",r.placeholder="Describe el subtema aquí",o.appendChild(m),o.appendChild(r),c.appendChild(o),i++,O=i})})};function T(){let a=localStorage.getItem("indicesViews"),e=JSON.parse(a),i=localStorage.getItem("curso_id"),t=e[17].nombre_vista_actual,c=route("seguimiento8e",{nombreVista:t,CursoId:i});fetch(c).then(s=>s.json()).then(s=>{console.log(s),s.alcanzado&&(e[17].vista_guardada=1,console.log(e),localStorage.setItem("indicesViews",JSON.stringify(e)),v++,localStorage.setItem("vista_indice",JSON.stringify(v)),localStorage.removeItem("copiaGetDataInicio8e"),localStorage.removeItem("valorEtapa_encuadre8e"),localStorage.removeItem("valorMaterial_equipo_apoyo8e"),localStorage.removeItem("duracion8e"),localStorage.removeItem("tecnicas8e"),localStorage.removeItem("habilitarInputs8e"),window.location.href=route("seccion8f-create"))})}
