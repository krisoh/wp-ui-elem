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
        require_once dirname(__FILE__) . '/options.php';

        require_once dirname( __FILE__ ) . '/bootstrap4-elements/register_bs4_elements.php';
        new register_bs4_elements();

        require_once dirname(__FILE__) . '/semantic-ui-elements/register_semanticUI_elements.php';
        new register_semanticUI_elements();


    }

    private static function hooks() {

        add_action( 'admin_init', array(__CLASS__,'wp_ui_tinymce_button' ));

        add_action('wp_enqueue_scripts', array(__CLASS__,'enqueued_scripts' ));
        add_action('admin_enqueue_scripts', array(__CLASS__,'admin_scripts' ));

    }


    public static function enqueued_scripts() {

        $options = get_option( 'wpui_options' );

        if (isset($options['semanitcUi_chekbox'])){
            //wp_enqueue_style( 'wpUiSemantic', 'https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css' );
            //wp_enqueue_script( 'wpUiSemantic-js', 'https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.js', array('jquery'), true);

        }else if(!isset($options['semanitcUi_chekbox'])){
            wp_dequeue_script('wpUiSemantic-js');
            wp_dequeue_style('wpUiSemantic');
        }

        if (isset($options['bootstrap4_chekbox'])) {
            wp_enqueue_style( 'wpUIbootstrap4', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css' );
            wp_enqueue_script( 'wpUIbootstrap4-js', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js', array('jquery'), true);


        }else if(!isset($options['bootstrap4_chekbox'])){
            wp_dequeue_script('wpUIbootstrap4-js');
            wp_dequeue_style('wpUIbootstrap4');
        }
        if (isset($options['bootstrap3_chekbox'])) {
            wp_enqueue_style( 'wpUIbootstrap3', '//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css' );
            wp_enqueue_script( 'wpUIbootstrap3-js', '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js', array('jquery'), true);

        }else if(!isset($options['bootstrap3_chekbox'])){
            wp_dequeue_script('wpUIbootstrap3-js');
            wp_dequeue_style('wpUIbootstrap3');
        }

    }
    public static function admin_scripts($hook_suffix){
       if($hook_suffix=="settings_page_wpUi-settings-admin"){
           wp_enqueue_style( 'wpUiSemantic', '//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.css' );
           wp_enqueue_script( 'wpUiSemantic-js', '//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.js', array('jquery'), true);
           wp_enqueue_script( 'admin-scrpt', plugins_url( '/src/js/admin_scripts.js', __FILE__ ), array('jquery'));
           wp_enqueue_style( 'wpuicss', plugins_url( '/src/css/wpuicss.css', __FILE__ ) );
           wp_localize_script( 'admin-scrpt', 'adm_object',
               array( 'url' => get_site_url()) );
       }
    }
    public static function  wp_ui_tinymce_button() {
        if ( current_user_can( 'edit_posts' ) && current_user_can( 'edit_pages' ) ) {
            add_filter( 'mce_buttons',  array(__CLASS__,'wp_ui_register_tinymce_button'));
            add_filter( 'mce_external_plugins', array(__CLASS__,'wp_ui_add_tinymce_button' ));
        }
    }

    public static function  wp_ui_register_tinymce_button( $buttons ) {
        $options = get_option( 'wpui_options' );

        if (isset($options['semanitcUi_chekbox'])){
            array_push( $buttons, "wp_ui_semantic" );
        }
        if (isset($options['bootstrap4_chekbox'])) {
            array_push( $buttons, "wp_ui_bootstrap_4" );
        }


        return $buttons;
    }

    public static function  wp_ui_add_tinymce_button( $plugin_array ) {
        $plugin_array['wp_ui_semantic'] = plugins_url( '/src/js', __FILE__ ).'/wp_ui_semantic_plugin.js' ;
        $plugin_array['wp_ui_bootstrap_4'] = plugins_url( '/src/js', __FILE__ ).'/wp_ui_bootstrap4_plugin.js' ;
        return $plugin_array;
    }

}

$wp_ui_elements = new wp_ui_elements();
return $wp_ui_elements->init();
