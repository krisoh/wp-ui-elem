<?php


function alerts_shortcode( $atts, $content = null  ) {

    return badge_template($atts,$content);

}

function alerts_template($options,$content){

    ob_start();
    ?>
    <div class="content"> <?php echo $content ?></div>
    <?php
    return ob_get_clean();

}

add_shortcode( 'bs4Alerts', 'alerts_template' );