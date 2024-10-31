<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'wp_get_current_user' ) ) {
	include ABSPATH . 'wp-includes/pluggable.php';
}

global $wpdb;

define( 'SFHG_PLUGIN_VERSION', '1.2' );
define( 'SFHG_PLUGIN_TAB', 'admin.php?page=' );
define( 'SFHG_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'SFHG_GAME_DIR', '/sfhg_games' );

define( 'SFHG_TABLE_PREFIX', 'sfhg_' );
define( 'SFHG_TABLE_FILTER_PREFIX', 'filter_' );
define( 'SFHG_TABLE_SETTINGS', $wpdb->prefix . SFHG_TABLE_PREFIX . 'settings' );
define( 'SFHG_TABLE_FILTER_USERS', $wpdb->prefix . SFHG_TABLE_PREFIX . SFHG_TABLE_FILTER_PREFIX . 'users' );
define( 'SFHG_TABLE_FILTER_SCORES', $wpdb->prefix . SFHG_TABLE_PREFIX . SFHG_TABLE_FILTER_PREFIX . 'scores' );
