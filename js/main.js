$(document).ready(main);

function main(){
	// slider
	$('#slider').cycle({fx:'fadeZoom',next:'#next'});
	
	// scroller
	if($('.scroller').length > 0){
		$('.scroller .ventana').tscroller('create',{
			'back':'a.boton-izq'
			,'go':'a.boton-der'
			,'offset':3
		});
	}
	
	// slider de logos
	$('#slider-logos').cycle({fx:'scrollLeft',next:'#next'});
	
	if($('audio').length > 0){
		var a = document.createElement('audio');
		var soporta_mp3 = !!(a.canPlayType && a.canPlayType('audio/mpeg;').replace(/no/, ''));
		if(!soporta_mp3){
			//alert('hi');
			$('audio').remove();
			var $div_audio = $('#audio');
			
			var flashvars = {path:$div_audio.text(),type:'mp3',autoplay:'false'};
			var params = {menu:'false',allowfullscreen:'false',wmode:'transparent',allowscriptaccess:'always'};
			var attributes = {id:'gsplayer',name:'gsplayer'};
			var embed = getSWF($div_audio.attr('swf'), '100%', 30, flashvars, params, attributes);
			
			$div_audio.show().html(embed);
		}
	}
	
	/* Tienda - Catalogo */
	$(".imgs-children ul li img").click(cambiarImagen);
}

function cambiarImagen()
{
	$this = $(this);
	src = $this.attr("src");
	$("#img-cat-main").attr("src", src);
}