<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="qodef-post-content">
        <div class="qodef-post-text">
            <div class="qodef-post-text-inner">
				<div class="qodef-post-info-top">
					<span class="qodef-label-line"></span>
					<?php brunn_select_get_module_template_part('templates/parts/post-info/author', 'blog', '', $part_params); ?>
				</div>
                <div class="qodef-post-text-main">
                    <?php brunn_select_get_module_template_part('templates/parts/post-type/link', 'blog', '', $part_params); ?>
                </div>
            </div>
        </div>
    </div>
</article>