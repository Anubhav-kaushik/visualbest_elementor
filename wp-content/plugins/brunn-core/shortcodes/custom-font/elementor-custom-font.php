<?php
class BrunnCoreElementorCustomFont extends \Elementor\Widget_Base {

	public function get_name() {
		return 'qodef_custom_font'; 
	}

	public function get_title() {
		return esc_html__( 'Custom Font', 'brunn-core' );
	}

	public function get_icon() {
		return 'brunn-elementor-custom-icon brunn-elementor-custom-font';
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
			'title',
			[
				'label'     => esc_html__( 'Title Text', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'type_out_effect',
			[
				'label'     => esc_html__( 'Enable Type Out Effect', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Adds a type out effect inside custom font content', 'brunn-core' ),
				'options' => array(
					'no' => esc_html__( 'No', 'brunn-core'), 
					'yes' => esc_html__( 'Yes', 'brunn-core')
				),
				'default' => 'no'
			]
		);

		$this->add_control(
			'type_out_position',
			[
				'label'     => esc_html__( 'Position of Type Out Effect', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter the position of the word after which you would like to display type out effect (e.g. if you would like the type out effect after the 3rd word, you would enter &quot;3&quot;)', 'brunn-core' ),
				'condition' => [
					'type_out_effect' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'typed_color',
			[
				'label'     => esc_html__( 'Typed Color', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'type_out_effect' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'typed_ending_1',
			[
				'label'     => esc_html__( 'Typed Ending Number 1', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'type_out_effect' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'typed_ending_2',
			[
				'label'     => esc_html__( 'Typed Ending Number 2', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'typed_ending_1!' => ''
				]
			]
		);

		$this->add_control(
			'typed_ending_3',
			[
				'label'     => esc_html__( 'Typed Ending Number 3', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'typed_ending_2!' => ''
				]
			]
		);

		$this->add_control(
			'typed_ending_4',
			[
				'label'     => esc_html__( 'Typed Ending Number 4', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'typed_ending_3!' => ''
				]
			]
		);

		$this->add_control(
			'title_break_words',
			[
				'label'     => esc_html__( 'Position of Line Break', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter the positions of the words after which you would like to create a line break (e.g. if you would like the line break after the 3rd and 8th words, you would enter &quot;3,8&quot;)', 'brunn-core' ),
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
					'title_break_words!' => ''
				]
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
					'h6' => esc_html__( 'h6', 'brunn-core'), 
					'p' => esc_html__( 'p', 'brunn-core'), 
					'span' => esc_html__( 'span', 'brunn-core')
				),
				'default' => 'h2'
			]
		);

		$this->add_control(
			'font_family',
			[
				'label'     => esc_html__( 'Font Family', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'font_size',
			[
				'label'     => esc_html__( 'Font Size (px or em)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'line_height',
			[
				'label'     => esc_html__( 'Line Height (px or em)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'font_weight',
			[
				'label'     => esc_html__( 'Font Weight', 'brunn-core' ),
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
				'default' => ''
			]
		);

		$this->add_control(
			'font_style',
			[
				'label'     => esc_html__( 'Font Style', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'brunn-core'), 
					'normal' => esc_html__( 'Normal', 'brunn-core'), 
					'italic' => esc_html__( 'Italic', 'brunn-core'), 
					'oblique' => esc_html__( 'Oblique', 'brunn-core'), 
					'initial' => esc_html__( 'Initial', 'brunn-core'), 
					'inherit' => esc_html__( 'Inherit', 'brunn-core')
				),
				'default' => ''
			]
		);

		$this->add_control(
			'letter_spacing',
			[
				'label'     => esc_html__( 'Letter Spacing (px or em)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'text_transform',
			[
				'label'     => esc_html__( 'Text Transform', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'brunn-core'), 
					'none' => esc_html__( 'None', 'brunn-core'), 
					'capitalize' => esc_html__( 'Capitalize', 'brunn-core'), 
					'uppercase' => esc_html__( 'Uppercase', 'brunn-core'), 
					'lowercase' => esc_html__( 'Lowercase', 'brunn-core'), 
					'initial' => esc_html__( 'Initial', 'brunn-core'), 
					'inherit' => esc_html__( 'Inherit', 'brunn-core')
				),
				'default' => ''
			]
		);

		$this->add_control(
			'text_decoration',
			[
				'label'     => esc_html__( 'Text Decoration', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'brunn-core'), 
					'none' => esc_html__( 'None', 'brunn-core'), 
					'underline' => esc_html__( 'Underline', 'brunn-core'), 
					'overline' => esc_html__( 'Overline', 'brunn-core'), 
					'line-through' => esc_html__( 'Line-Through', 'brunn-core'), 
					'initial' => esc_html__( 'Initial', 'brunn-core'), 
					'inherit' => esc_html__( 'Inherit', 'brunn-core')
				),
				'default' => ''
			]
		);

		$this->add_control(
			'color',
			[
				'label'     => esc_html__( 'Color', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'text_align',
			[
				'label'     => esc_html__( 'Text Align', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'brunn-core'), 
					'left' => esc_html__( 'Left', 'brunn-core'), 
					'center' => esc_html__( 'Center', 'brunn-core'), 
					'right' => esc_html__( 'Right', 'brunn-core'), 
					'justify' => esc_html__( 'Justify', 'brunn-core')
				),
				'default' => ''
			]
		);

		$this->add_control(
			'link',
			[
				'label'     => esc_html__( 'Custom link', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'target',
			[
				'label'     => esc_html__( 'Target of the custom link', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'_self' => esc_html__( 'Same window', 'brunn-core'), 
					'_blank' => esc_html__( 'New Window', 'brunn-core')
				),
				'default' => '_self',
				'condition' => [
					'link!' => ''
				]
			]
		);

		$this->add_control(
			'margin',
			[
				'label'     => esc_html__( 'Margin (px or %)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'brunn-core' )
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'laptops',
			[
				'label' => esc_html__( 'Laptops', 'brunn-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'font_size_1366',
			[
				'label'     => esc_html__( 'Font Size (px or em)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'line_height_1366',
			[
				'label'     => esc_html__( 'Line Height (px or em)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'tablets_landscape',
			[
				'label' => esc_html__( 'Tablets Landscape', 'brunn-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'font_size_1024',
			[
				'label'     => esc_html__( 'Font Size (px or em)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'line_height_1024',
			[
				'label'     => esc_html__( 'Line Height (px or em)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'tablets_portrait',
			[
				'label' => esc_html__( 'Tablets Portrait', 'brunn-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'font_size_768',
			[
				'label'     => esc_html__( 'Font Size (px or em)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'line_height_768',
			[
				'label'     => esc_html__( 'Line Height (px or em)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'mobiles',
			[
				'label' => esc_html__( 'Mobiles', 'brunn-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'font_size_680',
			[
				'label'     => esc_html__( 'Font Size (px or em)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'line_height_680',
			[
				'label'     => esc_html__( 'Line Height (px or em)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		$params['holder_rand_class'] = 'qodef-cf-' . mt_rand( 1000, 10000 );
		$params['holder_classes']    = $this->getHolderClasses( $params );
		$params['holder_styles']     = $this->getHolderStyles( $params );
		$params['holder_data']       = $this->getHolderData( $params );
		
		$params['title']     = $this->getModifiedTitle( $params );
		
		$html = brunn_core_get_shortcode_module_template_part( 'templates/custom-font', 'custom-font', '', $params );
		
		echo $html;
	}

	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = ! empty( $params['holder_rand_class'] ) ? esc_attr( $params['holder_rand_class'] ) : '';
		$holderClasses[] = $params['type_out_effect'] === 'yes' ? 'qodef-cf-has-type-out' : '';
		$holderClasses[] = $params['disable_break_words'] === 'yes' ? 'qodef-disable-title-break' : '';
		
		return implode( ' ', $holderClasses );
	}

	private function getHolderStyles( $params ) {
		$styles = array();
		
		if ( $params['font_family'] !== '' ) {
			$styles[] = 'font-family: ' . $params['font_family'];
		}
		
		if ( ! empty( $params['font_size'] ) ) {
			if ( brunn_select_string_ends_with( $params['font_size'], 'px' ) || brunn_select_string_ends_with( $params['font_size'], 'em' ) ) {
				$styles[] = 'font-size: ' . $params['font_size'];
			} else {
				$styles[] = 'font-size: ' . $params['font_size'] . 'px';
			}
		}
		
		if ( ! empty( $params['line_height'] ) ) {
			if ( brunn_select_string_ends_with( $params['line_height'], 'px' ) || brunn_select_string_ends_with( $params['line_height'], 'em' ) ) {
				$styles[] = 'line-height: ' . $params['line_height'];
			} else {
				$styles[] = 'line-height: ' . $params['line_height'] . 'px';
			}
		}
		
		if ( ! empty( $params['font_weight'] ) ) {
			$styles[] = 'font-weight: ' . $params['font_weight'];
		}
		
		if ( ! empty( $params['font_style'] ) ) {
			$styles[] = 'font-style: ' . $params['font_style'];
		}
		
		if ( ! empty( $params['letter_spacing'] ) ) {
			if ( brunn_select_string_ends_with( $params['letter_spacing'], 'px' ) || brunn_select_string_ends_with( $params['letter_spacing'], 'em' ) ) {
				$styles[] = 'letter-spacing: ' . $params['letter_spacing'];
			} else {
				$styles[] = 'letter-spacing: ' . $params['letter_spacing'] . 'px';
			}
		}
		
		if ( ! empty( $params['text_transform'] ) ) {
			$styles[] = 'text-transform: ' . $params['text_transform'];
		}
		
		if ( ! empty( $params['text_decoration'] ) ) {
			$styles[] = 'text-decoration: ' . $params['text_decoration'];
		}
		
		if ( ! empty( $params['text_align'] ) ) {
			$styles[] = 'text-align: ' . $params['text_align'];
		}
		
		if ( ! empty( $params['color'] ) ) {
			$styles[] = 'color: ' . $params['color'];
		}
		
		if ( $params['margin'] !== '' ) {
			$styles[] = 'margin: ' . $params['margin'];
		}
		
		return implode( ';', $styles );
	}

	private function getHolderData( $params ) {
		$data                    = array();
		$data['data-item-class'] = $params['holder_rand_class'];
		
		if ( $params['font_size_1366'] !== '' ) {
			if ( brunn_select_string_ends_with( $params['font_size_1366'], 'px' ) || brunn_select_string_ends_with( $params['font_size_1366'], 'em' ) ) {
				$data['data-font-size-1366'] = $params['font_size_1366'];
			} else {
				$data['data-font-size-1366'] = $params['font_size_1366'] . 'px';
			}
		}
		
		if ( $params['font_size_1024'] !== '' ) {
			if ( brunn_select_string_ends_with( $params['font_size_1024'], 'px' ) || brunn_select_string_ends_with( $params['font_size_1024'], 'em' ) ) {
				$data['data-font-size-1024'] = $params['font_size_1024'];
			} else {
				$data['data-font-size-1024'] = $params['font_size_1024'] . 'px';
			}
		}
		
		if ( $params['font_size_768'] !== '' ) {
			if ( brunn_select_string_ends_with( $params['font_size_768'], 'px' ) || brunn_select_string_ends_with( $params['font_size_768'], 'em' ) ) {
				$data['data-font-size-768'] = $params['font_size_768'];
			} else {
				$data['data-font-size-768'] = $params['font_size_768'] . 'px';
			}
		}
		
		if ( $params['font_size_680'] !== '' ) {
			if ( brunn_select_string_ends_with( $params['font_size_680'], 'px' ) || brunn_select_string_ends_with( $params['font_size_680'], 'em' ) ) {
				$data['data-font-size-680'] = $params['font_size_680'];
			} else {
				$data['data-font-size-680'] = $params['font_size_680'] . 'px';
			}
		}
		
		if ( $params['line_height_1366'] !== '' ) {
			if ( brunn_select_string_ends_with( $params['line_height_1366'], 'px' ) || brunn_select_string_ends_with( $params['line_height_1366'], 'em' ) ) {
				$data['data-line-height-1366'] = $params['line_height_1366'];
			} else {
				$data['data-line-height-1366'] = $params['line_height_1366'] . 'px';
			}
		}
		
		if ( $params['line_height_1024'] !== '' ) {
			if ( brunn_select_string_ends_with( $params['line_height_1024'], 'px' ) || brunn_select_string_ends_with( $params['line_height_1024'], 'em' ) ) {
				$data['data-line-height-1024'] = $params['line_height_1024'];
			} else {
				$data['data-line-height-1024'] = $params['line_height_1024'] . 'px';
			}
		}
		
		if ( $params['line_height_768'] !== '' ) {
			if ( brunn_select_string_ends_with( $params['line_height_768'], 'px' ) || brunn_select_string_ends_with( $params['line_height_768'], 'em' ) ) {
				$data['data-line-height-768'] = $params['line_height_768'];
			} else {
				$data['data-line-height-768'] = $params['line_height_768'] . 'px';
			}
		}
		
		if ( $params['line_height_680'] !== '' ) {
			if ( brunn_select_string_ends_with( $params['line_height_680'], 'px' ) || brunn_select_string_ends_with( $params['line_height_680'], 'em' ) ) {
				$data['data-line-height-680'] = $params['line_height_680'];
			} else {
				$data['data-line-height-680'] = $params['line_height_680'] . 'px';
			}
		}
		
		return $data;
	}

	private function getModifiedTitle( $params ) {
		$title             = $params['title'];
		$type_out_effect   = $params['type_out_effect'];
		$type_out_position = str_replace( ' ', '', $params['type_out_position'] );
		$title_break_words = str_replace( ' ', '', $params['title_break_words'] );
		
		if ( ! empty( $title ) && ( $type_out_effect === 'yes' || ! empty( $title_break_words ) ) ) {
			$split_title = explode( ' ', $title );
			
			if ( $type_out_effect === 'yes' && ! empty( $type_out_position ) ) {
				$typed_styles   = $this->getTypedStyles( $params );
				$typed_ending_1 = $params['typed_ending_1'];
				$typed_ending_2 = $params['typed_ending_2'];
				$typed_ending_3 = $params['typed_ending_3'];
				$typed_ending_4 = $params['typed_ending_4'];
				
				$typed_html = '<span class="qodef-cf-typed-wrap" ' . brunn_select_get_inline_style( $typed_styles ) . '><span class="qodef-cf-typed">';
				if ( ! empty( $typed_ending_1 ) ) {
					$typed_html .= '<span class="qodef-cf-typed-1">' . esc_html( $typed_ending_1 ) . '</span>';
				}
				if ( ! empty( $typed_ending_2 ) ) {
					$typed_html .= '<span class="qodef-cf-typed-2">' . esc_html( $typed_ending_2 ) . '</span>';
				}
				if ( ! empty( $typed_ending_3 ) ) {
					$typed_html .= '<span class="qodef-cf-typed-3">' . esc_html( $typed_ending_3 ) . '</span>';
				}
				if ( ! empty( $typed_ending_4 ) ) {
					$typed_html .= '<span class="qodef-cf-typed-4">' . esc_html( $typed_ending_4 ) . '</span>';
				}
				$typed_html .= '</span></span>';
				
				if ( ! empty( $split_title[ $type_out_position - 1 ] ) ) {
					$split_title[ $type_out_position - 1 ] = $split_title[ $type_out_position - 1 ] . ' ' . $typed_html;
				}
			}
			
			if ( ! empty( $title_break_words ) ) {
				$break_words = explode( ',', $title_break_words );
				foreach ( $break_words as $value ) {
					if ( ! empty( $split_title[ $value - 1 ] ) ) {
						$split_title[ $value - 1 ] = $split_title[ $value - 1 ] . '<br />';
					}
				}
			}
			
			$title = implode( ' ', $split_title );
		}
		
		return $title;
	}

	private function getTypedStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['typed_color'] ) ) {
			$styles[] = 'color: ' . $params['typed_color'];
		}
		
		return implode( ';', $styles );
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BrunnCoreElementorCustomFont() );