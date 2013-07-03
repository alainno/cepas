<?php
get_header();
?>
<div class="clearer">
    <div class="main-col left">
        <h1>
					<span><?php single_cat_title(); ?></span>
				</h1>
        <div class="clearer">
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
                        endforeach;*/
                        ?>
<!--                    </ul>
                </nav>
            </div>-->
            <div class="productolist right">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <div class="product left">
                            <a href="<?php the_permalink(); ?>">
                                <?php 
                                        $thumb_id = get_post_thumbnail_id();
                                        $thumb_url = wp_get_attachment_image_src($thumb_id,'thumbnail',true);
                                ?>
                                <img src="<?php echo $thumb_url[0]; ?>" width="183" height="183" />
                                <p><?php the_title(); ?></p>
                    <!--                        <p>S/. 12.50</p>-->
                            </a>
                        </div> 
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
    </div>
    <?php get_sidebar(); ?>
</div>
<?php
get_footer();
?>