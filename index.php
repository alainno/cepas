<?php
get_header();
?>
<div class="slider-container">
	<div id="slider">
		<div class="slide"><img src="<?php echo get_template_directory_uri(); ?>/img/tmp-slide.jpg">
			<p class="ttu">Tejiendo esperanza por el bien común
			</p>
		</div>
		<div class="slide"><img src="<?php echo get_template_directory_uri(); ?>/img/tmp-slide2.jpg">
			<p class="ttu">Artesanía Ecológica APPAM
			</p>
		</div>
		<div class="slide"><img src="<?php echo get_template_directory_uri(); ?>/img/tmp-slide3.jpg">
			<p class="ttu">Microcine Tarpuy
			</p>
		</div>
	</div><a href="#" id="next" class="boton-next"><span class="icono-flnext"></span></a>
</div>
<div class="accesos clearer">
	<section class="left tac">
		<div class="wrapper-ext"><a href="<?php echo get_page_link(PAGE_GIES); ?>" class="wrapper-in"><img src="<?php echo get_template_directory_uri(); ?>/img/logo-gies.png" alt="GIES Melgar"></a>
		</div>
	</section>
	<section class="left"><a href="<?php echo get_page_link(PAGE_TIKARIY); ?>">
			<h2><span class="icono-tikary"></span>T'IKARIY

			</h2>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non.
			</p></a>
	</section>
	<section class="left"><a href="<?php echo get_page_link(PAGE_APPAM); ?>">
			<h2><span class="icono-appam"></span>APPAM

			</h2>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non.
			</p></a>
	</section>
	<section class="left"><a href="<?php echo get_page_link(PAGE_TARPUY); ?>">
			<h2><span class="icono-tarpuy"></span>TARPUY

			</h2>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non.
			</p></a>
	</section>
</div>
<div class="secciones mt5">
	<div class="clearer">
		<div class="mitad left">
			<section>
				<header>
                    <h2 class="left">Noticias
                    </h2><a href="#" class="icono-flecha right img-rpl">Más...</a>
				</header>
				<article class="mt5 portada">
						<?php
						
						$recent_posts = wp_get_recent_posts(array(
							'numberposts' => 1
						));
						foreach($recent_posts as $recent):
							//$images = get_children( array('post_parent' => $recent['ID'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order','numberposts'=>1));
						?>
						<a href="<?php echo get_permalink($recent['ID']); ?>">
						<h3><?php echo $recent['post_title']; ?></h3>
						<span class="fecha"><?php echo get_the_time('l, j \d\e F \d\e\l Y',$recent['ID']); ?></span>
						<?php
							if(has_post_thumbnail($recent['ID'])):
							//if($images): foreach($images as $att_id => $image):
								
								//print_r($image);
								//exit(0);
								
								$big_array = image_downsize(get_post_thumbnail_id($recent['ID']), 'portada-size');
								$img_url = $big_array[0];
						?>
						<div class="foto mt5">
							<img src="<?php echo $img_url; ?>" width="440" height="248" />
						</div>
						<?php /*/endforeach;*/ endif; ?>
						<p class="mt5"><?php echo resumen($recent['post_content'],48); ?></p>
						</a>
						<?php
						endforeach;
						?>
<!--						<h3>Los Familiares de Peruanos en Italia se vuelven Empresarios
						</h3><span class="fecha">Viernes, 30 de Mayo del 2013</span>
						<div class="foto mt5"><img src="<?php echo get_template_directory_uri(); ?>/img/tmp-noticia.jpg" width="440" height="248">
						</div>
						<p class="mt5">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.
						</p></a>-->
				</article>
			</section>
		</div>
		<div class="mitad right">
			<section>
				<header>
                    <h2 class="left">Multimedia
                    </h2><a href="#" class="icono-flecha right img-rpl">Más...</a>
				</header>
				<div class="scroller mt5"><a href="#" class="boton-izq">
						<div class="wrapper-icono tac"><span class="icono-flizq"></span>
						</div></a>
                    <div class="ventana">
						<ul class="lh">
							<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/tmp-miniatura.jpg" alt="Play"></a>
							</li>
							<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/tmp-miniatura.jpg" alt="Play"></a>
							</li>
							<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/tmp-miniatura.jpg" alt="Play"></a>
							</li>
							<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/tmp-miniatura.jpg" alt="Play"></a>
							</li>
							<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/tmp-miniatura.jpg" alt="Play"></a>
							</li>
							<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/tmp-miniatura.jpg" alt="Play"></a>
							</li>
							<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/tmp-miniatura.jpg" alt="Play"></a>
							</li>
							<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/tmp-miniatura.jpg" alt="Play"></a>
							</li>
							<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/tmp-miniatura.jpg" alt="Play"></a>
							</li>
							<li><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/tmp-miniatura.jpg" alt="Play"></a>
							</li>
						</ul>
                    </div><a href="#" class="boton-der">
						<div class="wrapper-icono tac"><span class="icono-flder"></span>
						</div></a>
				</div>
			</section>
			<section class="mt5">
				<header>
                    <h2 class="left">Campañas
                    </h2>
				</header>
				<div class="mt5"><a href="//www.respiravida.pe" class="lnk-banner"><img src="<?php echo get_template_directory_uri(); ?>/img/banner-tbc.gif"></a>
				</div>
			</section>
			<div class="clearer mt5">
				<section class="folletos left">
                    <header>
						<h2 class="left">Folletos
						</h2><a href="#" class="icono-flecha right img-rpl">Más...</a>
                    </header>
                    <ul class="lista mt5">
						<li><a href="#">Comercio Justo
								<span class="icono-pdf right"></span></a>
						</li>
						<li><a href="#">Economia Solidaria
								<span class="icono-pdf right"></span></a>
						</li>
						<li><a href="#">Finanzas Solidarias
								<span class="icono-pdf right"></span></a>
						</li>
						<li><a href="#">Turismo Solidario
								<span class="icono-pdf right"></span></a>
						</li>
						<li><a href="#">Desarrollo Económico Local
								<span class="icono-pdf right"></span></a>
						</li>
                    </ul>
				</section>
				<section class="facebook right">
                    <header>
						<h2>Facebook
						</h2>
                    </header>
                    <div class="mt10">
						<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fcepas.puno&amp;width=210&amp;height=187&amp;show_faces=true&amp;colorscheme=light&amp;stream=false&amp;show_border=false&amp;header=false&amp;appId=217716198355030" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:210px; height:187px;" allowTransparency="true"></iframe>
                    </div>
				</section>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
?>