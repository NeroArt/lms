let u=parseInt(localStorage.getItem("vista_indice"));if(localStorage.getItem("indicesViews")){let e=localStorage.getItem("indicesViews"),a=JSON.parse(e),i=a[19];console.log(i.id),console.log(i.vista_guardada);let t=a.find(s=>s.id===u),c=i.id,n=i.vista_guardada===1;c!=u&&n&&N(t.variable_ruta),c!=u&&!n&&N(t.variable_ruta)}else alert("No se ha creado ningun curso, se te redirecionara al panel de control!!"),window.location.href=route("home");function N(e){window.location.href=route(e)}let q=localStorage.getItem("dataObjetivos"),j=[{id:1,descripcion:"a.	Con apoyo del grupo."},{id:2,descripcion:"b.	Mencionar los logros alcanzados."},{id:3,descripcion:"c.	Preguntar la opinión de los participantes sobre la aplicación de los temas tratados."}];C();let b=JSON.parse(q),l,p,g,v,y,I,w;[...b];localStorage.getItem("copiaGetDataInicio9a")?l=JSON.parse(localStorage.getItem("copiaGetDataInicio9a")):(l=[...j],localStorage.setItem("copiaGetDataInicio9a",JSON.stringify(l)));localStorage.getItem("habilitarInputs9a")?(p=JSON.parse(localStorage.getItem("habilitarInputs9a")),g=JSON.parse(localStorage.getItem("valorEtapa_encuadre9a")),I=JSON.parse(localStorage.getItem("valorMaterial_equipo_apoyo9a")),v=JSON.parse(localStorage.getItem("duracion9a")),y=JSON.parse(localStorage.getItem("tecnicas9a"))):(p=!0,g="",I="",v="",y="");let _=0,D=1;console.log(_);console.log(b);let m=document.getElementById("selectRequerimiento"),r=0,E=document.getElementById("requerimientos_id"),h=document.getElementById("myForm");h.style.display="none";l.map(e=>{let a=document.createElement("option");a.text=e.descripcion,a.value=e.id,m.add(a)});b?b.forEach(function(e){_=e.cursos_id,console.log(_)}):console.log("El array no existe en el Local Storage");m.onchange=function(){let e=Number(this.value);e!==0?h.style.display="block":h.style.display="none",r=l.find(t=>t.id===e);let a="";e===1&&(a+=`
        <div class="mb-3">
        <div class="name">Redactar la actividad:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required placeholder="Ejemplo: El instructor realizará las conclusiones con ayuda del grupo"></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Redactar las Conclusiones:</div>
        </div>
        <label for="">Cantidad de Conclusiones</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas">
        <br>
        <div id="divReglas">
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=a,R(),S()),e===2&&(a+=`
        
        <div class="mb-3">
        <div class="name">Redactar la actividad:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required placeholder="Ejemplo: El instructor mencionara los logros alcanzados"></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Redactar los Logros:</div>
        </div>
        <label for="">Cantidad de Logros</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas">
        <br>
        <div id="divReglas">
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=a,R(),S()),e===3&&(a+=`
        
        <div class="mb-3">
        <div class="name">Redactar la actividad:</div>
            <div class="input-group wrap-input100 validate-input" >
                <textarea id="actividad" class="form-control" type="text" name="actividad" autocomplete="actividad" required placeholder="Ejemplo: El instructor preguntara sobre los temas tratatdos."></textarea>
                <span class="focus-input100 "></span>
                <span class="symbol-input100">
                <i class="fa fa-envelope"></i>
                </span>
            </div>
        </div>
        <div class="mb-3">
        <div class="name">Redactar 2 Preguntas:</div>
        </div>
        <label for="">Cantidad de Preguntas</label>
        <input type="number" name="cantidadReglas" id="cantidadReglas" required>
        <br>
        <div id="divReglas">
        </div>
        `,document.getElementById("divRequerimientos").innerHTML=a,R(),S()),E.value=r.id;let i=this.options[this.selectedIndex];E.text=i.text,console.log("El objeto seleccionado es: ",r)};document.getElementById("myForm").addEventListener("submit",e=>{e.preventDefault();const a=route("seccion9a-store"),i=new FormData(e.target),t=Object.fromEntries(i.entries());t.descripcion=E.value,t.momento_aplicacion=E.text,t.seccion_encuadre=D,t.cursos_id=_,t.indice=r.id,document.getElementById("cantidadReglas")&&(w=document.getElementById("cantidadReglas").value),t.actividades=[];for(let o=0;o<w;o++){const d={};d.actividad=document.getElementById(`actividad[${o}]`).value,t.actividades.push(d)}console.log(t);const c={method:"POST",headers:{"Content-Type":"application/json","X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').getAttribute("content")},body:JSON.stringify(t)};fetch(a,c).then(o=>o.json()).then(o=>{console.log(o),h.style.display="none",document.getElementById("divRequerimientos").innerHTML="",console.log("indice para eliminar "+r),l=l.filter(f=>f.id!=r.id),localStorage.setItem("copiaGetDataInicio9a",JSON.stringify(l)),location.reload(),console.log("Despues de el for each",l),m.innerHTML="";let d=document.createElement("option");d.text="Escoja una opción",d.value=0,m.add(d),l.map(f=>{let O=document.createElement("option");O.text=f.descripcion,O.value=f.id,m.add(O)})}),p=!1,localStorage.setItem("habilitarInputs9a",JSON.stringify(p)),g=document.getElementById("etapa_encuadre").value,localStorage.setItem("valorEtapa_encuadre9a",JSON.stringify(g)),I=document.getElementById("material_equipo_apoyo").value,localStorage.setItem("valorMaterial_equipo_apoyo9a",JSON.stringify(I)),v=document.getElementById("duracion").value,localStorage.setItem("duracion9a",JSON.stringify(v)),y=document.getElementById("tecnicas").value,localStorage.setItem("tecnicas9a",JSON.stringify(y)),S();let n=localStorage.getItem("indicesViews"),s=JSON.parse(n);s[19].vista_guardada=0,console.log(s),localStorage.setItem("indicesViews",JSON.stringify(s));let B=localStorage.getItem("curso_id"),J=s[19].nombre_vista_actual,x=route("actualizar-seguimiento",{nombreVista:J,CursoId:B});fetch(x).then(o=>o.json()).then(o=>{console.log(o)})});const S=()=>{if(p===!0)console.log("Estan habilitados los Inputs");else{var e=document.getElementById("etapa_encuadre"),a=document.getElementById("material_equipo_apoyo"),i=document.getElementById("duracion"),t=document.getElementById("tecnicas");e.value=g,a.value=I,i.value=v,t.value=y,e.readOnly=!0,a.readOnly=!0,i.readOnly=!0,t.readOnly=!0}},R=()=>{document.getElementById("cantidadReglas").addEventListener("input",()=>{let e="";const a=event.target.value;for(let i=0;i<a;i++)e+=`
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
        `;document.getElementById("divReglas").innerHTML=e})};function C(){let e=localStorage.getItem("indicesViews"),a=JSON.parse(e),i=localStorage.getItem("curso_id"),t=a[19].nombre_vista_actual,c=route("seguimiento9a",{nombreVista:t,CursoId:i});fetch(c).then(n=>n.json()).then(n=>{console.log(n),n.alcanzado&&(a[19].vista_guardada=1,console.log(a),localStorage.setItem("indicesViews",JSON.stringify(a)),u++,localStorage.setItem("vista_indice",JSON.stringify(u)),localStorage.removeItem("copiaGetDataInicio9a"),localStorage.removeItem("valorEtapa_encuadre9a"),localStorage.removeItem("valorMaterial_equipo_apoyo9a"),localStorage.removeItem("duracion9a"),localStorage.removeItem("tecnicas9a"),localStorage.removeItem("habilitarInputs9a"),window.location.href=route("seccion9b-create"))})}
