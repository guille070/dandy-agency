<?php
/*
Plugin Name: Custom Post Type: Works
Description: Declares a plugin that will create a custom post type displaying Works.
Version: 1.0
*/

function create_works() {
    register_post_type( 'works',
        array(
            'labels' => array(
                'name' => 'Works',
                'singular_name' => 'Works',
                'add_new' => 'Add Item',
                'add_new_item' => 'Add New Item',
                'edit' => 'Edit',
                'edit_item' => 'Edit Item',
                'new_item' => 'New Item',
                'view' => 'View',
                'view_item' => 'View Item',
                'search_items' => 'Search Item',
                'not_found' => 'No se encontró el Item',
                'not_found_in_trash' => 'No se encontró el Item en la Papelera',
                'parent' => 'Item parent'
            ),
 
            'public' => true,
            'menu_position' => 9,
            'supports' => array( 'title', 'editor', 'thumbnail' ),
            //'taxonomies' => array( 'tipos-purocontagia' ),
            'menu_icon' => plugins_url( 'images/image.png', __FILE__ ),
            'has_archive' => false,
            'rewrite' => array( 'slug' => 'project' )
        )
    );
}

function include_template_works_function( $template_path ) {
    if ( get_post_type() == 'works' ) {
        if ( is_single() ) {
            // checks if the file exists in the theme first,
            // otherwise serve the file from the plugin
            if ( $theme_file = locate_template( array ( 'single-works.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = plugin_dir_path( __FILE__ ) . '/single-works.php';
            }
        }
        elseif ( is_page() ) {
            if ( $theme_file = locate_template( array ( 'page-works.php' ) ) ) {
                $template_path = $theme_file;
            } else { $template_path = plugin_dir_path( __FILE__ ) . '/page-works.php';
 
            }
        }
        elseif ( is_tax() || is_archive() || is_category() ) {
            if ( $theme_file = locate_template( array ( 'category-works.php' ) ) ) {
                $template_path = $theme_file;
            } else { $template_path = plugin_dir_path( __FILE__ ) . '/category-works.php';
 
            }
        }
    }
    return $template_path;
}

add_action( 'init', 'create_works' );
add_filter( 'template_include', 'include_template_works_function', 1 );

?>