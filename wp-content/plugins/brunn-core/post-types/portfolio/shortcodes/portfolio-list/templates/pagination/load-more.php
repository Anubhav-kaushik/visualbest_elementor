<?php if($query_results->max_num_pages > 1) {
	$holder_styles = $this_object->getLoadMoreStyles($params);
	?>
	<div class="qodef-pl-loading">
		<div class="qodef-brunn-spinner-holder">
			<div class="qodef-brunn-spinner">
				<div></div>
			</div>
		</div>
	</div>
	<div class="qodef-pl-load-more-holder">
		<div class="qodef-pl-load-more" <?php brunn_select_inline_style($holder_styles); ?>>
			<?php 
				echo brunn_select_get_button_html(array(
                    'custom_class' => 'qodef-btn-after-next',
					'link' => 'javascript: void(0)',
					'size' => 'large',
                    'type' => 'outline',
					'text' => esc_html__('LOAD MORE', 'brunn-core')
				));
			?>
		</div>
	</div>
<?php }