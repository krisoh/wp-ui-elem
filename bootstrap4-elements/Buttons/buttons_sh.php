<?php


function button_shortcode( $atts, $content = null  ) {

    return button_template($atts,$content);

}

function button_template($options,$content){


}

add_shortcode( 'bs4Buttons', 'button_shortcode' );