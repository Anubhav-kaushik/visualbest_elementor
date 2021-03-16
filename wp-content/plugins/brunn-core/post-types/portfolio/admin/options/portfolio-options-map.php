<?php

if ( ! function_exists( 'brunn_select_portfolio_options_map' ) ) {
	function brunn_select_portfolio_options_map() {
		
		brunn_select_add_admin_page(
			array(
				'slug'  => '_portfolio',
				'title' => esc_html__( 'Portfolio', 'brunn-core' ),
				'icon'  => 'fa fa-camera-retro'
			)
		);
		
		$panel_archive = brunn_select_add_admin_panel(
			array(
				'title' => esc_html__( 'Portfolio Archive', 'brunn-core' ),
				'name'  => 'panel_portfolio_archive',
				'page'  => '_portfolio'
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'        => 'portfolio_archive_number_of_items',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Items', 'brunn-core' ),
				'description' => esc_html__( 'Set number of items for your portfolio list on archive pages. Default value is 12', 'brunn-core' ),
				'parent'      => $panel_archive,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'portfolio_archive_number_of_columns',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'brunn-core' ),
				'default_value' => 'four',
				'description'   => esc_html__( 'Set number of columns for your portfolio list on archive pages. Default value is Four columns', 'brunn-core' ),
				'parent'        => $panel_archive,
				'options'       => brunn_select_get_number_of_columns_array( false, array( 'one', 'six' ) )
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'portfolio_archive_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'brunn-core' ),
				'description'   => esc_html__( 'Set space size between portfolio items for your portfolio list on archive pages. Default value is normal', 'brunn-core' ),
				'default_value' => 'normal',
				'options'       => brunn_select_get_space_between_items_array(),
				'parent'        => $panel_archive
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'portfolio_archive_image_size',
				'type'          => 'select',
				'label'         => esc_html__( 'Image Proportions', 'brunn-core' ),
				'default_value' => 'landscape',
				'description'   => esc_html__( 'Set image proportions for your portfolio list on archive pages. Default value is landscape', 'brunn-core' ),
				'parent'        => $panel_archive,
				'options'       => array(
					'full'      => esc_html__( 'Original', 'brunn-core' ),
					'landscape' => esc_html__( 'Landscape', 'brunn-core' ),
					'portrait'  => esc_html__( 'Portrait', 'brunn-core' ),
					'square'    => esc_html__( 'Square', 'brunn-core' )
				)
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'portfolio_archive_item_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Item Style', 'brunn-core' ),
				'default_value' => 'standard-shader',
				'description'   => esc_html__( 'Set item style for your portfolio list on archive pages. Default value is Standard - Shader', 'brunn-core' ),
				'parent'        => $panel_archive,
				'options'       => array(
					'standard-shader' => esc_html__( 'Standard - Shader', 'brunn-core' ),
					'gallery-overlay' => esc_html__( 'Gallery - Overlay', 'brunn-core' )
				)
			)
		);
		
		$panel = brunn_select_add_admin_panel(
			array(
				'title' => esc_html__( 'Portfolio Single', 'brunn-core' ),
				'name'  => 'panel_portfolio_single',
				'page'  => '_portfolio'
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_template',
				'type'          => 'select',
				'label'         => esc_html__( 'Portfolio Type', 'brunn-core' ),
				'default_value' => 'small-images',
				'description'   => esc_html__( 'Choose a default type for Single Project pages', 'brunn-core' ),
				'parent'        => $panel,
				'options'       => array(
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
			)
		);
		
		/***************** Gallery Layout *****************/
		
		$portfolio_gallery_container = brunn_select_add_admin_container(
			array(
				'parent'          => $panel,
				'name'            => 'portfolio_gallery_container',
				'dependency' => array(
					'show' => array(
						'portfolio_single_template'  => array(
							'gallery',
							'small-gallery'
						)
					)
				)
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_gallery_columns_number',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'brunn-core' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for portfolio gallery type', 'brunn-core' ),
				'parent'        => $portfolio_gallery_container,
				'options'       => brunn_select_get_number_of_columns_array( false, array( 'one', 'five', 'six' ) )
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_gallery_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'brunn-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio gallery type', 'brunn-core' ),
				'default_value' => 'normal',
				'options'       => brunn_select_get_space_between_items_array(),
				'parent'        => $portfolio_gallery_container
			)
		);
		
		/***************** Gallery Layout *****************/
		
		/***************** Masonry Layout *****************/
		
		$portfolio_masonry_container = brunn_select_add_admin_container(
			array(
				'parent'          => $panel,
				'name'            => 'portfolio_masonry_container',
				'dependency' => array(
					'show' => array(
						'portfolio_single_template'  => array(
							'masonry',
							'small-masonry'
						)
					)
				)
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_masonry_columns_number',
				'type'          => 'select',
				'label'         => esc_html__( 'Number of Columns', 'brunn-core' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for portfolio masonry type', 'brunn-core' ),
				'parent'        => $portfolio_masonry_container,
				'options'       => brunn_select_get_number_of_columns_array( false, array( 'one', 'five', 'six' ) )
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_masonry_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'brunn-core' ),
				'description'   => esc_html__( 'Set space size between columns for portfolio masonry type', 'brunn-core' ),
				'default_value' => 'normal',
				'options'       => brunn_select_get_space_between_items_array(),
				'parent'        => $portfolio_masonry_container
			)
		);
		
		/***************** Masonry Layout *****************/
		
		brunn_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_portfolio_single',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'brunn-core' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single projects', 'brunn-core' ),
				'parent'        => $panel,
				'options'       => array(
					''    => esc_html__( 'Default', 'brunn-core' ),
					'yes' => esc_html__( 'Yes', 'brunn-core' ),
					'no'  => esc_html__( 'No', 'brunn-core' )
				),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_lightbox_images',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Lightbox for Images', 'brunn-core' ),
				'description'   => esc_html__( 'Enabling this option will turn on lightbox functionality for projects with images', 'brunn-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_lightbox_videos',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Lightbox for Videos', 'brunn-core' ),
				'description'   => esc_html__( 'Enabling this option will turn on lightbox functionality for YouTube/Vimeo projects', 'brunn-core' ),
				'parent'        => $panel,
				'default_value' => 'no'
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_enable_categories',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Categories', 'brunn-core' ),
				'description'   => esc_html__( 'Enabling this option will enable category meta description on single projects', 'brunn-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_hide_date',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Date', 'brunn-core' ),
				'description'   => esc_html__( 'Enabling this option will enable date meta on single projects', 'brunn-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_sticky_sidebar',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Sticky Side Text', 'brunn-core' ),
				'description'   => esc_html__( 'Enabling this option will make side text sticky on Single Project pages. This option works only for Full Width Images, Small Images, Small Gallery and Small Masonry portfolio types', 'brunn-core' ),
				'parent'        => $panel,
				'default_value' => 'yes'
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_comments',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Comments', 'brunn-core' ),
				'description'   => esc_html__( 'Enabling this option will show comments on your page', 'brunn-core' ),
				'parent'        => $panel,
				'default_value' => 'no'
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_hide_pagination',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Hide Pagination', 'brunn-core' ),
				'description'   => esc_html__( 'Enabling this option will turn off portfolio pagination functionality', 'brunn-core' ),
				'parent'        => $panel,
				'default_value' => 'no'
			)
		);
		
		$container_navigate_category = brunn_select_add_admin_container(
			array(
				'name'            => 'navigate_same_category_container',
				'parent'          => $panel,
				'dependency' => array(
					'hide' => array(
						'portfolio_single_hide_pagination'  => array(
							'yes'
						)
					)
				)
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'portfolio_single_nav_same_category',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Enable Pagination Through Same Category', 'brunn-core' ),
				'description'   => esc_html__( 'Enabling this option will make portfolio pagination sort through current category', 'brunn-core' ),
				'parent'        => $container_navigate_category,
				'default_value' => 'no'
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'        => 'portfolio_single_slug',
				'type'        => 'text',
				'label'       => esc_html__( 'Portfolio Single Slug', 'brunn-core' ),
				'description' => esc_html__( 'Enter if you wish to use a different Single Project slug (Note: After entering slug, navigate to Settings -> Permalinks and click "Save" in order for changes to take effect)', 'brunn-core' ),
				'parent'      => $panel,
				'args'        => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'brunn_select_action_options_map', 'brunn_select_portfolio_options_map', brunn_select_set_options_map_position( 'portfolio' ) );
}