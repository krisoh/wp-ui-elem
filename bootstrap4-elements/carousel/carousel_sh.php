<?php


function carousel_shortcode( $atts, $content = null  ) {

    return carousel_template($atts,$content);

}

function carousel_template($options,$content){


}

add_shortcode( 'bs4Carousel', 'carousel_shortcode' );