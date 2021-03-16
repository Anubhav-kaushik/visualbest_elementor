<div class="qodef-fullscreen-search-holder">
	<a <?php brunn_select_class_attribute( $search_close_icon_class ); ?> href="javascript:void(0)">
		<?php echo brunn_select_get_icon_sources_html( 'search', true, array( 'search' => 'yes' ) ); ?>
	</a>
	<div class="qodef-fullscreen-search-table">
		<div class="qodef-fullscreen-search-cell">
			<div class="qodef-fullscreen-search-inner">
				<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="qodef-fullscreen-search-form" method="get">
					<div class="qodef-form-holder">
						<div class="qodef-form-holder-inner">
							<div class="qodef-field-holder">
								<input type="text" placeholder="<?php esc_attr_e( 'Type Your Search...', 'brunn' ); ?>" name="s" class="qodef-search-field" autocomplete="off"/>
							</div>
							<button type="submit" <?php brunn_select_class_attribute( $search_submit_icon_class ); ?>>
								<?php echo brunn_select_get_icon_sources_html( 'search', false, array( 'search' => 'yes' ) ); ?>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>