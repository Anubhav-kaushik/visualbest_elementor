<?php

if ( ! function_exists( 'brunn_select_register_recent_posts_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function brunn_select_register_recent_posts_widget( $widgets ) {
		$widgets[] = 'BrunnSelectClassRecentPosts';
		
		return $widgets;
	}
	
	add_filter( 'brunn_select_filter_register_widgets', 'brunn_select_register_recent_posts_widget' );
}