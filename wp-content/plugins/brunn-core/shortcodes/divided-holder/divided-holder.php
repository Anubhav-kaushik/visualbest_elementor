<?php
namespace BrunnCore\CPT\Shortcodes\DividedHolder;

use BrunnCore\Lib;

class DividedHolder implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'qodef_divided_holder';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                    => esc_html__( 'Divided Holder', 'brunn-core' ),
					'base'                    => $this->base,
					"as_parent"               => array( 'except' => 'vc_row' ),
					'content_element'         => true,
					'category'                => esc_html__( 'by BRUNN', 'brunn-core' ),
					'icon'                    => 'icon-wpb-divided-holder extended-custom-icon',
					'show_settings_on_create' => true,
					'js_view'                 => 'VcColumnView',
					'params'                  => array(
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
							'type'        => 'textfield',
							'param_name'  => 'image_space_after',
							'heading'     => esc_html__( 'Space after image (px)', 'brunn-core' ),
							'description' => esc_html__( 'Enter space (in px) which will be between image and bottom of the screen', 'brunn-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'image_fixed_on_init',
							'heading'    => esc_html__( 'Fixed Image on Init', 'brunn-core' ),
							'value'      => array_flip(brunn_select_get_yes_no_select_array(false, true)),
							'save_always' => true
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
							'param_name'  => 'content_padding',
							'heading'     => esc_html__( 'Padding', 'brunn-core' ),
							'description' => esc_html__( 'Please insert padding in format 0px 10px 0px 10px', 'brunn-core' )
						),
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args = array(
			'custom_class'                   => '',
			'image'                          => '',
			'image_size'                     => 'full',
			'image_behavior'                 => '',
			'image_space_after'              => '',
			'image_fixed_on_init'            => 'yes',
			'custom_link'                    => '',
			'custom_link_target'             => '_self',
			'content_padding'                => ''
		);
		$params = shortcode_atts( $args, $atts );

		$params['content'] = preg_replace( '#^<\/p>|<p>$#', '', $content );

		$params['holder_classes']    = $this->getHolderClasses( $params );
		$params['holder_style']        = $this->getHolderStyles( $params );
		$params['image_style']        = $this->getImageHolderStyles( $params );
		$params['image']              = $this->getImage( $params );
		$params['image_size']         = $this->getImageSize( $params['image_size'] );
		$params['image_behavior']     = ! empty( $params['image_behavior'] ) ? $params['image_behavior'] : $args['image_behavior'];
		$params['custom_link_target'] = ! empty( $params['custom_link_target'] ) ? $params['custom_link_target'] : $args['custom_link_target'];
		$params['image_data']       = $this->getImageHolderData( $params );

		$params['content_style']         = $this->getContentStyles( $params );

		$html = brunn_core_get_shortcode_module_template_part( 'templates/divided-holder-template', 'divided-holder', '', $params );
		
		return $html;
	}

	/**
	 * Function that generates classes
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getHolderClasses( $params ) {
		$holderClasses = array();

		$holderClasses[] = ( $params['image_fixed_on_init'] === 'yes' ) ? 'qodef-dh-init-fixed' : '';

		return implode( ' ', $holderClasses );
	}

	/**
	 * Function that generates content styles
	 *
	 * @param $params
	 *
	 * @return string
	 */
	private function getContentStyles( $params ) {
		$styles = array();

		if ( $params['content_padding'] !== '' ) {
			$styles[] = 'padding: ' . $params['content_padding'];
		}

		return implode( ';', $styles );
	}

	/**
	 * This function is getting image
	 *
	 * @param $params
	 *
	 * @return array
	 */
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

	/**
	 * This function get image size
	 * @param $image_size
	 *
	 * @return array|string
	 */
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

	private function getHolderStyles( $params ) {
		$styles = array();

		if ( $params['image_space_after'] !== '' ) {
			$styles[] = 'padding: 0 ' . esc_attr( brunn_select_filter_px($params['image_space_after']) ) . 'px';
		}

		return implode( ';', $styles );
	}

	private function getImageHolderStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['image'] ) ) {
			$styles[] = 'background-image: url(' . wp_get_attachment_url( $params['image'] ) . ')';
		}

		if ( $params['image_space_after'] !== '' ) {
			$styles[] = 'margin-bottom: ' . esc_attr( brunn_select_filter_px($params['image_space_after']) ) . 'px';
		}

		return implode( ';', $styles );
	}

	private function getImageHolderData( $params ) {
		$data                    = array();

		if ( $params['image_space_after'] !== '' ) {
			$data['data-image-space'] = esc_attr( brunn_select_filter_px($params['image_space_after']) );
		}

		return $data;
	}

}