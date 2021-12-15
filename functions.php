<?php

// Define Theme Directory URI
define( 'oxpa_uri', '/' );

// Define Theme JS Directory URI
define( 'oxpa_js', get_bloginfo( 'stylesheet_directory' ) . '/assets/js/' );

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function my_theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );

    wp_enqueue_style( 'load-fa', 'https://use.fontawesome.com/releases/v5.5.0/css/all.css' );
}

/**
 * Enqueue scripts
 * wp_enqueue_script( 'id', oxpa_js . 'filename.js', 'version', $in_footer = false/true);
 */
function oxpa_register_scripts() {

	wp_enqueue_script( 'nav-scrolled', oxpa_js . 'navScrolled.js', array(), '', false );

	wp_enqueue_script( 'aos-script', 'https://unpkg.com/aos@next/dist/aos.js', array(), '', true);

}

add_action( 'wp_enqueue_scripts', 'oxpa_register_scripts' );


function print_menu_shortcode($atts, $content = null) {
extract(shortcode_atts(array( 'name' => null, 'class' => null ), $atts));
return wp_nav_menu( array( 'menu' => $name, 'menu_class' => 'ms_footer_nav', 'echo' => false ) );
}

add_shortcode('menu', 'print_menu_shortcode');

/**
 * <?php slow_wheels_sponsor_logos(); ?>
 * see https://make.xwp.co/2016/08/12/image-gallery-control-for-the-customizer/
 */
 /**
 *
 */
function featured_image_gallery_customize_register( $wp_customize ) {

    if ( ! class_exists( 'CustomizeImageGalleryControl\Control' ) ) {
        return;
    }

    $wp_customize->add_section( 'featured_image_gallery_section', array(
        'title'      => __( 'Sponsor Logos' ),
        'priority'   => 1,
    ) );
    $wp_customize->add_setting( 'featured_image_gallery', array(
        'default' => array(),
        'sanitize_callback' => 'wp_parse_id_list',
    ) );
    $wp_customize->add_control( new CustomizeImageGalleryControl\Control(
        $wp_customize,
        'featured_image_gallery',
        array(
            'label'    => __( 'Selected images' ),
						'description' => __( 'Only use images in PNG format with a transparent background. Once uploaded ensure there is liitle or no white space around the image. Contact arran@madeslowly.co.uk if you need help converting an image.' ),
            'section'  => 'featured_image_gallery_section',
            'settings' => 'featured_image_gallery',
            'type'     => 'image_gallery',
        )
    ) );
}

add_action( 'customize_register', 'featured_image_gallery_customize_register' );

function slow_wheels_sponsor_logos( $atts = array() ) {
    $setting_id = 'featured_image_gallery';
    $ids_array = get_theme_mod( $setting_id );
    if ( is_array( $ids_array ) && ! empty( $ids_array ) ) {
        $atts['ids'] = implode( ' ', $ids_array );
        echo gallery_shortcode( $atts );
    }
}
