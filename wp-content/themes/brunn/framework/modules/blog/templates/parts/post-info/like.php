<?php if(brunn_select_core_plugin_installed()) { ?>
    <div class="qodef-blog-like">
        <?php if( function_exists('brunn_select_get_like') ) brunn_select_get_like(); ?>
    </div>
<?php } ?>