<?php
get_header();
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="wide-col">
				<h1>
					<span><?php the_title(); ?></span>
				</h1>
				<article>			
					<?php the_content(); ?>
				</article>
			</div>
		<?php
	endwhile;
endif;
?>
<?php
get_footer();
?>