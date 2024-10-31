<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>	
	<div class="wrap">
	<?php echo '<h3>' . esc_html__( 'Quick Start', 'scoreboard-for-html5-game' ) . '</h3>'; ?>
		<div class="sfhg-container">
			<?php sfhg_metabox_open( esc_html__( 'A) Game Installation', 'scoreboard-for-html5-game' ), 'id-game-installation', true ); ?>
			<h3><?php esc_html_e( '1) HTML5 Game', 'scoreboard-for-html5-game' ); ?></h3>
			<?php
			$plugin_domain = esc_url( 'codecanyon.net/collections/6621618-scoreboard-add-ons/', 'scoreboard-for-html5-game' );
            $plugin_full_domain = esc_url( 'codecanyon.net/item/scoreboard-for-html5-games/36706894', 'scoreboard-for-html5-game' );
			?>
			<p><?php printf( /* translators: %1$s %2$s: The a tag. */ esc_html__( 'Before begin you must have the HTML5 Games that is compatible with this plugin from %1$shere%2$s.', 'scoreboard-for-html5-game' ), '<a href="' . esc_url( $plugin_domain ) . '" target="_blank">', '</a>' ); ?></p>
			<h3><?php esc_html_e( '2) Copy and integrate the scoreboard files', 'scoreboard-for-html5-game' ); ?></h3>
			<p><?php esc_html_e( 'Please refer to documentation for the steps and integration files', 'scoreboard-for-html5-game' ); ?></p>
			<p><?php esc_html_e( '*Skip this steps if you just want to embed the game without scoreboard', 'scoreboard-for-html5-game' ); ?></p>

			<h3><?php esc_html_e( '3) Upload game', 'scoreboard-for-html5-game' ); ?></h3>
			<p><?php printf( /* translators: %1$s %2$s: The strong tag. */ esc_html__( 'Go to plugin settings %1$sGames%2$s tab to add new game, once added you can upload the game file from upload field', 'scoreboard-for-html5-game' ), '<strong>', '</strong>' ); ?></p>
			<img src="<?php printf( '%simages/sample_03.jpg', esc_url( SFHG_PLUGIN_URL ) ); ?>" />
			<br><br>

			<strong><?php esc_html_e( 'Or you can manually upload game files through ftp or file manager:', 'scoreboard-for-html5-game' ); ?></strong>			
			<p><?php printf( /* translators: %1$s %2$s %3$s: The strong tag with game directory. */ esc_html__( 'Create a new folder %1$s%2$s%3$s in root directoy and upload all games in the folder, your game folder name must be the same name with DataTable', 'scoreboard-for-html5-game' ), '<strong class="orange">', esc_textarea( SFHG_GAME_DIR ), '</strong>' ); ?></p>
			<img src="<?php printf( '%simages/sample_02.jpg', esc_url( SFHG_PLUGIN_URL ) ); ?>" />

			<h3><?php esc_html_e( '4) Embed game', 'scoreboard-for-html5-game' ); ?></h3>        
			<p><?php esc_html_e( 'Add shortcode to page or post content to embed the game.', 'scoreboard-for-html5-game' ); ?></p>
			<pre class="prettyprint">
[scoreboard data-game="luckywheels" data-class="landscape"]
			</pre>

			<p><?php esc_html_e( 'Examples if you want to embed with different settings.', 'scoreboard-for-html5-game' ); ?></p>
			<pre class="prettyprint">
[scoreboard data-game="luckywheels" data-class="landscape,portrait"]<br>
[scoreboard data-game="luckywheels" data-class="landscape" allowfullscreen="false"]<br>
[scoreboard data-game="luckywheels" data-class="landscape" data-style="padding-top:100%"]
			</pre>		
			<br><br>
			<?php esc_html_e( 'Below is the complete attributes of the shortcode', 'scoreboard-for-html5-game' ); ?>
			<ul class="sfhg-list">
				<li><strong>data-game</strong> - <?php esc_html_e( 'directory of the game', 'scoreboard-for-html5-game' ); ?></li>
				<li><strong>data-class</strong> - <?php esc_html_e( 'aspect ratio class for the game frame', 'scoreboard-for-html5-game' ); ?>
					<ul class="sfhg-list">
						<li><strong>landscape</strong> - <?php esc_html_e( 'landscape mode', 'scoreboard-for-html5-game' ); ?></li>
						<li><strong>landscape-old</strong> - <?php esc_html_e( 'landscape mode older version', 'scoreboard-for-html5-game' ); ?></li>
						<li><strong>portrait</strong> - <?php esc_html_e( 'portrait mode', 'scoreboard-for-html5-game' ); ?></li>
						<li><strong>landscape,portrait</strong> - <?php esc_html_e( 'add multiple mode if the game support both, it will display randomly', 'scoreboard-for-html5-game' ); ?></li>
					</ul>
				</li>
				<li><strong>data-style</strong> - <?php esc_html_e( 'custom style for container, set padding-top percent for different aspect ratio', 'scoreboard-for-html5-game' ); ?></li>
				<li><strong>allowfullscreen</strong> - <?php esc_html_e( 'true or false to activate fullscreen mode', 'scoreboard-for-html5-game' ); ?></li>
			</ul>
			<?php sfhg_metabox_close(); ?>

			<?php sfhg_metabox_open( esc_html__( 'B) Game Settings', 'scoreboard-for-html5-game' ), 'id-game-settings', false ); ?>
            <p style="color:red;"><?php printf( /* translators: %1$s %2$s: The a tag. */ esc_html__( 'These features work only with Scoreboard for HTML5 Game (Full Version) %1$shere%2$s.', 'scoreboard-for-html5-game' ), '<a href="' . esc_url( $plugin_full_domain ) . '" target="_blank">', '</a>' ); ?></p>
			<p><?php printf( /* translators: %1$s %2$s: The a tag. */ esc_html_e( 'Go to pluign settings and click on %1$sGames%2$s tab to add or manage games', 'scoreboard-for-html5-game' ), '<strong>', '</strong>' ); ?></p>

			<p>
				<ol>
					<li><?php esc_html_e( 'DataTable: unique game directory', 'scoreboard-for-html5-game' ); ?></li>
					<li><?php esc_html_e( 'DataTable Score Display: table score display type', 'scoreboard-for-html5-game' ); ?></li>
					<li><?php printf( /* translators: %1$s %2$s: The a tag. */ esc_html__( 'Scoreboard Settings: this will replace the %1$sscoreboardSettings%2$s in scoreboard integration files', 'scoreboard-for-html5-game' ), '<strong>', '</strong>' ); ?>
					<br><br>

					<?php esc_html_e( 'Below is the explanation of the settings', 'scoreboard-for-html5-game' ); ?>
						<br><br>
						<ul class="sfhg-list">
							<li><strong>displayScoreboard</strong> - <?php esc_html_e( 'toggle submit and scoreboard button', 'scoreboard-for-html5-game' ); ?></li>
							<li><strong>scoreBoardButton</strong> - <?php esc_html_e( 'scoreboard button positon', 'scoreboard-for-html5-game' ); ?>
								<ul class="sfhg-list">
									<li<strong>side</strong> - <?php esc_html_e( '"left" or "right" side', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>offset</strong> - <?php esc_html_e( 'offset x y position', 'scoreboard-for-html5-game' ); ?></li>
								</ul>
							</li>
							<li><strong>scoreBoardSaveButton</strong> - <?php esc_html_e( 'save button position', 'scoreboard-for-html5-game' ); ?>
								<ul class="sfhg-list">
									<li><strong>x</strong> - <?php esc_html_e( 'x position', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>y</strong> - <?php esc_html_e( 'y position', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>portrait</strong> - <?php esc_html_e( 'position for portrait mode', 'scoreboard-for-html5-game' ); ?></li>
								</ul>
							</li>
							<li><strong>scoreBoardTitle</strong> - <?php esc_html_e( 'text for scoreboard title', 'scoreboard-for-html5-game' ); ?></li>
							<li><strong>scoreRank_arr</strong> - <?php esc_html_e( 'scoreboard ranking list', 'scoreboard-for-html5-game' ); ?></li>
							<li><strong>totalScorePage</strong> - <?php esc_html_e( 'total score pages, .e.g. 2 for 20 listing', 'scoreboard-for-html5-game' ); ?></li>
							<li><strong>scoreNextText</strong> - <?php esc_html_e( 'text for scoreboard next button', 'scoreboard-for-html5-game' ); ?></li>
							<li><strong>scorePrevText</strong> - <?php esc_html_e( 'text for scoreboard prev button', 'scoreboard-for-html5-game' ); ?></li>
							<li><strong>userIDType</strong> - <?php esc_html_e( 'user ID type "email" or "mobile" field', 'scoreboard-for-html5-game' ); ?></li>
							<li><strong>mobileFormat</strong> - <?php esc_html_e( 'mobile format validation', 'scoreboard-for-html5-game' ); ?>
								<ul class="sfhg-list">
									<li><strong>matches</strong> - <?php esc_html_e( 'input match format', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>minLength</strong> - <?php esc_html_e( 'input min length', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>maxLength</strong> - <?php esc_html_e( 'input max length', 'scoreboard-for-html5-game' ); ?></li>
								</ul>
							</li>
							<li><strong>enableLevel</strong> - <?php esc_html_e( 'enable to display game stage/level in scoreboard list', 'scoreboard-for-html5-game' ); ?></li>
							<li><strong>scoreReverse</strong> - <?php esc_html_e( 'reverse scoreboard list in descending', 'scoreboard-for-html5-game' ); ?></li>
							<li><strong>scoreListingFormat</strong> - <?php esc_html_e( 'return score in daily, weekly or monthly, empty string for all time (daily, weekly, monthly)', 'scoreboard-for-html5-game' ); ?></li>
							<li><strong>fixedScreen</strong> - <?php esc_html_e( 'enable for to fixed some old games layout issue', 'scoreboard-for-html5-game' ); ?></li>
							<li><strong>topScore_arr</strong> - <?php esc_html_e( 'score list table', 'scoreboard-for-html5-game' ); ?>
								<ul class="sfhg-list">
									<li><strong>col</strong> - <?php esc_html_e( 'table name', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>percentX</strong> - <?php esc_html_e( 'position x', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>align</strong> - <?php esc_html_e( 'text alignment', 'scoreboard-for-html5-game' ); ?></li>
								</ul>
							</li>
							<li><strong>topLevelScore_arr</strong> - <?php esc_html_e( 'score list table', 'scoreboard-for-html5-game' ); ?>
								<ul class="sfhg-list">
									<li><strong>col</strong> - <?php esc_html_e( 'table name', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>percentX</strong> - <?php esc_html_e( 'position x', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>align</strong> - <?php esc_html_e( 'text alignment', 'scoreboard-for-html5-game' ); ?></li>
								</ul>
							</li>
							<li><strong>dropdown</strong> - <?php esc_html_e( 'dropdown settings', 'scoreboard-for-html5-game' ); ?>
								<ul class="sfhg-list">
									<li><strong>default</strong> - <?php esc_html_e( 'default select text', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>color</strong> - <?php esc_html_e( 'background color', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>hoverColor</strong> - <?php esc_html_e( 'text alignment', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>stroke</strong> - <?php esc_html_e( 'stroke', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>strokeColor</strong> - <?php esc_html_e( 'stroke color', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>height</strong> - <?php esc_html_e( 'height', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>margin</strong> - <?php esc_html_e( 'margin', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>offsetX</strong> - <?php esc_html_e( 'offset position x', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>offsetY</strong> - <?php esc_html_e( 'offset position y', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>textLength</strong> - <?php esc_html_e( 'truncating long text with ...', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>scrollList</strong> - <?php esc_html_e( 'number lists to show scrollbar', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>scrollWidth</strong> - <?php esc_html_e( 'scrollbar width', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>scrollBarColor</strong> - <?php esc_html_e( 'scrollbar color', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>scrollBgColor</strong> - <?php esc_html_e( 'scrollbar background color', 'scoreboard-for-html5-game' ); ?></li>
								</ul>
							</li>
							<li><strong>loader</strong> - <?php esc_html_e( 'loader settings', 'scoreboard-for-html5-game' ); ?>
								<ul class="sfhg-list">
									<li><strong>text</strong> - <?php esc_html_e( 'loader text', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>offsetY</strong> - <?php esc_html_e( 'offset position y', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>bg</strong> - <?php esc_html_e( 'background', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>bgAlpha</strong> - <?php esc_html_e( 'background alpha', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>bgW</strong> - <?php esc_html_e( 'background width', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>bgH</strong> - <?php esc_html_e( 'background height', 'scoreboard-for-html5-game' ); ?></li>
								</ul>
							</li>
							<li><strong>notification</strong> - <?php esc_html_e( 'notification settings (to show previous best score)', 'scoreboard-for-html5-game' ); ?>
								<ul class="sfhg-list">
									<li><strong>status</strong> - <?php esc_html_e( 'option to show new bset score notification', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>color</strong> - <?php esc_html_e( 'notification color', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>textColor</strong> - <?php esc_html_e( 'notification text', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>radius</strong> - <?php esc_html_e( 'notification radius', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>stroke</strong> - <?php esc_html_e( 'notification stroke', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>strokeColor</strong> - <?php esc_html_e( 'notification stroke color', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>width</strong> - <?php esc_html_e( 'notification width', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>height</strong> - <?php esc_html_e( 'notification height', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>offsetX</strong> - <?php esc_html_e( 'notification offset x', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>offsetY</strong> - <?php esc_html_e( 'notification offset y', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>time</strong> - <?php esc_html_e( 'time to hide notification', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>message</strong> - <?php esc_html_e( 'best score message', 'scoreboard-for-html5-game' ); ?></li>
									<li><strong>messageNew</strong> - <?php esc_html_e( 'new best score message', 'scoreboard-for-html5-game' ); ?></li>
								</ul>
							</li>
						</ul>
					</li>
				</ol>
			</p>
			<?php sfhg_metabox_close(); ?>

			<?php sfhg_metabox_open( esc_html__( 'C) Scoreboard & Filters', 'scoreboard-for-html5-game' ), 'id-scoreboard&filters', false ); ?>
            <p style="color:red;"><?php printf( /* translators: %1$s %2$s: The a tag. */ esc_html__( 'These features work only with Scoreboard for HTML5 Game (Full Version) %1$shere%2$s.', 'scoreboard-for-html5-game' ), '<a href="' . esc_url( $plugin_domain ) . '" target="_blank">', '</a>' ); ?></p>
			<p><?php esc_html_e( 'In the plugin settings you can view all user scores and set filters for user or score, the game scoreboard top rank will display user score with filtering.', 'scoreboard-for-html5-game' ); ?></p>

			<h3><?php esc_html_e( 'Scoreboard', 'scoreboard-for-html5-game' ); ?></h3>
			<ol>
				<li><?php esc_html_e( 'Click on Scoreboard tab to view all user scores.', 'scoreboard-for-html5-game' ); ?></li>
				<img src="<?php printf( '%simages/wp_sample_01.jpg', esc_url( SFHG_PLUGIN_URL ) ); ?>" />
			</ol>

			<h3><?php esc_html_e( 'Filters', 'scoreboard-for-html5-game' ); ?></h3>
			<ol>
				<li><?php esc_html_e( 'Click on Filters tab to view all filters.', 'scoreboard-for-html5-game' ); ?></li>
				<img src="<?php printf( '%simages/wp_sample_02.jpg', esc_url( SFHG_PLUGIN_URL ) ); ?>" />
			</ol>

			<h3><?php esc_html_e( 'Users', 'scoreboard-for-html5-game' ); ?></h3>
			<ol>
				<li><?php esc_html_e( 'To exclude a user from scoreboard, just enter the user (email/phone) for each game.', 'scoreboard-for-html5-game' ); ?></li>
				<img src="<?php printf( '%simages/wp_sample_03.jpg', esc_url( SFHG_PLUGIN_URL ) ); ?>" />
			</ol>

			<h3><?php esc_html_e( 'Scores', 'scoreboard-for-html5-game' ); ?></h3>
			<ol>
				<li><?php esc_html_e( 'To control the scoreboard score list, just enter the score range for each game.', 'scoreboard-for-html5-game' ); ?></li>
				<img src="<?php printf( '%simages/wp_sample_04.jpg', esc_url( SFHG_PLUGIN_URL ) ); ?>" />
			</ol>

			<h3><?php esc_html_e( 'Check Filtering', 'scoreboard-for-html5-game' ); ?></h3>
			<ol>
				<li><?php printf( /* translators: %1$s %2$s: The a tag. */ esc_html__( 'Once filter is set, you can check filters column at scoreboard panel, all records should be %1$sValid%2$s except for filtering that is in %3$sSpam, Range%4$s.', 'scoreboard-for-html5-game' ), '<strong>', '</strong>', '<strong>', '</strong>' ); ?></li>
				<li><?php printf( /* translators: %1$s %2$s: The a tag. */ esc_html__( 'When user click scoreboard button to view top rank in HTML5 Game, only %1$sValid%2$s score lists will return.', 'scoreboard-for-html5-game' ), '<strong>', '</strong>' ); ?></li>
				<img src="<?php printf( '%simages/wp_sample_05.jpg', esc_url( SFHG_PLUGIN_URL ) ); ?>" />
			</ol>

			<h3><?php esc_html_e( 'Level or Category', 'scoreboard-for-html5-game' ); ?></h3>
			<ol>
				<li><?php printf( /* translators: %1$s %2$s: The a tag. */ esc_html__( 'Some HTML5 Games come with level or category, you will need to add multiple filters for different level/category on both user or score filters. Sample below the user will only exclude from %1$sIQ Test%2$s category, but the user score will still display for other category.', 'scoreboard-for-html5-game' ), '<strong>', '</strong>' ); ?></li>
				<img src="<?php printf( '%simages/wp_sample_06.jpg', esc_url( SFHG_PLUGIN_URL ) ); ?>" />
			</ol>
			<?php sfhg_metabox_close(); ?>
		</div>
   
