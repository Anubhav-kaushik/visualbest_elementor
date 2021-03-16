<?php
class BrunnSelectElementorProductList extends \Elementor\Widget_Base {

	public function get_name() {
		return 'qodef_product_list'; 
	}

	public function get_title() {
		return esc_html__( 'Product List', 'brunn-core' );
	}

	public function get_icon() {
		return 'brunn-elementor-custom-icon brunn-elementor-product-list';
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
			'type',
			[
				'label'     => esc_html__( 'Type', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'standard' => esc_html__( 'Standard', 'brunn-core'), 
					'masonry' => esc_html__( 'Masonry', 'brunn-core')
				),
				'default' => 'standard'
			]
		);

		$this->add_control(
			'info_position',
			[
				'label'     => esc_html__( 'Product Info Position', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'info-below-image' => esc_html__( 'Info Below Image', 'brunn-core')
				),
				'default' => 'info-below-image'
			]
		);

		$this->add_control(
			'number_of_posts',
			[
				'label'     => esc_html__( 'Number of Products', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
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
				'default' => 'three'
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

		$this->add_control(
			'orderby',
			[
				'label'     => esc_html__( 'Order By', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'date' => esc_html__( 'Date', 'brunn-core'), 
					'ID' => esc_html__( 'ID', 'brunn-core'), 
					'menu_order' => esc_html__( 'Menu Order', 'brunn-core'), 
					'name' => esc_html__( 'Post Name', 'brunn-core'), 
					'rand' => esc_html__( 'Random', 'brunn-core'), 
					'title' => esc_html__( 'Title', 'brunn-core'), 
					'on-sale' => esc_html__( 'On Sale', 'brunn-core')
				),
				'default' => 'date'
			]
		);

		$this->add_control(
			'order',
			[
				'label'     => esc_html__( 'Order', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'ASC' => esc_html__( 'ASC', 'brunn-core'), 
					'DESC' => esc_html__( 'DESC', 'brunn-core')
				),
				'default' => 'ASC'
			]
		);

		$this->add_control(
			'taxonomy_to_display',
			[
				'label'     => esc_html__( 'Choose Sorting Taxonomy', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'If you would like to display only certain products, this is where you can select the criteria by which you would like to choose which products to display', 'brunn-core' ),
				'options' => array(
					'category' => esc_html__( 'Category', 'brunn-core'), 
					'tag' => esc_html__( 'Tag', 'brunn-core'), 
					'id' => esc_html__( 'Id', 'brunn-core')
				),
				'default' => 'category'
			]
		);

		$this->add_control(
			'taxonomy_values',
			[
				'label'     => esc_html__( 'Enter Taxonomy Values', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Separate values (category slugs, tags, or post IDs) with a comma', 'brunn-core' )
			]
		);

		$this->add_control(
			'image_size',
			[
				'label'     => esc_html__( 'Image Proportions', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'brunn-core'), 
					'full' => esc_html__( 'Original', 'brunn-core'), 
					'square' => esc_html__( 'Square', 'brunn-core'), 
					'landscape' => esc_html__( 'Landscape', 'brunn-core'), 
					'portrait' => esc_html__( 'Portrait', 'brunn-core'), 
					'medium' => esc_html__( 'Medium', 'brunn-core'), 
					'large' => esc_html__( 'Large', 'brunn-core'), 
					'woocommerce_single' => esc_html__( 'Shop Single', 'brunn-core'), 
					'woocommerce_thumbnail' => esc_html__( 'Shop Thumbnail', 'brunn-core')
				),
				'default' => 'full'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'product_info',
			[
				'label' => esc_html__( 'Product Info', 'brunn-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'display_title',
			[
				'label'     => esc_html__( 'Display Title', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'brunn-core'), 
					'no' => esc_html__( 'No', 'brunn-core')
				),
				'default' => 'yes'
			]
		);

		$this->add_control(
			'display_category',
			[
				'label'     => esc_html__( 'Display Category', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'brunn-core'), 
					'yes' => esc_html__( 'Yes', 'brunn-core')
				),
				'default' => 'no'
			]
		);

		$this->add_control(
			'display_excerpt',
			[
				'label'     => esc_html__( 'Display Excerpt', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'brunn-core'), 
					'yes' => esc_html__( 'Yes', 'brunn-core')
				),
				'default' => 'no'
			]
		);

		$this->add_control(
			'display_rating',
			[
				'label'     => esc_html__( 'Display Rating', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'brunn-core'), 
					'no' => esc_html__( 'No', 'brunn-core')
				),
				'default' => 'no'
			]
		);

		$this->add_control(
			'display_price',
			[
				'label'     => esc_html__( 'Display Price', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'brunn-core'), 
					'no' => esc_html__( 'No', 'brunn-core')
				),
				'default' => 'yes'
			]
		);

		$this->add_control(
			'display_button',
			[
				'label'     => esc_html__( 'Display Button', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'brunn-core'), 
					'no' => esc_html__( 'No', 'brunn-core')
				),
				'default' => 'yes'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'product_info_style',
			[
				'label' => esc_html__( 'Product Info Style', 'brunn-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'product_info_skin',
			[
				'label'     => esc_html__( 'Product Info Skin', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'default' => esc_html__( 'Default', 'brunn-core'), 
					'light' => esc_html__( 'Light', 'brunn-core'), 
					'dark' => esc_html__( 'Dark', 'brunn-core')
				),
				'default' => 'default',
				'condition' => [
					'info_position' => array( 'info-on-image' )
				]
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
				'default' => 'h3',
				'condition' => [
					'display_title' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'title_transform',
			[
				'label'     => esc_html__( 'Title Text Transform', 'brunn-core' ),
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
				'default' => '',
				'condition' => [
					'display_title' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'excerpt_length',
			[
				'label'     => esc_html__( 'Excerpt Length', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Number of characters', 'brunn-core' ),
				'condition' => [
					'display_excerpt' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'button_skin',
			[
				'label'     => esc_html__( 'Button Skin', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'default' => esc_html__( 'Default', 'brunn-core'), 
					'light' => esc_html__( 'Light', 'brunn-core'), 
					'dark' => esc_html__( 'Dark', 'brunn-core')
				),
				'default' => 'default',
				'condition' => [
					'display_button' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'shader_background_color',
			[
				'label'     => esc_html__( 'Shader Background Color', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'info_bottom_text_align',
			[
				'label'     => esc_html__( 'Product Info Text Alignment', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'brunn-core'), 
					'left' => esc_html__( 'Left', 'brunn-core'), 
					'center' => esc_html__( 'Center', 'brunn-core'), 
					'right' => esc_html__( 'Right', 'brunn-core')
				),
				'default' => '',
				'condition' => [
					'info_position' => array( 'info-below-image' )
				]
			]
		);

		$this->add_control(
			'info_bottom_margin',
			[
				'label'     => esc_html__( 'Product Info Bottom Margin (px)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'info_position' => array( 'info-below-image' )
				]
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();
		
		$params['class_name']     = 'pli';
		
		$additional_params = array();
		$additional_params['holder_classes'] = $this->getHolderClasses( $params );
		
		$queryArray                        = $this->generateProductQueryArray( $params );
		$query_result                      = new \WP_Query( $queryArray );
		$additional_params['query_result'] = $query_result;
		
		$params['this_object'] = $this;
		
		$html = brunn_select_get_woo_shortcode_module_template_part( 'templates/product-list', 'product-list', $params['type'], $params, $additional_params );
		
		echo $html;
	}

	private function getHolderClasses( $params ) {
		$holderClasses   = array();
		$holderClasses[] = 'qodef-' . $params['type'] . '-layout';
		$holderClasses[] = 'qodef-' . $params['number_of_columns'] . '-columns';
		$holderClasses[] = 'qodef-' . $params['space_between_items'] . '-space';
		$holderClasses[] = 'qodef-' . $params['info_position'];
		$holderClasses[] = ! empty( $params['product_info_skin'] ) ? 'qodef-product-info-' . $params['product_info_skin'] : '';
		
		return implode( ' ', $holderClasses );
	}

	private function generateProductQueryArray( $params ) {
		$queryArray = array(
			'post_status'         => 'publish',
			'post_type'           => 'product',
			'ignore_sticky_posts' => 1,
			'posts_per_page'      => $params['number_of_posts'],
			'orderby'             => $params['orderby'],
			'order'               => $params['order']
		);
		
		if ( $params['orderby'] === 'on-sale' ) {
			$queryArray['no_found_rows'] = 1;
			$queryArray['post__in']      = array_merge( array( 0 ), wc_get_product_ids_on_sale() );
		}
		
		if ( $params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'category' ) {
			$queryArray['product_cat'] = $params['taxonomy_values'];
		}
		
		if ( $params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'tag' ) {
			$queryArray['product_tag'] = $params['taxonomy_values'];
		}
		
		if ( $params['taxonomy_to_display'] !== '' && $params['taxonomy_to_display'] === 'id' ) {
			$idArray                = $params['taxonomy_values'];
			$ids                    = explode( ',', $idArray );
			$queryArray['post__in'] = $ids;
		}
		
		return $queryArray;
	}

	public function getItemClasses( $params ) {
		$itemClasses = array();
		
		$image_size_meta = get_post_meta( get_the_ID(), 'qodef_product_featured_image_size', true );
		
		if ( ! empty( $image_size_meta ) ) {
			$itemClasses[] = 'qodef-fixed-masonry-item qodef-masonry-size-' . $image_size_meta;
		}
		
		return implode( ' ', $itemClasses );
	}

	public function getTitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['title_transform'] ) ) {
			$styles[] = 'text-transform: ' . $params['title_transform'];
		}
		
		return implode( ';', $styles );
	}

	public function getShaderStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['shader_background_color'] ) ) {
			$styles[] = 'background-color: ' . $params['shader_background_color'];
		}
		
		return implode( ';', $styles );
	}

	public function getTextWrapperStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['info_bottom_text_align'] ) ) {
			$styles[] = 'text-align: ' . $params['info_bottom_text_align'];
		}
		
		if ( $params['info_bottom_margin'] !== '' ) {
			$styles[] = 'margin-bottom: ' . brunn_select_filter_px( $params['info_bottom_margin'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BrunnSelectElementorProductList() );