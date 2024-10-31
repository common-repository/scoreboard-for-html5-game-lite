=== Scoreboard for HTML5 Games Lite ===
Contributors: demonisblack
Tags: extra, filters, html5, game, highscore, leaderboard, player, rank, save, score, submit, top
Author URI: https://codecanyon.net/user/demonisblack
License: GPLv2 or later
Requires at least: 3.6
Tested up to: 6.6
Stable tag: 1.2

Scoreboard for HTML5 Games is a Wordpress Plugin to embed HTML5 Games with scoreboard, user can submit score and view top 10 leaderboard. Admin can login through WP Admin Dashboard to view and filter player top rank scores, user score can be excluded by email/phone and scores can be control by range.

== Description ==

Scoreboard for HTML5 Games is a Wordpress Plugin to embed HTML5 Games with scoreboard, user can submit score and view top 10 leaderboard. Admin can login through WP Admin Dashboard to view and filter player top rank scores, user score can be excluded by email/phone and scores can be control by range.

<h3>How to use?</h3>
Download the compatible HTML5 Games and integrate the scoreboard files, go to plugin settings to add and upload game, use shortcode to embed game at your WP post or page content.

<h3>Features:</h3>
* Add and upload games through plugin settings
* Use shortcode to embed game at WP post or page content
* Support landscape and portrait game layout

<h3>Full Version Features:</h3>
* Edit scoreboard settings for every games in plugin settings
* Submit score with Name and Email (Unique by Email)
* User unique ID can be email or phone field
* Scoreboard list display (Rank, Name, Score)
* Top 10 rank can be all time, daily, weekly or monthly high score
* Show more than 10 listing
* Admin access to view all user scores.
* Manage and filter users by ID (email/phone).
* Manage and filter user scores by number range eg. 1 - 1000
* HTML5 Games scoreboard display score list with filters

[Get the full version!](https://codecanyon.net/item/scoreboard-for-html5-games/36706894 "Get the full version!")

== Installation ==

<h3>Installation</h3>
<ol>
	<li>Put the plugin folder into [wordpress_dir]/wp-content/plugins/</li>
	<li>Go into the WordPress admin interface and activate the plugin</li>
	<li>Go to plugin settings for Quick Start</li>
</ol>

<h3>Game Installation</h3>
= Upload game =
Add and upload games through plugin settings

Or manually upload through ftp or file manager:

Create a new folder /sfhg_games in root directoy and upload all games in the folder, eg. /sfhg_games/luckywheels

= Embed game =    
Add shortcode to page or post content to embed the game.
<strong>[scoreboard data-game="luckywheels" data-class="landscape"]</strong>

Examples if you want to embed with different settings.
<strong>[scoreboard data-game="luckywheels" data-class="landscape,portrait"]</strong>

<strong>[scoreboard data-game="luckywheels" data-class="landscape" allowfullscreen="false"]</strong>

<strong>[scoreboard data-game="luckywheels" data-class="landscape" data-style="padding-top:100%"]</strong>

= Shortcode options =
Below is the complete attributes of the shortcode
<ul>
	<li><strong>data-game</strong> – directory of the game</li>
	<li><strong>data-class</strong> – aspect ratio class for the game frame
		<ul>
			<li><strong>landscape</strong> – landscape mode</li>
			<li><strong>landscape-old</strong> – landscape mode older version</li>
			<li><strong>portrait</strong> – portrait mode</li>
			<li><strong>landscape, portrait</strong> – add multiple mode if the game support both, it will display randomly</li>
		</ul>
	</li>
	<li><strong>data-style</strong> – custom style for container, set padding-top percent for different aspect ratio</li>
	<li><strong>allowfullscreen</strong> – true or false to activate fullscreen mode</li>
</ul>

== Frequently Asked Questions ==

= What's the different between Lite and Full Version? =
With Lite version you can only upload and embed HTML5 Games.
With Full Version you can integrate and run scoreboard with the HTML5 Games below.
*All the HTML5 Games must compatible with this plugin [here](https://codecanyon.net/collections/6621618-scoreboard-games-lists/ "here")

= Does it work with other HTML5 Games? =
Yes, you still can upload and embed any HTML5 Games without scoreboard.

= Need help? =
[Visit the site for more questions or help.](https://codecanyon.net/item/scoreboard-for-html5-games/36706894/support "Visit the site for more questions or help.")

== Screenshots ==

1. Quick Start for instruction
2. Add and upload game file
3. Add shortcode to post or page content
4. Embeded HTML5 Games

== Changelog ==
= 1.2   =
* Fixed undefined constant

= 1.1   =
* Improve security
* Improve wordpress coding standard