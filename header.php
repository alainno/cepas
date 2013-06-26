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
		<title><?php wp_title('|', true, 'right'); ?></title>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/tipss.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
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
								<div class="logo-front"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.gif">
								</div>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo-back tac">
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
									<li><a href="#"><span class="icono-mail"></span>Webmail</a></li>
									<li><a href="#"><span class="icono-mapa"></span>Ubicación</a></li>
									<li><a href="#"><span class="icono-globo"></span>Contacto</a></li>
								</ul>
							</div>
							<div class="accesos">
								<div class="banner-container left"><img src="<?php echo get_template_directory_uri(); ?>/img/banner.gif">
								</div>
								<form id="form-buscar" class="right">
									<input type="text" placeholder="Buscar..." class="left">
									<button type="submit" class="boton left ml5"><span class="icono-buscar"></span>
									</button>
								</form>
							</div>
						</div>
					</div>
					<div class="nav menu mt5">
						<ul class="lh">
							<?php
							
							$pages = get_pages('parent=0&sort_column=menu_order');
							
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
							endforeach;
							?>
						</ul>
					</div>
				</header>
				<div class="cuerpo">