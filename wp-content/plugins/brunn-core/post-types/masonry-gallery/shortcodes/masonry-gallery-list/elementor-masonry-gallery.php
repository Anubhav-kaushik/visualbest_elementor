<?php
class BrunnCoreElementorMasonryGallery extends \Elementor\Widget_Base {

	public function get_name() {
		return 'qodef_masonry_gallery'; 
	}

	public function get_title() {
		return esc_html__( 'Masonry Gallery', 'brunn-core' );
	}

	public function get_icon() {
		return 'brunn-elementor-custom-icon brunn-elementor-masonry-gallery-list';
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
			'number',
			[
				'label'     => esc_html__( 'Number of Items', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
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
			'category',
			[
				'label'     => esc_html__( 'Category', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter one category slug (leave empty for showing all categories)', 'brunn-core' )
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
					'title' => esc_html__( 'Title', 'brunn-core')
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


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		/* Query for items */
		$query_args = array(
			'post_type'      => 'masonry-gallery',
			'orderby'        => $params['orderby'],
			'order'          => $params['order'],
			'posts_per_page' => $params['number']
		);
		
		if ( ! empty( $category ) ) {
			$query_args['masonry-gallery-category'] = $category;
		}
		
		$holder_classes = '';
		if ( ! empty( $params['space_between_items'] ) ) {
			$holder_classes = 'qodef-' . $params['space_between_items'] . '-space';
		}
		
		$query = new \WP_Query( $query_args );
		
		$html = '<div class="qodef-masonry-gallery-holder qodef-disable-bottom-space ' . esc_attr( $holder_classes ) . '">';
			$html .= '<div class="qodef-mg-inner qodef-outer-space">';
				$html .= '<div class="qodef-mg-grid-sizer"></div>';
				$html .= '<div class="qodef-mg-grid-gutter"></div>';
				
				if ( $query->have_posts() ) :
					while ( $query->have_posts() ) : $query->the_post();
						$itemID         = get_the_ID();
						$typeOption     = get_post_meta( $itemID, 'qodef_masonry_gallery_item_type', true );
						$title          = get_the_title( $itemID );
						$titleTagOption = get_post_meta( $itemID, 'qodef_masonry_gallery_item_title_tag', true );
						$text           = get_post_meta( $itemID, 'qodef_masonry_gallery_item_text', true );
						$link           = get_post_meta( $itemID, 'qodef_masonry_gallery_item_link', true );
						$target         = get_post_meta( $itemID, 'qodef_masonry_gallery_item_link_target', true );
						$button_label   = get_post_meta( $itemID, 'qodef_masonry_gallery_button_label', true );
						
						$type                           = ! empty( $typeOption ) ? $typeOption : 'standard';
						$params['item_title']           = ! empty( $title ) ? $title : '';
						$params['item_title_tag']       = ! empty( $titleTagOption ) ? $titleTagOption : 'h4';
						$params['item_text']            = ! empty( $text ) ? $text : '';
						$params['item_link']            = ! empty( $link ) ? $link : '';
						$params['item_link_target']     = ! empty( $target ) ? $target : '_self';
						$params['item_button_label']    = ! empty( $button_label ) ? $button_label : '';
						$params['current_id']           = $itemID;
						$params['item_classes']         = $this->getItemClasses();
						$params['item_image']           = $this->getItemImage( $params );
						$params['background_image_url'] = $this->getBackgroundImage( $params );
						
						$html .= brunn_core_get_cpt_shortcode_module_template_part( 'masonry-gallery', 'masonry-gallery-list', 'masonry-gallery-' . $type . '-template', '', $params );
					
					endwhile;
				else:
					$html .= esc_html__( 'Sorry, no posts matched your criteria.', 'brunn-core' );
				endif;
				wp_reset_postdata();
			$html .= '</div>';
		$html .= '</div>';
		
		echo $html;
	}

	private function getItemClasses() {
		$classes = array( 'qodef-mg-item' );
		
		$itemID          = get_the_ID();
		$type            = get_post_meta( $itemID, 'qodef_masonry_gallery_item_type', true );
		$image_size      = get_post_meta( $itemID, 'qodef_masonry_gallery_item_size', true );
		$background_skin = get_post_meta( $itemID, 'qodef_masonry_gallery_simple_content_background_skin', true );
		
		if ( ! empty( $type ) ) {
			$classes[] = 'qodef-mg-' . $type;
		}
		
		if ( ! empty( $image_size ) ) {
			$classes[] = 'qodef-masonry-size-' . $image_size;
		}
		
		if ( ! empty( $background_skin ) ) {
			$classes[] = 'qodef-mg-skin-' . $background_skin;
		}
		
		return implode( ' ', $classes );
	}

	public function getItemImage( $params ) {
		$id          = $params['current_id'];
		$imageOption = get_post_meta( $id, 'qodef_masonry_gallery_item_image', true );
		$item_image  = array();
		
		if ( ! empty( $imageOption ) ) {
			$image_url = $imageOption;
			$image_id  = brunn_select_get_attachment_id_from_url( $image_url );
			
			$image['url'] = $image_url;
			$image['alt'] = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
			$item_image   = $image;
		}
		
		return $item_image;
	}

	public function getBackgroundImage( $params ) {
		$masonry_image_url = wp_get_attachment_url( get_post_thumbnail_id( $params['current_id'] ) );
		
		return $masonry_image_url;
	}

	public function masonryGalleryCategoryAutocompleteSuggester( $query ) {
		global $wpdb;
		$post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT a.slug AS slug, a.name AS masonry_gallery_category_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'masonry-gallery-category' AND a.name LIKE '%%%s%%'", stripslashes( $query ) ), ARRAY_A );
		
		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['slug'];
				$data['label'] = ( ( strlen( $value['masonry_gallery_category_title'] ) > 0 ) ? esc_html__( 'Category', 'brunn-core' ) . ': ' . $value['masonry_gallery_category_title'] : '' );
				$results[]     = $data;
			}
		}
		
		return $results;
	}

	public function masonryGalleryCategoryAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get portfolio category
			$masonry_gallery_category = get_term_by( 'slug', $query, 'masonry-gallery-category' );
			if ( is_object( $masonry_gallery_category ) ) {
				
				$masonry_gallery_category_slug  = $masonry_gallery_category->slug;
				$masonry_gallery_category_title = $masonry_gallery_category->name;
				
				$masonry_gallery_category_title_display = '';
				if ( ! empty( $masonry_gallery_category_title ) ) {
					$masonry_gallery_category_title_display = esc_html__( 'Category', 'brunn-core' ) . ': ' . $masonry_gallery_category_title;
				}
				
				$data          = array();
				$data['value'] = $masonry_gallery_category_slug;
				$data['label'] = $masonry_gallery_category_title_display;
				
				return ! empty( $data ) ? $data : false;
			}
			
			return false;
		}
		
		return false;
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BrunnCoreElementorMasonryGallery() );