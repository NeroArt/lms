var sidenavIcon = document.getElementById('mySIdenavIcon');
var sidenav = document.getElementById('mySidenav');
var closeSidenav = document.getElementById('closeSidenav');

sidenavIcon.addEventListener('click', function(){
	if( document.body.classList.contains('mySidenav_open') ) {
		document.body.classList.remove('mySidenav_open');
	} else {
		document.body.classList.add('mySidenav_open');
	}
});

closeSidenav.addEventListener('click', function(){
	if( document.body.classList.contains('mySidenav_open') ) {
		document.body.classList.remove('mySidenav_open');
	} 
});

document.getElementById('mySidenavBackground').addEventListener('click', function(){
	document.body.classList.remove('mySidenav_open');
});