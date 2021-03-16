<?php

if ( ! function_exists( 'brunn_select_register_blog_masonry_template_file' ) ) {
	/**
	 * Function that register blog masonry template
	 */
	function brunn_select_register_blog_masonry_template_file( $templates ) {
		$templates['blog-masonry'] = esc_html__( 'Blog: Masonry', 'brunn' );
		
		return $templates;
	}
	
	add_filter( 'brunn_select_filter_register_blog_templates', 'brunn_select_register_blog_masonry_template_file' );
}

if ( ! function_exists( 'brunn_select_set_blog_masonry_type_global_option' ) ) {
	/**
	 * Function that set blog list type value for global blog option map
	 */
	function brunn_select_set_blog_masonry_type_global_option( $options ) {
		$options['masonry'] = esc_html__( 'Blog: Masonry', 'brunn' );
		
		return $options;
	}
	
	add_filter( 'brunn_select_filter_blog_list_type_global_option', 'brunn_select_set_blog_masonry_type_global_option' );
}