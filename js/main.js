$(document).ready(main);

function main(){
	// slider
	$('#slider').cycle({fx:'fadeZoom',next:'#next'});
	
	// scroller
	$('.scroller .ventana').tscroller('create',{
		'back':'a.boton-izq'
		,'go':'a.boton-der'
		,'offset':3
	});
	
	// slider de logos
	$('#slider-logos').cycle({fx:'scrollLeft',next:'#next'});
}