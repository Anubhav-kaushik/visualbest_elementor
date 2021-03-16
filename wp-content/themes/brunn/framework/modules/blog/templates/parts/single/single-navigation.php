<?php
$blog_single_navigation = brunn_select_options()->getOptionValue('blog_single_navigation') === 'no' ? false : true;
$blog_navigation_through_same_category = brunn_select_options()->getOptionValue('blog_navigation_through_same_category') === 'no' ? false : true;
?>
<?php if($blog_single_navigation){ ?>
	<div class="qodef-blog-single-navigation">
		<div class="qodef-blog-single-navigation-inner clearfix">
			<?php
				/* Single navigation section - SETTING PARAMS */
				$post_navigation = array(
					'prev' => array(
						'mark' => '<span class="qodef-blog-single-nav-mark arrow_carrot-left"></span>',
						'label' => '<span class="qodef-blog-single-nav-label">'.esc_html__('previous', 'brunn').'</span>'
					),
					'next' => array(
						'mark' => '<span class="qodef-blog-single-nav-mark arrow_carrot-right"></span>',
						'label' => '<span class="qodef-blog-single-nav-label">'.esc_html__('next', 'brunn').'</span>'
					)
				);
			
				if($blog_navigation_through_same_category){
					if(get_previous_post(true) !== ""){
						$post_navigation['prev']['post'] = get_previous_post(true);
					}
					if(get_next_post(true) !== ""){
						$post_navigation['next']['post'] = get_next_post(true);
					}
				} else {
					if(get_previous_post() !== ""){
						$post_navigation['prev']['post'] = get_previous_post();
					}
					if(get_next_post() !== ""){
						$post_navigation['next']['post'] = get_next_post();
					}
				}

				/* Single navigation section - RENDERING */
				foreach (array('prev', 'next') as $nav_type) {
					if (isset($post_navigation[$nav_type]['post'])) { ?>
						<a itemprop="url" class="qodef-blog-single-<?php echo esc_attr($nav_type); ?>" href="<?php echo get_permalink($post_navigation[$nav_type]['post']->ID); ?>">
							<div class="qodef-blog-single-navigation-image">
								<?php echo get_the_post_thumbnail($post_navigation[$nav_type]['post']->ID, array(106,106));?>
							</div>
							<div class="qodef-blog-single-navigation-text">
								<div class="qodef-blog-single-navigation-title"><?php echo get_the_title($post_navigation[$nav_type]['post']->ID); ?></div>
								<div class="qodef-blog-single-navigation-date"><?php echo get_the_date('' ,$post_navigation[$nav_type]['post']->ID); ?></div>
							</div>
						</a>
					<?php }
				}
			?>
		</div>
	</div>
<?php } ?>