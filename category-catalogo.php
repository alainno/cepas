<?php
get_header();

$lista_catalogo = array('9', '10', '11', '12');

$category = get_category(get_query_var('cat'));
$cate_id = $category->cat_ID;

$query = new WP_Query('cat=' . $cate_id);    
$total_posts = $query->found_posts;

if($cate_id == 9)
{
    $first_page = 3;
}
else
{
    $first_page = 9;
}

$second_page = 9;

$restante = $second_page - $first_page;

//if($paged > 0)
//{
    $a = $paged == 0 ? 0 : $paged - 1;
    $max_post_showed = ($a * $second_page) + $first_page;
    $posts_per_page = $paged == 0 ? $first_page : $second_page;
//}

$offset = $paged == 0 ? 0 : ($a * $posts_per_page) - $restante;

$args = array(
                'category' => $cate_id, 
                'offset' => $offset, 
                'posts_per_page' => $posts_per_page, 
                'paged' => $paged
             );

$cate_posts = get_posts($args);

//$paged = get_query_var('paged') ? get_query_var('paged') : 1;

//query_posts('category='.$cate_id.'&paged=' . $paged);

$subcategories = get_categories('child_of='.CATE_CATALOGO.'&orderby=count&order=desc');

?>
<div class="clearer">
    <div class="main-col left">
        <h1>
                <?php if($category->cat_ID != CATE_CATALOGO): ?>
                Tienda Solidaria /
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
		if($paged == 0 && $cate_id == CATE_CATALOGO):
		
		$page_tienda = get_page(PAGE_TIENDA);
		
		?>
		<article>
			<?php echo apply_filters('the_content', $page_tienda->post_content); ?>
		</article>
		<div class="mt20"></div>
		<?php endif; ?>
                                
                
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
			<?php
                            foreach($cate_posts as $cpost)
                            {
                                $post_id = $cpost->ID;
                                $permalink = $cpost->guid;
                                $title = $cpost->post_title;
                                
                        ?>
					<div class="product left">
						<a href="<?php echo $permalink; ?>">
							<?php
							$thumb_id = get_post_thumbnail_id($post_id);
							$thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail', true);
							?>
							<img src="<?php echo $thumb_url[0]; ?>" width="183" height="183" />
							<p><?php echo $title; ?></p>
						</a>
					</div>
			<?php
                            }
                        ?>
			</div>
		</div>
		<div class="paginacion clearer mt15">
			<div class="left"><?php previous_posts_link('&laquo; Anterior'); ?></div>
                        
                        <?php
                        if(in_array($cate_id, $lista_catalogo))
                        {
                            if($total_posts > $max_post_showed)
                            {
                        ?>
			<div class="right"><?php next_posts_link('Siguiente &raquo;'); ?></div>
                        <?php
                            }
                        }
                        ?>
		</div>
    </div>
	<?php get_sidebar(); ?>
</div>
<?php
get_footer();

//wp_reset_query();

?>
