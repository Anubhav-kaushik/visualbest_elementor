<?php

if ( ! function_exists( 'brunn_core_masonry_gallery_meta_box_functions' ) ) {
	function brunn_core_masonry_gallery_meta_box_functions( $post_types ) {
		$post_types[] = 'masonry-gallery';
		
		return $post_types;
	}
	
	add_filter( 'brunn_select_filter_meta_box_post_types_save', 'brunn_core_masonry_gallery_meta_box_functions' );
	add_filter( 'brunn_select_filter_meta_box_post_types_remove', 'brunn_core_masonry_gallery_meta_box_functions' );
}

if ( ! function_exists( 'brunn_core_register_masonry_gallery_cpt' ) ) {
	function brunn_core_register_masonry_gallery_cpt( $cpt_class_name ) {
		$cpt_class = array(
			'BrunnCore\CPT\MasonryGallery\MasonryGalleryRegister'
		);
		
		$cpt_class_name = array_merge( $cpt_class_name, $cpt_class );
		
		return $cpt_class_name;
	}
	
	add_filter( 'brunn_core_filter_register_custom_post_types', 'brunn_core_register_masonry_gallery_cpt' );
}

if ( ! function_exists( 'brunn_core_add_proofing_gallery_to_search_types' ) ) {
	function brunn_core_add_proofing_gallery_to_search_types( $post_types ) {
		$post_types['masonry-gallery'] = esc_html__( 'Masonry Gallery', 'brunn-core' );
		
		return $post_types;
	}
	
	add_filter( 'brunn_select_filter_search_post_type_widget_params_post_type', 'brunn_core_add_proofing_gallery_to_search_types' );
}

// Load masonry gallery shortcodes
if ( ! function_exists( 'brunn_core_include_masonry_gallery_shortcodes_files' ) ) {
	/**
	 * Loades all shortcodes by going through all folders that are placed directly in shortcodes folder
	 */
	function brunn_core_include_masonry_gallery_shortcodes_files() {
		foreach ( glob( BRUNN_CORE_CPT_PATH . '/masonry-gallery/shortcodes/*/load.php' ) as $shortcode_load ) {
			include_once $shortcode_load;
		}
	}
	
	add_action( 'brunn_core_action_include_shortcodes_file', 'brunn_core_include_masonry_gallery_shortcodes_files' );
}

// Load portfolio elementor widgets
if ( ! function_exists( 'brunn_core_include_masonry_gallery_elementor_widgets_files' ) ) {
	/**
	 * Loades all shortcodes by going through all folders that are placed directly in shortcodes folder
	 */
	function brunn_core_include_masonry_gallery_elementor_widgets_files() {
		if ( brunn_core_theme_installed() && brunn_select_is_elementor_installed() ) {
			foreach (glob(BRUNN_CORE_CPT_PATH . '/masonry-gallery/shortcodes/*/elementor-*.php') as $shortcode_load) {
				include_once $shortcode_load;
			}
		}
	}

	add_action( 'elementor/widgets/widgets_registered', 'brunn_core_include_masonry_gallery_elementor_widgets_files' );
}