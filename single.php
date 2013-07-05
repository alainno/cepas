<?php
$categories = get_the_category();
$category = $categories[0];
if ($category->parent > 0) {
    $parent_category = get_category($category->parent);
}

//echo $category->cat_ID;

if (in_array(CATE_CATALOGO, array($category->cat_ID, $parent_category->cat_ID))) {

//if(in_category(9, $post->ID)){
    include TEMPLATEPATH . '/single-producto.php';
    exit(0);
}

get_header();
?>

<div class="clearer">
    <div class="main-col left">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <h1>
                    <?php if (isset($parent_category)): echo $parent_category->cat_name; ?> /&nbsp;<?php endif; ?>
                    <span><?php echo $category->cat_name; ?></span>
                </h1>
                <article>
                    <div class="clearer">
                        <h2><?php the_title(); ?></h2>
                        <span class="fecha"><?php the_time('l, j \d\e F \d\e\l Y'); ?></span>
                        <?php
                        if ($category->cat_ID == CATE_FOTO):
                            $img_id = get_post_thumbnail_id();
                            $img_url = wp_get_attachment_image_src($img_id, 'full', true);
                            var_dump($img_url);
                            ?>
                            <img src="<?php echo $img_url[0]; ?>" width="630" />
                            <?php the_content(); ?>
                            <?php
                        elseif ($category->cat_ID == CATE_AUDIO):
                            $audio = get_children(array('post_parent' => $post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'audio', 'numberposts' => 1));
                            foreach ($audio as $att_id => $att):
                                $audio_url = wp_get_attachment_url($att_id);
                                ?>
                                <audio src="<?php echo $audio_url; ?>" controls="controls">:)</audio>
                                <div id="audio" class="oculto" swf="<?php echo get_template_directory_uri(); ?>/swf/player.swf"><?php echo $audio_url; ?></div>
                            <?php endforeach; ?>
                            <?php
                        elseif ($category->cat_ID == CATE_FOLLETOS):
                            $pdf = get_children(array('post_parent' => $post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'application/pdf', 'numberposts' => 1));
                            foreach ($pdf as $att_id => $att):
                                $pdf_url = wp_get_attachment_url($att_id);
                                ?>
                                <iframe src="http://docs.google.com/gview?url=<?php echo $pdf_url; ?>&embedded=true" style="width:100%; height:500px;" frameborder="0"></iframe>
                            <?php endforeach; ?>
                                                       
                        <?php else: ?>
                            <?php the_content(); ?>
                        <?php endif; ?>
                    </div>
                </article>
                <div class="paginacion clearer mt15">
                    <div class="left"><?php next_post_link('%link', '&laquo; Anterior', true); ?></div>
                    <div class="right"><?php previous_post_link('%link', 'Siguiente &raquo;', true); ?></div>
                </div>
            <?php endwhile;
        endif; ?>
    </div>
    <?php get_sidebar(); ?>
</div>
<?php
get_footer();
?>