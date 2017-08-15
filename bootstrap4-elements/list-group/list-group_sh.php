<?php


function listgroup_shortcode( $atts, $content = null  ) {

    return listgroup_template($atts,$content);

}

function listgroup_template($options,$content){


}

add_shortcode( 'bs4List', 'listgroup_shortcode' );