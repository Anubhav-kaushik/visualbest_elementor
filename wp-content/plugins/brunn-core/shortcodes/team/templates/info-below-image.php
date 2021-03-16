<div class="qodef-team-holder <?php echo esc_attr($holder_classes); ?>">
	<div class="qodef-team-inner">
		<?php if ($team_image !== '') { ?>
			<div class="qodef-team-image">
                <?php echo wp_get_attachment_image($team_image, 'full'); ?>
				<?php if (!empty($team_social_icons)) { ?>
                    <div class="qodef-team-social-holder">
						<?php foreach( $team_social_icons as $team_social_icon ) { ?>
                            <span class="qodef-team-icon"><?php echo wp_kses_post($team_social_icon); ?></span>
						<?php } ?>
                    </div>
				<?php } ?>
			</div>
		<?php } ?>
		<div class="qodef-team-info" <?php brunn_select_inline_style($team_text_holder_styles) ?>>
			<?php if ($team_name !== '') { ?>
				<<?php echo esc_attr($team_name_tag); ?> class="qodef-team-name" <?php echo brunn_select_get_inline_style($team_name_styles); ?>><?php echo esc_html($team_name); ?></<?php echo esc_attr($team_name_tag); ?>>
			<?php } ?>
			<?php if ($team_position !== "") { ?>
				<h5 class="qodef-team-position" <?php echo brunn_select_get_inline_style($team_position_styles); ?>><?php echo esc_html($team_position); ?></h5>
			<?php } ?>
			<?php if ($team_text !== "") { ?>
				<p class="qodef-team-text" <?php echo brunn_select_get_inline_style($team_text_styles); ?>><?php echo esc_html($team_text); ?></p>
			<?php } ?>

		</div>
	</div>
</div>