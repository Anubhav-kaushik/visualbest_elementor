<?php

namespace BrunnCore\CPT\Shortcodes\VideoButton;

use BrunnCore\Lib;

class VideoButton implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'qodef_video_button';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Video Button', 'brunn-core' ),
					'base'                      => $this->getBase(),
					'category'                  => esc_html__( 'by BRUNN', 'brunn-core' ),
					'icon'                      => 'icon-wpb-video-button extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'dropdown',
							'param_name'  => 'video_button_type',
							'heading'     => esc_html__( 'Video Button Type', 'brunn-core' ),
							'value'       => array(
								esc_html__( 'Overlay', 'brunn-core' )   => 'overlay',
								esc_html__( 'Simple', 'brunn-core' )    => 'simple',
							),
							'save_always' => true,
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'custom_class',
							'heading'     => esc_html__( 'Custom CSS Class', 'brunn-core' ),
							'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'brunn-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'video_link',
							'heading'    => esc_html__( 'Video Link', 'brunn-core' )
						),
						array(
							'type'        => 'attach_image',
							'param_name'  => 'video_image',
							'heading'     => esc_html__( 'Video Image', 'brunn-core' ),
							'description' => esc_html__( 'Select image from media library', 'brunn-core' ),
							'dependency'  => array( 'element' => 'video_button_type', 'value' => array( 'overlay' ) )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'play_button_color',
							'heading'    => esc_html__( 'Play Button Color', 'brunn-core' ),
							'dependency'  => array( 'element' => 'video_button_type', 'value' => array( 'overlay' ) )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'play_button_background_color',
							'heading'    => esc_html__( 'Play Button Background Color', 'brunn-core' ),
							'dependency'  => array( 'element' => 'video_button_type', 'value' => array( 'overlay' ) )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'play_button_size',
							'heading'    => esc_html__( 'Play Button Size (px)', 'brunn-core' ),
							'dependency'  => array( 'element' => 'video_button_type', 'value' => array( 'overlay' ) )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'play_button_text',
							'heading'    => esc_html__( 'Play Button Text', 'brunn-core' ),
							'dependency'  => array( 'element' => 'video_button_type', 'value' => array( 'simple' ) )
						),
						array(
							'type'        => 'attach_image',
							'param_name'  => 'play_button_image',
							'heading'     => esc_html__( 'Play Button Custom Image', 'brunn-core' ),
							'description' => esc_html__( 'Select image from media library. If you use this field then play button color and button size options will not work', 'brunn-core' )
						),
						array(
							'type'        => 'attach_image',
							'param_name'  => 'play_button_hover_image',
							'heading'     => esc_html__( 'Play Button Custom Hover Image', 'brunn-core' ),
							'description' => esc_html__( 'Select image from media library. If you use this field then play button color and button size options will not work', 'brunn-core' ),
							'dependency'  => array( 'element' => 'video_button_type', 'value' => array( 'overlay' ) )
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'custom_class'                 => '',
			'video_button_type'   		   => '',
			'video_link'                   => '#',
			'video_image'                  => '',
			'play_button_color'            => '',
			'play_button_background_color' => '',
			'play_button_size'             => '',
			'play_button_image'            => '',
			'play_button_text'			   => '',
			'play_button_hover_image' => ''
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['holder_classes']     = $this->getHolderClasses( $params );
		$params['play_button_styles'] = $this->getPlayButtonStyles( $params );
		
		$html = brunn_core_get_shortcode_module_template_part( 'templates/video-button', 'video-button', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = ! empty( $params['video_image'] ) ? 'qodef-vb-has-img' : '';
		$holderClasses[] = $params['video_button_type'] == 'simple' ? 'qodef-vb-simple' : '';
		
		return implode( ' ', $holderClasses );
	}
	
	private function getPlayButtonStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['play_button_color'] ) ) {
			$styles[] = 'color: ' . $params['play_button_color'];
		}

		if ( ! empty( $params['play_button_background_color'] ) ) {
			$styles[] = 'background-color: ' . $params['play_button_background_color'];
		}
		
		if ( ! empty( $params['play_button_size'] ) ) {
			$styles[] = 'font-size: ' . brunn_select_filter_px( $params['play_button_size'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}
}