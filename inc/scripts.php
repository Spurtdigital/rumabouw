<?php

// De URL die de browser (op de host) gebruikt om de Vite dev server te bereiken.
define( 'CREATORS_VITE_DEV_ORIGIN', 'http://localhost:5173' );

// Hosts die PHP probeert om de Vite dev server te bereiken.
// Bij DDEV draait de server op de host en is hij vanuit de container
// bereikbaar via host.docker.internal.
define( 'CREATORS_VITE_DEV_HOSTS', [ 'host.docker.internal', 'localhost', '127.0.0.1' ] );

/**
 * Check of de Vite dev server draait (voor hot reloading).
 */
function creators_is_vite_dev() {
	static $running = null;

	if ( $running !== null ) {
		return $running;
	}

	$port    = (int) ( wp_parse_url( CREATORS_VITE_DEV_ORIGIN, PHP_URL_PORT ) ?: 5173 );
	$running = false;

	foreach ( CREATORS_VITE_DEV_HOSTS as $host ) {
		$fp = @fsockopen( $host, $port, $errno, $errstr, 0.5 );

		if ( $fp ) {
			fclose( $fp );
			$running = true;
			break;
		}
	}

	return $running;
}

add_action( 'wp_enqueue_scripts', function() {
	// Font Awesome (lokaal)
	wp_enqueue_style( 'creators-fontawesome', CREATORS_THEME_URI . '/assets/fontawesome/css/all.min.css', [], null );

	if ( creators_is_vite_dev() ) {
		// Dev: laad vanuit de Vite dev server met HMR. CSS wordt live via JS geïnjecteerd.
		wp_enqueue_script( 'creators-vite-client', CREATORS_VITE_DEV_ORIGIN . '/@vite/client', [], null, false );
		wp_enqueue_script( 'creators-app', CREATORS_VITE_DEV_ORIGIN . '/assets/js/app.js', [ 'creators-vite-client' ], null, true );
	} else {
		// Productie: laad de gecompileerde bestanden uit /dist.
		wp_enqueue_style( 'creators-css', CREATORS_THEME_URI . '/dist/css/app.css', [], null );
		wp_enqueue_script( 'creators-app', CREATORS_THEME_URI . '/dist/js/app.js', [], null, true );
	}
}, 20 );

// Vite dev server levert ES modules; voeg type="module" toe aan de script-tags.
add_filter( 'script_loader_tag', function( $tag, $handle, $src ) {
	if ( ! creators_is_vite_dev() ) {
		return $tag;
	}

	if ( in_array( $handle, [ 'creators-vite-client', 'creators-app' ], true ) ) {
		return sprintf( '<script type="module" src="%s"></script>', esc_url( $src ) );
	}

	return $tag;
}, 10, 3 );
