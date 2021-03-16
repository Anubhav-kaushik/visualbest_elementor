<article class="qodef-item-space <?php echo esc_attr($item_classes) ?>">
	<div class="qodef-mg-content">
		<?php if (has_post_thumbnail()) { ?>
			<div class="qodef-mg-image">
				<?php the_post_thumbnail(); ?>
			</div>
		<?php } ?>
		<div class="qodef-mg-item-outer">
			<div class="qodef-mg-item-inner">
				<div class="qodef-mg-item-content">
					<?php if(!empty($item_image)) { ?>
						<img itemprop="image" class="qodef-mg-item-icon" src="<?php echo esc_url($item_image['url'])?>" alt="<?php echo esc_attr($item_image['alt']); ?>" />
					<?php } ?>
					<?php if (!empty($item_title)) { ?>
						<<?php echo esc_attr($item_title_tag); ?> itemprop="name" class="qodef-mg-item-title entry-title"><?php echo esc_html($item_title); ?></<?php echo esc_attr($item_title_tag); ?>>
					<?php } ?>
					<?php if (!empty($item_text)) { ?>
						<p class="qodef-mg-item-text"><?php echo esc_html($item_text); ?></p>
					<?php } ?>
				</div>
				<?php if (!empty($item_link)) { ?>
					<a itemprop="url" href="<?php echo esc_url($item_link); ?>" target="<?php echo esc_attr($item_link_target); ?>" class="qodef-mg-item-link"></a>
				<?php } ?>
			</div>
		</div>
	</div>
</article>
