<?php

if ( ! function_exists( 'brunn_select_register_social_icons_widget' ) ) {
	/**
	 * Function that register social icon widget
	 */
	function brunn_select_register_social_icons_widget( $widgets ) {
		$widgets[] = 'BrunnSelectClassClassIconsGroupWidget';
		
		return $widgets;
	}
	
	add_filter( 'brunn_select_filter_register_widgets', 'brunn_select_register_social_icons_widget' );
}