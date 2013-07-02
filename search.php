<?php
get_header();
?>
<div class="clearer">
	<div class="main-col left">
		<h1>
			<span>Resultados de búsqueda</span>
		</h1>
		<div class="lista-categoria">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<article><a href="<?php the_permalink(); ?>">
							<div class="clearer">
								<?php
								$number_words = 50;
								if (has_post_thumbnail()):
									$thumb_id = get_post_thumbnail_id();
									$thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail', true);
									$number_words = 40;
								?>
									<img src="<?php echo $thumb_url[0]; ?>" class="alignleft" width="150" height="150" />
								<?php endif; ?>
								<h2><?php the_title(); ?></h2>
								<span class="fecha"><?php the_time('l, j \d\e F \d\e\l Y'); ?></span>
								<p><?php echo resumen(get_the_content(), $number_words); ?></p>
							</div>
						</a></article>
					<?php
				endwhile;
			endif;
			?>
		</div>
		<div class="paginacion clearer mt15">
			<div class="left"><?php previous_posts_link('&laquo; Anterior'); ?></div>
			<div class="right"><?php next_posts_link('Siguiente &raquo;'); ?></div>
		</div>
	</div>
	<?php echo get_sidebar(); ?>
</div>
<?php
get_footer();
?>
