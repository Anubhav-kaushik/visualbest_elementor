<?php
class BrunnCoreElementorClientsCarousel extends \Elementor\Widget_Base {

	public function get_name() {
		return 'qodef_clients_carousel'; 
	}

	public function get_title() {
		return esc_html__( 'Clients Carousel', 'brunn-core' );
	}

	public function get_icon() {
		return 'brunn-elementor-custom-icon brunn-elementor-clients-carousel';
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
			'number_of_visible_items',
			[
				'label'     => esc_html__( 'Number Of Visible Items', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'1' => esc_html__( 'One', 'brunn-core'), 
					'2' => esc_html__( 'Two', 'brunn-core'), 
					'3' => esc_html__( 'Three', 'brunn-core'), 
					'4' => esc_html__( 'Four', 'brunn-core'), 
					'5' => esc_html__( 'Five', 'brunn-core'), 
					'6' => esc_html__( 'Six', 'brunn-core'), 
					'7' => esc_html__( 'Seven', 'brunn-core')
				),
				'default' => '4'
			]
		);

		$this->add_control(
			'slider_loop',
			[
				'label'     => esc_html__( 'Enable Slider Loop', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'brunn-core'), 
					'no' => esc_html__( 'No', 'brunn-core')
				),
				'default' => 'yes'
			]
		);

		$this->add_control(
			'slider_autoplay',
			[
				'label'     => esc_html__( 'Enable Slider Autoplay', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'brunn-core'), 
					'no' => esc_html__( 'No', 'brunn-core')
				),
				'default' => 'yes'
			]
		);

		$this->add_control(
			'slider_speed',
			[
				'label'     => esc_html__( 'Slide Duration', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Default value is 5000 (ms)', 'brunn-core' )
			]
		);

		$this->add_control(
			'slider_speed_animation',
			[
				'label'     => esc_html__( 'Slide Animation Duration', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Speed of slide animation in milliseconds. Default value is 600.', 'brunn-core' )
			]
		);

		$this->add_control(
			'slider_navigation',
			[
				'label'     => esc_html__( 'Enable Slider Navigation Arrows', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'brunn-core'), 
					'yes' => esc_html__( 'Yes', 'brunn-core')
				),
				'default' => 'no'
			]
		);

		$this->add_control(
			'slider_pagination',
			[
				'label'     => esc_html__( 'Enable Slider Pagination', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'brunn-core'), 
					'yes' => esc_html__( 'Yes', 'brunn-core')
				),
				'default' => 'no'
			]
		);

		$this->add_control(
			'items_hover_animation',
			[
				'label'     => esc_html__( 'Items Hover Animation', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'switch-images' => esc_html__( 'Switch Images', 'brunn-core'), 
					'roll-over' => esc_html__( 'Roll Over', 'brunn-core')
				),
				'default' => 'switch-images'
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'image',
			[
				'label'     => esc_html__( 'Image', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::MEDIA,
				'description' => esc_html__( 'Select image from media library', 'brunn-core' )
			]
		);

		$repeater->add_control(
			'hover_image',
			[
				'label'     => esc_html__( 'Hover Image', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::MEDIA,
				'description' => esc_html__( 'Select image from media library', 'brunn-core' )
			]
		);

		$repeater->add_control(
			'image_size',
			[
				'label'     => esc_html__( 'Image Size', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use &quot;thumbnail&quot; size', 'brunn-core' )
			]
		);

		$repeater->add_control(
			'link',
			[
				'label'     => esc_html__( 'Custom Link', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$repeater->add_control(
			'target',
			[
				'label'     => esc_html__( 'Custom Link Target', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'_self' => esc_html__( 'Same Window', 'brunn-core'), 
					'_blank' => esc_html__( 'New Window', 'brunn-core')
				),
				'default' => '_self'
			]
		);

		$this->add_control(
			'clients_carousel_item',
			[
				'label'     => esc_html__( 'Clients Item', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::REPEATER,
				'fields'     => $repeater->get_controls(),
				'title_field'     => esc_html__( 'Item', 'brunn-core' )
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();
		$params['holder_classes'] = $this->getHolderClasses( $params );
		$params['carousel_data']  = $this->getSliderData( $params );
		?>

		<div class="qodef-clients-carousel-holder <?php echo esc_attr($params['holder_classes']); ?>">
			<div class="qodef-cc-inner qodef-owl-slider" <?php echo brunn_select_get_inline_attrs($params['carousel_data']); ?>>
				<?php foreach ( $params['clients_carousel_item'] as $client ) {

					$client['item_classes'] = $this->getItemClasses( $client );
					$client['image']        = $this->getCarouselImage( $client );
					$client['hover_image']  = $this->getCarouselHoverImage( $client );

					echo brunn_core_get_shortcode_module_template_part( 'templates/elementor-clients-carousel-item', 'clients-carousel', '', $client );
				} ?>
			</div>
		</div>

		<?php
	}

	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['items_hover_animation'] ) ? 'qodef-cc-hover-' . $params['items_hover_animation'] : 'qodef-cc-hover-switch-images';
		
		return implode( ' ', $holderClasses );
	}

	private function getSliderData( $params ) {
		$slider_data = array();
		
		$slider_data['data-number-of-items']        = ! empty( $params['number_of_visible_items'] ) ? $params['number_of_visible_items'] : '4';
		$slider_data['data-enable-loop']            = ! empty( $params['slider_loop'] ) ? $params['slider_loop'] : '';
		$slider_data['data-enable-autoplay']        = ! empty( $params['slider_autoplay'] ) ? $params['slider_autoplay'] : '';
		$slider_data['data-slider-speed']           = ! empty( $params['slider_speed'] ) ? $params['slider_speed'] : '5000';
		$slider_data['data-slider-speed-animation'] = ! empty( $params['slider_speed_animation'] ) ? $params['slider_speed_animation'] : '600';
		$slider_data['data-enable-navigation']      = ! empty( $params['slider_navigation'] ) ? $params['slider_navigation'] : '';
		$slider_data['data-enable-pagination']      = ! empty( $params['slider_pagination'] ) ? $params['slider_pagination'] : '';
		
		return $slider_data;
	}

	private function getItemClasses( $params ) {
		$holderClasses = array();

		$holderClasses[] = ! empty( $params['link'] ) ? 'qodef-cci-has-link' : 'qodef-cci-no-link';

		return implode( ' ', $holderClasses );
	}

	private function getCarouselImage( $client ) {
		$image_meta = array();

		$client['image'] = $client['image']['id'];

		if ( ! empty( $client['image'] ) ) {
			$image_size     = $this->getCarouselImageSize( $client['image_size'] );
			$image_id       = $client['image'];
			$image_original = wp_get_attachment_image_src( $image_id, $image_size );
			$image['url']   = $image_original[0];
			$image['alt']   = get_post_meta( $image_id, '_wp_attachment_image_alt', true );

			$image_meta = $image;
		}

		return $image_meta;
	}

	private function getCarouselHoverImage( $client ) {
		$image_meta = array();

		$client['hover_image'] = $client['hover_image']['id'];

		if ( ! empty( $client['hover_image'] ) ) {
			$image_size     = $this->getCarouselImageSize( $client['image_size'] );
			$image_id       = $client['hover_image'];
			$image_original = wp_get_attachment_image_src( $image_id, $image_size );
			$image['url']   = $image_original[0];
			$image['alt']   = get_post_meta( $image_id, '_wp_attachment_image_alt', true );

			$image_meta = $image;
		}

		return $image_meta;
	}

	private function getCarouselImageSize( $image_size ) {
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
			return 'full';
		}
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BrunnCoreElementorClientsCarousel() );