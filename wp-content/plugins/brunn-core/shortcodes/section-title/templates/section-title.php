<div class="qodef-section-title-holder <?php echo esc_attr($holder_classes); ?>" <?php echo brunn_select_get_inline_style($holder_styles); ?>>
	<div class="qodef-st-inner">
		<?php 
        if(!empty($label)) { ?>
            <div class="qodef-label" <?php echo brunn_select_get_inline_style($label_styles) ?>>
                <span class="qodef-label-line" <?php echo brunn_select_get_inline_style($label_line_styles) ?>></span>
                <span class="qodef-label-text" <?php echo brunn_select_get_inline_style($label_text_styles) ?>><?php echo esc_attr($label); ?></span>
            </div>
        <?php }
        
		if(!empty($title)) { ?>
			<<?php echo esc_attr($title_tag); ?> class="qodef-st-title" <?php echo brunn_select_get_inline_style($title_styles); ?>>
				<?php echo wp_kses($title, array('br' => true, 'span' => array('class' => true))); ?>
			</<?php echo esc_attr($title_tag); ?>>
		<?php } ?>
        <?php if(!empty($background_text)) { ?>
            <span class="qodef-st-background-text" <?php echo brunn_select_get_inline_style($background_text_styles); ?>>
                <?php echo esc_html($background_text); ?>
            </span>
        <?php } ?>
		<?php if(!empty($text)) { ?>
			<<?php echo esc_attr($text_tag); ?> class="qodef-st-text" <?php echo brunn_select_get_inline_style($text_styles); ?>>
				<?php echo wp_kses($text, array('br' => true)); ?>
			</<?php echo esc_attr($text_tag); ?>>
		<?php } ?>
	</div>
</div>