<?php

add_action( 'wp_enqueue_scripts', function () {
	$googleAPI = __get_field( 'google_api_key', 'option' );
	if ( $googleAPI ) {
		wp_enqueue_script( 'flip_base-google-api-key', 'https://maps.googleapis.com/maps/api/js?key=' . $googleAPI /*. '&callback=initMap'*/, array(), '1.0.0', true );
	}

	//	wp_enqueue_style( 'fancybox', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css', false, '3.5.7' );
	//	wp_enqueue_script( 'fancybox', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js', [ 'jquery' ], true );

	# Slick Carousel
	//	wp_enqueue_style( 'slick-carousel', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', false, '1.8.1' );
	//	wp_enqueue_script( 'slick-carousel', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', [ 'jquery' ], '1.8.1', true );

	wp_enqueue_style( 'my-aos-style', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css', false, '2.3.4' );
	wp_enqueue_script( 'my-aos-script', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js', [], '2.3.4', true );

	//wp_enqueue_media();
	wp_enqueue_style( 'flip-wptoolkit-style', get_stylesheet_uri(), [], FLIP_WP_TOOLKIT_VER );
	wp_enqueue_style( 'flip-wptoolkit-site-styles', get_template_directory_uri() . '/dist/app.css', [], FLIP_WP_TOOLKIT_VER );
	wp_enqueue_script( 'flip-wptoolkit-scripts', get_template_directory_uri() . '/dist/functions.js', [
		'jquery',
		'wp-util'
	], FLIP_WP_TOOLKIT_VER, true );

	wp_localize_script( 'flip-wptoolkit-scripts', 'php_data', [
		'admin_logged' => in_array( 'administrator', wp_get_current_user()->roles ) ? 'yes' : 'no',
		'ajax_url'     => admin_url( 'admin-ajax.php' ),
		'tpd_uri'      => get_template_directory_uri(),
		'site_url'     => site_url(),
		'rest_url'     => get_rest_url(),
	] );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
} );

if ( ! function_exists( 'flip_base_load_fonts' ) ) {
	/**
	 * Load custom font family
	 */
	function flip_base_load_fonts() {
		//wp_enqueue_style( 'circular-std-font', get_stylesheet_directory_uri() . '/resources/assets/fonts/Sora/stylesheet.css', false, FLIP_WP_TOOLKIT_VER );
		//wp_enqueue_style( 'google-font-montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap', false, '1.0.0' );
	}
}

//add_action( 'wp_enqueue_scripts', 'flip_base_load_fonts' );
add_action( 'admin_enqueue_scripts', 'flip_base_load_fonts' );

add_action( 'admin_enqueue_scripts', function () {
		$googleAPI = __get_field( 'google_api_key', 'option' );
		if ( $googleAPI ) {
			wp_enqueue_script( 'flip_base-google-api-key', 'https://maps.googleapis.com/maps/api/js?key=' . $googleAPI /*. '&callback=initMap'*/, array(), '1.0.0', true );
		}
	wp_enqueue_style( 'slick-carousel', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', false, '1.8.1' );
} );

add_filter( 'script_loader_src', 'rm_add_filter_script_loader_src', 10, 2 );
function rm_add_filter_script_loader_src( $src, $handle ) {
	if ( $handle === 'wp-polyfill-formdata' ) {
		$src = get_template_directory_uri() . '/dist/formdata-polyfill.js';
	}

	return $src;
}
