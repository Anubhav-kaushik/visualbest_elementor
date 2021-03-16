<?php do_action( 'brunn_select_action_before_page_header' ); ?>

    <aside class="qodef-vertical-menu-area <?php echo esc_attr( $holder_class ); ?>">
        <div class="qodef-vertical-menu-area-inner">
            <a href="#" <?php brunn_select_class_attribute( $vertical_closed_icon_class ); ?>>
			<span class="qodef-vertical-area-close-icon">
				<?php echo brunn_select_get_icon_sources_html( 'vertical_closed', true ); ?>
			</span>
                <span class="qodef-vertical-area-opener-icon">
				<span class="qodef-vm-lines">
                    <span class="qodef-dot"></span>
                    <span class="qodef-dot"></span>
                    <span class="qodef-dot"></span>
                    <span class="qodef-dot"></span>
                    <span class="qodef-dot"></span>
                    <span class="qodef-dot"></span>
                    <span class="qodef-dot"></span>
                    <span class="qodef-dot"></span>
                    <span class="qodef-dot"></span>
                </span>
			</span>
            </a>
            <div class="qodef-vertical-area-background"></div>
			<?php if ( ! $hide_logo ) {
				brunn_select_get_logo();
			} ?>
			<?php brunn_select_get_header_vertical_closed_main_menu(); ?>

			<?php if ( brunn_select_is_header_widget_area_active( 'one' ) ): ?>
                <div class="qodef-vertical-area-widget-holder">
					<?php brunn_select_get_header_widget_area_one(); ?>
                </div>
			<?php endif; ?>

        </div>
    </aside>
    <div class="qodef-vertical-area-bottom-logo">
        <div class="qodef-vertical-area-bottom-logo-inner">
			<?php if ( ! $hide_logo ) {
				brunn_select_get_logo();
			} ?>
        </div>
    </div>

<?php do_action( 'brunn_select_action_after_page_header' ); ?>