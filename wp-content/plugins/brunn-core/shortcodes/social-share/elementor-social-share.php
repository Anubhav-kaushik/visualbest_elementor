<?php
class BrunnCoreElementorSocialShare extends \Elementor\Widget_Base {

	public function get_name() {
		return 'qodef_social_share'; 
	}

	public function get_title() {
		return esc_html__( 'Social Share', 'brunn-core' );
	}

	public function get_icon() {
		return 'brunn-elementor-custom-icon brunn-elementor-social-share';
	}

	public function get_categories() {
		return [ 'select' ];
	}

	public function getSocialNetworks() {
		$socialNetworks = array(
			'facebook',
			'twitter',
			'google_plus',
			'linkedin',
			'tumblr',
			'pinterest',
			'vk'
		);

		return $socialNetworks;
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
					'list' => esc_html__( 'List', 'brunn-core'), 
					'dropdown' => esc_html__( 'Dropdown', 'brunn-core'), 
					'text' => esc_html__( 'Text', 'brunn-core')
				),
				'default' => 'list'
			]
		);

		$this->add_control(
			'dropdown_behavior',
			[
				'label'     => esc_html__( 'DropDown Hover Behavior', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'bottom' => esc_html__( 'On Bottom Animation', 'brunn-core'), 
					'right' => esc_html__( 'On Right Animation', 'brunn-core'), 
					'left' => esc_html__( 'On Left Animation', 'brunn-core')
				),
				'default' => 'bottom',
				'condition' => [
					'type' => array( 'dropdown' )
				]
			]
		);

		$this->add_control(
			'icon_type',
			[
				'label'     => esc_html__( 'Icons Type', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'font-awesome' => esc_html__( 'Font Awesome', 'brunn-core'), 
					'font-elegant' => esc_html__( 'Font Elegant', 'brunn-core')
				),
				'default' => 'font-elegant',
				'condition' => [
					'type' => array( 'list', 'dropdown' )
				]
			]
		);

		$this->add_control(
			'title',
			[
				'label'     => esc_html__( 'Social Share Title', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();


		
		//Is social share enabled
		$params['enable_social_share'] = brunn_select_options()->getOptionValue( 'enable_social_share' ) === 'yes';
		
		//Is social share enabled for post type
		$post_type         = str_replace( '-', '_', get_post_type() );
		$params['enabled'] = brunn_select_options()->getOptionValue( 'enable_social_share_on_' . $post_type ) === 'yes';
		
		//Social Networks Data
		$params['networks'] = $this->getSocialNetworksParams( $params );
		
		$params['dropdown_class'] = 'qodef-' . $params['dropdown_behavior'];
		
		if ( $params['enable_social_share'] && $params['enabled'] ) {
			echo brunn_core_get_shortcode_module_template_part( 'templates/' . $params['type'], 'social-share', '', $params );
		}

	}

	private function getSocialNetworksParams( $params ) {
		$networks   = array();
		$icons_type = $params['icon_type'];
		$type       = $params['type'];
		
		foreach ( $this->getSocialNetworks() as $net ) {
			$html = '';
			
			if ( brunn_select_options()->getOptionValue( 'enable_' . $net . '_share' ) == 'yes' ) {
				$image                 = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
				$params                = array(
					'name' => $net,
					'type' => $type
				);

				$params['link']        = $this->getSocialNetworkShareLink( $net, $image );

				if ($type == 'text') {
					$params['text']    = $this->getSocialNetworkText( $net );
				} else {
					$params['icon']    = $this->getSocialNetworkIcon( $net, $icons_type );
				}

				$params['custom_icon'] = ( brunn_select_options()->getOptionValue( $net . '_icon' ) ) ? brunn_select_options()->getOptionValue( $net . '_icon' ) : '';
				
				$html = brunn_core_get_shortcode_module_template_part( 'templates/parts/network', 'social-share', '', $params );
			}
			
			$networks[ $net ] = $html;
		}
		
		return $networks;
	}

    private function getSocialNetworkShareLink($net, $image) {
        switch ($net) {
            case 'facebook':
                if (wp_is_mobile()) {
                    $link = 'window.open(\'http://m.facebook.com/sharer.php?u=' . urlencode(get_permalink()) . '\');';
                } else {
                    $link = 'window.open(\'http://www.facebook.com/sharer.php?u=' . urlencode(get_permalink()) . '\', \'sharer\', \'toolbar=0,status=0,width=620,height=280\');';
                }
                break;
            case 'twitter':
                $count_char = (isset($_SERVER['https'])) ? 23 : 22;
                $twitter_via = (brunn_select_options()->getOptionValue('twitter_via') !== '') ? ' via ' . brunn_select_options()->getOptionValue('twitter_via') . ' ' : '';
				$link =  'window.open(\'https://twitter.com/intent/tweet?text=' . urlencode( brunn_select_the_excerpt_max_charlength( $count_char ) . $twitter_via ) . ' ' . get_permalink() . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');';

				break;
			case 'google_plus':
				$link = 'popUp=window.open(\'https://plus.google.com/share?url=' . urlencode(get_permalink()) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;';
				break;
			case 'linkedin':
				$link = 'popUp=window.open(\'http://linkedin.com/shareArticle?mini=true&amp;url=' . urlencode(get_permalink()) . '&amp;title=' . urlencode(get_the_title()) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;';
				break;
			case 'tumblr':
				$link = 'popUp=window.open(\'http://www.tumblr.com/share/link?url=' . urlencode(get_permalink()) . '&amp;name=' . urlencode(get_the_title()) . '&amp;description=' . urlencode(get_the_excerpt()) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;';
				break;
			case 'pinterest':
				$link = 'popUp=window.open(\'http://pinterest.com/pin/create/button/?url=' . urlencode(get_permalink()) . '&amp;description=' . urlencode(get_the_title()) . '&amp;media=' . urlencode($image[0]) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;';
				break;
			case 'vk':
				$link = 'popUp=window.open(\'http://vkontakte.ru/share.php?url=' . urlencode(get_permalink()) . '&amp;title=' . urlencode(get_the_title()) . '&amp;description=' . urlencode(get_the_excerpt()) . '&amp;image=' . urlencode($image[0]) . '\', \'popupwindow\', \'scrollbars=yes,width=800,height=400\');popUp.focus();return false;';
				break;
			default:
				$link = '';
        }

        return $link;
    }

	private function getSocialNetworkIcon( $net, $type ) {
		switch ( $net ) {
			case 'facebook':
				$icon = ( $type == 'font-elegant' ) ? 'social_facebook' : 'fab fa-facebook';
				break;
			case 'twitter':
				$icon = ( $type == 'font-elegant' ) ? 'social_twitter' : 'fab fa-twitter';
				break;
			case 'google_plus':
				$icon = ( $type == 'font-elegant' ) ? 'social_googleplus' : 'fab fa-google-plus';
				break;
			case 'linkedin':
				$icon = ( $type == 'font-elegant' ) ? 'social_linkedin' : 'fab fa-linkedin';
				break;
			case 'tumblr':
				$icon = ( $type == 'font-elegant' ) ? 'social_tumblr' : 'fab fa-tumblr';
				break;
			case 'pinterest':
				$icon = ( $type == 'font-elegant' ) ? 'social_pinterest' : 'fab fa-pinterest';
				break;
			case 'vk':
				$icon = 'fab fa-vk';
				break;
			default:
				$icon = '';
		}
		
		return $icon;
	}

	private function getSocialNetworkText( $net ) {
		switch ( $net ) {
			case 'facebook':
				$text = esc_html__( 'fb', 'brunn-core');
				break;
			case 'twitter':
				$text = esc_html__( 'tw', 'brunn-core');
				break;
			case 'google_plus':
				$text = esc_html__( 'g+', 'brunn-core');
				break;
			case 'linkedin':
				$text = esc_html__( 'lnkd', 'brunn-core');
				break;
			case 'tumblr':
				$text = esc_html__( 'tmb', 'brunn-core');
				break;
			case 'pinterest':
				$text = esc_html__( 'pin', 'brunn-core');
				break;
			case 'vk':
				$text = esc_html__( 'vk', 'brunn-core');
				break;
			default:
				$text = '';
		}
		
		return $text;
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BrunnCoreElementorSocialShare() );