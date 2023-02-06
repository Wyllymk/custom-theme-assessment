<?php
/*-------------------------------------------------------------------------*/
/*                        ENQUEUE STYLES                                   */
/*-------------------------------------------------------------------------*/

function custom_enqueue_styles(){
    wp_register_style('customstyle', get_template_directory_uri(). '/css/custom.css', array(), '1.0.0', 'all');
    wp_enqueue_style('customstyle');
}
add_action('wp_enqueue_scripts', 'custom_enqueue_styles');
/*-------------------------------------------------------------------------*/
/*                        REGISTER MENUS                                   */
/*-------------------------------------------------------------------------*/

function register_custom_menus(){
    add_theme_support('menus');

    register_nav_menus(array(
        'primary' => 'Main Menu',
        'secondary' => 'Footer Menu'
    ));
}
add_action('init', 'register_custom_menus');


/*-------------------------------------------------------------------------*/
/*                        REGISTER WIDGETS                                 */
/*-------------------------------------------------------------------------*/

function register_custom_sidebar(){
    add_theme_support('widgets');

    register_sidebar(array(
        'name'          => __( 'Primary Sidebar', 'theme_name' ),
		'id'            => 'sidebar-1',
        'description'   => __( 'A short description of the sidebar.' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
    ));
    register_sidebar( array(
		'name'          => __( 'Secondary Sidebar', 'theme_name' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<ul><li id="%1$s" class="widget %2$s">',
		'after_widget'  => '</li></ul>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action('widgets_init', 'register_custom_sidebar');

/*-------------------------------------------------------------------------*/
/*                        THEME SUPPORT                                    */
/*-------------------------------------------------------------------------*/
add_theme_support('post-thumbnails');

add_theme_support('post-formats',array('aside','image','video'));

add_theme_support('custom-header');


/*-------------------------------------------------------------------------*/
/*                        CUSTOM POST TYPE                                 */
/*-------------------------------------------------------------------------*/

function custom_post_type(){
    $labels = array(
        'name' => 'Portfolio',
        'singular_name' => 'Portfolio',
        'add_new' => 'Add Item',
        'all_item' => 'All Items',
        'edit_item' => 'Edit Item',
        'view_item' => 'View Item',
        'search_item' => 'Search Portfolio',
        'not_found' => 'No Portfolio Found',
        'not_found_in_trash' => 'No Items Found In Trash',
        'parent_item_colon' => 'Parent Item'
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'public_queryable' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail',
            'revisions'
        ),
        'taxonomies' => array('category', 'post_tag'),
        'menu_position' => 5,
        'exclude_from_search' => false
    );
    register_post_type('portfolio', $args);
}
add_action('init','custom_post_type');