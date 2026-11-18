<?php

/**
 * Generieke menu helper.
 */
function creators_nav_menu( $location, $class = '', $depth = 2 ) {
	if ( has_nav_menu( $location ) ) {
		wp_nav_menu( [
			'theme_location' => $location,
			'container'      => false,
			'menu_class'     => $class,
			'depth'          => $depth,
		] );
	}
}

function creators_top_menu() {
	creators_nav_menu( 'top', 'js-header-top-menu d-flex reset-list gap-2', 2 );
}

function creators_main_menu() {
	creators_nav_menu( 'main', 'nav-bar__menu d-lg-flex', 2 );
}

function creators_footer_menu() {
	creators_nav_menu( 'footer', 'footer__menu', 1 );
}

function creators_footer_menu_2() {
	creators_nav_menu( 'footer_2', 'footer__menu', 1 );
}

function creators_privacy_menu() {
	creators_nav_menu( 'privacy', 'footer__privacy d-md-flex text-start text-lg-end me-lg-3', 1 );
}
