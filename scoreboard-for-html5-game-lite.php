<?php
/**
 * Scoreboard for HTML5 Games
 *
 * @package     Scoreboard for HTML5 Games Lite
 * @author      demonisblack
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: Scoreboard for HTML5 Games Lite
 * Plugin URI: https://codecanyon.net/item/scoreboard-for-html5-games/36706894
 * Description: Scoreboard for HTML5 Games is a WordPress Plugin to embed HTML5 Games with scoreboard, user can submit score and view top 10 leaderboard. Admin can login through WordPress Admin Dashboard to view and filter player top rank scores, user score can be excluded by email/phone and scores can be control by range.
 * Author: demonisblack
 * Version: 1.2
 * Text Domain: scoreboard-for-html5-game-lite
 * Domain Path: /languages/
 * Author URI: https://codecanyon.net/user/demonisblack
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; }

require_once 'config.php';
require_once 'includes/functions.php';

/**
 * Header function.
 */
function sfhg_style_script() {
	wp_register_style( 'sfhg_iframe_style', plugins_url( '/css/iframe.css', __FILE__ ), array(), SFHG_PLUGIN_VERSION );
	wp_enqueue_style( 'sfhg_iframe_style' );
}

/**
 * Admin Header function.
 */
function sfhg_admin_style_script() {
	wp_enqueue_script( 'jquery-ui-dialog' );
	wp_enqueue_style( 'wp-jquery-ui-dialog' );

	wp_register_style( 'sfhg_admin_style', plugins_url( '/css/admin.css', __FILE__ ), array(), SFHG_PLUGIN_VERSION );
	wp_enqueue_style( 'sfhg_admin_style' );

	wp_deregister_script( 'jquery-validate' );
	wp_register_script( 'jquery-validate', plugins_url( 'js/jquery.validate.min.js', __FILE__ ), array( 'jquery' ), SFHG_PLUGIN_VERSION, true );
	wp_enqueue_script( 'jquery-validate' );

	wp_deregister_script( 'additional-methods' );
	wp_register_script( 'additional-methods', plugins_url( 'js/additional-methods.min.js', __FILE__ ), array( 'jquery' ), SFHG_PLUGIN_VERSION, true );
	wp_enqueue_script( 'additional-methods' );

	wp_deregister_script( 'sfhg-script' );
	wp_register_script( 'sfhg-script', plugins_url( 'js/script.js', __FILE__ ), array( 'jquery' ), SFHG_PLUGIN_VERSION, true );
	wp_enqueue_script( 'sfhg-script' );
}

/**
 * Admin Init function.
 */
function sfhg_admin_init() {
	$sfhg_scoreboard_settings = '{
		"displayScoreBoard": true,
		"scoreBoardButton": {
			"side": "left",
			"offset": {
				"x": 50,
				"y": 40
			}
		},
		"scoreBoardSaveButton": {
			"x": 640,
			"y": 614,
			"portrait": {
				"x": 384,
				"y": 820
			}
		},
		"scoreBoardTitle": "TOP 10 Scoreboard",
		"scoreRank_arr": [
			"1st",
			"2nd",
			"3rd",
			"4th",
			"5th",
			"6th",
			"7th",
			"8th",
			"9th",
			"10th"
		],
		"scoreFormat":"[NUMBER]PTS",
		"totalScorePage": 1,
		"scoreNextText": "Next",
		"scorePrevText": "Prev",
		"userIDType": "email",
		"mobileFormat": {
			"matches": "999-99999999",
			"minLength": 10,
			"maxLength": 12
		},
		"enableLevel": false,
		"scoreReverse": false,
		"scoreListingFormat": "",
		"fixedScreen": false,
		"topScore_arr": [
			{
				"col": "RANK",
				"percentX": 17,
				"align": "center"
			},
			{
				"col": "NAME",
				"percentX": 30,
				"align": "left"
			},
			{
				"col": "SCORE",
				"percentX": 82,
				"align": "center"
			}
		],
		"topLevelScore_arr": [
			{
				"col": "RANK",
				"percentX": 17,
				"align": "center"
			},
			{
				"col": "NAME",
				"percentX": 30,
				"align": "left"
			},
			{
				"col": "LEVEL",
				"percentX": 60,
				"align": "center"
			},
			{
				"col": "SCORE",
				"percentX": 82,
				"align": "center"
			}
		],
		"dropdown": {
			"default": "LEVEL",
			"color": "#003D66",
			"hoverColor": "#001040",
			"stroke": 2,
			"strokeColor": "#fff",
			"height": 40,
			"margin": 20,
			"offsetX": 0,
			"offsetY": -30,
			"textLength":10,
			"scrollList":5,
			"scrollWidth":15,
			"scrollBarColor":"#fff",
			"scrollBgColor":"#003151"
		},
		"loader":{
			"text":"Loading...",
			"offsetY":10,
			"bg":"#001040",
			"bgAlpha":".7",
			"bgW":180,
			"bgH":50
		},
		"notification":{
			"status":true,
			"color":"#001040",
			"textColor":"#fff",
			"radius":10,
			"stroke":5,
			"strokeColor":"#fff",
			"width":500,
			"height":50,
			"offsetX":0,
			"offsetY":10,
			"time":3000,
			"message":"BEST SCORE : [NUMBER]",
			"messageNew":"NEW BEST SCORE : [NUMBER]"
		},
		"text":{
			"submissionError":"Submission error:",
			"enterName":"*Please enter your name.",
			"enterEmail":"*Please enter your email.",
			"enterMobile":"*Please enter your mobile no.",
			"enterValidEmail":"*Please enter a valite email.",
			"enterValidMobile":"*Please enter a valite mobile no.",
			"connectionError":"Database connection error",
			"submissionErrorTry":"Submission error, please try again."
		}
	}';

	update_option( 'sfhg_scoreboard_settings', $sfhg_scoreboard_settings );

	sfhg_db();
	sfhg_admin_ignore_notice();
}

/**
 * Admin page function.
 */
function sfhg_admin() {
	include plugin_dir_path( __FILE__ ) . 'includes/admin.php';
}

/**
 * Admin menu function.
 */
function sfhg_admin_menu() {
	add_menu_page( esc_html__( 'Scoreboard for HTML5 Games', 'scoreboard-for-html5-game' ), esc_html__( 'Scoreboard', 'scoreboard-for-html5-game' ), 'manage_options', 'sfhg_quickstart', 'sfhg_admin', 'dashicons-games' );
	add_submenu_page( 'sfhg_quickstart', esc_html__( 'Scoreboard', 'scoreboard-for-html5-game' ), esc_html__( 'Quick Start', 'scoreboard-for-html5-game' ), 'manage_options', 'sfhg_quickstart', 'sfhg_admin' );
	add_submenu_page( 'sfhg_quickstart', esc_html__( 'Games', 'scoreboard-for-html5-game' ), esc_html__( 'Games', 'scoreboard-for-html5-game' ), 'manage_options', 'sfhg_games', 'sfhg_admin' );
	add_submenu_page( 'sfhg_quickstart', esc_html__( 'Scoreboard', 'scoreboard-for-html5-game' ), esc_html__( 'Scoreboard', 'scoreboard-for-html5-game' ), 'manage_options', 'sfhg_scoreboard', 'sfhg_admin' );
	add_submenu_page( 'sfhg_quickstart', esc_html__( 'Filters', 'scoreboard-for-html5-game' ), esc_html__( 'Filters', 'scoreboard-for-html5-game' ), 'manage_options', 'sfhg_filters', 'sfhg_admin' );
}

/**
 * Database function.
 */
function sfhg_db() {
	global $wpdb;
	$sfhg_pluginver = get_option( 'sfhg_pluginver' );

	require_once ABSPATH . 'wp-admin/includes/upgrade.php';

	if ( $wpdb->get_var( "show tables like '" . SFHG_TABLE_SETTINGS . "'" ) !== SFHG_TABLE_SETTINGS ) {
		$sql = 'CREATE TABLE IF NOT EXISTS `' . SFHG_TABLE_SETTINGS . '` (
			`id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			`tablename` VARCHAR(30) NOT NULL,
			`scoretype` VARCHAR(30) NOT NULL,
			`settings` varchar(50000) NOT NULL
		) CHARSET=utf8 DEFAULT COLLATE utf8_unicode_ci;';

		dbDelta( $sql );
	}

	if ( $wpdb->get_var( "show tables like '" . SFHG_TABLE_FILTER_USERS . "'" ) !== SFHG_TABLE_FILTER_USERS ) {
		$sql = 'CREATE TABLE IF NOT EXISTS `' . SFHG_TABLE_FILTER_USERS . "` (
			`id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			`game` VARCHAR(30) NOT NULL,
			`type` VARCHAR(30) NOT NULL,
			`email` VARCHAR(30) NOT NULL,
			`status` varchar(10) DEFAULT '1',
			`date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
		) CHARSET=utf8 DEFAULT COLLATE utf8_unicode_ci;";

		dbDelta( $sql );
	}

	if ( $wpdb->get_var( "show tables like '" . SFHG_TABLE_FILTER_SCORES . "'" ) !== SFHG_TABLE_FILTER_SCORES ) {
		$sql = 'CREATE TABLE IF NOT EXISTS `' . SFHG_TABLE_FILTER_SCORES . "` (
			`id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			`game` VARCHAR(30) NOT NULL,
			`type` VARCHAR(30) NOT NULL,
			`score_min` INT(100) UNSIGNED NOT NULL DEFAULT 0,
			`score_max` INT(100) UNSIGNED NOT NULL DEFAULT 0,
			`status` varchar(10) DEFAULT '1',
			`date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
		) CHARSET=utf8 DEFAULT COLLATE utf8_unicode_ci;";

		dbDelta( $sql );
	}

	update_option( 'sfhg_pluginver', $sfhg_pluginver );
}

/**
 * Shortcode function.
 *
 * @param string $atts shortcode attribute.
 */
function sfhg_shortcode( $atts ) {

	$defaults = array(
		'src'             => '',
		'scrolling'       => 'no',
		'allowfullscreen' => 'true',
		'class'           => 'sfhg-responsive-iframe',
		'data-game'       => '',
		'data-class'      => 'landscape',
		'data-style'      => '',
		'frameborder'     => '0',
	);

	foreach ( $defaults as $default => $value ) {
		if ( ! array_key_exists( $default, $atts ) ) {
			$atts[ $default ] = $value;
		}
	}

	$str_arr = explode( ',', $atts['data-class'] );
	$frame_viewport;

	if ( count( $str_arr ) >= 2 ) {
		$frame_viewport = esc_attr( $str_arr[ wp_rand( 0, 1 ) ] );
	} else {
		$frame_viewport = esc_attr( $atts['data-class'] );
	}

	$frame_style = $atts['data-style'];
	if ( ! empty( $frame_style ) ) {
		$frame_style = 'style="' . esc_attr( $frame_style ) . '"';
	}

	$atts['src'] = esc_url( get_site_url() . SFHG_GAME_DIR . '/' . $atts['data-game'] );

	$html  = "\n" . '<!-- ' . esc_html__( 'Scoreboard for HTML5 Games plugin v', 'scoreboard-for-html5-game' ) . SFHG_PLUGIN_VERSION . ' -->' . "\n";
	$html .= '<div class="sfhg-wrapper">';
	$html .= '<div class="sfhg-' . $frame_viewport . '" ' . $frame_style . '>';
	$html .= '<iframe';
	foreach ( $atts as $attr => $value ) {
		if ( strtolower( $attr ) === 'src' ) {
			$value = esc_url( $value );
		}
		if ( strtolower( $attr ) !== 'same_height_as' && strtolower( $attr ) !== 'onload'
			&& strtolower( $attr ) !== 'onpageshow' && strtolower( $attr ) !== 'onclick' ) {
			if ( '' !== $value ) {
				$html .= ' ' . esc_html( $attr ) . '="' . esc_attr( $value ) . '"';
			} else {
				$html .= ' ' . esc_html( $attr );
			}
		}
	}
	$html .= '></iframe>' . "\n";
	$html .= '</div>' . "\n";
	$html .= '</div>' . "\n";
	return $html;
}

/**
 * Admin notice function.
 */
function sfhg_admin_notice() {
	global $current_user;
	if ( ! get_user_meta( $current_user->ID, 'sfhg_admin_ignore_notice' ) ) {
		global $pagenow;
		$paged   = ( isset( $_GET['page'] ) ? sanitize_text_field( wp_unslash( $_GET['page'] ) ) : '' );
		$games_domain = esc_url( 'codecanyon.net/collections/6621618-scoreboard-add-ons/', 'scoreboard-for-html5-game' );
		echo '<div class="updated"><h3>' . esc_html__( 'Scoreboard for HTML5 Games', 'scoreboard-for-html5-game' ) . '</h3><p>';
		if ( 'sfhg_quickstart' === $paged || 'sfhg_games' === $paged || 'sfhg_scoreboard' === $paged || 'sfhg_filters' === $paged ) {
			printf( '<b>' . esc_html__( 'Important:', 'scoreboard-for-html5-game' ) . '</b> ' . esc_html__( 'Please update the new version', 'scoreboard-for-html5-game' ) . ' | <a href="%s" target="_blank">' . esc_html__( 'Games', 'scoreboard-for-html5-game' ) . '</a> | <a href="%s">' . esc_html__( 'Hide Notice', 'scoreboard-for-html5-game' ) . '</a>', $games_domain, esc_url( SFHG_PLUGIN_TAB ).$paged.'&sfhg_admin_ignore_notice=0' );
		} else {
			printf( '<b>' . esc_html__( 'Important:', 'scoreboard-for-html5-game' ) . '</b> ' . esc_html__( 'Please update the new version', 'scoreboard-for-html5-game' ) . ' | <a href="%s" target="_blank">' . esc_html__( 'Games', 'scoreboard-for-html5-game' ) . '</a> | <a href="%s">' . esc_html__( 'Hide Notice', 'scoreboard-for-html5-game' ) . '</a>', $games_domain, esc_url( SFHG_PLUGIN_TAB ).$paged.'&sfhg_admin_ignore_notice=0' );
		}
		echo '</p></div>';
	}
}

/**
 * Admin ignore notice function.
 */
function sfhg_admin_ignore_notice() {
	global $current_user;
	$sfhg_admin_ignore_notice = ( isset( $_GET['sfhg_admin_ignore_notice'] ) ? sanitize_text_field( wp_unslash( $_GET['sfhg_admin_ignore_notice'] ) ) : '' );
	if ( '0' === $sfhg_admin_ignore_notice ) {
		add_user_meta( $current_user->ID, 'sfhg_admin_ignore_notice', 'true', true );
	}
}

/**
 * Plugin action function.
 *
 * @param string $links links.
 */
function sfhg_plugin_action( $links ) {
	$mylinks = array(
		sprintf( '<a href="%s">' . esc_html__( 'Quick Start', 'scoreboard-for-html5-game' ) . '</a>', SFHG_PLUGIN_TAB . 'sfhg_quickstart' ),
		sprintf( '<a href="%s">' . esc_html__( 'Games', 'scoreboard-for-html5-game' ) . '</a>', SFHG_PLUGIN_TAB . 'sfhg_games' ),
		sprintf( '<a href="%s">' . esc_html__( 'Scoreboard', 'scoreboard-for-html5-game' ) . '</a>', SFHG_PLUGIN_TAB . 'sfhg_scoreboard' ),
		sprintf( '<a href="%s">' . esc_html__( 'Filters', 'scoreboard-for-html5-game' ) . '</a>', SFHG_PLUGIN_TAB . 'sfhg_filters' ),
	);
	return array_merge( $mylinks, $links );
}

/**
 * Plugin row meta function.
 *
 * @param string $links links.
 * @param string $file file.
 */
function sfhg_plugin_row_meta( $links, $file ) {
	$plugin = plugin_basename( __FILE__ );
	if ( $file === $plugin ) {
		return array_merge(
			$links,
			array(
				'<a href="https://codecanyon.net/item/scoreboard-for-html5-games/36706894">' . esc_html__( 'Full Version', 'scoreboard-for-html5-game' ) . '</a>',
				'<a href="https://codecanyon.net/collections/6621618-scoreboard-games-lists/">' . esc_html__( 'More Games', 'scoreboard-for-html5-game' ) . '</a>',
			)
		);
	}
	return $links;
}

/**
 * Plugin text domain function.
 */
function sfhg_plugin_load_text_domain() {
	load_plugin_textdomain( 'scoreboard-for-html5-game', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

add_action( 'wp_enqueue_scripts', 'sfhg_style_script' );
add_action( 'admin_enqueue_scripts', 'sfhg_admin_style_script' );

add_action( 'admin_init', 'sfhg_admin_init' );
add_action( 'admin_notices', 'sfhg_admin_notice' );

add_action( 'admin_menu', 'sfhg_admin_menu' );
add_shortcode( 'scoreboard', 'sfhg_shortcode' );

add_action( 'plugins_loaded', 'sfhg_plugin_load_text_domain' );

add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'sfhg_plugin_action' );
add_filter( 'plugin_row_meta', 'sfhg_plugin_row_meta', 10, 2 );


