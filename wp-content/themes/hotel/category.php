<?php
/**
 * The template for displaying Category pages
 *
 * Used to display archive-type pages for posts in a category.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
wp_enqueue_style("bxslider", get_template_directory_uri() . "/package/jquery.bxslider/jquery.bxslider.css", array());
wp_enqueue_script("bxslider", get_template_directory_uri() . "/package/jquery.bxslider/jquery.bxslider.min.js", array());

get_header(); 

    global $current_blog;
    $cat = get_query_var('cat');
    if($current_blog->blog_id==1){
        switch ($cat){
            case 3://habitaciones
                include 'categoria-habitaciones.php';
                break;
            default:
                include 'categoria-general.php';
        }
    }
    else{
        switch ($cat){
            case 3://rooms
                include 'categoria-habitaciones.php';
                break;
            default:
                include 'categoria-general.php';
        }
    }

get_sidebar(); ?>
<?php get_footer(); ?>