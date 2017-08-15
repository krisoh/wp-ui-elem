<?php


function modal_shortcode( $atts, $content = null  ) {

    return modal_template($atts,$content);

}

function modal_template($options,$content){


}

add_shortcode( 'bs4Modal', 'modal_template' );