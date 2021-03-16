<?php

if ( ! function_exists( 'brunn_core_testimonials_meta_box_functions' ) ) {
	function brunn_core_testimonials_meta_box_functions( $post_types ) {
		$post_types[] = 'testimonials';
		
		return $post_types;
	}
	
	add_filter( 'brunn_select_filter_meta_box_post_types_save', 'brunn_core_testimonials_meta_box_functions' );
	add_filter( 'brunn_select_filter_meta_box_post_types_remove', 'brunn_core_testimonials_meta_box_functions' );
}

if ( ! function_exists( 'brunn_core_register_testimonials_cpt' ) ) {
	function brunn_core_register_testimonials_cpt( $cpt_class_name ) {
		$cpt_class = array(
			'BrunnCore\CPT\Testimonials\TestimonialsRegister'
		);
		
		$cpt_class_name = array_merge( $cpt_class_name, $cpt_class );
		
		return $cpt_class_name;
	}
	
	add_filter( 'brunn_core_filter_register_custom_post_types', 'brunn_core_register_testimonials_cpt' );
}

// Load testimonials shortcodes
if ( ! function_exists( 'brunn_core_include_testimonials_shortcodes_files' ) ) {
	/**
	 * Loades all shortcodes by going through all folders that are placed directly in shortcodes folder
	 */
	function brunn_core_include_testimonials_shortcodes_files() {
		foreach ( glob( BRUNN_CORE_CPT_PATH . '/testimonials/shortcodes/*/load.php' ) as $shortcode_load ) {
			include_once $shortcode_load;
		}
	}
	
	add_action( 'brunn_core_action_include_shortcodes_file', 'brunn_core_include_testimonials_shortcodes_files' );
}

// Load portfolio elementor widgets
if ( ! function_exists( 'brunn_core_include_testimonials_elementor_widgets_files' ) ) {
	/**
	 * Loades all shortcodes by going through all folders that are placed directly in shortcodes folder
	 */
	function brunn_core_include_testimonials_elementor_widgets_files() {
		if ( brunn_core_theme_installed() && brunn_select_is_elementor_installed() ) {
			foreach (glob(BRUNN_CORE_CPT_PATH . '/testimonials/shortcodes/*/elementor-*.php') as $shortcode_load) {
				include_once $shortcode_load;
			}
		}
	}

	add_action( 'elementor/widgets/widgets_registered', 'brunn_core_include_testimonials_elementor_widgets_files' );
}