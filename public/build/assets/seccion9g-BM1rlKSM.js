let s=parseInt(localStorage.getItem("vista_indice"));if(localStorage.getItem("indicesViews")){let e=localStorage.getItem("indicesViews"),n=JSON.parse(e),t=n[25];console.log(t.id),console.log(t.vista_guardada);let a=n.find(i=>i.id===s),o=t.id,c=t.vista_guardada===1;o!=s&&c&&r(a.variable_ruta),o!=s&&!c&&r(a.variable_ruta)}else alert("No se ha creado ningun curso, se te redirecionara al panel de control!!"),window.location.href=route("home");function r(e){window.location.href=route(e)}let g=localStorage.getItem("dataObjetivos"),d,u,v=7,m=JSON.parse(g);m?m.forEach(function(e){d=e.cursos_id,console.log(d)}):console.log("El array no existe en el Local Storage");document.getElementById("cantidadReglas").addEventListener("input",()=>{let e="";const n=event.target.value;for(let t=0;t<n;t++)e+=`
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
        `;document.getElementById("divRequerimientos").innerHTML=e});document.getElementById("myForm").addEventListener("submit",e=>{e.preventDefault();const n=route("seccion9g-store"),t=new FormData(e.target),a=Object.fromEntries(t.entries());let o=parseInt(document.getElementById("duracion_tiempo").value);a.seccion_encuadre=v,a.cursos_id=d,a.duracion=o,document.getElementById("cantidadReglas")&&(u=document.getElementById("cantidadReglas").value),a.actividades=[];for(let i=0;i<u;i++){const l={};l.actividad=document.getElementById(`actividad[${i}]`).value,a.actividades.push(l)}console.log(a);const c={method:"POST",headers:{"Content-Type":"application/json","X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').getAttribute("content")},body:JSON.stringify(a)};fetch(n,c).then(i=>i.json()).then(i=>{console.log(i)})});
