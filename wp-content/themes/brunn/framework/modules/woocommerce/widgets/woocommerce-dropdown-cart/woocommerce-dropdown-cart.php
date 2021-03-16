<?php

if ( class_exists( 'BrunnSelectClassWidget' ) ) {
	class BrunnSelectClassWoocommerceDropdownCart extends BrunnSelectClassWidget {
		public function __construct() {
			parent::__construct(
				'qodef_woocommerce_dropdown_cart',
				esc_html__( 'Brunn Woocommerce Dropdown Cart', 'brunn' ),
				array( 'description' => esc_html__( 'Display a shop cart icon with a dropdown that shows products that are in the cart', 'brunn' ), )
			);

			$this->setParams();
		}

		protected function setParams() {
			$this->params = array(
				array(
					'type'        => 'textfield',
					'name'        => 'woocommerce_dropdown_cart_margin',
					'title'       => esc_html__( 'Icon Margin', 'brunn' ),
					'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'brunn' )
				)
			);
		}

		public function widget( $args, $instance ) {
			extract( $args );

			global $woocommerce;

			$icon_styles = array();

			if ( $instance['woocommerce_dropdown_cart_margin'] !== '' ) {
				$icon_styles[] = 'margin: ' . $instance['woocommerce_dropdown_cart_margin'];
			}

			$cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0;

			$dropdown_cart_icon_class = brunn_select_get_dropdown_cart_icon_class();
			?>
            <div class="qodef-shopping-cart-holder" <?php brunn_select_inline_style( $icon_styles ) ?>>
                <div class="qodef-shopping-cart-inner">
                    <a itemprop="url" <?php brunn_select_class_attribute( $dropdown_cart_icon_class ); ?> href="<?php echo esc_url( wc_get_cart_url() ); ?>">
                        <span class="qodef-cart-icon"><?php echo brunn_select_get_icon_sources_html( 'dropdown_cart', false, array( 'dropdown_cart' => 'yes' ) ); ?></span>
                        <span class="qodef-cart-number"><?php echo sprintf( _n( '%d', '%d', WC()->cart->cart_contents_count, 'brunn' ), WC()->cart->cart_contents_count ); ?></span>
                    </a>
                    <div class="qodef-shopping-cart-dropdown">
                        <ul>
							<?php if ( ! $cart_is_empty ) : ?>
								<?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :
									$_product = $cart_item['data'];
									// Only display if allowed
									if ( ! $_product->exists() || $cart_item['quantity'] == 0 ) {
										continue;
									}
									// Get price
									$product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? wc_get_price_excluding_tax( $_product ) : wc_get_price_including_tax( $_product );
									?>
                                    <li>
                                        <div class="qodef-item-image-holder">
                                            <a itemprop="url" href="<?php echo esc_url( get_permalink( $cart_item['product_id'] ) ); ?>">
												<?php echo wp_kses( $_product->get_image(), array(
													'img' => array(
														'src'    => true,
														'width'  => true,
														'height' => true,
														'class'  => true,
														'alt'    => true,
														'title'  => true,
														'id'     => true
													)
												) ); ?>
                                            </a>
                                        </div>
                                        <div class="qodef-item-info-holder">
                                            <h4 itemprop="name" class="qodef-product-title">
                                                <a itemprop="url" href="<?php echo esc_url( get_permalink( $cart_item['product_id'] ) ); ?>"><?php echo apply_filters( 'brunn_select_woo_widget_cart_product_title', $_product->get_name(), $_product ); ?></a>
                                            </h4>
											<?php if ( apply_filters( 'brunn_select_woo_cart_enable_quantity', true ) ) { ?>
                                                <span class="qodef-quantity"><?php echo esc_html( $cart_item['quantity'] );
													esc_html_e( 'x ', 'brunn' );
													echo apply_filters( 'brunn_select_woo_cart_item_price_html', wc_price( $product_price ), $cart_item, $cart_item_key ); ?></span>
											<?php } ?>
											<?php echo apply_filters( 'brunn_select_woo_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s"><span class="icon-arrows-remove"></span></a>', esc_url( wc_get_cart_remove_url( $cart_item_key ) ), esc_attr__( 'Remove this item', 'brunn' ) ), $cart_item_key ); ?>
                                        </div>
                                    </li>
								<?php endforeach; ?>
                                <li class="qodef-cart-bottom">
                                    <div class="qodef-subtotal-holder clearfix">
                                        <span class="qodef-total"><?php esc_html_e( 'Total:', 'brunn' ); ?></span>
                                        <span class="qodef-total-amount">
										<?php echo wp_kses( $woocommerce->cart->get_cart_subtotal(), array(
											'span' => array(
												'class' => true,
												'id'    => true
											)
										) ); ?>
									</span>
                                    </div>
                                    <div class="qodef-btn-holder clearfix">
                                        <a itemprop="url" href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="qodef-view-cart"><?php esc_html_e( 'Shopping Bag', 'brunn' ); ?></a>
                                        <a itemprop="url" href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="qodef-view-checkout"><?php esc_html_e( 'Checkout', 'brunn' ); ?></a>
                                    </div>
                                </li>
							<?php else : ?>
                                <li class="qodef-empty-cart"><?php esc_html_e( 'No products in the cart.', 'brunn' ); ?></li>
							<?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
			<?php
		}
	}

	add_filter( 'woocommerce_add_to_cart_fragments', 'brunn_select_woocommerce_header_add_to_cart_fragment' );

	function brunn_select_woocommerce_header_add_to_cart_fragment( $fragments ) {
		global $woocommerce;

		ob_start();

		$cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0;

		$dropdown_cart_icon_class = brunn_select_get_dropdown_cart_icon_class();

		?>
        <div class="qodef-shopping-cart-inner">
            <a itemprop="url" <?php brunn_select_class_attribute( $dropdown_cart_icon_class ); ?> href="<?php echo esc_url( wc_get_cart_url() ); ?>">
                <span class="qodef-cart-icon"><?php echo brunn_select_get_icon_sources_html( 'dropdown_cart', false, array( 'dropdown_cart' => 'yes' ) ); ?></span>
                <span class="qodef-cart-number"><?php echo sprintf( _n( '%d', '%d', WC()->cart->cart_contents_count, 'brunn' ), WC()->cart->cart_contents_count ); ?></span>
            </a>
            <div class="qodef-shopping-cart-dropdown">
                <ul>
					<?php if ( ! $cart_is_empty ) : ?>
						<?php foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $cart_item ) :
							$_product = $cart_item['data'];
							// Only display if allowed
							if ( ! $_product->exists() || $cart_item['quantity'] == 0 ) {
								continue;
							}
							// Get price
							$product_price = get_option( 'woocommerce_tax_display_cart' ) == 'excl' ? wc_get_price_excluding_tax( $_product ) : wc_get_price_including_tax( $_product );
							?>
                            <li>
                                <div class="qodef-item-image-holder">
                                    <a itemprop="url" href="<?php echo esc_url( get_permalink( $cart_item['product_id'] ) ); ?>">
										<?php echo wp_kses( $_product->get_image(), array(
											'img' => array(
												'src'    => true,
												'width'  => true,
												'height' => true,
												'class'  => true,
												'alt'    => true,
												'title'  => true,
												'id'     => true
											)
										) ); ?>
                                    </a>
                                </div>
                                <div class="qodef-item-info-holder">
                                    <h4 itemprop="name" class="qodef-product-title">
                                        <a itemprop="url" href="<?php echo esc_url( get_permalink( $cart_item['product_id'] ) ); ?>"><?php echo apply_filters( 'brunn_select_woo_widget_cart_product_title', $_product->get_name(), $_product ); ?></a>
                                    </h4>
									<?php if ( apply_filters( 'brunn_select_woo_cart_enable_quantity', true ) ) { ?>
                                        <span class="qodef-quantity"><?php echo esc_html( $cart_item['quantity'] );
											esc_html_e( 'x ', 'brunn' );
											echo apply_filters( 'brunn_select_woo_cart_item_price_html', wc_price( $product_price ), $cart_item, $cart_item_key ); ?></span>
									<?php } ?>
									<?php echo apply_filters( 'brunn_select_woo_cart_item_remove_link', sprintf( '<a href="%s" class="remove" title="%s"><span class="icon-arrows-remove"></span></a>', esc_url( wc_get_cart_remove_url( $cart_item_key ) ), esc_attr__( 'Remove this item', 'brunn' ) ), $cart_item_key ); ?>
                                </div>
                            </li>
						<?php endforeach; ?>
                        <li class="qodef-cart-bottom">
                            <div class="qodef-subtotal-holder clearfix">
                                <span class="qodef-total"><?php esc_html_e( 'Total:', 'brunn' ); ?></span>
                                <span class="qodef-total-amount">
								<?php echo wp_kses( $woocommerce->cart->get_cart_subtotal(), array(
									'span' => array(
										'class' => true,
										'id'    => true
									)
								) ); ?>
							</span>
                            </div>
                            <div class="qodef-btn-holder clearfix">
                                <a itemprop="url" href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="qodef-view-cart"><?php esc_html_e( 'Shopping Bag', 'brunn' ); ?></a>
                                <a itemprop="url" href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="qodef-view-checkout"><?php esc_html_e( 'Checkout', 'brunn' ); ?></a>
                            </div>
                        </li>
					<?php else : ?>
                        <li class="qodef-empty-cart"><?php esc_html_e( 'No products in the cart.', 'brunn' ); ?></li>
					<?php endif; ?>
                </ul>
            </div>
        </div>

		<?php
		$fragments['div.qodef-shopping-cart-inner'] = ob_get_clean();

		return $fragments;
	}
}

?>