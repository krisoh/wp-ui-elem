<?php


function breadcrumb_shortcode( $atts, $content = null  ) {

    return breadcrumb_template($atts,$content);

}

function breadcrumb_template($options,$content){


}

add_shortcode( 'bs4Breadcrumb', 'breadcrumb_shortcode' );