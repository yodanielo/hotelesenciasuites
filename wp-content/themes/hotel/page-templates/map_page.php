<?php
/*
  Template Name: Mostrar Mapa
 */
wp_enqueue_style("bxslider", get_template_directory_uri() . "/package/jquery.bxslider/jquery.bxslider.css", array());
wp_enqueue_script("bxslider", get_template_directory_uri() . "/package/jquery.bxslider/jquery.bxslider.min.js", array());

get_header();
?>
<?php
while (have_posts()) : the_post();
    /* if ( has_post_thumbnail() ) : ?>
      <div class="entry-page-image">
      <?php the_post_thumbnail(); ?>
      </div><!-- .entry-page-image -->
      <?php endif; ?>

      <?php get_template_part( 'content', 'page' ); */
    //carrusel
    //edificio
    //contenido
    //reserva
    $keys = get_post_custom_keys();

    $direccionmaps = get_option("theme_mods_hotel");
    $direccionmaps = $direccionmaps["twentytwelve_theme_options"]["text_direccion_maps"];
    ?>
    <div id="contsliders">
        <div id="mapscontent">
            <img src="<?= get_template_directory_uri() ?>/img/hotel-esencia-suites-fondotrans.png" alt="Mapa" />
            <iframe class="mapscel" id="embedmaps" frameborder="0" style="border:0" 
                    src=""
                    ></iframe>
        </div>
        <div class="edificiocontent">
            <ul class="edificioul">
                <?php
                $thumb_id = get_post_thumbnail_id($post->ID);
                $thumb_url = wp_get_attachment_image_src($thumb_id, "medium", true);
                $image = bfi_thumb($thumb_url[0], $__resize_edificio_home);
//                foreach ($VEdificio as $key => $imgSlider) {
//                    $image = bfi_thumb($imgSlider, $__resize_edificio_home);
                echo '<li><img src="' . $image . '" alt=""/></li>';
//                }
                ?>
            </ul>
        </div>
        <div style="clear:both;"></div>
    </div>
    <div class="fondoblanco" id="maincontent">
        <div id="cuerpohome-colfull">
            <div id="innercuerpohome-colfull">
                <?= $post->post_content ?>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>
    <?php
//print_r($post->post_content);
endwhile; // end of the loop. 
?>
<script type="text/javascript">
    $(function() {
        $(document).ready(function() {
            var maps = {
                q: "<?= preg_replace("/(\"|\'|\|)/", "\\\\$1", trim($direccionmaps)) ?>",
                key: "AIzaSyAOs1AFCWB8jpM1AXO1RCMr2gHtibgs4ZU",
                url: "https://www.google.com/maps/embed/v1/place?"
            };
            $("#embedmaps").attr("src", maps.url + "key=" + encodeURIComponent(maps.key) + "&q=" + encodeURIComponent(maps.q));
        });
    });
</script>
<?php get_sidebar('front'); ?>
<?php get_footer(); ?>