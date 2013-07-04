<?php
get_header();
?>
<div class="clearer">
    <div class="main-col left">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <h1>
                    <?php if (isset($parent_category)): echo $parent_category->cat_name; ?> /&nbsp;<?php endif; ?>
                    <span><?php echo $category->cat_name; ?></span>
                </h1>
                <!--                <div class="clearer">-->

                <!--            <div class="left-col left">
                                <nav class="submenu">
                                    <ul>
                                        <li><a href="#" class="actual">Chompas
                                                <span class="icono-triangulo right blanco"></span></a>
                                        </li>
                                        <li><a href="#">Pantalones
                                                <span class="icono-triangulo right blanco"></span></a>
                                        </li>
                                        <li><a href="#">Suvenirs
                                                <span class="icono-triangulo right blanco"></span></a>
                                        </li>
                                        <li><a href="#">Regalos
                                                <span class="icono-triangulo right blanco"></span></a>
                                        </li>
                                        <li><a href="#">Recuerdos
                                                <span class="icono-triangulo right blanco"></span></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>-->
                <article>
                    <h2><?php the_title(); ?> <img id="etiq" src="<?php echo get_template_directory_uri(); ?>/img/img-etiqueta.png" class="" width="142" height="25" /><p class="precio">S/. 12.40</p></h2>
                    <div class="line-etiq"></div>
                    <?php
                    $thumb_id = get_post_thumbnail_id();
                    $thumb_url = wp_get_attachment_image_src($thumb_id, 'thumbnail', true);
                    $content = get_the_content();
                    $_images = getImages($content);
                    $images = $_images[0];

                    $_precio = get_post_meta(get_the_ID());
                    $precio = $_precio["Precio"][0];
                    ?>
                    <div class="clearer">
        <!--<img id="img-cat-main" src="<?php echo $thumb_url[0]; ?>" class="left" width="495" height="420" />-->
                        <img id="img-cat-main" src="<?php echo get_theme_template; ?>" class="left" width="495" height="420" />
                        <div class="imgs-children right">
                            <ul>
                                <?php
                                for ($i = 0; $i < sizeof($images); $i++) {
                                    ?>
                                    <li><?php echo $images[$i] ?></li>
                                    <?php
                                }
                                ?>

                            </ul>
                        </div>
                    </div>
                    <p><?php echo removeImages($content); ?></p>
                    <p class="precio"><?php echo $precio; ?></p>
                </article>
                <div class="paginacion clearer mt15">
                    <div class="left"><?php next_post_link('%link', '&laquo; Anterior', true); ?></div>
                    <div class="right"><?php previous_post_link('%link', 'Siguiente &raquo;', true); ?></div>
                </div>
                <!--                </div>-->


                <?php
            endwhile;
        endif;
        ?>
        <?php /*
          $categories = get_categories(array(
          'child_of' => CATE_CATALOGO
          ));

          foreach($categories as $category):
          ?>
          <?php echo $category->name; ?>
          <?php endforeach; */ ?>
    </div>
    <?php get_sidebar(); ?>
</div>
<?php
get_footer();
?>