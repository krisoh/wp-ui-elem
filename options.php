<?php

if (!defined('ABSPATH')) {
    exit;
}

class WpUiSettings
{
    /**
     * Holds the values to be used in the fields callbacks
     */
    private $options;

    /**
     * Start up
     */
    public function __construct()
    {

        add_action('admin_menu', array(
            $this,
            'add_plugin_page'
        ));
        add_action('admin_init', array(
            $this,
            'page_init'
        ));
        add_action('admin_footer', array(
            $this,
            'print_css_text'
        ));
        add_action('admin_notices', array(
            $this,
            'sample_admin_notice__error'
        ));

    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page('Wp UI Settings', 'Wp UI Settings', 'manage_options', 'wpUi-settings-admin', array(
            $this,
            'create_admin_page'
        ));
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
        $this->options = get_option('wpui_options');
        ?>
        <div class="wrap ">
            <h1>Wordpress UI Compoenents Settings</h1>
            <form method="post" action="options.php">
                <?php
                // This prints out all hidden setting fields
                settings_fields('wpui_option_group');
                ?>
                <div class="ui segment">
                <?php
                do_settings_sections('wpUi-settings-check');
                ?>
                </div>
                <div class="ui segment">
                <?php
                do_settings_sections('wpUi-settings-admin');
                ?>
                </div>
                    <?php
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {
        register_setting('wpui_option_group', // Option group
            'wpui_options', // Option name
            array(
                $this,
                'sanitize'
            ) // Sanitize
        );

        add_settings_section('setting_section_id', // ID
            'Avaliable UI Components  frameworks', // Title
            array(
                $this,
                'print_section_info'
            ), // Callback
            'wpUi-settings-check' // Page
        );

        add_settings_field('bootstrap_3', // ID
            'Bootstrap 3', // Title
            array(
                $this,
                'bootstrap3_components'
            ), // Callback
            'wpUi-settings-check', // Page
            'setting_section_id' // Section
        );

        add_settings_field('bootstrap_4', 'Bootstrap 4', array(
            $this,
            'bootstrap4_components'
        ), 'wpUi-settings-check', 'setting_section_id');

        add_settings_field('semantic_ui', 'Semantic UI', array(
            $this,
            'semanitcUi_components'
        ), 'wpUi-settings-check', 'setting_section_id');


        add_settings_section('css_section_id', // ID
            'Loaded CSS styles', // Title
            array(
                $this,
                'loaded_css_field'
            ), // Callback
            'wpUi-settings-admin' // Page
        );

    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize($input)
    {
        $new_input = array();
        if (isset($input['bootstrap3_chekbox']))
            $new_input['bootstrap3_chekbox'] = absint($input['bootstrap3_chekbox']);

        if (isset($input['bootstrap4_chekbox']))
            $new_input['bootstrap4_chekbox'] = absint($input['bootstrap4_chekbox']);

        if (isset($input['semanitcUi_chekbox']))
            $new_input['semanitcUi_chekbox'] = absint($input['semanitcUi_chekbox']);

        return $new_input;
    }

    /**
     * Print the Section text
     */
    public function print_section_info()
    {

        print 'Select which framework components you want to use:';
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function bootstrap4_components()
    {
        $options = get_option('wpui_options');
        $html   = '<div class="ui slider checkbox">';
        $html   .= '<input type="checkbox" id="bootstrap4_chekbox" name="wpui_options[bootstrap4_chekbox]" value="1"' . checked(1, $options['bootstrap4_chekbox'], false) . '/>';
        $html .= '<label for="checkbox_example"  class="lb_bootstrap4" data-position="right center"  data-content="It seems like bootstrap 4 is already installed in your theme. UI elements will be authomatically available" >Use Components from <a href="https://getbootstrap.com/docs/4.0/components/buttons/" target="_blank" >Bootstrap 4</a> Framework</label>';
        $html   .= '</div>';
        echo $html;
    }

    /**
     * Get the settings option array and print one of its values
     */
    public function bootstrap3_components()
    {
        $options = get_option('wpui_options');
        $html   = '<div class="ui slider checkbox">';
        $html    .= '<input type="checkbox" id="bootstrap3_chekbox" name="wpui_options[bootstrap3_chekbox]" value="1"' . checked(1, $options['bootstrap3_chekbox'], false) . '/>';
        $html .= '<label for="checkbox_example" class="lb_bootstrap3" data-position="right center"  data-content="It seems like bootstrap 3 is already installed in your theme. UI elements will be authomatically available">Use Components from <a href="https://getbootstrap.com/docs/3.3/components/" target="_blank" >Bootstrap 3</a> Framework</label>';
        $html   .= '</div>';
        echo $html;
    }


    public function semanitcUi_components()
    {
        $options = get_option('wpui_options');
        $html   = '<div class="ui slider checkbox">';
        $html    .= '<input type="checkbox" id="semanitcUi_chekbox"  name="wpui_options[semanitcUi_chekbox]" value="1"' . checked(1, $options['semanitcUi_chekbox'], false) . '/>';
        $html .= '<label for="checkbox_example" class="lb_semanticUI" data-position="right center"  data-content="It seems like bootstrap 4 is already installed in your theme. Ui elements will be authomatically available">Use Components from <a href="https://semantic-ui.com/introduction/getting-started.html" target="_blank" >Semantic UI</a>  Framework</label>';
        $html   .= '</div>';
        echo $html;
    }

    public function sample_admin_notice__error()
    {
        $class   = 'notice notice-warning is-dismissible';
        $message = __('Using Bootstrap 3 and Bootstrap 4 can decrease page loading time and it can cause some UI elements to not work properly.', 'sample-text-domain');
        $options = get_option('wpui_options');

        if ( $options['bootstrap3_chekbox'] && $options['bootstrap4_chekbox'] ) {
            printf('<div class="%1$s"><p>%2$s</p></div>', esc_attr($class), esc_html($message));
        }

    }

    public function loaded_css_field()
    {

        printf('<h4>Here you can check if your template already have registered some of the frameworks used in this plugin</h4>');
        printf('<div  id="css-scipts" class="ui  relaxed divided list"></div>');
        printf('<div>Activated frameworks :<a id="bts3" class="ui gray tiny label">✓ Bootstrap 3 </a> <a  id="bts4" class="ui gray tiny label">✓ Bootstrap 4 </a> <a  id="smui" class="ui gray tiny label">✓ Semantic U </a>&nbsp &nbsp &nbsp <a href="#" id="cslink">Activate available framework components</a></a></div>');

    }



}

$my_settings_page = new WpUiSettings();

