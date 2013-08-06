<?php
//$menu = array(
//$menu = array(
//	'Nuestra Institución' => array('id'=>12,'tipo'=>'pagina')
//	,'Nuestra Institución' => array('id'=>12,'tipo'=>'pagina')
//	
//);

$ancestors = get_post_ancestors($post->ID);
$root = count($ancestors) - 1;
$padre_id = $ancestors[$root];

$actual_ids = array($post->ID, $padre_id);

if(is_category()){
	//$category = get_the_category();
	$category = get_category(get_query_var('cat'));
} elseif(is_single()){
	$categories = get_the_category();
	$category = $categories[0];
}



$menu = array(
	'Nuestra Institución' => array('link' => get_page_link(533), 'actual' => in_array(2,$actual_ids)) 
//	,'Tienda Solidaria' => array('link' => get_page_link(5), 'actual' => in_array(5,$actual_ids))
	,'Tienda Solidaria' => array('link' => get_category_link(CATE_CATALOGO), 'actual' => in_array($category->cat_ID, array(CATE_CATALOGO,10,11,12)))
	,'Mosoq Muhu' => array('link' => get_page_link(727), 'actual' => in_array(727,$actual_ids))
	,'Noticias' => array('link' => get_category_link(CATE_NOTICIAS), 'actual' => $category->cat_ID == CATE_NOTICIAS)
//	,'Enlaces' => array('link' => get_page_link(6), 'actual' => in_array(6,$actual_ids))
	,'Multimedia' => array('link' => get_category_link(CATE_MULTIMEDIA), 'actual' => in_array($category->cat_ID, array(CATE_MULTIMEDIA,CATE_AUDIO,CATE_FOTO,CATE_VIDEO)))
	,'Turismo' => array('link' => get_page_link(9), 'actual' => in_array(9,$actual_ids))
	,'Donaciones' => array('link' => get_page_link(10), 'actual' => in_array(10,$actual_ids))
);


?>
<!DOCTYPE html><!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7">
</html><![endif]--><!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8">
</html><![endif]--><!--[if IE 8]>
<html class="no-js lt-ie9">
</html><![endif]-->
<!-- [if gt IE 8] <!-->
<html class="no-js">
	<!-- <![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width" />
		<meta name="google-translate-customization" content="9469f04e442db77a-349bc6d4f32ea28c-gd82d1c255957198b-16"></meta>
		<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
		<meta name="description" value="<?php bloginfo('description'); ?>" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/tipss.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/plugins/jquery-ui.css">
		<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr-2.6.2.min.js"></script>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<div class="fondo-envoltura">
			<div class="fondo-blanco">
			</div>
			<div class="fondo-degrade">
			</div>
			<div class="envoltura">
				<header class="header">
					<div class="arriba">
						<div class="logo-container left">
							<div class="logo">
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-front"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.gif">
								</a>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-back tac" rel="nofollow">
									<p class="ttu"><strong>Construyendo ciudadania&nbsp;</strong>desde nuestra&nbsp;
										<strong>pluralidad&nbsp;</strong>y desde nuestras&nbsp;
										<strong>diferencias</strong>
									</p><span class="url">www.cepas.org.pe</span>
								</a>
							</div>
						</div>
						<div class="right-header">
							<div class="menu-arriba">
								<ul class="lh right">
									<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="icono-casa"></span>Inicio</a></li>
									<li><a href="/webmail"><span class="icono-mail"></span>Webmail</a></li>
									<li><a href="<?php echo get_page_link(PAGE_UBICACION); ?>"><span class="icono-mapa"></span>Ubicación</a></li>
									<li><a href="<?php echo get_page_link(PAGE_CONTACTO); ?>"><span class="icono-globo"></span>Contáctenos</a></li>
									<li>
										<div id="google_translate_element" style="margin-top: -4px"></div>
										<script type="text/javascript">
										function googleTranslateElementInit() {
										new google.translate.TranslateElement({pageLanguage: 'es', includedLanguages: 'en,it,fr', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
										}
										</script>
										<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
									</li>
								</ul>
							</div>
							<div class="accesos">
								<div class="banner-container left"><img src="<?php echo get_template_directory_uri(); ?>/img/banner.gif">
								</div>
								<form id="form-buscar" class="right" role="search" method="get" action="<?php echo home_url('/'); ?>">
									<input type="text" placeholder="Buscar..." class="left" id="s" name="s" value="<?php echo get_search_query(); ?>">
									<button type="submit" class="boton left ml5" id="searchsubmit"><span class="icono-buscar"></span>
									</button>
								</form>
							</div>
						</div>
					</div>
					<div class="nav menu mt5">
						<ul class="lh">
							<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"<?php echo is_home()?' class="actual"':''; ?>>Inicio</a></li>
							<?php
							
							/*$pages = get_pages('parent=0&sort_column=menu_order&exclude=37,50');
							
//							global $subpages;
							//$subpages = array();
							
							foreach($pages as $page):
								$subpages = get_pages('child_of='.$page->ID.'&parent='.$page->ID.'&sort_column=menu_order');
								if(count($subpages) > 0){
									$page_link = get_page_link($subpages[0]->ID);
								} else{
									$page_link = get_page_link($page->ID);
								}
								
								$ancestors = get_post_ancestors($post->ID);
								$root = count($ancestors) - 1;
								$padre_id = $ancestors[$root];
							?>
							<li><a href="<?php echo $page_link; ?>" class="<?php echo ($page->ID == $post->ID || $page->ID == $padre_id) ? 'actual':''; ?>"><?php echo $page->post_title; ?></a>
							</li>
							<?php
							endforeach;*/
							
							foreach($menu as $title => $meta): $meta = (object)$meta;
							?>
							<li><a href="<?php echo $meta->link; ?>" class="<?php echo $meta->actual ? 'actual':''; ?>"><?php echo $title; ?></a></li>							
							<?php endforeach; ?>
						</ul>
					</div>
				</header>
				<div class="cuerpo">