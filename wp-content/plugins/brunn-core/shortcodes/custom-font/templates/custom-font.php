<<?php echo esc_attr( $title_tag ); ?> class="qodef-custom-font-holder <?php echo esc_attr( $holder_classes ); ?>" <?php brunn_select_inline_style( $holder_styles ); ?> <?php echo brunn_select_get_inline_attrs( $holder_data ); ?>>
    <?php if(!empty($link)) : ?>
        <a class="qodef-custom-font-holder-link" itemprop="url" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>">
    <?php endif; ?>

        <?php echo wp_kses_post( $title ); ?>

    <?php if(!empty($link)) : ?>
        </a>
    <?php endif; ?>
</<?php echo esc_attr( $title_tag ); ?>>