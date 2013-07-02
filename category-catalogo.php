<?php

get_header();

?>
<div class="clearer">
	<div class="main-col left">
		<h1>Catálogo</h1>
		<div class="clearer">
			<div class="left-col left">
					<nav class="submenu left">
							<ul>
		<?php
		
		$categories = get_categories(array(
			'child_of' => CATE_CATALOGO
		));
		
		foreach($categories as $category):
		?>
								<li><a href="<?php echo get_category_link($category->cat_ID); ?>" class="<?php echo $subpage->ID == $post->ID ? 'actual':''; ?>"><?php echo $category->name; ?>
										<span class="icono-triangulo right"></span></a>
								</li>
								<?php

								endforeach;

								?>
							</ul>
						</nav>
			</div>
		</div>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php

get_footer();

?>
