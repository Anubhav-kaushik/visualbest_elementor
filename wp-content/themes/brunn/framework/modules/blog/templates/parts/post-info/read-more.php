<?php if ( ! brunn_select_post_has_read_more() && ! post_password_required() ) { ?>
	<div class="qodef-post-read-more-button">
		<?php
			$button_params = array(
				'type'         => 'simple',
				'link'         => get_the_permalink(),
				'text'         => esc_html__( 'Read More', 'brunn' ),
				'custom_class' => 'qodef-blog-list-button',
				'icon_pack'	   => 'font_elegant',
				'fe_icon'	   => 'arrow_right'
			);
			
			echo brunn_select_return_button_html( $button_params );
		?>
	</div>
<?php } ?>