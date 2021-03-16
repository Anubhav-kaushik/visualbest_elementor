<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="qodef-post-content">
        <div class="qodef-post-heading">
            <?php brunn_select_get_module_template_part('templates/parts/media', 'blog', $post_format, $part_params); ?>
            <?php
            if(brunn_select_options()->getOptionValue('show_predefined_blog_date') === 'yes') {
	            brunn_select_get_module_template_part( 'templates/parts/post-info/date-predefined', 'blog', '', $part_params );
            }
            ?>
        </div>
        <div class="qodef-post-text">
            <div class="qodef-post-text-inner">
                <div class="qodef-post-info-top">
					<span class="qodef-label-line"></span>
	                <?php
	                if(brunn_select_options()->getOptionValue('show_predefined_blog_date') === 'no') {
		                brunn_select_get_module_template_part( 'templates/parts/post-info/date', 'blog', '', $part_params );
	                }
	                ?>
					<?php brunn_select_get_module_template_part('templates/parts/post-info/author', 'blog', '', $part_params); ?>
                    <?php brunn_select_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
                </div>
                <div class="qodef-post-text-main">
                    <?php brunn_select_get_module_template_part('templates/parts/title', 'blog', '', $part_params); ?>
                    <?php brunn_select_get_module_template_part('templates/parts/excerpt', 'blog', '', $part_params); ?>
                    <?php do_action('brunn_select_action_single_link_pages'); ?>
                </div>
				<div class="qodef-post-info-bottom clearfix">
					<div class="qodef-post-info-bottom-left">
						<?php brunn_select_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $part_params); ?>
						<?php brunn_select_get_module_template_part('templates/parts/post-info/like', 'blog', '', $part_params); ?>
                        <?php brunn_select_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params); ?>
                    </div>
					<div class="qodef-post-info-bottom-right">
						<?php brunn_select_get_module_template_part('templates/parts/post-info/share', 'blog', '', $part_params); ?>
					</div>
				</div>
            </div>
        </div>
    </div>
</article>