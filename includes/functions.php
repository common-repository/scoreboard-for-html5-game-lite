<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

/**
 * Sanitize Array function.
 *
 * @param string $array_or_string Array or string.
 */
function sfhg_sanitize_text_or_array_field( $array_or_string ) {
	if ( is_string( $array_or_string ) ) {
		$array_or_string = sanitize_text_field( $array_or_string );
	} elseif ( is_array( $array_or_string ) ) {
		foreach ( $array_or_string as $key => &$value ) {
			if ( is_array( $value ) ) {
				$value = sfhg_sanitize_text_or_array_field( $value );
			} else {
				$value = sanitize_text_field( $value );
			}
		}
	}

	return $array_or_string;
}

/**
 * Metabox open function.
 *
 * @param string  $title Metabox title.
 * @param string  $id Metabox ID.
 * @param boolean $expand Expand or collapse.
 */
function sfhg_metabox_open( $title, $id, $expand ) {
	$expand = true === $expand ? '' : 'closed';
	echo '<div>';
	echo '<div class="metabox-holder">';
	echo '<div class="postbox-container sfhg-postbox">';
	echo '<div class="meta-box-sortables ui-sortable">';
	echo '<div id="' . esc_attr( $id ) . '" class="postbox ' . esc_attr( $expand ) . '">';
	echo '<div class="postbox-header">';
	echo '<h2 class="hndle ui-sortable-handle"><span>' . esc_html( $title ) . '</span></h2>';
	echo '<div class="handle-actions hide-if-no-js">';
	echo '<button type="button" class="handlediv" aria-expanded="false"><span class="screen-reader-text">' . esc_html( $title ) . '</span><span class="toggle-indicator" aria-hidden="true"></span></button>';
	echo '</div>';
	echo '</div>';
	echo '<div class="inside">';
}

/**
 * Metabox close function.
 */
function sfhg_metabox_close() {
	echo '</div></div></div></div></div></div>';
}

