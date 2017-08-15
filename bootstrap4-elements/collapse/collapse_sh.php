<?php


function collapse_shortcode( $atts, $content = null  ) {

    return collapse_template($atts,$content);

}

function collapse_template($options,$content){


}

add_shortcode( 'bs4Collapse', 'collapse_shortcode' );