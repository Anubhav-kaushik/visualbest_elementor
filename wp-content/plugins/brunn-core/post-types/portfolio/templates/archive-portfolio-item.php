<?php
get_header();
brunn_select_get_title();
do_action( 'brunn_select_action_before_main_content' ); ?>
<div class="qodef-container qodef-default-page-template">
	<?php do_action( 'brunn_select_action_after_container_open' ); ?>
	<div class="qodef-container-inner clearfix">
		<?php
			$brunn_taxonomy_id   = get_queried_object_id();
			$brunn_taxonomy_type = is_tax( 'portfolio-tag' ) ? 'portfolio-tag' : 'portfolio-category';
			$brunn_taxonomy      = ! empty( $brunn_taxonomy_id ) ? get_term_by( 'id', $brunn_taxonomy_id, $brunn_taxonomy_type ) : '';
			$brunn_taxonomy_slug = ! empty( $brunn_taxonomy ) ? $brunn_taxonomy->slug : '';
			$brunn_taxonomy_name = ! empty( $brunn_taxonomy ) ? $brunn_taxonomy->taxonomy : '';
			
			brunn_core_get_archive_portfolio_list( $brunn_taxonomy_slug, $brunn_taxonomy_name );
		?>
	</div>
	<?php do_action( 'brunn_select_action_before_container_close' ); ?>
</div>
<?php get_footer(); ?>
