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

// Enqueue scripts and styles
function accelerate_child_scripts(){
	wp_enqueue_style( 'accelerate-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'accelerate-style' ));
	wp_enqueue_style('accelerate-google-fonts-uhoh','//fonts.googleapis.com/css2?family=Londrina+Solid:wght@900&display=swap');
}
add_action( 'wp_enqueue_scripts', 'accelerate_child_scripts' );

//custom post types function
function create_custom_post_types() {
//create a case study custom post type
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
		register_post_type( 'services',
        array(
            'labels' => array(
                'name' => __( 'Services' ),
                'singular_name' => __( 'Services' )
            ),
            'public' => true,
            'has_archive' => false,
        )
    );
		register_post_type( 'services_intro',
				array(
						'labels' => array(
								'name' => __( 'Services Intro' ),
								'singular_name' => __( 'Services Intro' )
						),
						'public' => true,
						'has_archive' => false,
				)
		);
		register_post_type( 'contact_box',
				array(
						'labels' => array(
								'name' => __( 'Contact Box' ),
								'singular_name' => __( 'Contact Box' )
						),
						'public' => true,
						'has_archive' => false,
				)
		);
}
add_action( 'init', 'create_custom_post_types' );

//Contact Us Page body_class
add_filter( 'body_class','accelerate_child_body_classes' );
function accelerate_child_body_classes( $classes ) {


if (is_page('contact-us') ) {
$classes[] = 'contact-us';
}

return $classes;

}

// Twitter Widget
function accelerate_theme_child_widget_init() {

	register_sidebar( array(
	    'name' =>__( 'Homepage sidebar', 'accelerate-theme-child'),
	    'id' => 'sidebar-2',
	    'description' => __( 'Appears on the static front page template', 'accelerate-theme-child' ),
	    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	    'after_widget' => '</aside>',
	    'before_title' => '<h4 class="widget-title">',
	    'after_title' => '</h4>',
	) );

}
add_action( 'widgets_init', 'accelerate_theme_child_widget_init' );
