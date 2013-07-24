<?php
get_header();

$category = get_category(get_query_var('cat'));

//query_posts('posts_per_page=3');

//$posts_per_page = $paged > 0 ? 9 : 3;
/*$posts_per_page = 4;

$posts = query_posts(array(
	'posts_per_page' => $posts_per_page
	,'paged' => $paged
	,'meta_key' => '_thumbnail_id'
	,'cat' => $cate_id
));*/

$subcategories = get_categories('child_of='.CATE_CATALOGO.'&orderby=count&order=desc');

?>
<div class="clearer">
    <div class="main-col left">
        <h1>
                <?php if($category->cat_ID != CATE_CATALOGO): ?>
                Catalogo /
                <?php endif; ?>
                <span><?php single_cat_title(); ?></span>
        </h1>
		<!--            <div class="left-col left">
						<nav class="submenu left">
							<ul>-->
		<?php /*
		  $categories = get_categories(array(
		  'child_of' => CATE_CATALOGO
		  ));

		  foreach ($categories as $category):
		  ?>
		  <li><a href="<?php echo get_category_link($category->cat_ID); ?>" class="<?php echo $subpage->ID == $post->ID ? 'actual' : ''; ?>"><?php echo $category->name; ?>
		  <span class="icono-triangulo right blanco"></span></a>
		  </li>
		  <?php
		  endforeach; */
		?>
		<!--                    </ul>
						</nav>
					</div>-->
		<?php
		if($paged == 0):
		
		$page_tienda = get_page(PAGE_TIENDA);
		
		?>
		<article>
			<?php echo $page_tienda->post_content; ?>
		</article>
		<?php endif; ?>
                <br/>
                <nav class="submenu clearer">
                        <ul>
                                <li class="first-col"><a href="<?php echo get_category_link(CATE_CATALOGO); ?>"<?php echo $category->cat_ID==CATE_CATALOGO?' class="actual"':''; ?>>&raquo; Todos</a></li>
                                <?php foreach($subcategories as $subcategory): ?>
                                <li><a href="<?php echo get_category_link($subcategory->cat_ID); ?>"<?php echo $category->cat_ID==$subcategory->cat_ID?' class="actual"':''; ?>>&raquo; <?php echo $subcategory->name; ?></a></li>
                                <?php endforeach;?>
                        </ul>
		</nav>
                
		<div class="productolist<?php echo $paged==0?' mt0':''; ?>">
			<div class="clearer">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					<div class="product left">
						<a href="<?php the_permalink(); ?>">
							<?php
							$thumb_id = get_post_thumbnail_id();
							$thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail', true);
							?>
							<img src="<?php echo $thumb_url[0]; ?>" width="183" height="183" />
							<p><?php the_title(); ?></p>
						</a>
					</div>
			<?php endwhile; endif; ?>
			</div>
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

//wp_reset_query();

?>