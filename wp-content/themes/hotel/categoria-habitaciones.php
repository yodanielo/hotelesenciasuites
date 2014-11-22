<section id="primary" class="site-content">
    <div id="content" role="main">
        <div id="col1-habs">
            <?php
            $posts = query_posts( $query_string . '&orderby=title&order=asc' );
            $fotos = array();
            foreach ($posts as $key => $post) {
                if (!post_password_required($post->ID)) {

                    //obtengo la miniatura
                    $thumb_id = get_post_thumbnail_id($post->ID);
                    $thumb_url = wp_get_attachment_image_src($thumb_id, "medium", true);
                    $image = bfi_thumb($thumb_url[0], $__resize_thumb_habitaciones);
                    ?>
                    <div class="cont_thumb_hab" id="thumb_hab_<?= $post->ID ?>">
                        <div class="cont_thumb_hab_int">
                            <div class="background-thumb_hab"><span><?= $post->post_title ?></span></div>
                            <img src="<?= $image ?>" alt="<?= $post->post_title ?>" />
                            <div style="clear:both;"></div>
                        </div>
                    </div>
                    <?php
                }
                //print_r($post);
            }
            ?>
        </div>
        <div id="col2-arts">
            <?php
            foreach ($posts as $key => $post) {
                if (!post_password_required()) {
                    //obtengo las demas fotos
                    $keys = get_post_custom_keys($post->ID);
                    $VSlider = array();
                    if (array_search("habitacion", $keys)) {
                        $VSlider = array_map('trim', get_post_custom_values("habitacion",$post->ID));
                    }
                    ?>
                    <div class="cont_hab" id="cont_hab_<?= $post->ID ?>">
                        <?php if(count($VSlider)>0){ ?>
                        <div class="col2-1-fotos">
                            <ul class="sliderul">
                                <?php
                                foreach ($VSlider as $key => $image) {
                                    $image = bfi_thumb($image, $__resize_big_habitaciones);
                                    echo '<li><img src="' . $image . '" alt="' . $post->post_title . '"/></li>';
                                }
                                ?>
                            </ul>
                        </div>
                        <?php } ?>
                        <div class="col2-1-texto fondoblanco">
                            <h2><?=$post->post_title?></h2>
                            <?= $post->post_content ?>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
            <div class="col2-1-reserva fondoblanco">
                <script type="text/javascript" src="http://openhotel.com/apps/hotel.cfm?key=TTlbIjo2ODo7JDoqOiBMKCJXSFMiQUsmOUhGKTJbOi4lTVlZLyVfUUdMP1ooXF0qTFpNO0hDPT4iQFtYOAozRkVJSyA4JClVTS8uIzwvIzNVSU9SL1g9UFAgIAo_EQUAL_"></script>
            </div>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(function () {
        $(document).ready(function () {
            settings = {
                randomStart: true,
                adaptiveHeight: true,
                controls: false,
                auto: true
            };
            $(".cont_thumb_hab").click(function () {
                var idhab = $(this).attr("id").split("thumb_hab_").join("#cont_hab_");
                $(this).parent().find(".cont_thumb_hab").removeClass("active");
                $(this).addClass("active");
                $(".cont_hab").hide();
                $(idhab).show();
                if (!$(idhab).hasClass("yatieneslider")) {
                    objSlider = $(idhab).find('.sliderul').bxSlider(settings);
                    $(idhab).data("objSlider", objSlider);
                    $(idhab).addClass("yatieneslider");
                }
                else {
                    objSlider = $(idhab).data("objSlider");
                    objSlider.reloadSlider();
                }
            });
            $(".cont_thumb_hab:first").click();
        });
    });
</script>