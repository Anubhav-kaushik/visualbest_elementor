<?php
$title_tag = isset($quote_tag) ? $quote_tag : 'h2';
$quote_text_meta = get_post_meta(get_the_ID(), "qodef_post_quote_text_meta", true );

$post_title = !empty($quote_text_meta) ? $quote_text_meta : get_the_title();

$post_author = get_post_meta(get_the_ID(), "qodef_post_quote_author_meta", true );

$post_position = get_post_meta(get_the_ID(), "qodef_post_quote_position_meta", true );
?>

<div class="qodef-post-quote-holder">
    <div class="qodef-post-quote-holder-inner">
        <<?php echo esc_attr($title_tag);?> itemprop="name" class="qodef-quote-title qodef-post-title">
        <?php if(brunn_select_blog_item_has_link()) { ?>
            <a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
        <?php } ?>
            <?php echo esc_html($post_title); ?>
        <?php if(brunn_select_blog_item_has_link()) { ?>
            </a>
        <?php } ?>
        </<?php echo esc_attr($title_tag);?>>
        <?php if($post_author != '') { ?>
            <span class="qodef-quote-author">
                <?php echo esc_html($post_author); ?>
            </span>
			<span class="qodef-quote-author-position">
                <?php echo esc_html($post_position); ?>
            </span>
        <?php } ?>
    </div>
</div>