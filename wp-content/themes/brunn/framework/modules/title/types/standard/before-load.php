<?php

if ( ! function_exists( 'brunn_select_set_hide_dep_options_title_standard' ) ) {
	/**
	 * This function is used to hide all containers/panels for admin options when this title type is selected
	 */
	function brunn_select_set_hide_dep_options_title_standard( $hide_dep_options ) {
		$hide_dep_options[] = 'standard';
		
		return $hide_dep_options;
	}
	
	// hide breadcrumbs meta
	add_filter( 'brunn_select_filter_breadcrumbs_title_hide_meta_boxes', 'brunn_select_set_hide_dep_options_title_standard' );
}