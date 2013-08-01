<?php

if(post_is_in_descendant_category(CATE_MULTIMEDIA)){
	include (TEMPLATEPATH . '/category-multimedia.php'); 
	exit;
}

if(post_is_in_descendant_category(CATE_CATALOGO))
{
    include (TEMPLATEPATH . '/category-catalogo.php'); 
    exit;
}

get_header();
?>
<div class="clearer">
	<div class="main-col left">
		<h1>
			<span><?php single_cat_title(); ?></span>
		</h1>
		<div class="lista-categoria">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<article><a href="<?php the_permalink(); ?>">
							<div class="clearer">
								<?php
								$category = get_category(get_query_var('cat'));
								if ($category->cat_ID == CATE_NOTICIAS && has_post_thumbnail()):
									$thumb_id = get_post_thumbnail_id();
									$thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail', true);
								?>
									<img src="<?php echo $thumb_url[0]; ?>" class="alignleft" width="150" height="150" />
									<h2><?php the_title(); ?></h2>
									<span class="fecha"><?php the_time('l, j \d\e F \d\e\l Y'); ?></span>									
									<p>
										<?php echo resumen(get_the_content(), 40); ?>
										<strong>Leer&nbsp;más&nbsp;&raquo;</strong>
									</p>
								<?php
								elseif($category->cat_ID == CATE_FOLLETOS):
									$show_more = false;
								?>
									<img src="<?php echo get_template_directory_uri(); ?>/img/icono-pdf.png" class="alignleft" width="48" height="48" />
									<h2><?php the_title(); ?></h2>
									<span class="fecha"><?php the_time('l, j \d\e F \d\e\l Y'); ?></span>									
								<?php
								endif;
								?>


							</div></a>
					</article>
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
	<?php get_sidebar(); ?>
</div>
<?php
get_footer();
?>