<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->
        <?php
        $direccion=get_option("theme_mods_hotel");
        $direccion=$direccion["twentytwelve_theme_options"]["text_direccion"];

        $imagenlogo=get_option("twentytwelve_theme_options");
        $imagenlogo=$imagenlogo["image_logo_footer"];
        ?>
	<footer id="colophon" role="contentinfo">
            <div id="col1-menu">
                <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
            </div>
            <div id="col2-menu">
                <?php wp_nav_menu(array('theme_location' => 'secondary')); ?>
            </div>
            <div id="col3-menu">
                <img src="<?=$imagenlogo?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" />
            </div>
            <div id="col4-menu" class="site-info">
                <?= str_replace("\n", "<br/>", $direccion)?>
            </div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
    </div><!--wrapper-principal-->
</body>
</html>