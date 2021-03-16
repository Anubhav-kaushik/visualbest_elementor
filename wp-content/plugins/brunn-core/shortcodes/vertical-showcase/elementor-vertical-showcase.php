<?php
class BrunnCoreElementorVerticalShowcase extends \Elementor\Widget_Base {

	public function get_name() {
		return 'qodef_vertical_showcase'; 
	}

	public function get_title() {
		return esc_html__( 'Vertical Showcase', 'brunn-core' );
	}

	public function get_icon() {
		return 'brunn-elementor-custom-icon brunn-elementor-vertical-showcase';
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
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'slide_text',
			[
				'label'     => esc_html__( 'Text above number', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$repeater->add_control(
			'title',
			[
				'label'     => esc_html__( 'Slide Title', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$repeater->add_control(
			'subtitle',
			[
				'label'     => esc_html__( 'Slide Subtitle', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$repeater->add_control(
			'image',
			[
				'label'     => esc_html__( 'Image', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::MEDIA,
				'description' => esc_html__( 'Select image from media library', 'brunn-core' )
			]
		);

		$this->add_control(
			'link_items',
			[
				'label'     => esc_html__( 'Link Items', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::REPEATER,
				'fields'     => $repeater->get_controls(),
				'title_field'     => esc_html__( 'Item', 'brunn-core' )
			]
		);

		$this->add_control(
			'enable_phone_frame',
			[
				'label'     => esc_html__( 'Enable Phone Frame', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'yes' => esc_html__( 'Yes', 'brunn-core'), 
					'no' => esc_html__( 'No', 'brunn-core')
				),
				'default' => 'yes'
			]
		);

		$this->add_control(
			'enable_app_store_link',
			[
				'label'     => esc_html__( 'Enable App Store Link', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'brunn-core'), 
					'yes' => esc_html__( 'Yes', 'brunn-core')
				),
				'default' => 'no'
			]
		);

		$this->add_control(
			'app_store_link',
			[
				'label'     => esc_html__( 'Link Address', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'enable_app_store_link' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'enable_play_store_link',
			[
				'label'     => esc_html__( 'Enable Google Play Store Link', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'brunn-core'), 
					'yes' => esc_html__( 'Yes', 'brunn-core')
				),
				'default' => 'no'
			]
		);

		$this->add_control(
			'play_store_link',
			[
				'label'     => esc_html__( 'Link Address', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'enable_play_store_link' => array( 'yes' )
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'last_slide',
			[
				'label' => esc_html__( 'Last Slide', 'brunn-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'contact_form_title',
			[
				'label'     => esc_html__( 'Contact Form Title', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'contact_form_subtitle',
			[
				'label'     => esc_html__( 'Contact Form Subtitle', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'contact_form',
			[
				'label'     => esc_html__( 'Select Contact Form 7', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array_flip($this->setParams()),
				'default' => ''
			]
		);

		$this->add_control(
			'widget_area',
			[
				'label'     => esc_html__( 'Widget Area', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Choose a widget area to be rendered at the bottom of the shortcode.', 'brunn-core' ),
				'options' => array_merge(
					array(
						'' => ''
					),
					brunn_select_get_custom_sidebars()
				),
				'default' => ''
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		$params['holder_classes'] = $this->getHolderClasses( $params );
		
		?>

		<div class="qodef-vertical-showcase qodef-vs-ready-animation <?php echo esc_attr( $params['holder_classes'] ); ?>">
			<div class="qodef-vs-holder">
				<div class="qodef-vs-stripe"></div>
				<div class="qodef-vs-frame-holder">
					<div class="qodef-vs-frame-mobile-holder">
						<img src="../wp-content/plugins/brunn-core/assets/img/mobile-frame.png" alt="<?php esc_attr_e( 'Mobile frame image', 'brunn-core' ); ?>">
						<div class="qodef-vs-inner-frame"></div>
					</div>
				</div>
				<div class="qodef-vs-frame-info qodef-vs-frame-animate-out">
					<div class="qodef-vs-frame-info-top">
						<div class="qodef-vs-frame-title"></div>
						<div class="qodef-vs-frame-subtitle"></div>
					</div>
					<div class="qodef-vs-frame-info-bottom">
						<div class="qodef-vs-frame-slide-text"></div>
						<div class="qodef-vs-frame-slide-number">01</div>
					</div>
					<div class="qodef-vs-frame-info-other">
						<?php if ( $params['enable_app_store_link'] == "yes" ) { ?>
							<a itemprop="url" class="qodef-vs-item-app-store-link" href="<?php echo esc_url( $params['app_store_link'] ); ?>" target="_blank">
								<img src="../wp-content/plugins/brunn-core/assets/img/logo-app-store.png" alt="<?php esc_attr_e( 'Apple store logo', 'brunn-core' ); ?>">
							</a>
						<?php } ?>
						<?php if ( $params['enable_play_store_link'] == "yes" ) { ?>
							<a itemprop="url" class="qodef-vs-item-play-store-link" href="<?php echo esc_url( $params['play_store_link'] ); ?>" target="_blank">
								<img src="../wp-content/plugins/brunn-core/assets/img/logo-play-store.png" alt="<?php esc_attr_e( 'Play store logo', 'brunn-core' ); ?>">
							</a>
						<?php } ?>
					</div>
				</div>
				<div class="swiper-container">
					<div class="swiper-wrapper">
						<?php if ( ! empty( $params['link_items'] ) ) { ?>
							<?php foreach ( $params['link_items'] as $link_item ): ?>
								<div class="swiper-slide">
									<div class="qodef-vs-item">
										<?php if ( isset( $link_item['image']['id'] ) ) { ?>
											<?php echo wp_get_attachment_image( $link_item['image']['id'], 'full' ); ?>
										<?php } ?>
										<div class="qodef-vs-item-info">
											<?php if ( isset( $link_item['slide_text'] ) ) { ?>
												<span class="qodef-vs-item-slide-text"><?php echo esc_html( $link_item['slide_text'] ); ?></span>
											<?php } ?>
											<?php if ( isset( $link_item['title'] ) ) { ?>
												<span class="qodef-vs-item-title"><?php echo esc_html( $link_item['title'] ); ?></span>
											<?php } ?>
											<?php if ( isset( $link_item['subtitle'] ) ) { ?>
												<span class="qodef-vs-item-subtitle"><?php echo esc_html( $link_item['subtitle'] ); ?></span>
											<?php } ?>
										</div>
									</div>
								</div>
							<?php endforeach; ?>
							<div class="swiper-slide">
								<div class="qodef-vs-contact-form">
									<div class="qodef-vs-contact-form-info">
										<?php if ( ! empty( $params['contact_form_title'] ) ) { ?>
											<div class="qodef-vs-contact-form-title">
												<h1><?php echo esc_html( $params['contact_form_title'] ); ?></h1>
											</div>
										<?php } ?>
										<?php if ( ! empty( $params['contact_form_subtitle'] ) ) { ?>
											<div class="qodef-vs-contact-form-subtitle">
												<p><?php echo esc_html( $params['contact_form_subtitle'] ); ?></p>
											</div>
										<?php } ?>
									</div>
									<?php if ( ! empty( $params['contact_form'] ) ) {
										echo do_shortcode( '[contact-form-7 id="' . esc_attr( $params['contact_form'] ) . '"]' );
									} ?>
									<div class="qodef-vs-social-widget">
										<div class="qodef-vs-social-widget-label">
											<p><?php esc_html_e( 'Share The Love', 'brunn-core' ); ?></p></div>
										<?php if ( ! empty( $params['widget_area'] ) && is_active_sidebar( $params['widget_area'] ) ) : ?>
											<div class="qodef-vs-widget-area">
												<?php dynamic_sidebar( $params['widget_area'] ); ?>
											</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
				<div class="swiper-pagination"></div>
			</div>
		</div>

		<?php
	}

	protected function setParams() {
		$cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
		
		$contact_forms = array();
		if ( $cf7 ) {
			foreach ( $cf7 as $cform ) {
				$contact_forms[ $cform->ID ] = $cform->post_title;
			}
		} else {
			$contact_forms[0] = esc_html__( 'No contact forms found', 'brunn' );
		}

		$formatted_cf_array = array();
		
		if ( is_array( $contact_forms ) && count( $contact_forms ) ) {
			foreach ( $contact_forms as $key=>$value ) {
				$formatted_cf_array[ $value ] = $key;
			}
		}

		return $formatted_cf_array;

	}

	private function getHolderClasses( $params ) {
		$holderClasses = array();

		$holderClasses[] = $params['enable_phone_frame'] == "no" ? 'qodef-vs-no-frame' : '';
		
		return implode( ' ', $holderClasses );
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BrunnCoreElementorVerticalShowcase() );