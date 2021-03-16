<?php if(comments_open()) { ?>
	<div class="qodef-post-info-comments-holder">
		<a itemprop="url" class="qodef-post-info-comments" href="<?php comments_link(); ?>">
			<i class="icon_comment_alt" aria-hidden="true"></i>
			<?php comments_number('0 ' . esc_html__('Comments','brunn'), '1 '.esc_html__('Comment','brunn'), '% '.esc_html__('Comments','brunn') ); ?>
		</a>
	</div>
<?php } ?>