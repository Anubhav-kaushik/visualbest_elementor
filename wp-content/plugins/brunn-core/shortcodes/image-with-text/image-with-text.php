<?php
namespace BrunnCore\CPT\Shortcodes\ImageWithText;

use BrunnCore\Lib;

class ImageWithText implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'qodef_image_with_text';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Image With Text', 'brunn-core' ),
					'base'                      => $this->getBase(),
					'category'                  => esc_html__( 'by BRUNN', 'brunn-core' ),
					'icon'                      => 'icon-wpb-image-with-text extended-custom-icon',
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'custom_class',
							'heading'     => esc_html__( 'Custom CSS Class', 'brunn-core' ),
							'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'brunn-core' )
						),
						array(
							'type'        => 'attach_image',
							'param_name'  => 'image',
							'heading'     => esc_html__( 'Image', 'brunn-core' ),
							'description' => esc_html__( 'Select image from media library', 'brunn-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'image_size',
							'heading'     => esc_html__( 'Image Size', 'brunn-core' ),
							'description' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size', 'brunn-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'enable_image_shadow',
							'heading'     => esc_html__( 'Enable Image Shadow', 'brunn-core' ),
							'value'       => array_flip( brunn_select_get_yes_no_select_array( false ) ),
							'save_always' => true
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'image_behavior',
							'heading'    => esc_html__( 'Image Behavior', 'brunn-core' ),
							'value'      => array(
								esc_html__( 'None', 'brunn-core' )             => '',
								esc_html__( 'Open Lightbox', 'brunn-core' )    => 'lightbox',
								esc_html__( 'Open Custom Link', 'brunn-core' ) => 'custom-link',
								esc_html__( 'Zoom', 'brunn-core' )             => 'zoom',
								esc_html__( 'Grayscale', 'brunn-core' )        => 'grayscale'
							)
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'custom_link',
							'heading'    => esc_html__( 'Custom Link', 'brunn-core' ),
							'dependency' => Array( 'element' => 'image_behavior', 'value' => array( 'custom-link' ) )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'custom_link_target',
							'heading'    => esc_html__( 'Custom Link Target', 'brunn-core' ),
							'value'      => array_flip( brunn_select_get_link_target_array() ),
							'dependency' => Array( 'element' => 'image_behavior', 'value' => array( 'custom-link' ) )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'text_width_max_size',
							'heading'     => esc_html__( 'Text Max Width (px)', 'brunn-core' ),
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'title',
							'heading'    => esc_html__( 'Title', 'brunn-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'title_tag',
							'heading'     => esc_html__( 'Title Tag', 'brunn-core' ),
							'value'       => array_flip( brunn_select_get_title_tag( true ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'title', 'not_empty' => true )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'title_size',
							'heading'     => esc_html__( 'Title Font Size (px)', 'brunn-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'title_color',
							'heading'    => esc_html__( 'Title Color', 'brunn-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'title_top_margin',
							'heading'    => esc_html__( 'Title Top Margin (px)', 'brunn-core' ),
							'dependency' => array( 'element' => 'title', 'not_empty' => true )
						),
						array(
							'type'       => 'textarea',
							'param_name' => 'text',
							'heading'    => esc_html__( 'Text', 'brunn-core' )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'text_color',
							'heading'    => esc_html__( 'Text Color', 'brunn-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'text_top_margin',
							'heading'    => esc_html__( 'Text Top Margin (px)', 'brunn-core' ),
							'dependency' => array( 'element' => 'text', 'not_empty' => true )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'background_text',
							'heading'    => esc_html__( 'Background Text', 'brunn-core' )
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'background_text_size',
							'heading'     => esc_html__( 'Background Text Font Size (px)', 'brunn-core' ),
							'dependency' => array( 'element' => 'background_text', 'not_empty' => true )
						),
						array(
							'type'       => 'colorpicker',
							'param_name' => 'background_text_color',
							'heading'    => esc_html__( 'Background Text Color', 'brunn-core' ),
							'dependency' => array( 'element' => 'background_text', 'not_empty' => true )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'background_text_top_margin',
							'heading'    => esc_html__( 'Background Text Top Margin (px)', 'brunn-core' ),
							'dependency' => array( 'element' => 'background_text', 'not_empty' => true )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'bottom_buttons',
							'heading'     => esc_html__( 'Enable bottom double custom link functionality', 'backpacktraveler-core' ),
							'value'       => array_flip( brunn_select_get_yes_no_select_array( false, false ) ),
							'save_always' => true
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'bottom_button_one_link',
							'heading'    => esc_html__( 'First Bottom Link', 'backpacktraveler-core' ),
							'dependency' => array( 'element' => 'bottom_buttons', 'value' => 'yes' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'bottom_button_one_label',
							'heading'    => esc_html__( 'First Bottom Link Label', 'backpacktraveler-core' ),
							'dependency' => array( 'element' => 'bottom_buttons', 'value' => 'yes' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'bottom_button_two_link',
							'heading'    => esc_html__( 'Second Bottom Link', 'backpacktraveler-core' ),
							'dependency' => array( 'element' => 'bottom_buttons', 'value' => 'yes' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'bottom_button_two_label',
							'heading'    => esc_html__( 'Second Bottom Link Label', 'backpacktraveler-core' ),
							'dependency' => array( 'element' => 'bottom_buttons', 'value' => 'yes' )
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'custom_class'                   => '',
			'image'                          => '',
			'image_size'                     => 'full',
			'enable_image_shadow'            => 'no',
			'image_behavior'                 => '',
			'custom_link'                    => '',
			'custom_link_target'             => '_self',
			'text_width_max_size'            => '',
			'title'                          => '',
			'title_tag'                      => 'h4',
			'title_size'                     => '',
			'title_color'                    => '',
			'title_top_margin'               => '',
			'text'                           => '',
			'text_color'                     => '',
			'text_top_margin'                => '',
			'background_text'                => '',
			'background_text_size'           => '',
			'background_text_color'          => '',
			'background_text_top_margin'     => '',
			'bottom_buttons'      => 'no',
			'bottom_button_one_link' => '',
			'bottom_button_one_label' => '',
			'bottom_button_two_link' => '',
			'bottom_button_two_label' => '',
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['holder_classes']     = $this->getHolderClasses( $params );
		$params['image']              = $this->getImage( $params );
		$params['image_size']         = $this->getImageSize( $params['image_size'] );
		$params['image_behavior']     = ! empty( $params['image_behavior'] ) ? $params['image_behavior'] : $args['image_behavior'];
		$params['custom_link_target'] = ! empty( $params['custom_link_target'] ) ? $params['custom_link_target'] : $args['custom_link_target'];
		$params['title_tag']          = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $args['title_tag'];
		$params['title_styles']       = $this->getTitleStyles( $params );
		$params['text_styles']        = $this->getTextStyles( $params );
		$params['background_text_styles'] = $this->getBackgroundTextStyles( $params );
		$params['holder_styles']        = $this->getTextHolderStyles( $params );

		$html = brunn_core_get_shortcode_module_template_part( 'templates/image-with-text', 'image-with-text', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = $params['enable_image_shadow'] === 'yes' ? 'qodef-has-shadow' : '';
		$holderClasses[] = ! empty( $params['image_behavior'] ) ? 'qodef-image-behavior-' . $params['image_behavior'] : '';
		$holderClasses[] = $params['bottom_buttons'] === 'yes' ? 'qodef-has-bottom-buttons' : '';
		
		return implode( ' ', $holderClasses );
	}
	
	private function getImage( $params ) {
		$image = array();
		
		if ( ! empty( $params['image'] ) ) {
			$id = $params['image'];
			
			$image['image_id'] = $id;
			$image_original    = wp_get_attachment_image_src( $id, 'full' );
			$image['url']      = $image_original[0];
			$image['alt']      = get_post_meta( $id, '_wp_attachment_image_alt', true );
		}
		
		return $image;
	}
	
	private function getImageSize( $image_size ) {
		$image_size = trim( $image_size );
		//Find digits
		preg_match_all( '/\d+/', $image_size, $matches );
		if ( in_array( $image_size, array( 'thumbnail', 'thumb', 'medium', 'large', 'full' ) ) ) {
			return $image_size;
		} elseif ( ! empty( $matches[0] ) ) {
			return array(
				$matches[0][0],
				$matches[0][1]
			);
		} else {
			return 'thumbnail';
		}
	}
	
	private function getTextHolderStyles( $params ) {
		$styles = array();

		if ( $params['text_width_max_size'] !== '' ) {
			$styles[] = 'max-width: ' . brunn_select_filter_px($params['text_width_max_size']) . 'px';
		}

		return implode( ';', $styles );
	}

	private function getTitleStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['title_color'] ) ) {
			$styles[] = 'color: ' . $params['title_color'];
		}

		if ( $params['title_size'] !== '' ) {
			$styles[] = 'font-size: ' . brunn_select_filter_px($params['title_size']) . 'px';
		}

		if ( $params['title_top_margin'] !== '' ) {
			$styles[] = 'margin-top: ' . brunn_select_filter_px( $params['title_top_margin'] ) . 'px';
		}

		return implode( ';', $styles );
	}
	
	private function getTextStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['text_color'] ) ) {
			$styles[] = 'color: ' . $params['text_color'];
		}
		
		if ( $params['text_top_margin'] !== '' ) {
			$styles[] = 'margin-top: ' . brunn_select_filter_px( $params['text_top_margin'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}

	private function getBackgroundTextStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['background_text_color'] ) ) {
			$styles[] = 'color: ' . $params['background_text_color'];
		}

		if ( $params['background_text_size'] !== '' ) {
			$styles[] = 'font-size: ' . brunn_select_filter_px($params['background_text_size']) . 'px';
		}

		if ( $params['background_text_top_margin'] !== '' ) {
			$styles[] = 'margin-top: ' . brunn_select_filter_px( $params['background_text_top_margin'] ) . 'px';
		}

		return implode( ';', $styles );
	}
}