<?php
function mytheme_enqueue_styles() {

    wp_enqueue_style(
        'main-style', 
        get_stylesheet_uri()
    );

}

add_action('wp_enqueue_scripts', 'mytheme_enqueue_styles');

// adding custom post 
function thread_theory_drops_cpt() {

    $labels = array(
        'name' => 'Drops',
        'singular_name' => 'Drop',
        'menu_name' => 'Drops',
        'add_new' => 'Add New Drop',
        'add_new_item' => 'Add New Drop',
        'edit_item' => 'Edit Drop',
        'new_item' => 'New Drop',
        'view_item' => 'View Drop',
        'all_items' => 'All Drops',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'drops'),
        'supports' => array('title','editor','thumbnail'),
        'show_in_rest' => true
    );

    register_post_type('drops', $args);
}
add_action('init', 'thread_theory_drops_cpt');
