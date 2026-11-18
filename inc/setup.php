<?php

add_action( 'after_setup_theme', function() {
	load_theme_textdomain( 'creators', CREATORS_THEME_DIR . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'html5', [ 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ] );
	register_nav_menus([
		'top'      => __( 'Topmenu', 'creators' ),
		'main'     => __( 'Hoofdmenu', 'creators' ),
		'footer'   => __( 'Footer menu', 'creators' ),
		'footer_2' => __( 'Footer menu 2', 'creators' ),
		'privacy'  => __( 'Privacy menu', 'creators' ),
	]);
} );

/**
 * Migreer de oude Nederlandse menu-locaties naar de Engelse slugs.
 * Bestaande menu-koppelingen blijven behouden.
 */
add_action( 'after_setup_theme', function() {
	$locations = get_theme_mod( 'nav_menu_locations' );

	if ( ! is_array( $locations ) ) {
		return;
	}

	$map = [
		'topmenu'     => 'top',
		'hoofdmenu'   => 'main',
		'footermenu'  => 'footer',
		'footermenu2' => 'footer_2',
		'privacymenu' => 'privacy',
	];

	$changed = false;

	foreach ( $map as $legacy => $new ) {
		if ( ! isset( $locations[ $legacy ] ) ) {
			continue;
		}

		if ( empty( $locations[ $new ] ) ) {
			$locations[ $new ] = $locations[ $legacy ];
		}

		unset( $locations[ $legacy ] );
		$changed = true;
	}

	if ( $changed ) {
		set_theme_mod( 'nav_menu_locations', $locations );
	}
}, 20 );

add_action( 'after_setup_theme', function() {
	$GLOBALS['content_width'] = apply_filters( 'creators_content_width', 640 );
}, 0 );

// Remove default WooCommerce Styles
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

add_action( 'wp_enqueue_scripts', function () {
	// Bijvoorbeeld de block styles uitschakelen
	wp_dequeue_style('wc-block-style');
}, 100 );

/**
 * Verwijder door thema/plugins toegevoegde image sizes (custom sizes).
 * Standaardmaten (thumbnail, medium, large, medium_large, 1536x1536, 2048x2048) blijven bestaan.
 */
add_filter('intermediate_image_sizes', function ($sizes) {
    // lijst met WP-core maten die je WEL wilt houden
    $keep = ['thumbnail'];

    // filter alle maten die niet in $keep zitten (dus: custom thema/plugin maten)
    return array_values(array_intersect($sizes, $keep));
});