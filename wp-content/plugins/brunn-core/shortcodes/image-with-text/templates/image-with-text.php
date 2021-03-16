<div class="qodef-image-with-text-holder <?php echo esc_attr($holder_classes); ?>">
    <div class="qodef-iwt-image">
        <?php if ($image_behavior === 'lightbox') { ?>
            <a itemprop="image" href="<?php echo esc_url($image['url']); ?>" data-rel="prettyPhoto[iwt_pretty_photo]" title="<?php echo esc_attr($image['alt']); ?>">
        <?php } else if ($image_behavior === 'custom-link' && !empty($custom_link)) { ?>
	            <a itemprop="url" href="<?php echo esc_url($custom_link); ?>" target="<?php echo esc_attr($custom_link_target); ?>">
        <?php } ?>
            <?php if(is_array($image_size) && count($image_size)) : ?>
                <?php echo brunn_select_generate_thumbnail($image['image_id'], null, $image_size[0], $image_size[1]); ?>
            <?php else: ?>
                <?php echo wp_get_attachment_image($image['image_id'], $image_size); ?>
            <?php endif; ?>
        <?php if ($image_behavior === 'lightbox' || $image_behavior === 'custom-link') { ?>
            </a>
        <?php } ?>
    </div>
    <div class="qodef-iwt-text-holder" <?php echo brunn_select_get_inline_style($holder_styles); ?>>
	    <?php if(!empty($background_text)) { ?>
            <span class="qodef-iwt-background-text" <?php echo brunn_select_get_inline_style($background_text_styles); ?>><?php echo esc_html($background_text); ?></span>
	    <?php } ?>
        <?php if(!empty($title)) { ?>
            <a itemprop="url" href="<?php echo esc_url($custom_link); ?>" target="<?php echo esc_attr($custom_link_target); ?>">
                <<?php echo esc_attr($title_tag); ?> class="qodef-iwt-title" <?php echo brunn_select_get_inline_style($title_styles); ?>><?php echo esc_html($title); ?></<?php echo esc_attr($title_tag); ?>>
            </a>
        <?php } ?>
		<?php if(!empty($text)) { ?>
            <p class="qodef-iwt-text" <?php echo brunn_select_get_inline_style($text_styles); ?>><?php echo esc_html($text); ?></p>
        <?php } ?>
		<?php if(!empty($bottom_buttons) && $bottom_buttons == 'yes') { ?>
            <p class="qodef-iwt-bottom-buttons-holder">
				<?php if( ! empty( $bottom_button_one_link ) ) { ?>
                    <a class="qodef-iwt-bottom-link qodef-iwt-first-link" itemprop="url" href="<?php echo esc_url($bottom_button_one_link); ?>" target="_blank">
						<?php if( ! empty( $bottom_button_one_label ) ) { ?>
							<?php echo esc_html($bottom_button_one_label); ?>
						<?php } ?>
                    </a>
				<?php } ?>

				<?php if( ! empty( $bottom_button_two_link ) ) { ?>
                    <a class="qodef-iwt-bottom-link qodef-iwt-second-link" itemprop="url" href="<?php echo esc_url($bottom_button_two_link); ?>" target="_blank">
						<?php if( ! empty( $bottom_button_two_label ) ) { ?>
							<?php echo esc_html($bottom_button_two_label); ?>
						<?php } ?>
                    </a>
				<?php } ?>
            </p>
		<?php } ?>
    </div>
</div>