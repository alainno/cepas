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
                <article class="producto">
                    <?php
                    $_campos = get_post_meta(get_the_ID());

//                                                echo ('<pre>');
//                                                var_dump($_precio);
//                                                die();
                    
                    $precio = $_campos["Precio"][0];
                    /*$material = $_campos["Material"][0];
                    $artesano = $_campos["Artesano"][0];
                    $disponibilidad = $_campos["Disponibilidad"][0];
                    $procedencia = $_campos["Procedencia"][0];*/
                    
                    $talla = $_campos['talla'][0];
                    $codigo = $_campos['codigo'][0];
                    $material = $_campos['material'][0];
                    $base = $_campos['base_artesanal'][0];
                    $descripcion = $_campos['descripcion'][0];
                    
                    ?>
                    <h2>
                        <?php the_title(); ?>
                        <?php if (!empty($precio) && is_numeric($precio)): ?>
                            <img id="etiq" src="<?php echo get_template_directory_uri(); ?>/img/img-etiqueta.png" class="" width="128" height="29" />
                            <p class="precio">S/. <?php echo number_format($precio, 2); ?></p>
                        <? endif; ?>
                    </h2>
                    <div class="line-etiq"></div>
                    <?php
					$content = apply_filters('the_content', get_the_content());
					$content = removeLinks($content);
					$content = removeImages($content);

                    $inlineImages = array();
                    preg_match_all('/src="([^"]*)"/i', $content, $inlineImages);
                    
                    $aux = wp_get_attachment_image_src(get_post_thumbnail_id(), 'producto-size');
                    $img_dest = $aux[0];
                    
                    $aux = wp_get_attachment_image_src(get_post_thumbnail_id(), 'producto-thumb-size');
                    $img_thumb_dest = $aux[0];
                    
                    $f_image = $inlineImages[1][0];
                    $f_img_id = get_attachment_id_from_url($f_image);
                    $f_image_src = wp_get_attachment_image_src($f_img_id, 'producto-size');
                    $first_image_src = $f_image_src[0];
                    //var_dump($first_image_src);
                    
                    ?>
                    <div class="clearer">
                        <div class="left imgs">
                            <div class="left">
                                <img id="img-cat-main" src="<?php echo $img_dest; ?>" width="380" height="320" />
                            </div>
                            <div class="imgs-children left imgs-children-a">
                                <ul>
                                    <li><a href="<?php echo $img_dest; ?>"><img src="<?php echo $img_thumb_dest; ?>"/></a></li>
                                    <?php
                                    foreach ($inlineImages[1] as $k => $image):
                                        $img_id = get_attachment_id_from_url($image);
                                        $thumb_src = wp_get_attachment_image_src($img_id, 'producto-thumb-size');
                                        $image_src = wp_get_attachment_image_src($img_id, 'producto-size');
                                        if ($k == 0) {
                                            $first_image_src = $image_src[0];
                                        }
                                        ?>
                                        <li><a href="<?php echo $image_src[0]; ?>"><img src="<?php echo $thumb_src[0]; ?>"/></a></li>
                                        <?php
                                        if ($k >= 6) {
                                            break;
                                        }
                                    endforeach;
                                    ?>
                                </ul>
                            </div>
                        </div>

					<div class="right letras">
                        <?php echo $content; ?>
                        
                        <div class="propiedades ">
                            <p><strong>Material : </strong><?php echo $material; ?></p>
                            <p><strong>Talla : </strong><?php echo $talla; ?></p>
                            <p><strong>Descripción : </strong><?php echo $descripcion; ?></p>
                            <p><strong>Base Artesanal : </strong><?php echo $base; ?></p>
                            <p><strong>Código : </strong><?php echo $codigo; ?></p>
                        </div>  
                    </div>
                    </div>
                    

                    <div class="link-volver">
                        <a href="<?php echo get_category_link(CATE_CATALOGO); ?>"><img id=" " src="<?php echo get_template_directory_uri(); ?>/img/flecha-volver.gif" class="" width="16" height="16" /><span>Volver a catálogo</span></a>
                    </div>
                </article>
                <div class="paginacion clearer mt15">
                    <div class="left"><?php next_post_link('%link', '&laquo; Anterior', true); ?></div>
                    <div class="right"><?php previous_post_link('%link', 'Siguiente &raquo;', true); ?></div>
                </div>

                <?php
            endwhile;
        endif;
        ?>
    </div>
    <?php get_sidebar(); ?>
</div>
<?php
get_footer();
?>
