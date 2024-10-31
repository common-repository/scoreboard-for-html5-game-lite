<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

	global $wpdb;
	$game_action = ( isset( $_REQUEST['action'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['action'] ) ) : '' );

if ( isset( $_POST['delete_game_file'] ) ) {
	$wpnonce = ( isset( $_POST['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_POST['_wpnonce'] ) ) : '' );
	if (
		! wp_verify_nonce(
			$wpnonce,
			'scoreboardforhtml5gamesdelete'
		)
	) {
		die( esc_html__( 'Update security violated', 'scoreboard-for-html5-game' ) );
	}

	$table_name = ( isset( $_POST['tablename'] ) ? sanitize_text_field( wp_unslash( $_POST['tablename'] ) ) : '' );
	$dirname    = '..' . SFHG_GAME_DIR . '/' . sanitize_text_field( $table_name );
	rrmdir( $dirname );
	echo '<div class="notice updated is-dismissible"><p>' . esc_html__( 'Game folder deleted.', 'scoreboard-for-html5-game' ) . '</p></div>';
}

/**
 * Check directory function.
 *
 * @param string $dir directory name.
 */
function rrmdir( $dir ) {
	if ( is_dir( $dir ) ) {
		$objects = scandir( $dir );
		foreach ( $objects as $object ) {
			if ( '.' !== $object && '..' !== $object ) {
				if ( filetype( $dir . '/' . $object ) === 'dir' ) {
					rrmdir( $dir . '/' . $object );
				} else {
					unlink( $dir . '/' . $object );
				}
			}
		}
			reset( $objects );
			rmdir( $dir );
	}
}

if ( isset( $_POST['upload_game_file'] ) ) {
	$wpnonce = ( isset( $_POST['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_POST['_wpnonce'] ) ) : '' );
	if (
		! wp_verify_nonce(
			$wpnonce,
			'scoreboardforhtml5gamesupload'
		)
	) {
		die( esc_html__( 'Update security violated', 'scoreboard-for-html5-game' ) );
	}

	$upload_game_file = ( isset( $_POST['upload_game_file'] ) ? sanitize_text_field( wp_unslash( $_POST['upload_game_file'] ) ) : '' );
	if ( 'yes' === $upload_game_file ) {
		$target_dir = '..' . SFHG_GAME_DIR . '/';
		if ( ! file_exists( $target_dir ) ) {
			mkdir( $target_dir, 0777, true );
		}
		$target_file = $target_dir . basename( $_FILES['uploadGameFile']['name'] );
		$upload_ok   = 1;
		$file_type   = pathinfo( $target_file, PATHINFO_EXTENSION );
		$tmp_n       = basename( $_FILES['uploadGameFile']['name'] );
		$file_name   = substr( $tmp_n, 0, -4 );

		if ( $_FILES['uploadGameFile']['size'] > 50000000 ) {
			echo '<div class="notice notice-warning"><p>' . esc_html__( 'Sorry, your game file is too large.', 'scoreboard-for-html5-game' ) . '</p></div>';
			$upload_ok = 0;
		}

		if ( 'zip' !== $file_type ) {
			echo '<div class="notice notice-warning"><p>' . esc_html__( 'Sorry, only ZIP file are allowed.', 'scoreboard-for-html5-game' ) . '</p></div>';
			$upload_ok = 0;
		}

		if ( 0 === $upload_ok ) {
			echo '<div class="notice notice-warning"><p>' . esc_html__( 'Sorry, your file was not uploaded.', 'scoreboard-for-html5-game' ) . '</p></div>';
		} else {
			if ( move_uploaded_file( $_FILES['uploadGameFile']['tmp_name'], $target_file ) ) {
				if ( 'zip' !== $file_type ) {
					$file_name = $file_name . '.' . $file_type;
				}
				if ( 'zip' === $file_type ) {
					$tablename = ( isset( $_POST['tablename'] ) ? sanitize_text_field( wp_unslash( $_POST['tablename'] ) ) : '' );
					get_zip( $target_file, $target_dir, $tablename, $overwrite );
				}
			} else {
				echo '<div class="notice notice-warning"><p>' . esc_html__( 'Sorry, there was an error uploading your file.', 'scoreboard-for-html5-game' ) . '</p></div>';
			}
		}
	}
}

/**
 * Get ZIP function.
 *
 * @param string $file file name.
 * @param string $dir directory.
 * @param string $name tablename.
 * @param string $over overwrite.
 */
function get_zip( $file, $dir, $name, $over ) {
	$target_folder = $dir . $name;
		$unzip     = true;
	if ( ! file_exists( $target_folder ) ) {
		mkdir( $target_folder, 0777, true );
	} else {
		if ( false === $over ) {
			$unzip = false;
		}
	}

	if ( true === $unzip ) {
		$zip = new ZipArchive();
		if ( true === $zip->open( $file ) ) {
			$name       = '';
			$have_index = false;
			for ( $i = 0; $i < $zip->numFiles; $i++ ) {
				$filename = $zip->getNameIndex( $i );
				if ( 'index.html' === $filename ) {
					$have_index = true;
					break;
				}
			}
			if ( $have_index ) {
				$zip->extractTo( $target_folder );
				echo '<div class="notice updated is-dismissible"><p>' . sprintf( /* translators: %s: The path location. */ esc_html__( 'Game uploaded. Path: %s', 'scoreboard-for-html5-game' ), esc_textarea( $target_folder ) ) . '</p></div>';
			} else {
				echo '<div class="notice notice-warning"><p>' . esc_html__( 'No index.html file on root!', 'scoreboard-for-html5-game' ) . '</p></div>';
			}
			$zip->close();
			unlink( $file );

			if ( ! $have_index ) {
				rrmdir( $target_folder );
			}
		} else {
			echo 'failed';
		}
	}
}

if ( isset( $_POST['add_game'] ) ) {
	$wpnonce = ( isset( $_POST['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_POST['_wpnonce'] ) ) : '' );
	if (
		! wp_verify_nonce(
			$wpnonce,
			'scoreboardforhtml5gamesadd'
		)
	) {
		die( esc_html__( 'Update security violated', 'scoreboard-for-html5-game' ) );
	}
	$add_game = ( isset( $_POST['add_game'] ) ? sanitize_text_field( wp_unslash( $_POST['add_game'] ) ) : '' );
	if ( 'yes' === $add_game ) {
		$tablename = ( isset( $_POST['tablename'] ) ? sanitize_text_field( wp_unslash( $_POST['tablename'] ) ) : '' );
		$scoretype = ( isset( $_POST['scoretype'] ) ? sanitize_text_field( wp_unslash( $_POST['scoretype'] ) ) : '' );
		$settings  = ( isset( $_POST['settings'] ) ? sanitize_text_field( wp_unslash( $_POST['settings'] ) ) : '' );
		$result    = $wpdb->get_results( $wpdb->prepare( 'SELECT * from %1s WHERE tablename = %s', SFHG_TABLE_SETTINGS, $tablename ) );

		if ( count( $result ) > 0 ) {
			echo '<div class="error"><p><strong>' . esc_html__( 'Table name exist, please try other name!', 'scoreboard-for-html5-game' ) . '</strong></p></div>';
		} else {
			$scoretype = isset( $_POST['scoretype'] ) ? $scoretype : 'point';
			$settings  = isset( $_POST['settings'] ) ? $settings : get_option( 'sfhg_scoreboard_settings', $sfhg_scoreboard_settings );

			$wpdb->insert(
				SFHG_TABLE_SETTINGS,
				array(
					'tablename' => strtolower( $tablename ),
					'scoretype' => $scoretype,
					'settings'  => $settings,
				)
			);

			define( 'SFHG_TABLE_GAME', $wpdb->prefix . SFHG_TABLE_PREFIX . strtolower( $tablename ) );
			$sql = 'CREATE TABLE IF NOT EXISTS `' . SFHG_TABLE_GAME . "` (
                    `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    `name` VARCHAR(30) NOT NULL DEFAULT 'anonymous',
                    `email` VARCHAR(30) NOT NULL,
                    `type` VARCHAR(30) NOT NULL,
                    `score` INT(100) UNSIGNED NOT NULL DEFAULT 0,
                    `date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                ) CHARSET=utf8 DEFAULT COLLATE utf8_unicode_ci;";
			dbDelta( $sql );

			echo '<div class="updated"><p><strong>' . esc_html__( 'Game Added.', 'scoreboard-for-html5-game' ) . '</strong></p></div>';
		}
	}
}

if ( isset( $_POST['update_game'] ) ) {
	$wpnonce = ( isset( $_POST['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_POST['_wpnonce'] ) ) : '' );
	if (
		! wp_verify_nonce(
			$wpnonce,
			'scoreboardforhtml5gamesupdate'
		)
	) {
		die( esc_html__( 'Update security violated', 'scoreboard-for-html5-game' ) );
	}
	$update_game = ( isset( $_POST['update_game'] ) ? sanitize_text_field( wp_unslash( $_POST['update_game'] ) ) : '' );
	if ( 'yes' === $update_game ) {
		$tablename = ( isset( $_POST['tablename'] ) ? sanitize_text_field( wp_unslash( $_POST['tablename'] ) ) : '' );
		$scoretype = ( isset( $_POST['scoretype'] ) ? sanitize_text_field( wp_unslash( $_POST['scoretype'] ) ) : '' );
		$settings  = ( isset( $_POST['settings'] ) ? sanitize_text_field( wp_unslash( $_POST['settings'] ) ) : '' );
		$game_id   = ( isset( $_POST['id'] ) ? sanitize_text_field( wp_unslash( $_POST['id'] ) ) : '' );
		$wpdb->update(
			SFHG_TABLE_SETTINGS,
			array(
				'tablename' => $tablename,
				'scoretype' => $scoretype,
				'settings'  => $settings,
			),
			array(
				'id' => $game_id,
			)
		);
		echo '<div class="updated"><p><strong>' . esc_html__( 'Game Updated.', 'scoreboard-for-html5-game' ) . '</strong></p></div>';
	}
}

if ( isset( $_POST['delete_game'] ) ) {
	$wpnonce = ( isset( $_POST['_wpnonce'] ) ? sanitize_text_field( wp_unslash( $_POST['_wpnonce'] ) ) : '' );
	if (
		! wp_verify_nonce(
			$wpnonce,
			'scoreboardforhtml5gamesdelete'
		)
	) {
		die( esc_html__( 'Update security violated', 'scoreboard-for-html5-game' ) );
	}
	$delete_game = ( isset( $_POST['delete_game'] ) ? sanitize_text_field( wp_unslash( $_POST['delete_game'] ) ) : '' );
	if ( 'yes' === $delete_game ) {
		$tablename = ( isset( $_POST['tablename'] ) ? sanitize_text_field( wp_unslash( $_POST['tablename'] ) ) : '' );
		$game_id   = ( isset( $_POST['id'] ) ? sanitize_text_field( wp_unslash( $_POST['id'] ) ) : '' );
		$wpdb->delete( SFHG_TABLE_SETTINGS, array( 'id' => $game_id ) );

		define( 'SFHG_TABLE_GAME', $wpdb->prefix . SFHG_TABLE_PREFIX . $tablename );
		$wpdb->query( 'DROP TABLE IF EXISTS ' . SFHG_TABLE_GAME );

		echo '<div class="updated"><p><strong>' . esc_html__( 'Game Deleted.', 'scoreboard-for-html5-game' ) . '</strong></p></div>';
	}
}

?>	
	<div class="wrap">
		<?php echo '<h3>' . esc_html__( 'Games', 'scoreboard-for-html5-game' ) . '</h3>'; ?>
		<?php
		$game_id;
		$game_table;
		?>
		<div class="tablenav">
			<div class="alignleft">				
				<?php
					$query  = 'SELECT * from ' . SFHG_TABLE_SETTINGS;
					$result = $wpdb->get_results( $query );

				if ( count( $result ) > 0 ) {
					?>
				<label for="datatable" class="screen-reader-text"><?php esc_html_e( 'Select DataTable', 'scoreboard-for-html5-game' ); ?></label>
				<select name="datatable" id="datatable">
					<?php
					$count      = 0;
					$data_first = '';
					$data       = ( isset( $_REQUEST['data'] ) ? sanitize_text_field( wp_unslash( $_REQUEST['data'] ) ) : '' );
					foreach ( $result as $row ) {
						$selected = $data === $row->tablename ? 'selected' : '';
						if ( 0 === $count ) {
							$data_first = $row->tablename;
						}
						$count++;
						?>

							<option value="<?php echo esc_url( SFHG_PLUGIN_TAB ) . 'sfhg_games&data=' . esc_textarea( $row->tablename ); ?>" <?php echo esc_textarea( $selected ); ?>><?php echo esc_textarea( $row->tablename ); ?></option>
						<?php
					}

					if ( ! empty( $data ) ) {
						update_option( 'sfhg_data', $data );
					} else {
						update_option( 'sfhg_data', $data_first );
					}
					?>
				</select>
					<?php
				}
				?>

				<?php
				if ( current_user_can( 'manage_options' ) ) {
					$add_url = remove_query_arg( 'data' );
					$add_url = add_query_arg( 'action', 'new', $add_url );
					?>
				<a href="<?php echo esc_url( $add_url ); ?>" class="button" ><?php esc_html_e( 'Add Game', 'scoreboard-for-html5-game' ); ?></a>
				<?php } ?>
			</div>
			<br class="clear">
		</div>

		<br>
		<hr>
		<div class="sfhg-container">
		<?php
		if ( 'new' === $game_action ) {
			$action_url = add_query_arg( 'action', 'add' );
			?>
			<?php sfhg_metabox_open( esc_html__( 'New game settings', 'scoreboard-for-html5-game' ), 'id-new-game-settings', true ); ?>
			<?php
		} elseif ( count( $result ) > 0 ) {
			$action_url = add_query_arg( 'action', 'update' );
			?>
			<?php sfhg_metabox_open( esc_html__( 'Current game settings', 'scoreboard-for-html5-game' ), 'id-current-game-settings', true ); ?>
			<?php
		}
		?>
		<form id="sfhg_game_form" name="sfhg_game_form" method="post" action="<?php echo esc_url( $action_url ); ?>">
			<?php wp_nonce_field( 'scoreboardforhtml5gamesadd' ); ?>
			<?php
			if ( 'new' === $game_action ) {
				?>
				<input type="hidden" name="add_game" value="yes">
				<?php
				wp_nonce_field( 'scoreboardforhtml5gamesadd' );
				include_once 'form-game.php';
				?>

				<hr>

				<input type="submit" name="add" value="<?php esc_html_e( 'Add Game', 'scoreboard-for-html5-game' ); ?>" class="button-primary action" />
				<a href="<?php echo esc_url( SFHG_PLUGIN_TAB . 'sfhg_games' ); ?>" class="button-secondary" ><?php esc_html_e( 'Cancel', 'scoreboard-for-html5-game' ); ?></a>		
				<?php
			} else {
				?>
				<input type="hidden" name="update_game" value="yes">
				<?php
				wp_nonce_field( 'scoreboardforhtml5gamesupdate' );

				$result = $wpdb->get_results( $wpdb->prepare( 'SELECT * from %1s WHERE tablename = %s', SFHG_TABLE_SETTINGS, get_option( 'sfhg_data' ) ) );
				$edit   = true;

				foreach ( $result as $row ) {
					$game_id    = $row->id;
					$game_table = $row->tablename;
					include_once 'form-game.php';
					?>
					<input type="submit" name="update" value="<?php esc_html_e( 'Update Game', 'scoreboard-for-html5-game' ); ?>" class="button-primary action" />
					<?php
				}
			}
			?>
		</form>		
		<?php
			$upload_url = add_query_arg( 'action', 'upload' );

			$action_url = remove_query_arg( 'data' );
			$action_url = add_query_arg( 'action', 'delete', $action_url );

		if ( 'new' !== $game_action && ! empty( $game_id ) ) {
			?>
		<br>
		<hr>

		<form method="post" action="<?php echo esc_url( $upload_url ); ?>" enctype="multipart/form-data" class="">
			<?php
			$target_dir       = '..' . SFHG_GAME_DIR . '/';
			$target_dir_exist = false;

			if ( file_exists( $target_dir ) ) {
				$game_list  = scandir( $target_dir );
				$total_list = count( $game_list );
				foreach ( $game_list as $game ) {
					if ( esc_textarea( $game_table ) === $game ) {
						$target_dir_exist = true;
					}
				}
			}

			if ( $target_dir_exist ) {
				?>
				<?php wp_nonce_field( 'scoreboardforhtml5gamesdelete' ); ?>
			<input type="hidden" name="delete_game_file" value="yes">
			<input type="hidden" name="tablename" value="<?php echo esc_textarea( $game_table ); ?>">
			<table class="form-table" role="presentation">
				<tbody>
				<tr class="form-field form-required">
					<th scope="row"><label for="uploadGameFile"><?php esc_html_e( 'Game Directory :', 'scoreboard-for-html5-game' ); ?></label></th>
					<td>
						<?php echo esc_url( get_site_url() . SFHG_GAME_DIR . '/' . esc_textarea( $game_table ) ); ?>
					</td>
				</tr>
				</tbody>
			</table>
			<input type="submit" class="button-primary" value="<?php esc_html_e( 'Delete Game Folder', 'scoreboard-for-html5-game' ); ?>" name="submit">
			<a href="<?php echo esc_url( get_site_url() . SFHG_GAME_DIR . '/' . esc_textarea( $row->tablename ) ); ?>" target="_blank" class="button-secondary" ><?php esc_html_e( 'Load Game', 'scoreboard-for-html5-game' ); ?></a>				
			<?php } else { ?>	
				<?php wp_nonce_field( 'scoreboardforhtml5gamesupload' ); ?>
			<input type="hidden" name="upload_game_file" value="yes">
			<input type="hidden" name="tablename" value="<?php echo esc_textarea( $game_table ); ?>">
			<table class="form-table" role="presentation">
				<tbody>
				<tr class="form-field form-required">
					<th scope="row"><label for="uploadGameFile"><?php esc_html_e( 'Upload game : ', 'scoreboard-for-html5-game' ); ?></label></th>
					<td>
						<input type="file" name="uploadGameFile" id="file" class="" data-multiple-caption="{count} files selected" multiple=""><br>
					</td>
				</tr>
				</tbody>
			</table>
			<input type="submit" class="button-primary" value="<?php esc_html_e( 'Upload Game', 'scoreboard-for-html5-game' ); ?>" name="submit">
			<?php } ?>
		</form>
		<br>
		<hr>

		<form id="sfhg_form_delete" name="sfhg_delete_form" method="post" action="<?php echo esc_url( $action_url ); ?>">
			<input type="hidden" name="delete_game" value="yes">
			<input type="hidden" name="id" value="<?php echo esc_textarea( $game_id ); ?>">
			<input type="hidden" name="tablename" value="<?php echo esc_textarea( $game_table ); ?>">
			<?php wp_nonce_field( 'scoreboardforhtml5gamesdelete' ); ?>
			<p>
				<?php esc_html_e( 'Delete this game setting and drop game table in a database.', 'scoreboard-for-html5-game' ); ?><br>
				<?php esc_html_e( 'All user records will be remove.', 'scoreboard-for-html5-game' ); ?>
			</p>
			<input type="submit" name="delete" value="<?php esc_html_e( 'Delete Game', 'scoreboard-for-html5-game' ); ?>" class="button-primary action" />
		</form>
			<?php sfhg_metabox_close(); ?>
		</div>
		<?php } ?>
	</div> 
