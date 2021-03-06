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

				<?php if(isset($subpages)): ?>
					<nav class="submenu clearer">
						<ul>
							<?php
							foreach($subpages as $k => $subpage):
							?>
							<li class="<?php echo $k%4 == 0 ? 'first-col' : '',$k>3 ? ' second-row' : ''; ?>">
								<a href="<?php echo get_page_link($subpage->ID); ?>" class="<?php echo $subpage->ID == $post->ID ? 'actual':''; ?>">&raquo; <?php echo $subpage->post_title; ?></a>
							</li>
							<?php
							endforeach;
							$total_subpages = $k + 1;
							if($total_subpages%4 > 0):
							$resto = 4 - $total_subpages%4;
							for($i=0;$i<$resto;$i++):
							?>
							<li<?php echo $total_subpages>4?' class="second-row"':''; ?>></li>
							<?php endfor; endif; ?>
						</ul>
					</nav>
				<?php endif; ?>				
				
				<article>
					<div class="clearer">
						<?php /*if(isset($subpages)): ?>
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
						</ul>
					</nav>
						<?php endif;*/ ?>
					
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