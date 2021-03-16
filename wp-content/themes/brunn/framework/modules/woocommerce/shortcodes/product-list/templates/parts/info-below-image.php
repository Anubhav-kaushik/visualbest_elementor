<?php
$item_classes           = $this_object->getItemClasses( $params );
$shader_styles          = $this_object->getShaderStyles( $params );
$text_wrapper_styles    = $this_object->getTextWrapperStyles( $params );
$params['title_styles'] = $this_object->getTitleStyles( $params );
?>
<div class="qodef-pli qodef-item-space <?php echo esc_attr( $item_classes ); ?>">
	<div class="qodef-pli-inner">
		<div class="qodef-pli-image">
			<?php brunn_select_get_module_template_part( 'templates/parts/image', 'woocommerce', '', $params ); ?>
		</div>
		<a class="qodef-pli-link" itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>
	</div>
	<div class="qodef-pli-text-wrapper" <?php echo brunn_select_get_inline_style( $text_wrapper_styles ); ?>>

		<div class="clearfix">
		<?php brunn_select_get_module_template_part( 'templates/parts/title', 'woocommerce', '', $params ); ?>

		<?php brunn_select_get_module_template_part( 'templates/parts/price', 'woocommerce', '', $params ); ?>
		</div>
		
		<?php brunn_select_get_module_template_part( 'templates/parts/category', 'woocommerce', '', $params ); ?>
		
		<?php brunn_select_get_module_template_part( 'templates/parts/excerpt', 'woocommerce', '', $params ); ?>
		
		<?php brunn_select_get_module_template_part( 'templates/parts/rating', 'woocommerce', '', $params ); ?>

		<?php brunn_select_get_module_template_part( 'templates/parts/add-to-cart', 'woocommerce', '', $params ); ?>
	</div>
</div>