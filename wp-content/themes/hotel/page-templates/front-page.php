<?php
/**
 * Template Name: Front Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
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
    $VSlider = array();
    $VEdificio = array();

    if (array_search("slider", $keys))
        $VSlider = array_map('trim', get_post_custom_values("slider"));
    ?>
    <div id="contsliders">
        <div class="slidercontent">
            <ul class="sliderul">
                <?php
                foreach ($VSlider as $key => $imgSlider) {
                    $image = bfi_thumb($imgSlider, $__resize_slider_home);
                    echo '<li><img src="' . $image . '" alt=""/></li>';
                }
                ?>
            </ul>
        </div>
        <div class="edificiocontent">
            <ul class="edificioul">
                <?php
                $thumb_id = get_post_thumbnail_id($post->ID);
                $thumb_url = wp_get_attachment_image_src($thumb_id, "medium", true);
                $image = bfi_thumb($thumb_url[0], $__resize_edificio_home);
//            foreach ($VEdificio as $key => $imgSlider) {
//                $image=bfi_thumb( $imgSlider, $__resize_edificio_home );
                echo '<li><img src="' . $image . '" alt=""/></li>';
//            }
                ?>
            </ul>
        </div>
    </div>
    <div class="fondoblanco" id="maincontent">
        <div id="cuadroreserva">
            <div id="titleBooking"><strong><?=__("Booking")?>:</strong></div>
            <div id="todoelscript">
            <?php
            global $current_blog;
            echo "<!-- blogID = " . $current_blog->blog_id . "-->";
            if ($current_blog->blog_id == 1) {//español
                ?>
                <div class="visible-md-block visible-lg-block">
                    <SCRIPT LANGUAGE="Javascript" TYPE="text/javascript" SRC="http://openhotel.com/apps/hotel.cfm?key=TTlbIjo2ODo7JDoqOiBMKCJXSFMiQUsmOUhGKTJbOi4lTVlZLyVfUUdMP1ooXF0qTFpNI0hDPT4iQFtYOAo1RkVJSyA4JClVTS8uIzwjLTNFSU9TL0g4UVpPKAo_EQUAL_"></SCRIPT>
                </div>
                <div class="visible-xs-block visible-sm-block">
                </div>
                <?php
            } else {//ingles
                ?>
                <div class="visible-md-block visible-lg-block">
                    <SCRIPT LANGUAGE="Javascript" TYPE="text/javascript" SRC="http://openhotel.com/apps/hotel.cfm?key=TTlbIjo2ODo7JDoqOiBMKCJXSFMiQUsmOUhGKTJbOi4lTVlZLyVfUUdMP1ooXF0qTFpNO0hDPT4iQFtYOAozRkVJSyA4JClVTS8uIzwvIzNVSU9SL1g9UFAgIAo_EQUAL_"></SCRIPT>
                </div>
                <div class="visible-xs-block visible-sm-block">
                </div>
                <?php
            }
            ?>
            </div>
        </div>
        <div id="cuadrotelefonohome">
            <?php
            $casa=get_option("theme_mods_hotel");
            $casa=$casa["twentytwelve_theme_options"]["text_telefono"];
            ?>
            <?= __("Telephone").': <div id="fonoCasaMain">'.$casa."</div>" ?> 
        </div>
        <div id="cuerpohome-col1">
            <div id="innercuerpohome-col1">
                <?= $post->post_content ?>
            </div>
        </div>
        <div id="cuerpohome-col2">
            <?php
            $imagenlogo = get_option("twentytwelve_theme_options");
            $imagenlogo = $imagenlogo["image_logo_footer"];
            ?>
            <img src="<?= $imagenlogo ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" />
        </div>
        <div id="cuerpohome-col3">
            <div id="climalocal">
                <!-- www.TuTiempo.net - Ancho:110px - Alto:50px -->
                <div id="TT_RiB1Ek111jfcd7hA1AqjDjDDz9n1MAEFrdEtkci5qEj"><a href="http://www.tutiempo.net">El tiempo 15 días</a></div>
                <script type="text/javascript" src="http://www.tutiempo.net/widget/eltiempo_RiB1Ek111jfcd7hA1AqjDjDDz9n1MAEFrdEtkci5qEj"></script>
            </div>
            <div id="horalocal"></div>
        </div>
        <div style="clear:both;"></div>
    </div>
    <?php
//print_r($post->post_content);
endwhile; // end of the loop. 
?>
<script type="text/javascript">
    $(function () {
        $(document).ready(function () {
            settings = {
                randomStart: true,
                adaptiveHeight: true,
                controls: false,
                auto: true
            };
            $('.sliderul').bxSlider(settings);
            //$('.edificioul').bxSlider(settings);
            //----------------------------------------
            $("#horalocal").horaMundial(-5, "");
        });
    });
</script>
<?php get_sidebar('front'); ?>
<?php get_footer(); ?>