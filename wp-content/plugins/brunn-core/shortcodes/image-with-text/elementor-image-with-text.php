<?php
class BrunnCoreElementorImageWithText extends \Elementor\Widget_Base {

	public function get_name() {
		return 'qodef_image_with_text'; 
	}

	public function get_title() {
		return esc_html__( 'Image With Text', 'brunn-core' );
	}

	public function get_icon() {
		return 'brunn-elementor-custom-icon brunn-elementor-image-with-text';
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
				'description' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use &quot;thumbnail&quot; size', 'brunn-core' )
			]
		);

		$this->add_control(
			'enable_image_shadow',
			[
				'label'     => esc_html__( 'Enable Image Shadow', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'brunn-core'), 
					'yes' => esc_html__( 'Yes', 'brunn-core')
				),
				'default' => 'no'
			]
		);

		$this->add_control(
			'image_behavior',
			[
				'label'     => esc_html__( 'Image Behavior', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'None', 'brunn-core'), 
					'lightbox' => esc_html__( 'Open Lightbox', 'brunn-core'), 
					'custom-link' => esc_html__( 'Open Custom Link', 'brunn-core'), 
					'zoom' => esc_html__( 'Zoom', 'brunn-core'), 
					'grayscale' => esc_html__( 'Grayscale', 'brunn-core')
				),
				'default' => ''
			]
		);

		$this->add_control(
			'custom_link',
			[
				'label'     => esc_html__( 'Custom Link', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'image_behavior' => array( 'custom-link' )
				]
			]
		);

		$this->add_control(
			'custom_link_target',
			[
				'label'     => esc_html__( 'Custom Link Target', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'_self' => esc_html__( 'Same Window', 'brunn-core'), 
					'_blank' => esc_html__( 'New Window', 'brunn-core')
				),
				'default' => '_self',
				'condition' => [
					'image_behavior' => array( 'custom-link' )
				]
			]
		);

		$this->add_control(
			'text_width_max_size',
			[
				'label'     => esc_html__( 'Text Max Width (px)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'title',
			[
				'label'     => esc_html__( 'Title', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'     => esc_html__( 'Title Tag', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'brunn-core'), 
					'h1' => esc_html__( 'h1', 'brunn-core'), 
					'h2' => esc_html__( 'h2', 'brunn-core'), 
					'h3' => esc_html__( 'h3', 'brunn-core'), 
					'h4' => esc_html__( 'h4', 'brunn-core'), 
					'h5' => esc_html__( 'h5', 'brunn-core'), 
					'h6' => esc_html__( 'h6', 'brunn-core')
				),
				'default' => 'h4',
				'condition' => [
					'title!' => ''
				]
			]
		);

		$this->add_control(
			'title_size',
			[
				'label'     => esc_html__( 'Title Font Size (px)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'title!' => ''
				]
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Title Color', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'title!' => ''
				]
			]
		);

		$this->add_control(
			'title_top_margin',
			[
				'label'     => esc_html__( 'Title Top Margin (px)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'title!' => ''
				]
			]
		);

		$this->add_control(
			'text',
			[
				'label'     => esc_html__( 'Text', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXTAREA
			]
		);

		$this->add_control(
			'text_color',
			[
				'label'     => esc_html__( 'Text Color', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'text!' => ''
				]
			]
		);

		$this->add_control(
			'text_top_margin',
			[
				'label'     => esc_html__( 'Text Top Margin (px)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'text!' => ''
				]
			]
		);

		$this->add_control(
			'background_text',
			[
				'label'     => esc_html__( 'Background Text', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'background_text_size',
			[
				'label'     => esc_html__( 'Background Text Font Size (px)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'background_text!' => ''
				]
			]
		);

		$this->add_control(
			'background_text_color',
			[
				'label'     => esc_html__( 'Background Text Color', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'background_text!' => ''
				]
			]
		);

		$this->add_control(
			'background_text_top_margin',
			[
				'label'     => esc_html__( 'Background Text Top Margin (px)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'background_text!' => ''
				]
			]
		);

		$this->add_control(
			'bottom_buttons',
			[
				'label'     => esc_html__( 'Enable bottom double custom link functionality', 'backpacktraveler-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options'   => brunn_select_get_yes_no_select_array( false, false ),
				'default'   => 'no',
				'label_block' => true
			]
		);

		$this->add_control(
			'bottom_button_one_link',
			[
				'label'     => esc_html__( 'First Bottom Link', 'backpacktraveler-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'bottom_buttons' => 'yes'
				],
			]
		);

		$this->add_control(
			'bottom_button_one_label',
			[
				'label'     => esc_html__( 'First Bottom Link Label', 'backpacktraveler-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'bottom_buttons' => 'yes'
				],
			]
		);

		$this->add_control(
			'bottom_button_two_link',
			[
				'label'     => esc_html__( 'Second Bottom Link', 'backpacktraveler-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'bottom_buttons' => 'yes'
				],
			]
		);

		$this->add_control(
			'bottom_button_two_label',
			[
				'label'     => esc_html__( 'Second Bottom Link Label', 'backpacktraveler-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'bottom_buttons' => 'yes'
				],
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();


		
		$params['holder_classes']     = $this->getHolderClasses( $params );
		$params['image']              = $this->getImage( $params );
		$params['image_size']         = $this->getImageSize( $params['image_size'] );
		$params['title_styles']       = $this->getTitleStyles( $params );
		$params['text_styles']        = $this->getTextStyles( $params );
		$params['background_text_styles'] = $this->getBackgroundTextStyles( $params );
		$params['holder_styles']        = $this->getTextHolderStyles( $params );

		echo brunn_core_get_shortcode_module_template_part( 'templates/image-with-text', 'image-with-text', '', $params );
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
			$id = $params['image']['id'];
			
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
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BrunnCoreElementorImageWithText() );