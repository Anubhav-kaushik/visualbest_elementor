<?php if ( brunn_select_options()->getOptionValue( 'enable_social_share' ) == 'yes' && brunn_select_options()->getOptionValue( 'enable_social_share_on_portfolio_item' ) == 'yes' ) : ?>
	<div class="qodef-ps-info-item qodef-ps-social-share">
		<?php
		/**
		 * Available params type, icon_type and title
		 *
		 * Return social share html
		 */
		echo brunn_select_get_social_share_html( array( 'type'  => 'list', 'title' => esc_attr__( 'Follow Us:', 'brunn-core' ) ) ); ?>
	</div>
<?php endif; ?>