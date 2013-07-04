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
                <article class="producto">
                        <h2><?php the_title(); ?></h2>
                        <?php
                        $post_id = get_the_ID();
                        
                        $conf = array(
                                        'numberposts' => -1,
                                        'post_parent' => $post_id,
                                        'post_status' => 'inherit',
                                        'post_type' => 'attachment',
                                        'post_mime_type' => 'image',
                                        'order' => 'ASC',
                                        'orderby' => 'menu_order'
                                      );
                        
                        $img_ids = get_posts($conf);
                        
                        $images = array();
                        $max_images = 3;
                        $thumb_id = get_post_thumbnail_id();
                        
                        for($i=0; $i<$max_images; $i++)
                        {
                            $id = $img_ids[$i]->ID;
                            
                            if($id != $thumb_id)
                            {
                                $src = wp_get_attachment_image_src($id, 'producto-size');
                                $images[$i]["src"] = $src[0];
                                $src_thumb = wp_get_attachment_image_src($id, 'producto-thumb-size');
                                $images[$i]["src_thumb"] = $src_thumb[0];
                            }
                        }
                        
                        $content = get_the_content();

                        $_precio = get_post_meta(get_the_ID());
                        $precio = $_precio["Precio"][0];
                        ?>
                        <div class="clearer">
                            <div class="left">
                                <img id="img-cat-main" src="<?php echo $images[0]["src"]; ?>" width="495" height="420" />
                            </div>
                            <div class="imgs-children right">
                                <ul>
                                    <?php
                                    for($i=0; $i<sizeof($images); $i++):
                                        $image = $images[$i];
                                    ?>
                                    <li><a href="<?php echo $image["src"];?>"><img src="<?php echo $image["src_thumb"];?>"/></a></li>
                                    <?php
                                    endfor;
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
