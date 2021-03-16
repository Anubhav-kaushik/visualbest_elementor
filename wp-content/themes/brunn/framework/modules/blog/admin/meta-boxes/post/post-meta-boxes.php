<?php

/*** Post Settings ***/

if ( ! function_exists( 'brunn_select_map_post_meta' ) ) {
	function brunn_select_map_post_meta() {
		
		$post_meta_box = brunn_select_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Post', 'brunn' ),
				'name'  => 'post-meta'
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'          => 'qodef_show_title_area_blog_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'brunn' ),
				'description'   => esc_html__( 'Enabling this option will show title area on your single post page', 'brunn' ),
				'parent'        => $post_meta_box,
				'options'       => brunn_select_get_yes_no_select_array()
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'          => 'qodef_blog_single_sidebar_layout_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'brunn' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog single page', 'brunn' ),
				'default_value' => '',
				'parent'        => $post_meta_box,
                'options'       => brunn_select_get_custom_sidebars_options( true )
			)
		);
		
		$brunn_custom_sidebars = brunn_select_get_custom_sidebars();
		if ( count( $brunn_custom_sidebars ) > 0 ) {
			brunn_select_create_meta_box_field( array(
				'name'        => 'qodef_blog_single_custom_sidebar_area_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'brunn' ),
				'description' => esc_html__( 'Choose a sidebar to display on Blog single page. Default sidebar is "Sidebar"', 'brunn' ),
				'parent'      => $post_meta_box,
				'options'     => brunn_select_get_custom_sidebars(),
				'args' => array(
					'select2' => true
				)
			) );
		}
		
		brunn_select_create_meta_box_field(
			array(
				'name'        => 'qodef_blog_list_featured_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Blog List Image', 'brunn' ),
				'description' => esc_html__( 'Choose an Image for displaying in blog list. If not uploaded, featured image will be shown.', 'brunn' ),
				'parent'      => $post_meta_box
			)
		);

		brunn_select_create_meta_box_field(
			array(
				'name'          => 'qodef_blog_masonry_fixed_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Masonry - Image Fixed Proportion', 'brunn' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry type blog lists where image proportion is fixed', 'brunn' ),
				'default_value' => '',
				'parent'        => $post_meta_box,
				'options'       => array(
					''                   => esc_html__( 'Default', 'brunn' ),
					'small'              => esc_html__( 'Small', 'brunn' ),
					'large-width'        => esc_html__( 'Large Width', 'brunn' ),
					'large-height'       => esc_html__( 'Large Height', 'brunn' ),
					'large-width-height' => esc_html__( 'Large Width/Height', 'brunn' )
				)
			)
		);

		do_action('brunn_select_action_blog_post_meta', $post_meta_box);
	}
	
	add_action( 'brunn_select_action_meta_boxes_map', 'brunn_select_map_post_meta', 20 );
}
