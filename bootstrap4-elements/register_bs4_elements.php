<?php

class register_bs4_elements{

    function __construct()
    {
        self::includes();
    }

    private static function includes(){

        require_once dirname( __FILE__ ) . '/badge/badge_sh.php';
        require_once dirname( __FILE__ ) . '/breadcrumb/breadcrumb_sh.php';
        require_once dirname( __FILE__ ) . '/Buttons/buttons_sh.php';
        require_once dirname( __FILE__ ) . '/card/card_sh.php';
        require_once dirname( __FILE__ ) . '/button-group/button-group_sh.php';
        require_once dirname( __FILE__ ) . '/carousel/carousel_sh.php';
        require_once dirname( __FILE__ ) . '/collapse/collapse_sh.php';
        require_once dirname( __FILE__ ) . '/dropdowns/dropdown_sh.php';
        require_once dirname( __FILE__ ) . '/jumbotron/jumbotron_sh.php';
        require_once dirname( __FILE__ ) . '/list-group/list-group_sh.php';
        require_once dirname( __FILE__ ) . '/modal/modal_sh.php';
        require_once dirname( __FILE__ ) . '/popover/popover_sh.php';

    }

}