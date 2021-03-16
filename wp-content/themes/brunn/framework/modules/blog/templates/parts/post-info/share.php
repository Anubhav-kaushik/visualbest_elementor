<?php
$share_type = isset( $share_type ) ? $share_type : 'dropdown';
?>
<?php if ( brunn_select_core_plugin_installed() && brunn_select_options()->getOptionValue( 'enable_social_share' ) === 'yes' && brunn_select_options()->getOptionValue( 'enable_social_share_on_post' ) === 'yes' ) { ?>
	<div class="qodef-blog-share">
		<?php echo brunn_select_get_social_share_html( array( 'type' => $share_type, 'dropdown_behavior' => 'left' ) ); ?>
	</div>
<?php } ?>