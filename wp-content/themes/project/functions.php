<?php
function karan_enqueue_styles() {
    wp_enqueue_style(
        'karan-style', 
        get_stylesheet_uri()
    );
}
add_action('wp_enqueue_scripts', 'karan_enqueue_styles');