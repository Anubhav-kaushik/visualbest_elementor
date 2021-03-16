<div class="qodef-single-image-holder <?php echo esc_attr($holder_classes); ?>">
    <div class="qodef-si-inner" <?php echo brunn_select_get_inline_style($holder_styles); ?>>
        <?php if ($image_behavior === 'lightbox') { ?>
            <a itemprop="image" href="<?php echo esc_url($image['url']); ?>" data-rel="prettyPhoto[si_pretty_photo]" title="<?php echo esc_attr($image['alt']); ?>">
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
	<?php if ($enable_text_box === 'yes') { ?>
        <div class="qodef-si-text-box">
            <div class="qodef-si-text-box-inner">
            <?php if(!empty($small_text)) { ?>
                <p class="qodef-si-small-text"><?php echo esc_html($small_text); ?></p>
            <?php } ?>
	        <?php if(!empty($big_text)) { ?>
                <p class="qodef-si-big-text"><?php echo esc_html($big_text); ?></p>
	        <?php } ?>

            </div>
        </div>
    <?php } ?>
</div>