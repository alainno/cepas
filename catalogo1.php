<?php
/*
Template Name: catalogo
*/
?>
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
					<?php if(isset($subpages)): ?>
					<?php echo get_the_title($padre_id); ?> /&nbsp;<span><?php the_title(); ?></span>
					<?php else: ?>
					<span><?php the_title(); ?></span>
					<?php endif; ?>
				</h1>
                            <div class="cuerpo2">
                                <article>
					<div class="clearer">
						<?php // if(isset($subpages)): ?>
					<nav class="submenu left">
						<ul>
							<?php

//							 foreach($subpages as $subpage):
							
							?>
<!--							<li><a href="<?php echo get_page_link($subpage->ID); ?>" class="<?php echo $subpage->ID == $post->ID ? 'actual':''; ?>"><?php echo $subpage->post_title; ?>
									<span class="icono-triangulo right"></span></a>
							</li>-->
							<?php
							
//							endforeach;
							
							?>
							<li><a href="#" class="actual">Chompas
									<span class="icono-triangulo right blanco"></span></a>
							</li>
							<li><a href="#">Pantalones
									<span class="icono-triangulo right blanco"></span></a>
							</li>
							<li><a href="#">Suvenirs
									<span class="icono-triangulo right blanco"></span></a>
							</li>
							<li><a href="#">Regalos
									<span class="icono-triangulo right blanco"></span></a>
							</li>
							<li><a href="#">Recuerdos
									<span class="icono-triangulo right blanco"></span></a>
							</li>
						</ul>
					</nav>
						<?php // endif; ?>
                                            
                                            <div class="contenido-galeria">
                                                <h2>Chullo con orejas</h2>
                                                <img src="<?php echo get_template_directory_uri(); ?>/img/tmp-catalogo.jpg" class=" " width="300" height="300" />
                                            </div>
                                            
					
					<?php // the_content(); ?>
					
					
<!--					<figure class="right"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/img/tmp-foto-pagina.jpg">
							<figcaption><span class="icono-ojo"></span>COOPAC Tikary

							</figcaption></a>
					</figure>-->
					</div>
				</article>
                            </div>
				
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