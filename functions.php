<?php
define('PAGE_GRUPO_GIES', 37);
define('PAGE_GIES', 39);
define('PAGE_TIKARIY', 42);
define('PAGE_APPAM', 44);
define('PAGE_TARPUY', 46);
define('PAGE_CONTACTO', 50);
define('PAGE_UBICACION', 188);
define('PAGE_TIENDA', 5);

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
	add_image_size('producto-size', 495, 420, true);
	add_image_size('producto-thumb-size', 100, 100, true);

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
	
	function get_attachment_id_from_url($attachment_url = ''){

		global $wpdb;
		$attachment_id = false;

		// If there is no url, return.
		if ('' == $attachment_url)
			return;

		// Get the upload directory paths
		$upload_dir_paths = wp_upload_dir();

		// Make sure the upload path base directory exists in the attachment URL, to verify that we're working with a media library image
		if (false !== strpos($attachment_url, $upload_dir_paths['baseurl'])) {

			// If this is the URL of an auto-generated thumbnail, get the URL of the original image
			$attachment_url = preg_replace('/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $attachment_url);

			// Remove the upload path base directory from the attachment URL
			$attachment_url = str_replace($upload_dir_paths['baseurl'] . '/', '', $attachment_url);

			// Finally, run a custom database query to get the attachment ID from the modified attachment URL
			$attachment_id = $wpdb->get_var($wpdb->prepare("SELECT wposts.ID FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta WHERE wposts.ID = wpostmeta.post_id AND wpostmeta.meta_key = '_wp_attached_file' AND wpostmeta.meta_value = '%s' AND wposts.post_type = 'attachment'", $attachment_url));
		}

		return $attachment_id;
	}
	
?>
