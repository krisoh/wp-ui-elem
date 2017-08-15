<?php


function badge_shortcode( $atts, $content = null  ) {

    return badge_template($atts,$content);

}

function badge_template($options,$content){

    ob_start();
    ?>
    <div class="content"> <?php echo $content ?></div>
    <?php
    return ob_get_clean();

}

add_shortcode( 'bs4Badge', 'badge_shortcode' );