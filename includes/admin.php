<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; }

$pluginpage = ( isset( $_REQUEST['page'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['page'] ) ) : 'sfhg_quickstart' );
if ( ! current_user_can( 'manage_options' ) ) {
	$pluginpage = 'sfhg_quickstart';
}
?>

<?php
/**
 * Header function.
 */
?>

<div class="wrap">
	<?php echo '<h2>' . esc_html__( 'Scoreboard for HTML5 Games', 'scoreboard-for-html5-game' ) . '</h2>'; ?>
	<img src="<?php printf( '%simages/banner.jpg', esc_url( SFHG_PLUGIN_URL ) ); ?>" />
	<?php
		$plugin_domain = esc_url( 'codecanyon.net/collections/6621618-scoreboard-add-ons/' );
	?>

	<p>
		<?php printf( /* translators:  %1$s %2$s: The a tag. */ esc_html__( 'Scoreboard for HTML5 Games is a WordPress Plugin to embed %1$sHTML5 Games%2$s with scoreboard, user can submit score and view top 10 leaderboard.', 'scoreboard-for-html5-game' ), '<a href="' . esc_url( $plugin_domain ) . '" target="_blank">', '</a>' ); ?><br>
		<?php esc_html_e( 'Admin can view and filter player top rank scores, user score can be excluded by email/phone and scores can be control by range.', 'scoreboard-for-html5-game' ); ?>
	</p>
	<?php
		$plugin_full_domain = esc_url( 'codecanyon.net/item/scoreboard-for-html5-games/36706894', 'scoreboard-for-html5-game' );
	?>
	<p style="color:red;"><?php printf( /* translators: %1$s %2$s: The a tag. */ esc_html__( 'Get Scoreboard for HTML5 Games (Full Version) %1$shere%2$s.', 'scoreboard-for-html5-game' ), '<a href="' . esc_url( $plugin_full_domain ) . '" target="_blank">', '</a>' ); ?></p>

	<p><?php printf( /* translators: %1$s %2$s: The a tag. */ esc_html__( 'All the HTML5 Games can be bought %1$shere%2$s', 'scoreboard-for-html5-game' ), '<a href="' . esc_url( $plugin_domain ) . '" target="_blank">', '</a>' ); ?></p>

	<h2>
		<nav class="nav-tab-wrapper">
			<a href="<?php echo esc_url( SFHG_PLUGIN_TAB ) . 'sfhg_quickstart'; ?>" class="nav-tab<?php 'sfhg_quickstart' === $pluginpage ? print esc_textarea( ' nav-tab-active' ) : ''; ?>"><?php esc_html_e( 'Quick Start', 'scoreboard-for-html5-game' ); ?></a>
			<a href="<?php echo esc_url( SFHG_PLUGIN_TAB ) . 'sfhg_games'; ?>" class="nav-tab<?php 'sfhg_games' === $pluginpage ? print esc_textarea( ' nav-tab-active' ) : ''; ?>"><?php esc_html_e( 'Games', 'scoreboard-for-html5-game' ); ?></a>
			<a href="<?php echo esc_url( SFHG_PLUGIN_TAB ) . 'sfhg_scoreboard'; ?>" class="nav-tab<?php 'sfhg_scoreboard' === $pluginpage ? print esc_textarea( ' nav-tab-active' ) : ''; ?>"><?php esc_html_e( 'Scoreboard', 'scoreboard-for-html5-game' ); ?></a>
			<a href="<?php echo esc_url( SFHG_PLUGIN_TAB ) . 'sfhg_filters'; ?>" class="nav-tab<?php 'sfhg_filters' === $pluginpage ? print esc_textarea( ' nav-tab-active' ) : ''; ?>"><?php esc_html_e( 'Filters', 'scoreboard-for-html5-game' ); ?></a>
		</nav>
	</h2>

</div>


<?php
if ( 'sfhg_quickstart' === $pluginpage ) {

	// *************** Games ***************
	include_once 'quickstart.php';

} elseif ( 'sfhg_games' === $pluginpage ) {

	// *************** Games ***************
	include_once 'game.php';

} elseif ( 'sfhg_filters' === $pluginpage ) {

	// *************** Filters ***************
	?>
	<div class="wrap">
	<?php echo '<h3>' . esc_html__( 'Filters', 'scoreboard-for-html5-game' ) . '</h3>'; ?>
	<p style="color:red;"><?php printf( /* translators: %1$s %2$s: The a tag. */ esc_html__( 'These features work only with Scoreboard for HTML5 Game (Full Version) %1$shere%2$s.', 'scoreboard-for-html5-game' ), '<a href="' . esc_url( $plugin_full_domain ) . '" target="_blank">', '</a>' ); ?></p>
		<img src="<?php printf( '%simages/page_filters.jpg', esc_url( SFHG_PLUGIN_URL ) ); ?>" />
	</div>
	<?php
} else {

	// *************** Scoreboard ***************
	?>
	<div class="wrap">
	<?php echo '<h3>' . esc_html__( 'Scoreboard', 'scoreboard-for-html5-game' ) . '</h3>'; ?>
	<p style="color:red;"><?php printf( /* translators: %1$s %2$s: The a tag. */ esc_html__( 'These features work only with Scoreboard for HTML5 Game (Full Version) %1$shere%2$s.', 'scoreboard-for-html5-game' ), '<a href="' . esc_url( $plugin_full_domain ) . '" target="_blank">', '</a>' ); ?></p>
		<img src="<?php printf( '%simages/page_scoreboard.jpg', esc_url( SFHG_PLUGIN_URL ) ); ?>" />
	</div>
	<?php
}
?>
