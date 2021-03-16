<?php
class BrunnCoreElementorClientsGrid extends \Elementor\Widget_Base {

	public function get_name() {
		return 'qodef_clients_grid'; 
	}

	public function get_title() {
		return esc_html__( 'Clients Grid', 'brunn-core' );
	}

	public function get_icon() {
		return 'brunn-elementor-custom-icon brunn-elementor-clients-grid';
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
			'image_alignment',
			[
				'label'     => esc_html__( 'Items Horizontal Alignment', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default Center', 'brunn-core'), 
					'left' => esc_html__( 'Left', 'brunn-core'), 
					'right' => esc_html__( 'Right', 'brunn-core')
				),
				'default' => ''
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
		?>

		<div class="qodef-clients-grid-holder qodef-grid-list qodef-disable-bottom-space <?php echo esc_attr( $params['holder_classes'] ); ?>">
			<div class="qodef-cg-inner qodef-outer-space">
				<?php foreach ( $params['clients_carousel_item'] as $client ) {

					$client['item_classes'] = $this->getItemClasses( $client );
					$client['image']        = $this->getCarouselImage( $client );
					$client['hover_image']  = $this->getCarouselHoverImage( $client );

					echo brunn_core_get_shortcode_module_template_part( 'templates/elementor-clients-grid-item', 'clients-grid', '', $client );
				} ?>
			</div>
		</div>

		<?php
	}

	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = 'qodef-' . $params['number_of_columns'] . '-columns';
		$holderClasses[] = 'qodef-' . $params['space_between_items'] . '-space';
		$holderClasses[] = 'qodef-cg-alignment-' . $params['image_alignment'];
		$holderClasses[] = 'qodef-cc-hover-' . $params['items_hover_animation'];
		
		return implode( ' ', $holderClasses );
	}

	private function getItemClasses( $client ) {
		$itemClasses = array();

		$itemClasses[] = ! empty( $client['link'] ) ? 'qodef-cci-has-link' : 'qodef-cci-no-link';

		return implode( ' ', $itemClasses );
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
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BrunnCoreElementorClientsGrid() );