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
        $opciones=get_option("theme_mods_hotel");
        $direccion=$opciones["twentytwelve_theme_options"]["text_direccion"];
        $telefono=$opciones["twentytwelve_theme_options"]["text_telefono"];

        $imagenlogo=get_option("twentytwelve_theme_options");
        $imagenlogo=$imagenlogo["image_logo_footer"];
        ?>
	<footer id="colophon" role="contentinfo">
            <div id="col1-menu" class="hidden-xs">
                <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
            </div>
            <div id="col2-menu">
                <?php wp_nav_menu(array('theme_location' => 'secondary')); ?>
                <div id="telefonoFooter"><?= __("Telephone").":<br/>".$telefono ?> </div>
            </div>
            <div id="col3-menu">
                <?= str_replace("\n", "<br/>", $direccion)?>
            </div>
            <div id="col4-menu" class="site-info">
                <img src="<?=$imagenlogo?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" width="90" />
            </div><!-- .site-info -->
            <div style="clear:both;"></div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
    </div><!--wrapper-principal-->
    <script type="text/javascript">
        //web
        $("#site-navigation .wrapper920>div").append('<ul class="nav-menu nav navbar-nav navbar-right" id="menubanderas"></ul>');
        //mobile
        $("#site-navigation-mobile #menu-menu_primario").append('<li class="ico_mobile_flag"></li>');
        <?php foreach (wp_get_sites() as $key => $value) {?>
        $("#menubanderas").append('<li><a href="<?=$value["path"]?>"><span><img src="<?=  get_template_directory_uri()?>/img/hotel-esencia-suites-banderas-<?=$value["blog_id"]?>.png"/></span></a></li>');
        $(".ico_mobile_flag").append('<a href="<?=$value["path"]?>"><span><img src="<?=  get_template_directory_uri()?>/img/hotel-esencia-suites-banderas-<?=$value["blog_id"]?>.png"/></span></a>');
        <?php } ?>
    </script>
    <script type="text/javascript">
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-57242293-1', 'auto');
          ga('send', 'pageview');
    </script>
</body>
</html>