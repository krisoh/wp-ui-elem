<?php


function bottongroup_shortcode( $atts, $content = null  ) {

    return buttongroup_template($atts,$content);

}

function buttongroup_template($options,$content){


}

add_shortcode( 'bs4ButtonGroup', 'bottongroup_shortcode' );