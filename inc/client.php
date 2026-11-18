<?php

/**
 * Rumabouw specifieke functionaliteit
 */

function creators_remove_metabox() {
	if ( ! current_user_can( 'edit_others_posts' ) ) {
		remove_meta_box( 'wpseo_meta', 'post', 'normal' );
	}
}
add_action( 'add_meta_boxes', 'creators_remove_metabox', 11 );

/**
 * Voeg het juiste tussenliggende breadcrumb-item toe voor projecten en nieuws.
 */
add_filter( 'wpseo_breadcrumb_links', function( $links ) {
	if ( is_singular( 'project' ) ) {
		array_splice( $links, 1, -2, [
			[
				'url'  => site_url( '/projecten/' ),
				'text' => 'Projecten',
			],
		] );
	}

	if ( is_singular( 'post' ) ) {
		array_splice( $links, 1, -2, [
			[
				'url'  => site_url( '/nieuws/' ),
				'text' => 'Nieuws',
			],
		] );
	}

	return $links;
} );
