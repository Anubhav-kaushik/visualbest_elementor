<?php
class BrunnCoreElementorSectionTitle extends \Elementor\Widget_Base {

	public function get_name() {
		return 'qodef_section_title'; 
	}

	public function get_title() {
		return esc_html__( 'Section Title', 'brunn-core' );
	}

	public function get_icon() {
		return 'brunn-elementor-custom-icon brunn-elementor-section-title';
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
			'type',
			[
				'label'     => esc_html__( 'Type', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'standard' => esc_html__( 'Standard', 'brunn-core'), 
					'two-columns' => esc_html__( 'Two Columns', 'brunn-core')
				),
				'default' => 'standard'
			]
		);

		$this->add_control(
			'title_position',
			[
				'label'     => esc_html__( 'Title - Text Position', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'title-left' => esc_html__( 'Title Left - Text Right', 'brunn-core'), 
					'title-right' => esc_html__( 'Title Right - Text Left', 'brunn-core')
				),
				'default' => 'title-left',
				'condition' => [
					'type' => array( 'two-columns' )
				]
			]
		);

		$this->add_control(
			'columns_space',
			[
				'label'     => esc_html__( 'Space Between Columns', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'normal' => esc_html__( 'Normal', 'brunn-core'), 
					'small' => esc_html__( 'Small', 'brunn-core'), 
					'tiny' => esc_html__( 'Tiny', 'brunn-core')
				),
				'default' => 'normal',
				'condition' => [
					'type' => array( 'two-columns' )
				]
			]
		);

		$this->add_control(
			'position',
			[
				'label'     => esc_html__( 'Horizontal Position', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'brunn-core'), 
					'left' => esc_html__( 'Left', 'brunn-core'), 
					'center' => esc_html__( 'Center', 'brunn-core'), 
					'right' => esc_html__( 'Right', 'brunn-core')
				),
				'default' => '',
				'condition' => [
					'type' => array( 'standard' )
				]
			]
		);

		$this->add_control(
			'holder_padding',
			[
				'label'     => esc_html__( 'Holder Side Padding (px or %)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'label',
			[
				'label'     => esc_html__( 'Label', 'brunn-core' ),
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
			'background_text',
			[
				'label'     => esc_html__( 'Background Text', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'text',
			[
				'label'     => esc_html__( 'Text', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXTAREA
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'label_style',
			[
				'label' => esc_html__( 'Label Style', 'brunn-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'label_color',
			[
				'label'     => esc_html__( 'Label Color', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'label!' => ''
				]
			]
		);

		$this->add_control(
			'label_line_color',
			[
				'label'     => esc_html__( 'Label Line Color', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'label!' => ''
				]
			]
		);

		$this->add_control(
			'label_margin_bottom',
			[
				'label'     => esc_html__( 'Label Margin Bottom', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'label!' => ''
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'title_style',
			[
				'label' => esc_html__( 'Title Style', 'brunn-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'title_tag',
			[
				'label'     => esc_html__( 'Title Tag', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'h1' => esc_html__( 'h1', 'brunn-core'), 
					'h2' => esc_html__( 'h2', 'brunn-core'), 
					'h3' => esc_html__( 'h3', 'brunn-core'), 
					'h4' => esc_html__( 'h4', 'brunn-core'), 
					'h5' => esc_html__( 'h5', 'brunn-core'), 
					'h6' => esc_html__( 'h6', 'brunn-core')
				),
				'default' => 'h2',
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
			'title_bold_words',
			[
				'label'     => esc_html__( 'Words with Bold Font Weight', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter the positions of the words you would like to display in a &quot;bold&quot; font weight. Separate the positions with commas (e.g. if you would like the first, second, and third word to have a light font weight, you would enter &quot;1,2,3&quot;)', 'brunn-core' ),
				'condition' => [
					'title!' => ''
				]
			]
		);

		$this->add_control(
			'title_light_words',
			[
				'label'     => esc_html__( 'Words with Light Font Weight', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter the positions of the words you would like to display in a &quot;light&quot; font weight. Separate the positions with commas (e.g. if you would like the first, third, and fourth word to have a light font weight, you would enter &quot;1,3,4&quot;)', 'brunn-core' ),
				'condition' => [
					'title!' => ''
				]
			]
		);

		$this->add_control(
			'title_break_words',
			[
				'label'     => esc_html__( 'Position of Line Break', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter the position of the word after which you would like to create a line break (e.g. if you would like the line break after the 3rd word, you would enter &quot;3&quot;)', 'brunn-core' ),
				'condition' => [
					'title!' => ''
				]
			]
		);

		$this->add_control(
			'disable_break_words',
			[
				'label'     => esc_html__( 'Disable Line Break for Smaller Screens', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'brunn-core'), 
					'yes' => esc_html__( 'Yes', 'brunn-core')
				),
				'default' => 'no',
				'condition' => [
					'title!' => ''
				]
			]
		);

		$this->add_control(
			'title_background_words',
			[
				'label'     => esc_html__( 'Words with Background', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter the positions of the words you would like to have a background. Separate the positions with commas (e.g. if you would like the first, second, and third word to have a light font weight, you would enter &quot;1,2,3&quot;)', 'brunn-core' ),
				'condition' => [
					'title!' => ''
				]
			]
		);

		$this->add_control(
			'title_margin_top',
			[
				'label'     => esc_html__( 'Title Margin Top', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'title!' => ''
				]
			]
		);

		$this->add_control(
			'title_margin_bottom',
			[
				'label'     => esc_html__( 'Title Margin Bottom', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'title!' => ''
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'background_text_style',
			[
				'label' => esc_html__( 'Background Text Style', 'brunn-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
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

		$this->end_controls_section();

		$this->start_controls_section(
			'text_style',
			[
				'label' => esc_html__( 'Text Style', 'brunn-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'text_tag',
			[
				'label'     => esc_html__( 'Text Tag', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'h1' => esc_html__( 'h1', 'brunn-core'), 
					'h2' => esc_html__( 'h2', 'brunn-core'), 
					'h3' => esc_html__( 'h3', 'brunn-core'), 
					'h4' => esc_html__( 'h4', 'brunn-core'), 
					'h5' => esc_html__( 'h5', 'brunn-core'), 
					'h6' => esc_html__( 'h6', 'brunn-core'), 
					'p' => esc_html__( 'p', 'brunn-core')
				),
				'default' => 'p',
				'condition' => [
					'text!' => ''
				]
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
			'text_font_size',
			[
				'label'     => esc_html__( 'Text Font Size (px)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'text!' => ''
				]
			]
		);

		$this->add_control(
			'text_line_height',
			[
				'label'     => esc_html__( 'Text Line Height (px)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'text!' => ''
				]
			]
		);

		$this->add_control(
			'text_font_weight',
			[
				'label'     => esc_html__( 'Text Font Weight', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'brunn-core'), 
					'100' => esc_html__( '100 Thin', 'brunn-core'), 
					'200' => esc_html__( '200 Thin-Light', 'brunn-core'), 
					'300' => esc_html__( '300 Light', 'brunn-core'), 
					'400' => esc_html__( '400 Normal', 'brunn-core'), 
					'500' => esc_html__( '500 Medium', 'brunn-core'), 
					'600' => esc_html__( '600 Semi-Bold', 'brunn-core'), 
					'700' => esc_html__( '700 Bold', 'brunn-core'), 
					'800' => esc_html__( '800 Extra-Bold', 'brunn-core'), 
					'900' => esc_html__( '900 Ultra-Bold', 'brunn-core')
				),
				'default' => '',
				'condition' => [
					'text!' => ''
				]
			]
		);

		$this->add_control(
			'text_margin',
			[
				'label'     => esc_html__( 'Text Top Margin (px)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'text!' => ''
				]
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();


		
		$params['holder_classes'] = $this->getHolderClasses( $params );
		$params['holder_styles']  = $this->getHolderStyles( $params );
		$params['label_styles'] = $this->getLabelStyles($params);
		$params['label_text_styles'] = $this->getLabelTextStyles($params);
		$params['label_line_styles'] = $this->getLabelLineStyles($params);
		$params['title']          = $this->getModifiedTitle( $params );
		$params['title_styles']   = $this->getTitleStyles( $params );
		$params['background_text_styles'] = $this->getBackgroundTextStyles( $params );
		$params['text_styles']    = $this->getTextStyles( $params );
		
		$html = brunn_core_get_shortcode_module_template_part( 'templates/section-title', 'section-title', '', $params );
		
		echo $html;
	}

	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] =  'qodef-st-' . $params['type'];
		$holderClasses[] = 'qodef-st-' . $params['title_position'];
		$holderClasses[] = 'qodef-st-' . $params['columns_space'] . '-space';
		$holderClasses[] = $params['disable_break_words'] === 'yes' ? 'qodef-st-disable-title-break' : '';
		
		return implode( ' ', $holderClasses );
	}

	private function getHolderStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['holder_padding'] ) ) {
			$styles[] = 'padding: 0 ' . $params['holder_padding'];
		}
		
		if ( ! empty( $params['position'] ) ) {
			$styles[] = 'text-align: ' . $params['position'];
		}
		
		return implode( ';', $styles );
	}

	private function getModifiedTitle( $params ) {
		$title             = $params['title'];
		$title_bold_words  = str_replace( ' ', '', $params['title_bold_words'] );
		$title_light_words = str_replace( ' ', '', $params['title_light_words'] );
		$title_break_words = str_replace( ' ', '', $params['title_break_words'] );
		$title_background_words  = str_replace( ' ', '', $params['title_background_words'] );

		if ( ! empty( $title ) ) {
			$bold_words  = explode( ',', $title_bold_words );
			$light_words = explode( ',', $title_light_words );
			$split_title = explode( ' ', $title );
			$background_words  = explode( ',', $title_background_words );
			
			if ( ! empty( $title_bold_words ) ) {
				foreach ( $bold_words as $value ) {
					if ( ! empty( $split_title[ $value - 1 ] ) ) {
						$split_title[ $value - 1 ] = '<span class="qodef-st-title-bold">' . $split_title[ $value - 1 ] . '</span>';
					}
				}
			}
			
			if ( ! empty( $title_light_words ) ) {
				foreach ( $light_words as $value ) {
					if ( ! empty( $split_title[ $value - 1 ] ) ) {
						$split_title[ $value - 1 ] = '<span class="qodef-st-title-light">' . $split_title[ $value - 1 ] . '</span>';
					}
				}
			}
			
			if ( ! empty( $title_break_words ) ) {
				if ( ! empty( $split_title[ $title_break_words - 1 ] ) ) {
					$split_title[ $title_break_words - 1 ] = $split_title[ $title_break_words - 1 ] . '<br />';
				}
			}

			if ( ! empty( $title_background_words ) ) {
				foreach ( $background_words as $value ) {
					if ( ! empty( $split_title[ $value - 1 ] ) ) {
						$split_title[ $value - 1 ] = '<span class="qodef-st-title-background">' . $split_title[ $value - 1 ] . '</span>';
					}
				}
			}
			
			$title = implode( ' ', $split_title );
		}
		
		return $title;
	}

	private function getTitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['title_color'] ) ) {
			$styles[] = 'color: ' . $params['title_color'];
		}

		if ( $params['title_margin_top'] !== '' ) {
			$styles[] = 'margin-top: ' . brunn_select_filter_px( $params['title_margin_top'] ) . 'px';
		}

		if ( $params['title_margin_bottom'] !== '' ) {
			$styles[] = 'margin-bottom: ' . brunn_select_filter_px( $params['title_margin_bottom'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}

	private function getTextStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['text_color'] ) ) {
			$styles[] = 'color: ' . $params['text_color'];
		}
		
		if ( ! empty( $params['text_font_size'] ) ) {
			$styles[] = 'font-size: ' . brunn_select_filter_px( $params['text_font_size'] ) . 'px';
		}
		
		if ( ! empty( $params['text_line_height'] ) ) {
			$styles[] = 'line-height: ' . brunn_select_filter_px( $params['text_line_height'] ) . 'px';
		}
		
		if ( ! empty( $params['text_font_weight'] ) ) {
			$styles[] = 'font-weight: ' . $params['text_font_weight'];
		}
		
		if ( $params['text_margin'] !== '' ) {
			$styles[] = 'margin-top: ' . brunn_select_filter_px( $params['text_margin'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}

	private function getLabelStyles($params) {
		$styles = array();

		if (!empty($params['label_margin_bottom'])) {
			$styles[] = 'margin-bottom:' . $params['label_margin_bottom'];
		}

		return implode(';', $styles);
	}

	private function getLabelTextStyles($params) {
		$styles = array();

		if (!empty($params['label_color'])) {
			$styles[] = 'color:' . $params['label_color'];
		}

		return implode(';', $styles);
	}

	private function getLabelLineStyles($params) {
		$styles = array();

		if (!empty($params['label_line_color'])) {
			$styles[] = 'background-color:' . $params['label_line_color'];
		}

		return implode(';', $styles);
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
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BrunnCoreElementorSectionTitle() );