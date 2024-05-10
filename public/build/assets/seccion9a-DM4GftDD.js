let _=parseInt(localStorage.getItem("vista_indice"));if(localStorage.getItem("indicesViews")){let e=localStorage.getItem("indicesViews"),a=JSON.parse(e),i=a[19];console.log(i.id),console.log(i.vista_guardada);let t=a.find(l=>l.id===_),v=i.id,o=i.vista_guardada===1;v!=_&&o&&O(t.variable_ruta),v!=_&&!o&&O(t.variable_ruta)}else alert("No se ha creado ningun curso, se te redirecionara al panel de control!!"),window.location.href=route("home");function O(e){window.location.href=route(e)}let B=localStorage.getItem("dataObjetivos"),x=[{id:1,descripcion:"a.	Con apoyo del grupo."},{id:2,descripcion:"b.	Mencionar los logros alcanzados."},{id:3,descripcion:"c.	Preguntar la opinión de los participantes sobre la aplicación de los temas tratados."}],f=JSON.parse(B),n,c,r,u,m,p,h;[...f];localStorage.getItem("copiaGetDataInicio9a")?n=JSON.parse(localStorage.getItem("copiaGetDataInicio9a")):n=[...x];localStorage.getItem("habilitarInputs9a")?(c=JSON.parse(localStorage.getItem("habilitarInputs9a")),r=JSON.parse(localStorage.getItem("valorEtapa_encuadre9a")),p=JSON.parse(localStorage.getItem("valorMaterial_equipo_apoyo9a")),u=JSON.parse(localStorage.getItem("duracion9a")),m=JSON.parse(localStorage.getItem("tecnicas9a"))):(c=!0,r="",p="",u="",m="");let I=0,q=1;console.log(I);console.log(f);let s=document.getElementById("selectRequerimiento"),d=0,b=document.getElementById("requerimientos_id"),E=document.getElementById("myForm");E.style.display="none";n.map(e=>{let a=document.createElement("option");a.text=e.descripcion,a.value=e.id,s.add(a)});f?f.forEach(function(e){I=e.cursos_id,console.log(I)}):console.log("El array no existe en el Local Storage");s.onchange=function(){let e=Number(this.value);e!==0?E.style.display="block":E.style.display="none",d=n.find(t=>t.id===e);let a="";e===1&&(a+=`
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
        `,document.getElementById("divRequerimientos").innerHTML=a,R(),y()),e===2&&(a+=`
        
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
        `,document.getElementById("divRequerimientos").innerHTML=a,R(),y()),e===3&&(a+=`
        
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
        `,document.getElementById("divRequerimientos").innerHTML=a,R(),y()),b.value=d.id;let i=this.options[this.selectedIndex];b.text=i.text,console.log("El objeto seleccionado es: ",d)};document.getElementById("myForm").addEventListener("submit",e=>{e.preventDefault();const a=route("seccion9a-store"),i=new FormData(e.target),t=Object.fromEntries(i.entries());t.descripcion=b.value,t.momento_aplicacion=b.text,t.seccion_encuadre=q,t.cursos_id=I,t.indice=d.id,document.getElementById("cantidadReglas")&&(h=document.getElementById("cantidadReglas").value),t.actividades=[];for(let o=0;o<h;o++){const l={};l.actividad=document.getElementById(`actividad[${o}]`).value,t.actividades.push(l)}console.log(t);const v={method:"POST",headers:{"Content-Type":"application/json","X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').getAttribute("content")},body:JSON.stringify(t)};fetch(a,v).then(o=>o.json()).then(o=>{console.log(o),E.style.display="none",document.getElementById("divRequerimientos").innerHTML="",console.log("indice para eliminar "+d),n=n.filter(g=>g.id!=d.id),localStorage.setItem("copiaGetDataInicio9a",JSON.stringify(n)),console.log("Despues de el for each",n),s.innerHTML="";let l=document.createElement("option");l.text="Escoja una opción",l.value=0,s.add(l),n.map(g=>{let S=document.createElement("option");S.text=g.descripcion,S.value=g.id,s.add(S)})}),c=!1,localStorage.setItem("habilitarInputs9a",JSON.stringify(c)),r=document.getElementById("etapa_encuadre").value,localStorage.setItem("valorEtapa_encuadre9a",JSON.stringify(r)),p=document.getElementById("material_equipo_apoyo").value,localStorage.setItem("valorMaterial_equipo_apoyo9a",JSON.stringify(p)),u=document.getElementById("duracion").value,localStorage.setItem("duracion9a",JSON.stringify(u)),m=document.getElementById("tecnicas").value,localStorage.setItem("tecnicas9a",JSON.stringify(m)),y()});const y=()=>{if(c===!0)console.log("Estan habilitados los Inputs");else{var e=document.getElementById("etapa_encuadre"),a=document.getElementById("material_equipo_apoyo"),i=document.getElementById("duracion"),t=document.getElementById("tecnicas");e.value=r,a.value=p,i.value=u,t.value=m,e.readOnly=!0,a.readOnly=!0,i.readOnly=!0,t.readOnly=!0}},R=()=>{document.getElementById("cantidadReglas").addEventListener("input",()=>{let e="";const a=event.target.value;for(let i=0;i<a;i++)e+=`
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
        `;document.getElementById("divReglas").innerHTML=e})};
