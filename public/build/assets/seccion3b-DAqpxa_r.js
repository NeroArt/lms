let d=parseInt(localStorage.getItem("vista_indice"));if(localStorage.getItem("indicesViews")){let e=localStorage.getItem("indicesViews"),t=JSON.parse(e),n=t[3];console.log(n.id),console.log(n.vista_guardada);let o=t.find(E=>E.id===d),i=n.id,a=n.vista_guardada===1;i!=d&&a&&r(o.variable_ruta),i!=d&&!a&&r(o.variable_ruta)}else alert("No se ha creado ningun curso, se te redirecionara al panel de control!!"),window.location.href=route("home");function r(e){window.location.href=route(e)}let h=localStorage.getItem("dataObjetivos"),I=JSON.parse(h),j=localStorage.getItem("curso_id"),u=JSON.parse(j);const c=document.getElementById("myForm"),s=document.getElementById("selectObjetivoParticular"),m=document.getElementById("dataobjetivo"),v=document.getElementById("dataaccion"),p=document.getElementById("datacondicion"),g=document.getElementById("objetivos_id"),f=document.getElementById("curso_id"),y=document.getElementById("cantidadTemas"),O=document.getElementById("divTemas"),_=document.getElementById("cantidadTemas");_.addEventListener("input",function(){this.value<1&&(this.value=1),this.value>15&&(this.value=15)});c.style.display="none";const b=e=>{const t=route("seccion3b-getDataObj",{idCurso:e});fetch(t).then(n=>n.json()).then(n=>{console.log(n),S(n.data)}).catch(n=>console.error("Error:",n))};b(parseInt(u));const S=e=>{l("Escoja un Objetivo"),e.length>0?e.map(t=>{let n=document.createElement("option");n.text=t.descripcion,n.value=t.id,s.add(n)}):l("No hay datos disponibles ve a la siguiente sección")},l=e=>{s.innerHTML="";let t=document.createElement("option");t.text=e,t.value=0,s.add(t)};s.addEventListener("change",function(){let e=Number(this.value);if(e!==0){c.style.display="block";let t=B(e);m.innerText=t.sujeto,v.innerText=t.accion,p.innerText=t.condicion,g.value=t.id,f.value=t.cursos_id,y.value=""}else c.style.display="none",T()});const B=e=>I.find(t=>t.id===e);y.addEventListener("input",()=>{const e=event.target.value;w(e)});const w=e=>{let t="";for(let n=0;n<e;n++)t+=`
        <div class="mb-3">
        <div class="name ">Tema ${n+1}</div>
            <div class="input-group wrap-input100 validate-input" >
                <input id="tema[${n}]" class="form-control" type="text" name="tema[${n}]" autocomplete="Tema" autocomplete="off" required>
                <span class="focus-input100 "></span>
        <span class="symbol-input100">
            <i class="fa fa-envelope"></i>
        </span>
            </div>
        </div>
        `;O.innerHTML=t};c.addEventListener("submit",e=>{e.preventDefault();const t=route("seccion3b-store"),n=document.getElementById("cantidadTemas").value,o=x(e,n),i=D(o);fetch(t,i).then(a=>a.json()).then(N).catch(a=>console.error("Error:",a))});const x=(e,t)=>{const n=new FormData(e.target),o=Object.fromEntries(n.entries());o.temas=[],o.idCurso=parseInt(f.value);for(let i=0;i<t;i++){const a={};a.tema=document.getElementById(`tema[${i}]`).value,a.objetivos_id=g.value,o.temas.push(a)}return o},D=e=>({method:"POST",headers:{"Content-Type":"application/json","X-CSRF-TOKEN":document.querySelector('meta[name="csrf-token"]').getAttribute("content")},body:JSON.stringify(e)}),N=()=>{b(parseInt(u)),T()},T=()=>{c.style.display="none",document.getElementById("divTemas").innerHTML="",document.getElementById("cantidadTemas").value="",m.innerText="",v.innerText="",p.innerText=""};
