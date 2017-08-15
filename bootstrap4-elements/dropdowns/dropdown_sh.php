<?php

function dropdown_shortcode( $atts, $content = null  ) {

    return dropdown_template($atts,$content);

}

function dropdown_template($options,$content){


}

add_shortcode( 'bs4Dropdown', 'dropdown_shortcode' );