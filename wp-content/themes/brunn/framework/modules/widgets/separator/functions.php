<?php

if ( ! function_exists( 'brunn_select_register_separator_widget' ) ) {
	/**
	 * Function that register separator widget
	 */
	function brunn_select_register_separator_widget( $widgets ) {
		$widgets[] = 'BrunnSelectClassSeparatorWidget';
		
		return $widgets;
	}
	
	add_filter( 'brunn_select_filter_register_widgets', 'brunn_select_register_separator_widget' );
}