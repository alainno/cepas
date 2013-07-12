<?php
get_header();

$category = get_category(get_query_var('cat'));

$subcategories = get_categories('child_of='.CATE_MULTIMEDIA.'&orderby=count&order=desc');
//echo '<pre>';
//print_r($subcategories);
//echo '</pre>';

?>
<div class="clearer">
	<div class="main-col left">
		<h1>
			<?php if($category->cat_ID != CATE_MULTIMEDIA): ?>
			Multimedia /
			<?php endif; ?>
			<span><?php single_cat_title(); ?></span>
		</h1>
		
		<nav class="submenu clearer">
		<ul>
			<li class="first-col"><a href="<?php echo get_category_link(CATE_MULTIMEDIA); ?>"<?php echo $category->cat_ID==CATE_MULTIMEDIA?' class="actual"':''; ?>>&raquo; Todos</a></li>
			<?php foreach($subcategories as $subcategory): ?>
			<li><a href="<?php echo get_category_link($subcategory->cat_ID); ?>"<?php echo $category->cat_ID==$subcategory->cat_ID?' class="actual"':''; ?>>&raquo; <?php echo $subcategory->name; ?></a></li>
			<?php endforeach;?>
		</ul>
		</nav>
		
		<div class="lista-categoria">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<article><a href="<?php the_permalink(); ?>">
							<div class="clearer">
								<?php
									$categories = wp_get_post_categories(get_the_ID());
									if (in_array(CATE_FOTO, $categories)) {
										$img_id = get_post_thumbnail_id(get_the_ID());
										$img_url = wp_get_attachment_image_src($img_id, 'scroll-size', true);
										$img_url = $img_url[0];
									} elseif (in_array(CATE_VIDEO, $categories)) {
										preg_match('/\/v\/(.{11})|\/embed\/(.{11})/', get_the_content(), $matches);
										$img_url = 'http://img.youtube.com/vi/' . $matches[2] . '/1.jpg';
									} elseif (in_array(CATE_AUDIO, $categories)) {
										$img_url = get_template_directory_uri() . '/img/bg-audio.gif';
									}
									?>
									<img src="<?php echo $img_url; ?>" class="alignleft" width="115" height="80" />
																	
								<h2><?php the_title(); ?></h2>
								<span class="fecha"><?php the_time('l, j \d\e F \d\e\l Y'); ?></span>
								<p>
									<?php echo resumen(get_the_content(), $number_words, '&raquo;'); ?>
								</p>
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