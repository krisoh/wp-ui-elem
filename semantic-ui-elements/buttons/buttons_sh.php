<?php


function buttons_shortcode( $atts, $content = null  ) {
    wp_enqueue_style( 'seUi_button', 'https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/components/button.min.css' );
    return buttons_template($atts,$content);

}

function registerButtonScripts(){
    wp_enqueue_style( 'seUi', 'https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/components/button.min.css' );
   // wp_enqueue_script( 'wpUiSemantic-js', 'https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.min.js', array('jquery'), true);

}

function buttons_template($options,$content){

    ob_start();
    var_dump($options);
    ?>
    <button class="ui  secondary button">
        <?php echo $content ?>
    </button>
    <?php
    return ob_get_clean();

}

add_shortcode( 'su_Button', 'buttons_shortcode' );