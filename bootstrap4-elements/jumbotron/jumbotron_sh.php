<?php


function jumbotron_shortcode( $atts, $content = null  ) {

    return jumbotron_template($atts,$content);

}

function jumbotron_template($options,$content){


}

add_shortcode( 'bs4Jumbo', 'jumbotron_shortcode' );