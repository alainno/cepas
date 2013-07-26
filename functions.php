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
add_image_size('producto-size', 380, 320, true);
add_image_size('producto-thumb-size', 46, 46, true);

function resumen($texto, $limite = 35, $puntos = '...') {
	eregi("(([^ ]* ?){0,$limite})(.*)", strip_tags($texto), $ars);
	return $ars[1] . $puntos;
}

// Funcion para que se solucione el problema de la paginacion
function cure_wp_amnesia_on_query_string($query_string)
{
    $lista_catalogo = array('9', '10', '11', '12');
    
    if(!is_admin())
    {
        if(isset($query_string['cat']) && in_array($query_string['cat'], $lista_catalogo))
        {
            $query_string['posts_per_page'] = 3;
        }
    }
    
    return $query_string;
}

add_filter('request', 'cure_wp_amnesia_on_query_string');

//$contador = 1;
//function wr_search_pagenum_link($link)
//{
//    global $contador;
//    
//    $cat = get_query_var('cat');
//    $lista_catalogo = array('9', '10', '11', '12');
//    
//    if(isset($cat) && in_array($cat, $lista_catalogo))
//    {
//    $query = new WP_Query('cat=' . $cat);
//    
//    $total_posts = $query->found_posts;
//    
//    $paged = get_query_var('paged');
//    
//    $max_post_showed = (($paged - 1) * 9) + 3;
//    
//        if($contador == 1)
//        {
//            $contador++;
//        }
//        else // Verificamos la link de siguiente
//        {
//            if(isset($paged))
//            {
//                if($total_posts < $max_post_showed)
//                {
//                    return 'xD';
//                }
//            }
//            
//            $contador = 1;
//        }
//    }
//    return $link;
//}
//
//add_filter('get_pagenum_link', 'wr_search_pagenum_link');
?>
