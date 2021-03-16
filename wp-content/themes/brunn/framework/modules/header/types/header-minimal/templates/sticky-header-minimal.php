<?php do_action('brunn_select_action_after_sticky_header'); ?>

<div class="qodef-sticky-header">
    <?php do_action('brunn_select_action_after_sticky_menu_html_open'); ?>
    <div class="qodef-sticky-holder">
        <?php if ($sticky_header_in_grid) : ?>
        <div class="qodef-grid">
            <?php endif; ?>
            <div class=" qodef-vertical-align-containers">
                <div class="qodef-position-left"><!--
                 --><div class="qodef-position-left-inner">
                        <?php if (!$hide_logo) {
                            brunn_select_get_logo('sticky');
                        } ?>
                    </div>
                </div>
                <div class="qodef-position-right"><!--
                 --><div class="qodef-position-right-inner">
                        <a href="javascript:void(0)" <?php brunn_select_class_attribute( $fullscreen_menu_icon_class ); ?>>
                            <span class="qodef-fullscreen-menu-close-icon">
                                <?php echo brunn_select_get_icon_sources_html( 'fullscreen_menu', true ); ?>
                            </span>
                            <span class="qodef-fm-lines">
								<span class="qodef-dot"></span>
								<span class="qodef-dot"></span>
								<span class="qodef-dot"></span>
								<span class="qodef-dot"></span>
								<span class="qodef-dot"></span>
								<span class="qodef-dot"></span>
								<span class="qodef-dot"></span>
								<span class="qodef-dot"></span>
								<span class="qodef-dot"></span>
							</span>
                        </a>
                    </div>
                </div>
            </div>
            <?php if ($sticky_header_in_grid) : ?>
        </div>
    <?php endif; ?>
    </div>
</div>

<?php do_action('brunn_select_action_after_sticky_header'); ?>
