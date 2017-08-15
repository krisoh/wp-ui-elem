<?php
/**
 * This is shortcode for the callout html template
 */

function popover_shortcode( $atts, $content = null  ) {

    return popover_template($atts,$content);

}

function popover_template($options,$content){


}

add_shortcode( 'wpui_bt_popover', 'popover_shortcode' );