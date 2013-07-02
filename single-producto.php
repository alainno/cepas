<?php

get_header();

?>
<div class="clearer">
	<div class="main-col left">
		<?php
		
		$categories = get_categories(array(
			'child_of' => CATE_CATALOGO
		));
		
		foreach($categories as $category):
		?>
		<?php echo $category->name; ?>
		<?php endforeach; ?>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php

get_footer();

?>