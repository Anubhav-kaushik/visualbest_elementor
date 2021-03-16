<?php
class BrunnCoreElementorDividedHolder extends \Elementor\Widget_Base {

	public function get_name() {
		return 'qodef_divided_holder';
	}

	public function get_title() {
		return esc_html__( 'Divided Holder', 'brunn-core' );
	}

	public function get_icon() {
		return 'brunn-elementor-custom-icon brunn-elementor-divided-holder';
	}

	public function get_categories() {
		return [ 'select' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'general',
			[
				'label' => esc_html__( 'General', 'brunn-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'custom_class',
			[
				'label'     => esc_html__( 'Custom CSS Class', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'brunn-core' )
			]
		);

		$this->add_control(
			'image',
			[
				'label'     => esc_html__( 'Image', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::MEDIA,
				'description' => esc_html__( 'Select image from media library', 'brunn-core' )
			]
		);

		$this->add_control(
			'image_size',
			[
				'label'     => esc_html__( 'Image Size', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use &quot;thumbnail&quot; size', 'brunn-core' ),
				'default' => 'full'
			]
		);

		$this->add_control(
			'image_behavior',
			[
				'label'   => esc_html__( 'Image Behavior', 'brunn-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'options' => [
					''            => esc_html__( 'None', 'brunn-core' ),
					'lightbox'    => esc_html__( 'Open Lightbox', 'brunn-core' ),
					'custom-link' => esc_html__( 'Open Custom Link', 'brunn-core' ),
					'zoom'        => esc_html__( 'Zoom', 'brunn-core' ),
					'grayscale'   => esc_html__( 'Grayscale', 'brunn-core' )
				],
				'default' => ''
			]
		);


		$this->add_control(
			'image_space_after',
			[
				'label'     => esc_html__( 'Space after image (px)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter space (in px) which will be between image and bottom of the screen', 'brunn-core' ),
				'default' => '0'
			]
		);

		$this->add_control(
			'image_fixed_on_init',
			[
				'label'     => esc_html__( 'Fixed Image on Init', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => brunn_select_get_yes_no_select_array(false, true),
				'default' => 'yes'
			]
		);

		$this->add_control(
			'custom_link',
			[
				'label'     => esc_html__( 'Custom Link', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'image_behavior' => array( 'custom-link' )
				],
			]
		);

		$this->add_control(
			'custom_link_target',
			[
				'label'     => esc_html__( 'Custom Link Target', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options'   => brunn_select_get_link_target_array(),
				'condition' => [
					'image_behavior' => array( 'custom-link' )
				],
				'default' => '_self'
			]
		);

		$this->add_control(
			'content_padding',
			[
				'label'     => esc_html__( 'Padding', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Please insert padding in format 0px 10px 0px 10px', 'brunn-core' )
			]
		);

		brunn_core_generate_elementor_templates_control( $this );

		$this->end_controls_section();
	}
	public function render() {
		$params = $this->get_settings_for_display();

		$params['image'] = $params['image']['id'];

		$params['content'] = Elementor\Plugin::instance()->frontend->get_builder_content_for_display($params['template_id']);

		$params['holder_classes']    = $this->getHolderClasses( $params );
		$params['holder_style']        = $this->getHolderStyles( $params );
		$params['image_style']        = $this->getImageHolderStyles( $params );
		$params['image']              = $this->getImage( $params );
		$params['image_size']         = $this->getImageSize( $params['image_size'] );
		$params['image_data']       = $this->getImageHolderData( $params );
		$params['content_style']         = $this->getContentStyles( $params );

		echo brunn_core_get_shortcode_module_template_part( 'templates/divided-holder-template', 'divided-holder', '', $params );
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
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BrunnCoreElementorDividedHolder() );