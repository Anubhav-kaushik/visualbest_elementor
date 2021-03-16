<?php

if ( ! function_exists( 'brunn_select_get_blog_holder_params' ) ) {
	/**
	 * Function that generates params for holders on blog templates
	 */
	function brunn_select_get_blog_holder_params( $params ) {
		$params_list = array();
		
		$params_list['holder'] = 'qodef-container';
		$params_list['inner']  = 'qodef-container-inner clearfix';
		
		return $params_list;
	}
	
	add_filter( 'brunn_select_filter_blog_holder_params', 'brunn_select_get_blog_holder_params' );
}

if ( ! function_exists( 'brunn_select_blog_part_params' ) ) {
	function brunn_select_blog_part_params( $params ) {
		
		$part_params              = array();
		$part_params['title_tag'] = 'h2';
		$part_params['link_tag']  = 'h2';
		$part_params['quote_tag'] = 'h2';
		
		return array_merge( $params, $part_params );
	}
	
	add_filter( 'brunn_select_filter_blog_part_params', 'brunn_select_blog_part_params' );
}