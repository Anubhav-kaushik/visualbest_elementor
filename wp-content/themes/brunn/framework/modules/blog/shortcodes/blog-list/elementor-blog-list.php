<?php
class BrunnSelectElementorBlogList extends \Elementor\Widget_Base {

	public function get_name() {
		return 'qodef_blog_list'; 
	}

	public function get_title() {
		return esc_html__( 'Blog List', 'brunn-core' );
	}

	public function get_icon() {
		return 'brunn-elementor-custom-icon brunn-elementor-blog-list';
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
				'description' => esc_html__( '(Masonry will require Images)', 'brunn-core' ),
				'options' => array(
					'standard' => esc_html__( 'Standard', 'brunn-core'), 
					'boxed' => esc_html__( 'Boxed', 'brunn-core'), 
					'masonry' => esc_html__( 'Masonry', 'brunn-core'), 
					'simple' => esc_html__( 'Simple', 'brunn-core'), 
					'minimal' => esc_html__( 'Minimal', 'brunn-core')
				),
				'default' => 'standard'
			]
		);

		$this->add_control(
			'number_of_posts',
			[
				'label'     => esc_html__( 'Number of Posts', 'brunn-core' ),
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
				'default' => 'three',
				'condition' => [
					'type' => array( 'standard', 'boxed', 'masonry' )
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
				'default' => 'normal',
				'condition' => [
					'type' => array( 'standard', 'boxed', 'masonry' )
				]
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
				'default' => 'title'
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
			'category',
			[
				'label'     => esc_html__( 'Category', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter one category slug (leave empty for showing all categories)', 'brunn-core' )
			]
		);

		$this->add_control(
			'image_size',
			[
				'label'     => esc_html__( 'Image Size', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'full' => esc_html__( 'Original', 'brunn-core'), 
					'brunn_select_image_square' => esc_html__( 'Square', 'brunn-core'), 
					'brunn_select_image_landscape' => esc_html__( 'Landscape', 'brunn-core'), 
					'brunn_select_image_portrait' => esc_html__( 'Portrait', 'brunn-core'), 
					'thumbnail' => esc_html__( 'Thumbnail', 'brunn-core'), 
					'medium' => esc_html__( 'Medium', 'brunn-core'), 
					'large' => esc_html__( 'Large', 'brunn-core')
				),
				'default' => 'full',
				'condition' => [
					'type' => array( 'standard', 'boxed', 'masonry' )
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'post_info',
			[
				'label' => esc_html__( 'Post Info', 'brunn-core' ),
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
				'default' => 'h2'
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
				'default' => ''
			]
		);

		$this->add_control(
			'excerpt_length',
			[
				'label'     => esc_html__( 'Text Length', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Number of words', 'brunn-core' ),
				'condition' => [
					'type' => array( 'standard', 'boxed', 'masonry', 'simple' )
				]
			]
		);

		$this->add_control(
			'post_info_image',
			[
				'label'     => esc_html__( 'Enable Post Info Image', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'brunn-core'), 
					'no' => esc_html__( 'No', 'brunn-core')
				),
				'default' => 'yes',
				'condition' => [
					'type' => array( 'standard', 'boxed', 'masonry' )
				]
			]
		);

		$this->add_control(
			'post_info_section',
			[
				'label'     => esc_html__( 'Enable Post Info Section', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'brunn-core'), 
					'no' => esc_html__( 'No', 'brunn-core')
				),
				'default' => 'yes',
				'condition' => [
					'type' => array( 'standard', 'boxed', 'masonry' )
				]
			]
		);

		$this->add_control(
			'post_info_author',
			[
				'label'     => esc_html__( 'Enable Post Info Author', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'brunn-core'), 
					'no' => esc_html__( 'No', 'brunn-core')
				),
				'default' => 'yes',
				'condition' => [
					'post_info_section' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'post_info_date',
			[
				'label'     => esc_html__( 'Enable Post Info Date', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'brunn-core'), 
					'no' => esc_html__( 'No', 'brunn-core')
				),
				'default' => 'yes',
				'condition' => [
					'post_info_section' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'post_info_category',
			[
				'label'     => esc_html__( 'Enable Post Info Category', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'brunn-core'), 
					'no' => esc_html__( 'No', 'brunn-core')
				),
				'default' => 'yes',
				'condition' => [
					'post_info_section' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'post_info_comments',
			[
				'label'     => esc_html__( 'Enable Post Info Comments', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'brunn-core'), 
					'yes' => esc_html__( 'Yes', 'brunn-core')
				),
				'default' => 'no',
				'condition' => [
					'post_info_section' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'post_info_like',
			[
				'label'     => esc_html__( 'Enable Post Info Like', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'brunn-core'), 
					'yes' => esc_html__( 'Yes', 'brunn-core')
				),
				'default' => 'no',
				'condition' => [
					'post_info_section' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'post_info_share',
			[
				'label'     => esc_html__( 'Enable Post Info Share', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'brunn-core'), 
					'yes' => esc_html__( 'Yes', 'brunn-core')
				),
				'default' => 'no',
				'condition' => [
					'post_info_section' => array( 'yes' )
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'additional_features',
			[
				'label' => esc_html__( 'Additional Features', 'brunn-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'pagination_type',
			[
				'label'     => esc_html__( 'Pagination Type', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no-pagination' => esc_html__( 'None', 'brunn-core'), 
					'standard-shortcodes' => esc_html__( 'Standard', 'brunn-core'), 
					'load-more' => esc_html__( 'Load More', 'brunn-core'), 
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'brunn-core')
				),
				'default' => 'no-pagination'
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$default_atts = array(
			'type'                  => 'standard',
			'number_of_posts'       => '-1',
			'number_of_columns'     => 'three',
			'space_between_items'   => 'normal',
			'category'              => '',
			'orderby'               => 'title',
			'order'                 => 'ASC',
			'image_size'            => 'full',
			'title_tag'             => 'h2',
			'title_transform'       => '',
			'excerpt_length'        => '40',
			'post_info_section'     => 'yes',
			'post_info_image'       => 'yes',
			'post_info_author'      => 'yes',
			'post_info_date'        => 'yes',
			'post_info_category'    => 'yes',
			'post_info_comments'    => 'no',
			'post_info_like'        => 'no',
			'post_info_share'       => 'no',
			'pagination_type'       => 'no-pagination'
		);

		$params = shortcode_atts( $default_atts, $params = $this->get_settings_for_display() );
		
		$queryArray             = $this->generateQueryArray( $params );
		$query_result           = new \WP_Query( $queryArray );
		$params['query_result'] = $query_result;
		
		$params['holder_data']    = $this->getHolderData( $params );
		$params['holder_classes'] = $this->getHolderClasses( $params, $default_atts );
		$params['module']         = 'list';
		
		$params['max_num_pages'] = $query_result->max_num_pages;
		$params['paged']         = isset( $query_result->query['paged'] ) ? $query_result->query['paged'] : 1;
		
		$params['this_object'] = $this;
		
		ob_start();
		
		brunn_select_get_module_template_part( 'shortcodes/blog-list/holder', 'blog', $params['type'], $params );
		
		$html = ob_get_contents();
		
		ob_end_clean();
		
		echo $html;
	}

	public function getHolderClasses( $params, $default_atts ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['type'] ) ? 'qodef-bl-' . $params['type'] : 'qodef-bl-' . $default_atts['type'];
		$holderClasses[] = ! empty( $params['number_of_columns'] ) ? 'qodef-' . $params['number_of_columns'] . '-columns' : 'qodef-' . $default_atts['number_of_columns'] . '-columns';
		$holderClasses[] = ! empty( $params['space_between_items'] ) ? 'qodef-' . $params['space_between_items'] . '-space' : 'qodef-' . $default_atts['space_between_items'] . '-space';
		$holderClasses[] = ! empty( $params['pagination_type'] ) ? 'qodef-bl-pag-' . $params['pagination_type'] : 'qodef-bl-pag-' . $default_atts['pagination_type'];
		
		return implode( ' ', $holderClasses );
	}

	public function getHolderData( $params ) {
		$dataString = '';
		
		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}
		
		$query_result = $params['query_result'];
		
		$params['max_num_pages'] = $query_result->max_num_pages;
		
		if ( ! empty( $paged ) ) {
			$params['next-page'] = $paged + 1;
		}
		
		foreach ( $params as $key => $value ) {
			if ( $key !== 'query_result' && $value !== '' ) {
				$new_key = str_replace( '_', '-', $key );
				
				$dataString .= ' data-' . $new_key . '=' . esc_attr( str_replace( ' ', '', $value ) );
			}
		}
		
		return $dataString;
	}

	public function generateQueryArray( $params ) {
		$queryArray = array(
			'post_status'    => 'publish',
			'post_type'      => 'post',
			'orderby'        => $params['orderby'],
			'order'          => $params['order'],
			'posts_per_page' => $params['number_of_posts'],
			'post__not_in'   => get_option( 'sticky_posts' )
		);
		
		if ( ! empty( $params['category'] ) ) {
			$queryArray['category_name'] = $params['category'];
		}
		
		if ( ! empty( $params['next_page'] ) ) {
			$queryArray['paged'] = $params['next_page'];
		} else {
			$query_array['paged'] = 1;
		}
		
		return $queryArray;
	}

	public function getTitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['title_transform'] ) ) {
			$styles[] = 'text-transform: ' . $params['title_transform'];
		}
		
		return implode( ';', $styles );
	}

	public function blogCategoryAutocompleteSuggester( $query ) {
		global $wpdb;
		$post_meta_infos       = $wpdb->get_results( $wpdb->prepare( "SELECT a.slug AS slug, a.name AS category_title
					FROM {$wpdb->terms} AS a
					LEFT JOIN ( SELECT term_id, taxonomy  FROM {$wpdb->term_taxonomy} ) AS b ON b.term_id = a.term_id
					WHERE b.taxonomy = 'category' AND a.name LIKE '%%%s%%'", stripslashes( $query ) ), ARRAY_A );
		
		$results = array();
		if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
			foreach ( $post_meta_infos as $value ) {
				$data          = array();
				$data['value'] = $value['slug'];
				$data['label'] = ( ( strlen( $value['category_title'] ) > 0 ) ? esc_html__( 'Category', 'brunn' ) . ': ' . $value['category_title'] : '' );
				$results[]     = $data;
			}
		}
		
		return $results;
	}

	public function blogCategoryAutocompleteRender( $query ) {
		$query = trim( $query['value'] ); // get value from requested
		if ( ! empty( $query ) ) {
			// get portfolio category
			$category = get_term_by( 'slug', $query, 'category' );
			if ( is_object( $category ) ) {
				
				$category_slug = $category->slug;
				$category_title = $category->name;
				
				$category_title_display = '';
				if ( ! empty( $category_title ) ) {
					$category_title_display = esc_html__( 'Category', 'brunn' ) . ': ' . $category_title;
				}
				
				$data          = array();
				$data['value'] = $category_slug;
				$data['label'] = $category_title_display;
				
				return ! empty( $data ) ? $data : false;
			}
			
			return false;
		}
		
		return false;
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BrunnSelectElementorBlogList() );