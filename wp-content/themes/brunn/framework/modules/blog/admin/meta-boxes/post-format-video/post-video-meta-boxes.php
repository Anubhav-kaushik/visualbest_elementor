<?php

if ( ! function_exists( 'brunn_select_map_post_video_meta' ) ) {
	function brunn_select_map_post_video_meta() {
		$video_post_format_meta_box = brunn_select_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Video Post Format', 'brunn' ),
				'name'  => 'post_format_video_meta'
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'          => 'qodef_video_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Video Type', 'brunn' ),
				'description'   => esc_html__( 'Choose video type', 'brunn' ),
				'parent'        => $video_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Video Service', 'brunn' ),
					'self'            => esc_html__( 'Self Hosted', 'brunn' )
				)
			)
		);
		
		$qodef_video_embedded_container = brunn_select_add_admin_container(
			array(
				'parent' => $video_post_format_meta_box,
				'name'   => 'qodef_video_embedded_container'
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_video_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video URL', 'brunn' ),
				'description' => esc_html__( 'Enter Video URL', 'brunn' ),
				'parent'      => $qodef_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'qodef_video_type_meta' => 'social_networks'
					)
				)
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_video_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video MP4', 'brunn' ),
				'description' => esc_html__( 'Enter video URL for MP4 format', 'brunn' ),
				'parent'      => $qodef_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'qodef_video_type_meta' => 'self'
					)
				)
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_video_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Video Image', 'brunn' ),
				'description' => esc_html__( 'Enter video image', 'brunn' ),
				'parent'      => $qodef_video_embedded_container,
				'dependency' => array(
					'show' => array(
						'qodef_video_type_meta' => 'self'
					)
				)
			)
		);
	}
	
	add_action( 'brunn_select_action_meta_boxes_map', 'brunn_select_map_post_video_meta', 22 );
}