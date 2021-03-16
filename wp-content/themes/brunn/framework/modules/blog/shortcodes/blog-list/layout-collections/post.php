<?php
$has_featured = ! empty( $image_meta ) || has_post_thumbnail() ? 'qodef-post-has-media' : 'qodef-post-no-media';
?>

<li class="qodef-bl-item qodef-item-space">
    <div class="qodef-post-content <?php echo esc_attr( $has_featured ); ?>">
        <div class="qodef-post-heading">
			<?php
			if ( $post_info_image == 'yes' ) {
				brunn_select_get_module_template_part( 'templates/parts/media', 'blog', '', $params );
			}
			if ( $post_info_date == 'yes' ) {
				brunn_select_get_module_template_part( 'templates/parts/post-info/date-predefined', 'blog', '', $params );
			}
			?>
        </div>


        <div class="qodef-post-text">
            <div class="qodef-post-text-inner">
                <div class="qodef-post-info-top">
                    <span class="qodef-label-line"></span>
					<?php
					if ( $post_info_author == 'yes' ) {
						brunn_select_get_module_template_part( 'templates/parts/post-info/author', 'blog', '', $params );
					}
					if ( $post_info_category == 'yes' ) {
						brunn_select_get_module_template_part( 'templates/parts/post-info/category', 'blog', '', $params );
					}
					?>
                </div>

                <div class="qodef-post-text-main">
					<?php brunn_select_get_module_template_part( 'templates/parts/title', 'blog', '', $params ); ?>
                </div>

				<?php if ( $post_info_section == 'yes' ) { ?>
                    <div class="qodef-post-info-bottom clearfix">
                        <div class="qodef-post-info-bottom-left">
							<?php
							if ( $post_info_comments == 'yes' ) {
								brunn_select_get_module_template_part( 'templates/parts/post-info/comments', 'blog', '', $params );
							}
							if ( $post_info_like == 'yes' ) {
								brunn_select_get_module_template_part( 'templates/parts/post-info/like', 'blog', '', $params );
							}
							brunn_select_get_module_template_part( 'templates/parts/post-info/read-more', 'blog', '', $params );
							?>
                        </div>
                        <div class="qodef-post-info-bottom-right">
							<?php
							if ( $post_info_share == 'yes' ) {
								brunn_select_get_module_template_part( 'templates/parts/post-info/share', 'blog', '', $params );
							}
							?>
                        </div>
                    </div>
				<?php } ?>
            </div>
        </div>
    </div>
</li>