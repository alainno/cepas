<?php
define('PAGE_GRUPO_GIES', 37);
define('PAGE_GIES', 39);
define('PAGE_TIKARIY', 42);
define('PAGE_APPAM', 44);
define('PAGE_TARPUY', 46);
define('PAGE_CONTACTO', 50);
define('PAGE_UBICACION', 188);

define('CATE_NOTICIAS', 2);
define('CATE_MULTIMEDIA', 3);
define('CATE_VIDEO', 4);
define('CATE_AUDIO', 5);
define('CATE_FOTO', 6);
define('CATE_FOLLETOS', 7);
define('CATE_SLIDES', 8);
define('CATE_CATALOGO', 9);

	add_theme_support('post-thumbnails');
	
	add_image_size('portada-size', 440, 248, true);
	add_image_size('scroll-size', 115, 80, true);
	add_image_size('slide-size', 950, 315, true);

	function resumen($texto, $limite=35, $puntos='...')
	{
		eregi("(([^ ]* ?){0,$limite})(.*)", strip_tags($texto), $ars);
		return $ars[1] . $puntos;
	}
        
	function getImages($content)
	{
		preg_match_all('/<img[^>]+./', $content, $coincidencias);
		return $coincidencias;
	}
	
	function removeImages($content)
	{
	   return preg_replace('/<img[^>]+./','',$content);
	}        
	
?>
