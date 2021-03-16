<?php do_action('brunn_select_action_before_mobile_header'); ?>

<header class="qodef-mobile-header">
	<?php do_action('brunn_select_action_after_mobile_header_html_open'); ?>
	
	<div class="qodef-mobile-header-inner">
		<div class="qodef-mobile-header-holder">
			<div class="qodef-grid">
				<div class="qodef-vertical-align-containers">
					<div class="qodef-position-left"><!--
					 --><div class="qodef-position-left-inner">
							<?php brunn_select_get_mobile_logo(); ?>
						</div>
					</div>
					<div class="qodef-position-right"><!--
					 --><div class="qodef-position-right-inner">
							<a href="javascript:void(0)" <?php brunn_select_class_attribute( $fullscreen_menu_icon_class ); ?>>
								<span class="qodef-fullscreen-menu-close-icon">
									<?php echo brunn_select_get_icon_sources_html( 'fullscreen_menu', true ); ?>
								</span>
                                <span class="qodef-fm-lines">
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
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php do_action('brunn_select_action_before_mobile_header_html_close'); ?>
</header>

<?php do_action('brunn_select_action_after_mobile_header'); ?>