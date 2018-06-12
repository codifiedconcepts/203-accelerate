<?php
/**
* Accelerate Marketing Child functions and definitions
*
* @link http://codex.wordpress.org/Theme_Development
* @link http://codex.wordpress.org/Child_Themes
*
* @package WordPress
* @subpackage Accelerate Marketing
* @since Accelerate Marketing 2.0
*/

// Theme support for post-thumbnails and menus; bonus to get blog page with featured images, etc.
function accelerate_child_setup() {

	// Post thumbnails support
	add_theme_support('post-thumbnails');

	// Post Formats, bonus challenge
    add_theme_support( 'post-formats', array( 'quote', 'video' ) );
}
add_action( 'after_setup_theme', 'accelerate_child_setup' );

// Enqueue scripts and styles
function accelerate_child_scripts() {
	wp_enqueue_style( 'accelerate-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'accelerate-style' ));
    wp_enqueue_style( 'accelerate-child-google-fonts', '//fonts.googleapis.com/css?family=Londrina+Solid:400,900' );
	//for manually coded icon-only footer menu
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css');
}
add_action( 'wp_enqueue_scripts', 'accelerate_child_scripts' );

// Add a custom post type
function create_custom_post_types() {
	//post type for case studies
    register_post_type( 'case_studies',
        array(
            'labels' => array(
                'name' => __( 'Case Studies' ),
                'singular_name' => __( 'Case Study' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array( 'slug' => 'case-studies' ),
        )
    );
	//post type for services on About page
    register_post_type( 'our_services',
        array(
            'labels' => array(
                'name' => __( 'Our Services' ),
                'singular_name' => __( 'Service' )
            ),
            'public' => true,
			//no archive so we can use the About page to display instead
            'has_archive' => false,
			//lets me use featured image for post mage rather than custom img field
			'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'page-attributes' ),
        )
    );
}
add_action( 'init', 'create_custom_post_types' );

//Add body class for contact page to narrow width
function accelerate_child_body_classes( $classes ) {
  if ( is_page( 'contact-us' ) ) {
    $classes[] = 'contact-page';
  }
    return $classes;
}
add_filter( 'body_class','accelerate_child_body_classes' );

//Add a dynamic sidebar to add Twitter widget to the homepage
function accelerate_theme_child_widget_init() {
	register_sidebar( array(
	    'name' =>__( 'Homepage sidebar', 'accelerate-theme-child'),
	    'id' => 'sidebar-2',
	    'description' => __( 'Appears on the static front page template', 'accelerate-theme-child' ),
	    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	    'after_widget' => '</aside>',
	    'before_title' => '<h3 class="widget-title">',
	    'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'accelerate_theme_child_widget_init' );
