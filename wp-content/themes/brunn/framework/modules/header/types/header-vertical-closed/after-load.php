<?php

if ( ! function_exists( 'brunn_select_disable_behaviors_for_header_vertical_closed' ) ) {
	/**
	 * This function is used to disable sticky header functions that perform processing variables their used in js for this header type
	 */
	function brunn_select_disable_behaviors_for_header_vertical_closed( $allow_behavior ) {
		return false;
	}
	
	if ( brunn_select_check_is_header_type_enabled( 'header-vertical-closed', brunn_select_get_page_id() ) ) {
		add_filter( 'brunn_select_filter_allow_sticky_header_behavior', 'brunn_select_disable_behaviors_for_header_vertical_closed' );
		add_filter( 'brunn_select_filter_allow_content_boxed_layout', 'brunn_select_disable_behaviors_for_header_vertical_closed' );
	}
}