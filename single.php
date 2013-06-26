<?php

//global $subpages;
$ancestors = get_post_ancestors($post->ID);
$root = count($ancestors) - 1;
$padre_id = $ancestors[$root];

if($padre_id > 0){
	$subpages = get_pages('child_of='.$padre_id.'&parent='.$padre_id.'&sort_column=menu_order');
}

get_header();
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="clearer">
			<div class="main-col left">
				<h1>
					<span>Noticias</span>
				</h1>
				<article>
					<div class="clearer">
						<?php if(isset($subpages)): ?>
					<nav class="submenu left">
						<ul>
							<?php

							 foreach($subpages as $subpage):
							
							?>
							<li><a href="<?php echo get_page_link($subpage->ID); ?>" class="<?php echo $subpage->ID == $post->ID ? 'actual':''; ?>"><?php echo $subpage->post_title; ?>
									<span class="icono-triangulo right"></span></a>
							</li>
							<?php
							
							endforeach;
							
							?>
<!--							<li><a href="#" class="actual">Presentación
									<span class="icono-triangulo right"></span></a>
							</li>
							<li><a href="#">Misión - Visión
									<span class="icono-triangulo right"></span></a>
							</li>
							<li><a href="#">Objetivos
									<span class="icono-triangulo right"></span></a>
							</li>-->
						</ul>
					</nav>
						<?php endif; ?>
					
					<h2><?php the_title(); ?></h2>
					<span class="fecha"><?php the_time('l, j \d\e F \d\e\l Y'); ?></span>
					<?php the_content(); ?>
					
					
<!--					<figure class="right"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/tmp-foto-pagina.jpg">
							<figcaption><span class="icono-ojo"></span>COOPAC Tikary

							</figcaption></a>
					</figure>-->
					</div>
				</article>
			</div>
			<?php get_sidebar(); ?>
		</div>
			<?php
		endwhile;
	endif;
	?>
	<?php
	get_footer();
	?>