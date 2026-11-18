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

function creators_topmenu() {
	creators_nav_menu( 'topmenu', 'js-header-top-menu d-flex reset-list gap-2', 2 );
}

function creators_hoofdmenu() {
	creators_nav_menu( 'hoofdmenu', 'nav-bar__menu d-lg-flex', 2 );
}

function creators_footermenu() {
	creators_nav_menu( 'footermenu', 'footer__menu', 1 );
}

function creators_footermenu2() {
	creators_nav_menu( 'footermenu2', 'footer__menu', 1 );
}

function creators_privacymenu() {
	creators_nav_menu( 'privacymenu', 'footer__privacy d-md-flex text-start text-lg-end me-lg-3', 1 );
}
