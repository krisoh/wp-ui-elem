<?php


function card_shortcode( $atts, $content = null  ) {

    return card_template($atts,$content);

}

function card_template($options,$content){


}

add_shortcode( 'bs4Card', 'card_shortcode' );