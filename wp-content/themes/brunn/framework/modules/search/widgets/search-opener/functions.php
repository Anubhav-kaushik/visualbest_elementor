<?php

if ( ! function_exists( 'brunn_select_register_search_opener_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function brunn_select_register_search_opener_widget( $widgets ) {
		$widgets[] = 'BrunnSelectClassSearchOpener';
		
		return $widgets;
	}
	
	add_filter( 'brunn_select_filter_register_widgets', 'brunn_select_register_search_opener_widget' );
}