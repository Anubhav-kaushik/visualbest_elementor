<div class="qodef-grid-row">
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
	<div class="qodef-ps-image-inner">
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