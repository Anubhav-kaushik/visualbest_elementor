<div class="qodef-grid-row">
	<?php $show_title_area_meta = brunn_select_get_meta_field_intersect( 'show_title_area_portfolio_single' );
	if ($show_title_area_meta === 'no'){ ?>
		<div class="qodef-grid-col-12">
			<h2 class="qodef-ps-main-title"><?php echo esc_attr(get_the_title()); ?></h2>
		</div>
	<?php } ?>
	<div class="qodef-grid-col-9">
		<?php
		brunn_core_get_cpt_single_module_template_part('templates/single/parts/title', 'portfolio', $item_layout);

        brunn_core_get_cpt_single_module_template_part('templates/single/parts/content', 'portfolio', $item_layout); ?>
	</div>
	<div class="qodef-grid-col-3">
		<div class="qodef-ps-info-holder">
			<?php
			//get portfolio custom fields section
			brunn_core_get_cpt_single_module_template_part('templates/single/parts/custom-fields', 'portfolio', $item_layout);

			//get portfolio categories section
			brunn_core_get_cpt_single_module_template_part('templates/single/parts/categories', 'portfolio', $item_layout);

			//get portfolio date section
			brunn_core_get_cpt_single_module_template_part('templates/single/parts/date', 'portfolio', $item_layout);

			//get portfolio tags section
			brunn_core_get_cpt_single_module_template_part('templates/single/parts/tags', 'portfolio', $item_layout);

			//get portfolio share section
			brunn_core_get_cpt_single_module_template_part('templates/single/parts/social', 'portfolio', $item_layout);
			?>
		</div>
	</div>
</div>
<div class="qodef-ps-image-holder">
	<div class="qodef-ps-image-inner qodef-owl-slider">
		<?php
		$media = brunn_core_get_portfolio_single_media();
		
		if(is_array($media) && count($media)) : ?>
			<?php foreach($media as $single_media) : ?>
				<div class="qodef-ps-image">
					<?php brunn_core_get_portfolio_single_media_html($single_media); ?>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>