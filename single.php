<?php

$categories = get_the_category();
$category = $categories[0];
if($category->parent > 0){
	$parent_category = get_category($category->parent);
}

get_header();
?>

		<div class="clearer">
			<div class="main-col left">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<h1>
					<?php if(isset($parent_category)): echo $parent_category->cat_name; ?> /&nbsp;<?php endif; ?>
					<span><?php echo $category->cat_name; ?></span>
				</h1>
				<article>
					<div class="clearer">
					<h2><?php the_title(); ?></h2>
					<span class="fecha"><?php the_time('l, j \d\e F \d\e\l Y'); ?></span>
					<?php the_content(); ?>
					<?php
						if($category->cat_ID == CATE_FOTO):
							$img_id = get_post_thumbnail_id();
							$img_url = wp_get_attachment_image_src($img_id, 'full', true);
					?>
					<img src="<?php echo $img_url[0]; ?>" width="610" />
					<?php
						elseif($category->cat_ID == CATE_AUDIO):
							$audio = get_children( array('post_parent' => $post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'audio' ) );
							foreach($audio as $att_id => $att):
					?>
							<audio src="<?php echo wp_get_attachment_url($att_id); ?>" controls="controls" style="width: 100%;height: 30px" />
					<?php endforeach; endif; ?>
					</div>
				</article>
<!--				<div class="paginacion clearer mt15">
					<div class="left"><?php //previous_posts_link('&laquo; Anterior'); ?></div>
					<div class="right"><?php //next_posts_link('Siguiente &raquo;'); ?></div>
				</div>-->
				<?php endwhile; endif; ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	<?php
	get_footer();
	?>