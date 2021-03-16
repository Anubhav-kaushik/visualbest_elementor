<div class="qodef-divided-holder <?php echo esc_attr($holder_classes)?>" <?php brunn_select_inline_style($holder_style); ?> >
	<div class="qodef-divided-image-holder">
		<div class="qodef-divided-image" <?php brunn_select_inline_style($image_style) ?> <?php echo brunn_select_get_inline_attrs($image_data); ?>>
			<?php if ($image_behavior === 'lightbox') { ?>
				<a itemprop="image" href="<?php echo esc_url($image['url']); ?>" data-rel="prettyPhoto[divided_pretty_photo]" title="<?php echo esc_attr($image['alt']); ?>">
			<?php } else if ($image_behavior === 'custom-link' && !empty($custom_link)) { ?>
				<a itemprop="url" href="<?php echo esc_url($custom_link); ?>" target="<?php echo esc_attr($custom_link_target); ?>">
			<?php } ?>

			<?php if(is_array($image_size) && count($image_size)) { ?>
				<?php echo brunn_select_generate_thumbnail($image['image_id'], null, $image_size[0], $image_size[1]); ?>
			<?php } else { ?>
				<?php echo wp_get_attachment_image($image['image_id'], $image_size); ?>
			<?php } ?>

			<?php if ($image_behavior === 'lightbox' || $image_behavior === 'custom-link') { ?>
				</a>
			<?php } ?>
		</div>
	</div>
	<div class="qodef-divided-inner" <?php brunn_select_inline_style($content_style) ?>>
		<?php echo do_shortcode( $content ) ?>
	</div>
</div>