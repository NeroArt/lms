let g=parseInt(localStorage.getItem("vista_indice"));if(localStorage.getItem("indicesViews")){let e=localStorage.getItem("indicesViews"),t=JSON.parse(e),a=t[5];console.log(a.id),console.log(a.vista_guardada);let i=t.find(l=>l.id===g),s=a.id,n=a.vista_guardada===1;s!=g&&n&&p(i.variable_ruta),s!=g&&!n&&p(i.variable_ruta)}else alert("No se ha creado ningun curso, se te redirecionara al panel de control!!"),window.location.href=route("home");function p(e){window.location.href=route(e)}let b=localStorage.getItem("dataObjetivos"),y=JSON.parse(b),o;localStorage.getItem("copiaGetDataObjetivos3d")?o=JSON.parse(localStorage.getItem("copiaGetDataObjetivos3d")):(o=[...y],localStorage.setItem("copiaGetDataObjetivos3d",JSON.stringify(o)));let c=document.getElementById("selectObjetivoParticular"),d=0,v=document.getElementById("objetivos_id"),f,u=document.getElementById("myForm");u.style.display="none";o.map(e=>{let t=document.createElement("option");t.text=e.descripcion,t.value=e.id,c.add(t)});c.onchange=function(){let e=Number(this.value);e!==0?u.style.display="block":u.style.display="none",d=o.find(i=>i.id===e);let t="";t+=`
    <label for="">Cantidad de Beneficios</label>
    <input type="number" name="cantidadPreguntas" name="cantidadPreguntas" id="cantidadPreguntas" required>
    <br>
    <label for="exampleInputName" class="form-label">Preguntas:</label>
    <div id="divPreguntas">
    </div>
    `,document.getElementById("divBeneficios").innerHTML=t,I(),v.value=d.id;let a=this.options[this.selectedIndex];v.text=a.text,console.log("El objeto seleccionado es: ",d)};document.getElementById("myForm").addEventListener("submit",e=>{e.preventDefault();const t=route("seccion3d-store"),a=new FormData(e.target),i=Object.fromEntries(a.entries());i.indice=d.id,document.getElementById("cantidadPreguntas")&&(f=document.getElementById("cantidadPreguntas").value),i.beneficios=[];for(let n=0;n<f;n++){const l={};l.beneficio=document.getElementById(`actividad[${n}]`).value,i.beneficios.push(l)}console.log(i);const s={method:"POST",headers:{"Content-Type":"application/json","X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').getAttribute("content")},body:JSON.stringify(i)};fetch(t,s).then(n=>n.json()).then(n=>{console.log(n),u.style.display="none",document.getElementById("divBeneficios").innerHTML="",console.log("indice para eliminar "+d),o=o.filter(r=>r.id!=d.id),localStorage.setItem("copiaGetDataObjetivos3d",JSON.stringify(o)),console.log("Despues de el for each",o),c.innerHTML="";let l=document.createElement("option");l.text="Escoja una opción",l.value=0,c.add(l),o.map(r=>{let m=document.createElement("option");m.text=r.descripcion,m.value=r.id,c.add(m)})})});const I=()=>{document.getElementById("cantidadPreguntas").addEventListener("input",()=>{let e="";const t=event.target.value;for(let a=0;a<t;a++)e+=`
        <div class="mb-3">
        <div class="name">Pregunta </div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="actividad[${a}]" class="form-control" type="text" name="actividad[${a}]" autocomplete="actividad" required>
                <span class="focus-input100 "></span>
        <span class="symbol-input100">
            <i class="fa fa-envelope"></i>
        </span>
            </div>
        </div>
        `;document.getElementById("divPreguntas").innerHTML=e})};
