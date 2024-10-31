<table class="form-table" role="presentation">
	<input type="hidden" name="id" value="<?php echo esc_attr( $edit ) ? esc_textarea( $row->id ) : ''; ?>">
	<tbody>
	<tr class="form-field form-required">
		<th scope="row"><label for="tablename"><?php esc_html_e( 'DataTable : ', 'scoreboard-for-html5-game' ); ?><span class="description"><?php esc_html_e( '(alphabet only)', 'scoreboard-for-html5-game' ); ?></span></label></th>
		<td>
			<input name="tablename" type="text" id="tablename" value="<?php echo esc_attr( $edit ) ? esc_textarea( $row->tablename ) : ''; ?>" required="required" <?php echo esc_attr( $edit ) ? 'readonly' : ''; ?> class="sfhg-input">
		</td>
	</tr>
	<tr class="form-field">
		<th scope="row"><label for="scoretype"><?php esc_html_e( 'DataTable Score Display : ', 'scoreboard-for-html5-game' ); ?></label></th>
		<td>
			<select disabled id="scoretype" name="scoretype" placeholder="" class="" >
				<option value="point" <?php echo ( esc_attr( $edit ) && esc_textarea( $row->scoretype ) === 'point' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Point', 'scoreboard-for-html5-game' ); ?></option>
				<option value="timer" <?php echo ( esc_attr( $edit ) && esc_textarea( $row->scoretype ) === 'timer' ) ? 'selected' : ''; ?>><?php esc_html_e( 'Timer', 'scoreboard-for-html5-game' ); ?></option>
			</select>
		</td>
	</tr>
	<tr class="form-field form-required">
		<th scope="row"><label for="settings"><?php esc_html_e( 'Scoreboard Settings : ', 'scoreboard-for-html5-game' ); ?><span class="description"><?php esc_html_e( '(required)', 'scoreboard-for-html5-game' ); ?></span></label></th>
		<td><textarea disabled readonly rows="20" name="settings" type="text" id="settings" required="required" class="sfhg-input"><?php echo esc_attr( $edit ) ? wp_json_encode( json_decode( stripslashes( $row->settings ) ), JSON_PRETTY_PRINT ) : esc_textarea( get_option( 'sfhg_scoreboard_settings', $sfhg_scoreboard_settings ) ); ?></textarea>
	</tr>
	</tbody>
</table>
