<?php
$show_related = brunn_select_options()->getOptionValue('blog_single_related_posts') == 'yes' ? true : false;
$related_post_number = brunn_select_sidebar_layout() === 'no-sidebar' ? 4 : 3;
$related_posts_options = array(
    'posts_per_page' => $related_post_number
);
$related_posts = brunn_select_get_blog_related_post_type(get_the_ID(), $related_posts_options);
$related_posts_image_size = isset($related_posts_image_size) ? $related_posts_image_size : 'full';
?>
<?php if($show_related) { ?>
    <div class="qodef-related-posts-holder clearfix">
        <div class="qodef-related-posts-holder-inner">
            <?php if ( $related_posts && $related_posts->have_posts() ) : ?>
                <div class="qodef-related-posts-title">
                    <h2><?php esc_html_e('Related Posts', 'brunn' ); ?></h2>
                </div>
                <div class="qodef-related-posts-inner clearfix">
                    <?php while ( $related_posts->have_posts() ) : $related_posts->the_post(); ?>
                        <div class="qodef-related-post">
                            <div class="qodef-related-post-inner">
			                    <?php if (has_post_thumbnail()) { ?>
                                <div class="qodef-related-post-image">
                                    <a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                         <?php the_post_thumbnail($related_posts_image_size); ?>
                                    </a>
	                                <?php
	                                if(brunn_select_options()->getOptionValue('show_predefined_blog_date') === 'yes') {
		                                brunn_select_get_module_template_part( 'templates/parts/post-info/date-predefined', 'blog', '', $params );
	                                }
	                                ?>
                                </div>
			                    <?php }	?>
								<div class="qodef-post-text">
									<div class="qodef-post-text-inner">
										<div class="qodef-post-info-top">
											<span class="qodef-label-line"></span>
											<?php brunn_select_get_module_template_part('templates/parts/post-info/author', 'blog', '', $params); ?>
											<?php
											if(brunn_select_options()->getOptionValue('show_predefined_blog_date') === 'no') {
												brunn_select_get_module_template_part( 'templates/parts/post-info/date', 'blog', '', $params );
											}
											?>
										</div>
										<div class="qodef-post-text-main">
											<?php brunn_select_get_module_template_part('templates/parts/title', 'blog', '', $params); ?>
										</div>
										<div class="qodef-post-info-bottom clearfix">
											<div class="qodef-post-info-bottom-left">
												<?php brunn_select_get_module_template_part('templates/parts/post-info/read-more', 'blog', '', $params); ?>
											</div>
										</div>
									</div>
								</div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif;
            wp_reset_postdata();
            ?>
        </div>
    </div>
<?php } ?>