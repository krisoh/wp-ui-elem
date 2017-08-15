<?php
/*
 * Plugin Name: Wordpress UI Shortcodes
 * Description: Shortcodes for implementing UI elements from bootstrap 4 and semantic-ui framework
 * Author: Kristijan Risteski(kristijan.risteski.mkd@gmail.com), Krste Nikoleski
 * Author URI:
 * Version: 1.0.1
 * Plugin URI: http://github.com/airesvsg/wp-ui-elements
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class wp_ui_elements {


    public static function init() {
        self::includes();
        self::hooks();

    }


    private static function includes() {

        //include page with options
        require_once dirname( __FILE__ ) . '/options.php';

    }

    private static function hooks() {

        add_action( 'admin_init', array(__CLASS__,'wp_ui_tinymce_button' ));

    }


    public static function  wp_ui_tinymce_button() {
        if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
            add_filter( 'mce_buttons',  array(__CLASS__,'wp_ui_register_tinymce_button'));
            add_filter( 'mce_external_plugins', array(__CLASS__,'wp_ui_add_tinymce_button' ));
        }
    }

    public static function  wp_ui_register_tinymce_button( $buttons ) {
        array_push( $buttons, "wp_ui_semantic" );
        array_push( $buttons, "wp_ui_bootstrap" );
        return $buttons;
    }

    public static function  wp_ui_add_tinymce_button( $plugin_array ) {
        $plugin_array['wp_ui_semantic'] = plugins_url( '/src/js', __FILE__ ).'/wp_ui_semantic_plugin.js' ;
        $plugin_array['wp_ui_bootstrap'] = plugins_url( '/src/js', __FILE__ ).'/wp_ui_bootstrap4_plugin.js' ;
        return $plugin_array;
    }

}

$wp_ui_elements = new wp_ui_elements();
return $wp_ui_elements->init();
