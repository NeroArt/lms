const o=document.getElementById("abrirModal"),e=document.getElementById("miModal"),t=document.getElementById("miVideo"),n=document.getElementsByClassName("close")[0];o.addEventListener("click",function(){e.style.display="block",t.src="https://www.youtube.com/embed/ioQjLLfTIes?si=jwQeEmgIflgXXP2a"});n.addEventListener("click",function(){e.style.display="none",t.src="",history.replaceState({},document.title,window.location.pathname)});
