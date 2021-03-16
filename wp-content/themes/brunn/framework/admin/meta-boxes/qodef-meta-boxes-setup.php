<?php

if ( ! function_exists( 'brunn_select_meta_boxes_map_after_setup_theme' ) ) {
	function brunn_select_meta_boxes_map_after_setup_theme() {
		/**
		 * Loades all meta-boxes by going through all folders that are placed directly in meta-boxes folder
		 * and loads map.php file in each.
		 *
		 * @see http://php.net/manual/en/function.glob.php
		 */
		do_action( 'brunn_select_action_before_meta_boxes_map' );
		
		foreach ( glob( SELECT_FRAMEWORK_ROOT_DIR . '/admin/meta-boxes/*/map.php' ) as $meta_box_load ) {
			include_once $meta_box_load;
		}
		
		do_action( 'brunn_select_action_meta_boxes_map' );
		
		do_action( 'brunn_select_action_after_meta_boxes_map' );
	}
	
	add_action( 'after_setup_theme', 'brunn_select_meta_boxes_map_after_setup_theme', 1 );
}

if ( ! function_exists( 'brunn_select_meta_boxes_map_init' ) ) {
    function brunn_select_meta_boxes_map_init() {

        do_action( 'brunn_select_action_meta_boxes_map_on_init_action' );

    }

    add_action( 'init', 'brunn_select_meta_boxes_map_init', 1 );
}