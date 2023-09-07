<?php

function ball_theme_support(){
    //add dynamic title tag
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'ball_theme_support');

function ball_menus(){
    $locations = array(
        'primary' => "Desktop Primary Left Sidebar",
        'footer' => "Footer Menu Items"
    );

    register_nav_menus($locations);
}

add_action('init','ball_menus');

function ball_register_styles(){
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style('ball-style', get_template_directory_uri() . "/style.css", array('ball-bootstrap'), $version, 'all');

    wp_enqueue_style('ball-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), "4.4.1", 'all');

    wp_enqueue_style('ball-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), "5.13.0", 'all');

}

add_action('wp_enqueue_scripts', 'ball_register_styles');

function ball_register_scripts(){

    wp_enqueue_script('ball-jquery', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', array(),"3.4.1", true);

    wp_enqueue_script('ball-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(),"1.16.0", true);

    wp_enqueue_script('ball-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array(),"3.4.1", true);

    wp_enqueue_script('ball-main', get_template_directory_uri()."/assets/js/main.js", array('ball-bootstrap'), '1.0', true);


}

add_action('wp_enqueue_scripts', 'ball_register_scripts');

function add_duplicate_post_button() {
    global $post;

    if (current_user_can('edit_posts')) {
        echo '<div class="misc-pub-section">';
        echo '<button type="submit" name="duplicate_post" class="button">Duplicate</button>';
        echo '</div>';
    }
}
add_action('post_submitbox_misc_actions', 'add_duplicate_post_button');


function duplicate_post_action() {
    global $post;

    if (isset($_POST['duplicate_post']) && current_user_can('edit_posts')) {
        $new_post = array(
            'post_title' => $post->post_title . ' (Copy)',
            'post_content' => $post->post_content,
            'post_status' => 'draft', // You can change this to 'publish' if needed
            'post_type' => $post->post_type
        );

        $new_post_id = wp_insert_post($new_post);

        if ($new_post_id) {
            // Duplicate post meta, categories, and tags
            $post_meta = get_post_custom($post->ID);
            foreach ($post_meta as $meta_key => $meta_values) {
                foreach ($meta_values as $meta_value) {
                    add_post_meta($new_post_id, $meta_key, $meta_value);
                }
            }

            // Duplicate categories and tags
            $post_categories = wp_get_post_categories($post->ID);
            wp_set_post_categories($new_post_id, $post_categories);

            $post_tags = wp_get_post_tags($post->ID);
            wp_set_post_tags($new_post_id, $post_tags);

            wp_redirect(admin_url('post.php?action=edit&post=' . $new_post_id));
            exit;
        }
    }
}

add_action('admin_init', 'duplicate_post_action');

function ball_widget_areas(){
    register_sidebar(
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => '',
            'name' => 'Sidebar Area',
            'id'=> 'sidebar-1',
            'description' => 'Sidebar Widget Area'
        )
    );

    register_sidebar(
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => '',
            'name' => 'Footer Area',
            'id'=> 'footer-1',
            'description' => 'Footer Widget Area'
        )
    );
}

add_action('widgets_init', 'ball_widget_areas');

function ball_search_filter_posts($query) {
    if ($query->is_search && !is_admin()) {
        // Limit search results to posts only
        $query->set('post_type', 'post');
    }
}
add_action('pre_get_posts', 'ball_search_filter_posts');

?>

