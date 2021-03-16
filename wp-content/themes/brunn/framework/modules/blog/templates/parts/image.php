<?php
$image_meta          = get_post_meta( get_the_ID(), 'qodef_blog_list_featured_image_meta', true );
$has_featured        = ! empty( $image_meta ) || has_post_thumbnail();
$blog_list_image_id  = ! empty( $image_meta ) && brunn_select_blog_item_has_link() ? brunn_select_get_attachment_id_from_url( $image_meta ) : '';

if ( isset ($params['type']) == 'masonry' ) {
$masonry_size = get_post_meta( get_the_ID(), 'qodef_blog_masonry_fixed_dimensions_meta', true );

	switch ( $masonry_size ) {
		case 'small' :
			$image_size = 'brunn_select_image_square';
			$image_masonry_class = 'small';
			break;
		case 'large-width':
			$image_size = 'brunn_select_image_landscape';
			$image_masonry_class = 'large-width';
			break;
		case 'large-height':
			$image_size = 'brunn_select_image_portrait';
			$image_masonry_class = 'large-height';
			break;
		case 'large-width-height':
			$image_size = 'brunn_select_image_huge';
			$image_masonry_class = 'large-width-height';
			break;
		default :
			$image_size = 'full';
			$image_masonry_class = '';
			break;
	}
}

else{
	$image_size = isset( $image_size ) ? $image_size : 'full';
}
?>

<?php if ( $has_featured ) { ?>
	<div class="qodef-post-image">
		<?php if ( brunn_select_blog_item_has_link() ) { ?>
		<a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<?php } ?>
			<?php if ( ! empty( $blog_list_image_id ) ) {
				echo wp_get_attachment_image( $blog_list_image_id, $image_size );
			} else {
				the_post_thumbnail( $image_size );
			} ?>
			<?php if ( brunn_select_blog_item_has_link() ) { ?>
		</a>
	<?php } ?>
		<?php do_action('brunn_select_action_blog_inside_image_tag')?>
	</div>
<?php } ?>
