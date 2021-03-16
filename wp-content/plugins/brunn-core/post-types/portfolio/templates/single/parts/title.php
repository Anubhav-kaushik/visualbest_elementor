<?php
    $portfolio_link_meta = get_post_meta( get_the_ID(), 'portfolio_additional_title', true );
?>

<h2 class="qodef-ps-title"><?php echo esc_html($portfolio_link_meta); ?></h2>