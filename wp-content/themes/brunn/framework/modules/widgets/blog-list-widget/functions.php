<?php

if ( ! function_exists( 'brunn_select_register_blog_list_widget' ) ) {
	/**
	 * Function that register blog list widget
	 */
	function brunn_select_register_blog_list_widget( $widgets ) {
		$widgets[] = 'BrunnSelectClassBlogListWidget';
		
		return $widgets;
	}
	
	add_filter( 'brunn_select_filter_register_widgets', 'brunn_select_register_blog_list_widget' );
}