<?php

if ( ! function_exists( 'brunn_core_map_portfolio_meta' ) ) {
	function brunn_core_map_portfolio_meta() {
		global $brunn_select_global_Framework;
		
		$brunn_pages = array();
		$pages      = get_pages();
		foreach ( $pages as $page ) {
			$brunn_pages[ $page->ID ] = $page->post_title;
		}
		
		//Portfolio Images
		
		$brunn_portfolio_images = new BrunnSelectClassMetaBox( 'portfolio-item', esc_html__( 'Portfolio Images (multiple upload)', 'brunn-core' ), '', '', 'portfolio_images' );
		$brunn_select_global_Framework->qodeMetaBoxes->addMetaBox( 'portfolio_images', $brunn_portfolio_images );
		
		$brunn_portfolio_image_gallery = new BrunnSelectClassMultipleImages( 'qodef-portfolio-image-gallery', esc_html__( 'Portfolio Images', 'brunn-core' ), esc_html__( 'Choose your portfolio images', 'brunn-core' ) );
		$brunn_portfolio_images->addChild( 'qodef-portfolio-image-gallery', $brunn_portfolio_image_gallery );
		
		//Portfolio Single Upload Images/Videos 
		
		$brunn_portfolio_images_videos = brunn_select_create_meta_box(
			array(
				'scope' => array( 'portfolio-item' ),
				'title' => esc_html__( 'Portfolio Images/Videos (single upload)', 'brunn-core' ),
				'name'  => 'qodef_portfolio_images_videos'
			)
		);
		brunn_select_add_repeater_field(
			array(
				'name'        => 'qodef_portfolio_single_upload',
				'parent'      => $brunn_portfolio_images_videos,
				'button_text' => esc_html__( 'Add Image/Video', 'brunn-core' ),
				'fields'      => array(
					array(
						'type'        => 'select',
						'name'        => 'file_type',
						'label'       => esc_html__( 'File Type', 'brunn-core' ),
						'options' => array(
							'image' => esc_html__('Image','brunn-core'),
							'video' => esc_html__('Video','brunn-core'),
						)
					),
					array(
						'type'        => 'image',
						'name'        => 'single_image',
						'label'       => esc_html__( 'Image', 'brunn-core' ),
						'dependency' => array(
							'show' => array(
								'file_type'  => 'image'
							)
						)
					),
					array(
						'type'        => 'select',
						'name'        => 'video_type',
						'label'       => esc_html__( 'Video Type', 'brunn-core' ),
						'options'	  => array(
							'youtube' => esc_html__('YouTube', 'brunn-core'),
							'vimeo' => esc_html__('Vimeo', 'brunn-core'),
							'self' => esc_html__('Self Hosted', 'brunn-core'),
						),
						'dependency' => array(
							'show' => array(
								'file_type'  => 'video'
							)
						)
					),
					array(
						'type'        => 'text',
						'name'        => 'video_id',
						'label'       => esc_html__( 'Video ID', 'brunn-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => array('youtube','vimeo')
							)
						)
					),
					array(
						'type'        => 'text',
						'name'        => 'video_mp4',
						'label'       => esc_html__( 'Video mp4', 'brunn-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => 'self'
							)
						)
					),
					array(
						'type'        => 'image',
						'name'        => 'video_cover_image',
						'label'       => esc_html__( 'Video Cover Image', 'brunn-core' ),
						'dependency' => array(
							'show' => array(
								'file_type' => 'video',
								'video_type'  => 'self'
							)
						)
					)
				)
			)
		);
		
		//Portfolio Additional Sidebar Items
		
		$brunn_additional_sidebar_items = brunn_select_create_meta_box(
			array(
				'scope' => array( 'portfolio-item' ),
				'title' => esc_html__( 'Additional Portfolio Sidebar Items', 'brunn-core' ),
				'name'  => 'portfolio_properties'
			)
		);

		brunn_select_add_repeater_field(
			array(
				'name'        => 'qodef_portfolio_properties',
				'parent'      => $brunn_additional_sidebar_items,
				'button_text' => esc_html__( 'Add New Item', 'brunn-core' ),
				'fields'      => array(
					array(
						'type'        => 'text',
						'name'        => 'item_title',
						'label'       => esc_html__( 'Item Title', 'brunn-core' ),
					),
					array(
						'type'        => 'text',
						'name'        => 'item_text',
						'label'       => esc_html__( 'Item Text', 'brunn-core' )
					),
					array(
						'type'        => 'text',
						'name'        => 'item_url',
						'label'       => esc_html__( 'Enter Full URL for Item Text Link', 'brunn-core' )
					)
				)
			)
		);
	}
	
	add_action( 'brunn_select_action_meta_boxes_map', 'brunn_core_map_portfolio_meta', 40 );
}