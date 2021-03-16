<?php

if ( ! function_exists( 'brunn_select_register_icon_widget' ) ) {
	/**
	 * Function that register icon widget
	 */
	function brunn_select_register_icon_widget( $widgets ) {
		$widgets[] = 'BrunnSelectClassIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'brunn_select_filter_register_widgets', 'brunn_select_register_icon_widget' );
}