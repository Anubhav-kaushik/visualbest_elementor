<?php

if ( ! function_exists( 'brunn_core_map_portfolio_settings_meta' ) ) {
	function brunn_core_map_portfolio_settings_meta() {
		$meta_box = brunn_select_create_meta_box( array(
			'scope' => 'portfolio-item',
			'title' => esc_html__( 'Portfolio Settings', 'brunn-core' ),
			'name'  => 'portfolio_settings_meta_box'
		) );
		
		brunn_select_create_meta_box_field( array(
			'name'        => 'qodef_portfolio_single_template_meta',
			'type'        => 'select',
			'label'       => esc_html__( 'Portfolio Type', 'brunn-core' ),
			'description' => esc_html__( 'Choose a default type for Single Project pages', 'brunn-core' ),
			'parent'      => $meta_box,
			'options'     => array(
				''                  => esc_html__( 'Default', 'brunn-core' ),
				'huge-images'       => esc_html__( 'Portfolio Full Width Images', 'brunn-core' ),
				'images'            => esc_html__( 'Portfolio Images', 'brunn-core' ),
				'small-images'      => esc_html__( 'Portfolio Small Images', 'brunn-core' ),
				'slider'            => esc_html__( 'Portfolio Slider', 'brunn-core' ),
				'small-slider'      => esc_html__( 'Portfolio Small Slider', 'brunn-core' ),
				'gallery'           => esc_html__( 'Portfolio Gallery', 'brunn-core' ),
				'small-gallery'     => esc_html__( 'Portfolio Small Gallery', 'brunn-core' ),
				'masonry'           => esc_html__( 'Portfolio Masonry', 'brunn-core' ),
				'small-masonry'     => esc_html__( 'Portfolio Small Masonry', 'brunn-core' ),
				'custom'            => esc_html__( 'Portfolio Custom', 'brunn-core' ),
				'full-width-custom' => esc_html__( 'Portfolio Full Width Custom', 'brunn-core' )
			)
		) );
		
		/***************** Gallery Layout *****************/
		
		$gallery_type_meta_container = brunn_select_add_admin_container(
			array(
				'parent'          => $meta_box,
				'name'            => 'qodef_gallery_type_meta_container',
				'dependency' => array(
					'show' => array(
						'qodef_portfolio_single_template_meta'  => array(
							'gallery',
							'small-gallery'
						)
					)
				)
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'          => 'qodef_portfolio_single_gallery_columns_number_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'brunn-core' ),
				'default_value' => '',
				'description'   => esc_html__( 'Set number of columns for portfolio gallery type', 'brunn-core' ),
				'parent'        => $gallery_type_meta_container,
				'options'       => brunn_select_get_number_of_columns_array( true, array( 'one', 'five', 'six' ) )
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'          => 'qodef_portfolio_single_gallery_space_between_items_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'brunn-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio gallery type', 'brunn-core' ),
				'default_value' => '',
				'options'       => brunn_select_get_space_between_items_array( true ),
				'parent'        => $gallery_type_meta_container
			)
		);
		
		/***************** Gallery Layout *****************/
		
		/***************** Masonry Layout *****************/
		
		$masonry_type_meta_container = brunn_select_add_admin_container(
			array(
				'parent'          => $meta_box,
				'name'            => 'qodef_masonry_type_meta_container',
				'dependency' => array(
					'show' => array(
						'qodef_portfolio_single_template_meta'  => array(
							'masonry',
							'small-masonry'
						)
					)
				)
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'          => 'qodef_portfolio_single_masonry_columns_number_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'brunn-core' ),
				'default_value' => '',
				'description'   => esc_html__( 'Set number of columns for portfolio masonry type', 'brunn-core' ),
				'parent'        => $masonry_type_meta_container,
				'options'       => brunn_select_get_number_of_columns_array( true, array( 'one', 'five', 'six' ) )
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'          => 'qodef_portfolio_single_masonry_space_between_items_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'brunn-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio masonry type', 'brunn-core' ),
				'default_value' => '',
				'options'       => brunn_select_get_space_between_items_array( true ),
				'parent'        => $masonry_type_meta_container
			)
		);
		
		/***************** Masonry Layout *****************/
		
		brunn_select_create_meta_box_field(
			array(
				'name'          => 'qodef_show_title_area_portfolio_single_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'brunn-core' ),
				'description'   => esc_html__( 'Enabling this option will show title area on your single portfolio page', 'brunn-core' ),
				'parent'        => $meta_box,
				'options'       => brunn_select_get_yes_no_select_array()
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'        => 'portfolio_info_top_padding',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio Info Top Padding', 'brunn-core' ),
				'description' => esc_html__( 'Set top padding for portfolio info elements holder. This option works only for Portfolio Images, Slider, Gallery and Masonry portfolio types', 'brunn-core' ),
				'parent'      => $meta_box,
				'args'        => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);

		brunn_select_create_meta_box_field(
			array(
				'name'        => 'portfolio_additional_title',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio Additional Title', 'brunn-core' ),
				'parent'      => $meta_box,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'        => 'portfolio_external_link',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio External Link', 'brunn-core' ),
				'description' => esc_html__( 'Enter URL to link from Portfolio List page', 'brunn-core' ),
				'parent'      => $meta_box,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'        => 'qodef_portfolio_featured_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Featured Image', 'brunn-core' ),
				'description' => esc_html__( 'Choose an image for Portfolio Lists shortcode where Hover Type option is Switch Featured Images', 'brunn-core' ),
				'parent'      => $meta_box
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'          => 'qodef_portfolio_masonry_fixed_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Masonry - Image Fixed Proportion', 'brunn-core' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry type portfolio lists where image proportion is fixed', 'brunn-core' ),
				'default_value' => '',
				'parent'        => $meta_box,
				'options'       => array(
					''                   => esc_html__( 'Default', 'brunn-core' ),
					'small'              => esc_html__( 'Small', 'brunn-core' ),
					'large-width'        => esc_html__( 'Large Width', 'brunn-core' ),
					'large-height'       => esc_html__( 'Large Height', 'brunn-core' ),
					'large-width-height' => esc_html__( 'Large Width/Height', 'brunn-core' )
				)
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'          => 'qodef_portfolio_masonry_original_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Masonry - Image Original Proportion', 'brunn-core' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry type portfolio lists where image proportion is original', 'brunn-core' ),
				'default_value' => '',
				'parent'        => $meta_box,
				'options'       => array(
					''            => esc_html__( 'Default', 'brunn-core' ),
					'large-width' => esc_html__( 'Large Width', 'brunn-core' )
				)
			)
		);
		
		$all_pages = array();
		$pages     = get_pages();
		foreach ( $pages as $page ) {
			$all_pages[ $page->ID ] = $page->post_title;
		}
		
		brunn_select_create_meta_box_field(
			array(
				'name'        => 'portfolio_single_back_to_link',
				'type'        => 'select',
				'label'       => esc_html__( '"Back To" Link', 'brunn-core' ),
				'description' => esc_html__( 'Choose "Back To" page to link from portfolio Single Project page', 'brunn-core' ),
				'parent'      => $meta_box,
				'options'     => $all_pages,
				'args'        => array(
					'select2' => true
				)
			)
		);
	}
	
	add_action( 'brunn_select_action_meta_boxes_map', 'brunn_core_map_portfolio_settings_meta', 41 );
}