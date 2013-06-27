<?php
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
						/*if($category->cat_ID == CATE_MULTIMEDIA):
							preg_match('/\/v\/(.{11})|\/embed\/(.{11})/',get_the_content(),$matches);
							//print_r($matches);
					?>
						<img src="http://img.youtube.com/vi/<?php echo $matches[2]; ?>/1.jpg" width="120" height="90" class="alignleft" />
					<?php */
						$number_words = 40;
						
						if($category->cat_ID == CATE_NOTICIAS && has_post_thumbnail()):
							$thumb_id = get_post_thumbnail_id();
							$thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail',true);
					?>
						<img src="<?php echo $thumb_url[0]; ?>" class="alignleft" width="150" height="150" />
					<?php
						elseif($category->cat_ID == CATE_MULTIMEDIA):
							
							//echo get_the_ID();
							$number_words = 5;
							
							$categories = wp_get_post_categories(get_the_ID());
							if(in_array(CATE_FOTO, $categories)){
								$img_id = get_post_thumbnail_id(get_the_ID());
								$img_url = wp_get_attachment_image_src($img_id, 'scroll-size', true);
								$img_url = $img_url[0];
							}elseif(in_array(CATE_VIDEO, $categories)){
								preg_match('/\/v\/(.{11})|\/embed\/(.{11})/',get_the_content(),$matches);
								$img_url = 'http://img.youtube.com/vi/'.$matches[2].'/1.jpg';
							}
							elseif(in_array(CATE_AUDIO, $categories)){
								$img_url = get_template_directory_uri() . '/img/bg-audio.gif';
							}
					?>
						<img src="<?php echo $img_url; ?>" class="alignleft" width="115" height="80" />
					<?php
						endif;
					?>
					<h2><?php the_title(); ?></h2>
					<span class="fecha"><?php the_time('l, j \d\e F \d\e\l Y'); ?></span>
					<p><?php echo resumen(get_the_content(),$number_words); ?></p>
					</div></a>
				</article>
				<?php endwhile; endif; ?>
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