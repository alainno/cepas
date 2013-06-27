<?php

	add_theme_support('post-thumbnails');
	
	add_image_size('portada-size', 440, 248, true);
	add_image_size('scroll-size', 115, 80, true);


	function resumen($texto, $limite=35, $puntos='...')
	{
		eregi("(([^ ]* ?){0,$limite})(.*)", strip_tags($texto), $ars);
		return $ars[1] . $puntos;
	}
	
?>
