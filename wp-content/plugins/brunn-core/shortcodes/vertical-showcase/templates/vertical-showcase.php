<div class="qodef-vertical-showcase qodef-vs-ready-animation <?php echo esc_attr( $holder_classes ); ?>">
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
				<?php if ( $enable_app_store_link == "yes" ) { ?>
                    <a itemprop="url" class="qodef-vs-item-app-store-link" href="<?php echo esc_url( $app_store_link ); ?>" target="_blank">
                        <img src="../wp-content/plugins/brunn-core/assets/img/logo-app-store.png" alt="<?php esc_attr_e( 'Apple store logo', 'brunn-core' ); ?>">
                    </a>
				<?php } ?>
				<?php if ( $enable_play_store_link == "yes" ) { ?>
                    <a itemprop="url" class="qodef-vs-item-play-store-link" href="<?php echo esc_url( $play_store_link ); ?>" target="_blank">
                        <img src="../wp-content/plugins/brunn-core/assets/img/logo-play-store.png" alt="<?php esc_attr_e( 'Play store logo', 'brunn-core' ); ?>">
                    </a>
				<?php } ?>
            </div>
        </div>
        <div class="swiper-container">
            <div class="swiper-wrapper">
				<?php if ( ! empty( $link_items ) ) { ?>
					<?php foreach ( $link_items as $link_item ): ?>
                        <div class="swiper-slide">
                            <div class="qodef-vs-item">
								<?php if ( isset( $link_item['image'] ) ) { ?>
									<?php echo wp_get_attachment_image( $link_item['image'], 'full' ); ?>
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
								<?php if ( ! empty( $contact_form_title ) ) { ?>
                                    <div class="qodef-vs-contact-form-title">
                                        <h1><?php echo esc_html( $contact_form_title ); ?></h1>
                                    </div>
								<?php } ?>
								<?php if ( ! empty( $contact_form_subtitle ) ) { ?>
                                    <div class="qodef-vs-contact-form-subtitle">
                                        <p><?php echo esc_html( $contact_form_subtitle ); ?></p>
                                    </div>
								<?php } ?>
                            </div>
							<?php if ( ! empty( $contact_form ) ) {
								echo do_shortcode( '[contact-form-7 id="' . esc_attr( $contact_form ) . '"]' );
							} ?>
                            <div class="qodef-vs-social-widget">
                                <div class="qodef-vs-social-widget-label">
                                    <p><?php esc_html_e( 'Share The Love', 'brunn-core' ); ?></p></div>
								<?php if ( ! empty( $widget_area ) && is_active_sidebar( $widget_area ) ) : ?>
                                    <div class="qodef-vs-widget-area">
										<?php dynamic_sidebar( $widget_area ); ?>
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
