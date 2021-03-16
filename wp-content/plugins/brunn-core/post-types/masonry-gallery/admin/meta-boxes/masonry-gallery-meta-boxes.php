<?php

if ( ! function_exists( 'brunn_core_map_masonry_gallery_meta' ) ) {
	function brunn_core_map_masonry_gallery_meta() {
		
		$masonry_gallery_meta_box = brunn_select_create_meta_box(
			array(
				'scope' => array( 'masonry-gallery' ),
				'title' => esc_html__( 'Masonry Gallery General', 'brunn-core' ),
				'name'  => 'masonry_gallery_meta'
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'          => 'qodef_masonry_gallery_item_title_tag',
				'type'          => 'select',
				'default_value' => 'h4',
				'label'         => esc_html__( 'Title Tag', 'brunn-core' ),
				'parent'        => $masonry_gallery_meta_box,
				'options'       => brunn_select_get_title_tag()
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'   => 'qodef_masonry_gallery_item_text',
				'type'   => 'text',
				'label'  => esc_html__( 'Text', 'brunn-core' ),
				'parent' => $masonry_gallery_meta_box
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'   => 'qodef_masonry_gallery_item_image',
				'type'   => 'image',
				'label'  => esc_html__( 'Custom Item Icon', 'brunn-core' ),
				'parent' => $masonry_gallery_meta_box
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'   => 'qodef_masonry_gallery_item_link',
				'type'   => 'text',
				'label'  => esc_html__( 'Link', 'brunn-core' ),
				'parent' => $masonry_gallery_meta_box
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'          => 'qodef_masonry_gallery_item_link_target',
				'type'          => 'select',
				'default_value' => '_self',
				'label'         => esc_html__( 'Link Target', 'brunn-core' ),
				'parent'        => $masonry_gallery_meta_box,
				'options'       => brunn_select_get_link_target_array()
			)
		);
		
		brunn_select_add_admin_section_title( array(
			'name'   => 'qodef_section_style_title',
			'parent' => $masonry_gallery_meta_box,
			'title'  => esc_html__( 'Masonry Gallery Item Style', 'brunn-core' )
		) );
		
		brunn_select_create_meta_box_field(
			array(
				'name'          => 'qodef_masonry_gallery_item_size',
				'type'          => 'select',
				'default_value' => 'small',
				'label'         => esc_html__( 'Size', 'brunn-core' ),
				'parent'        => $masonry_gallery_meta_box,
				'options'       => array(
					'small'              => esc_html__( 'Small', 'brunn-core' ),
					'large-width'        => esc_html__( 'Large Width', 'brunn-core' ),
					'large-height'       => esc_html__( 'Large Height', 'brunn-core' ),
					'large-width-height' => esc_html__( 'Large Width/Height', 'brunn-core' )
				)
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'          => 'qodef_masonry_gallery_item_type',
				'type'          => 'select',
				'default_value' => 'standard',
				'label'         => esc_html__( 'Type', 'brunn-core' ),
				'parent'        => $masonry_gallery_meta_box,
				'options'       => array(
					'standard'    => esc_html__( 'Standard', 'brunn-core' ),
					'with-button' => esc_html__( 'With Button', 'brunn-core' ),
					'simple'      => esc_html__( 'Simple', 'brunn-core' )
				)
			)
		);
		
		$masonry_gallery_item_button_type_container = brunn_select_add_admin_container_no_style(
			array(
				'name'            => 'masonry_gallery_item_button_type_container',
				'parent'          => $masonry_gallery_meta_box,
				'dependency' => array(
					'hide' => array(
						'qodef_masonry_gallery_item_type'  => array( 'standard', 'simple' )
					)
				)
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'   => 'qodef_masonry_gallery_button_label',
				'type'   => 'text',
				'label'  => esc_html__( 'Button Label', 'brunn-core' ),
				'parent' => $masonry_gallery_item_button_type_container
			)
		);
		
		$masonry_gallery_item_simple_type_container = brunn_select_add_admin_container_no_style(
			array(
				'name'            => 'masonry_gallery_item_simple_type_container',
				'parent'          => $masonry_gallery_meta_box,
				'dependency' => array(
					'hide' => array(
						'qodef_masonry_gallery_item_type'  => array( 'standard', 'with-button' )
					)
				)
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'          => 'qodef_masonry_gallery_simple_content_background_skin',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Content Background Skin', 'brunn-core' ),
				'parent'        => $masonry_gallery_item_simple_type_container,
				'options'       => array(
					'default' => esc_html__( 'Default', 'brunn-core' ),
					'light'   => esc_html__( 'Light', 'brunn-core' ),
					'dark'    => esc_html__( 'Dark', 'brunn-core' )
				)
			)
		);
	}
	
	add_action( 'brunn_select_action_meta_boxes_map', 'brunn_core_map_masonry_gallery_meta', 45 );
}