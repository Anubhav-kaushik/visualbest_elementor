<?php
class BrunnCoreElementorImageGallery extends \Elementor\Widget_Base {

	public function get_name() {
		return 'qodef_image_gallery'; 
	}

	public function get_title() {
		return esc_html__( 'Image Gallery', 'brunn-core' );
	}

	public function get_icon() {
		return 'brunn-elementor-custom-icon brunn-elementor-image-gallery';
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
				'label'     => esc_html__( 'Gallery Type', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'grid' => esc_html__( 'Image Grid', 'brunn-core'), 
					'masonry' => esc_html__( 'Masonry', 'brunn-core'), 
					'slider' => esc_html__( 'Slider', 'brunn-core'), 
					'carousel' => esc_html__( 'Carousel', 'brunn-core')
				),
				'default' => 'grid'
			]
		);

		$this->add_control(
			'images',
			[
				'label'     => esc_html__( 'Images', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::GALLERY,
				'description' => esc_html__( 'Select images from media library', 'brunn-core' )
			]
		);

		$this->add_control(
			'image_size',
			[
				'label'     => esc_html__( 'Image Size', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use &quot;full&quot; size', 'brunn-core' )
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
			'custom_links',
			[
				'label'     => esc_html__( 'Custom Links', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXTAREA,
				'description' => esc_html__( 'Delimit links by comma', 'brunn-core' ),
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
			'number_of_columns',
			[
				'label'     => esc_html__( 'Number of Columns', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'brunn-core'), 
					'one' => esc_html__( 'One', 'brunn-core'), 
					'two' => esc_html__( 'Two', 'brunn-core'), 
					'three' => esc_html__( 'Three', 'brunn-core'), 
					'four' => esc_html__( 'Four', 'brunn-core'), 
					'five' => esc_html__( 'Five', 'brunn-core'), 
					'six' => esc_html__( 'Six', 'brunn-core')
				),
				'default' => 'three',
				'condition' => [
					'type' => array( 'grid', 'masonry' )
				]
			]
		);

		$this->add_control(
			'space_between_items',
			[
				'label'     => esc_html__( 'Space Between Items', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'huge' => esc_html__( 'Huge (40)', 'brunn-core'), 
					'large' => esc_html__( 'Large (25)', 'brunn-core'), 
					'medium' => esc_html__( 'Medium (20)', 'brunn-core'), 
					'normal' => esc_html__( 'Normal (15)', 'brunn-core'), 
					'small' => esc_html__( 'Small (10)', 'brunn-core'), 
					'tiny' => esc_html__( 'Tiny (5)', 'brunn-core'), 
					'no' => esc_html__( 'No (0)', 'brunn-core')
				),
				'default' => 'normal'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'slider_settings',
			[
				'label' => esc_html__( 'Slider Settings', 'brunn-core' ),
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
					'6' => esc_html__( 'Six', 'brunn-core')
				),
				'default' => '1',
				'condition' => [
					'type' => array( 'carousel' )
				]
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
				'default' => 'yes',
				'condition' => [
					'type' => array( 'slider', 'carousel' )
				]
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
				'default' => 'yes',
				'condition' => [
					'type' => array( 'slider', 'carousel' )
				]
			]
		);

		$this->add_control(
			'slider_speed',
			[
				'label'     => esc_html__( 'Slide Duration', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Default value is 5000 (ms)', 'brunn-core' ),
				'condition' => [
					'type' => array( 'slider', 'carousel' )
				]
			]
		);

		$this->add_control(
			'slider_speed_animation',
			[
				'label'     => esc_html__( 'Slide Animation Duration', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Speed of slide animation in milliseconds. Default value is 600.', 'brunn-core' ),
				'condition' => [
					'type' => array( 'slider', 'carousel' )
				]
			]
		);

		$this->add_control(
			'slider_padding',
			[
				'label'     => esc_html__( 'Enable Slider Padding', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Padding left and right on stage (can see neighbours).', 'brunn-core' ),
				'options' => array(
					'no' => esc_html__( 'No', 'brunn-core'), 
					'yes' => esc_html__( 'Yes', 'brunn-core')
				),
				'default' => 'no',
				'condition' => [
					'type' => array( 'slider' )
				]
			]
		);

		$this->add_control(
			'slider_navigation',
			[
				'label'     => esc_html__( 'Enable Slider Navigation Arrows', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'brunn-core'), 
					'no' => esc_html__( 'No', 'brunn-core')
				),
				'default' => 'yes',
				'condition' => [
					'type' => array( 'slider', 'carousel' )
				]
			]
		);

		$this->add_control(
			'slider_custom_navigation',
			[
				'label'     => esc_html__( 'Custom Navigation', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'brunn-core'), 
					'yes' => esc_html__( 'Yes', 'brunn-core')
				),
				'default' => 'no',
				'condition' => [
					'slider_navigation' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'slider_pagination',
			[
				'label'     => esc_html__( 'Enable Slider Pagination', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'brunn-core'), 
					'no' => esc_html__( 'No', 'brunn-core')
				),
				'default' => 'yes',
				'condition' => [
					'type' => array( 'slider', 'carousel' )
				]
			]
		);

		$this->add_control(
			'slider_enable_center',
			[
				'label'     => esc_html__( 'Enable Center', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'brunn-core'), 
					'yes' => esc_html__( 'Yes', 'brunn-core')
				),
				'default' => 'no',
				'condition' => [
					'type' => array( 'slider', 'carousel' )
				]
			]
		);

		$this->add_control(
			'slider_auto_width_center',
			[
				'label'     => esc_html__( 'Enable Auto Width', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'brunn-core'), 
					'yes' => esc_html__( 'Yes', 'brunn-core')
				),
				'default' => 'no',
				'condition' => [
					'type' => array( 'slider', 'carousel' )
				]
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();


		
		$params['holder_classes'] = $this->getHolderClasses( $params );
		$params['slider_data']    = $this->getSliderData( $params );

		$params['images']             = $this->getGalleryImages( $params );
		$params['image_size']         = $this->getImageSize( $params['image_size'] );
		$params['custom_links']       = $this->getCustomLinks( $params );
		
		$html = brunn_core_get_shortcode_module_template_part( 'templates/' . $params['type'], 'image-gallery', '', $params );
		
		echo $html;
	}

	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = 'qodef-ig-' . $params['type'] . '-type';
		$holderClasses[] = 'qodef-' . $params['number_of_columns'] . '-columns';
		$holderClasses[] = 'qodef-' . $params['space_between_items'] . '-space';
		$holderClasses[] = $params['enable_image_shadow'] === 'yes' ? 'qodef-has-shadow' : '';
		$holderClasses[] = $params['slider_custom_navigation'] === 'yes' ? 'qodef-ig-custom-navigation' : '';
		$holderClasses[] = ! empty( $params['image_behavior'] ) ? 'qodef-image-behavior-' . $params['image_behavior'] : '';

		return implode( ' ', $holderClasses );
	}

	private function getSliderData( $params ) {
		$slider_data = array();
		
		$slider_data['data-number-of-items']        = $params['number_of_visible_items'] !== '' && $params['type'] === 'carousel' ? $params['number_of_visible_items'] : '1';
		$slider_data['data-enable-loop']            = ! empty( $params['slider_loop'] ) ? $params['slider_loop'] : '';
		$slider_data['data-enable-autoplay']        = ! empty( $params['slider_autoplay'] ) ? $params['slider_autoplay'] : '';
		$slider_data['data-slider-speed']           = ! empty( $params['slider_speed'] ) ? $params['slider_speed'] : '5000';
		$slider_data['data-slider-speed-animation'] = ! empty( $params['slider_speed_animation'] ) ? $params['slider_speed_animation'] : '600';
		$slider_data['data-slider-padding']         = ! empty( $params['slider_padding'] ) ? $params['slider_padding'] : '';
		$slider_data['data-enable-navigation']      = ! empty( $params['slider_navigation'] ) ? $params['slider_navigation'] : '';
		$slider_data['data-enable-pagination']      = ! empty( $params['slider_pagination'] ) ? $params['slider_pagination'] : '';
		$slider_data['data-enable-center']          = ! empty( $params['slider_enable_center'] ) ? $params['slider_enable_center'] : '';
		$slider_data['data-enable-auto-width']          = ! empty( $params['slider_auto_width_center'] ) ? $params['slider_auto_width_center'] : '';

		return $slider_data;
	}

	private function getGalleryImages( $params ) {
		$image_ids = array();
		$images    = array();
		$i         = 0;

		if ( $params['images'] !== '' ) {
			foreach ( $params['images'] as $image ) {
				$image_ids[] = $image['id'];
			}
		}
		
		foreach ( $image_ids as $id ) {
			
			$image['image_id'] = $id;
			$image_original    = wp_get_attachment_image_src( $id, 'full' );
			$image['url']      = $image_original[0];
			$image['title']    = get_the_title( $id );
			$image['alt']      = get_post_meta( $id, '_wp_attachment_image_alt', true );
			
			$images[ $i ] = $image;
			$i ++;
		}
		
		return $images;
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
			return 'full';
		}
	}

	private function getCustomLinks( $params ) {
		$custom_links = array();
		
		if ( ! empty( $params['custom_links'] ) ) {
			$custom_links = array_map( 'trim', explode( ',', $params['custom_links'] ) );
		}
		
		return $custom_links;
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BrunnCoreElementorImageGallery() );