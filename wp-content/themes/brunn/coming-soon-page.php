<?php
/*
Template Name: Coming Soon Page
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php
	/**
	 * brunn_select_action_header_meta hook
	 *
	 * @see brunn_select_header_meta() - hooked with 10
	 * @see brunn_select_user_scalable_meta() - hooked with 10
	 * @see brunn_core_set_open_graph_meta - hooked with 10
	 */
	do_action( 'brunn_select_action_header_meta' );
	
	wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope itemtype="//schema.org/WebPage">
	<?php
	/**
	 * brunn_select_action_after_body_tag hook
	 *
	 * @see brunn_select_get_side_area() - hooked with 10
	 * @see brunn_select_smooth_page_transitions() - hooked with 10
	 */
	do_action( 'brunn_select_action_after_body_tag' ); ?>

	<div class="qodef-wrapper">
		<div class="qodef-wrapper-inner">
			<div class="qodef-content">
				<div class="qodef-content-inner">
					<?php get_template_part( 'slider' ); ?>
					<div class="qodef-full-width">
						<div class="qodef-full-width-inner">
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<?php the_content(); ?>
							<?php endwhile; endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php wp_footer(); ?>
</body>
</html>