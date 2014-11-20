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
    $keys=get_post_custom_keys();
    $VSlider=array(); 
    $VEdificio=array();
            
    if(array_search("slider", $keys))
        $VSlider = array_map('trim', get_post_custom_values("slider"));
    if(array_search("edificio", $keys))
        $VEdificio = array_map('trim', get_post_custom_values("edificio"));
    ?>
    <div class="slidercontent">
        <ul class="sliderul">
            <?php
            foreach ($VSlider as $key => $imgSlider) {
                echo '<li><img src="' . $imgSlider . '" alt=""/></li>';
            }
            ?>
        </ul>
    </div>
    <div class="edificiocontent">
        <ul class="edificioul">
            <?php
            foreach ($VSlider as $key => $imgSlider) {
                echo '<li><img src="' . $imgSlider . '" alt=""/></li>';
            }
            ?>
        </ul>
    </div>
    <div class="fondoblanco" id="maincontent">
        <?= $post->post_content ?>
    </div>
    <?php
//print_r($post->post_content);
endwhile; // end of the loop. 
?>
<script type="text/javascript">
    $(function () {
        $(document).ready(function () {
            settings={
                randomStart:true,
                adaptiveHeight:true,
                controls:false
            };
            $('.sliderul').bxSlider(settings);
            $('.edificioul').bxSlider(settings);
        });
    });
</script>
<?php get_sidebar('front'); ?>
<?php get_footer(); ?>