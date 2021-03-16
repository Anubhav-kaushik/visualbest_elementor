<?php

if ( ! function_exists( 'brunn_select_register_author_info_widget' ) ) {
	/**
	 * Function that register author info widget
	 */
	function brunn_select_register_author_info_widget( $widgets ) {
		$widgets[] = 'BrunnSelectClassAuthorInfoWidget';
		
		return $widgets;
	}
	
	add_filter( 'brunn_select_filter_register_widgets', 'brunn_select_register_author_info_widget' );
}