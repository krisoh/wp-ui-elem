<?php


if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

include (__DIR__ . '/wp-ui-elements.php');

$wp_ui_elements = new wp_ui_elements();


return $wp_ui_elements->init();