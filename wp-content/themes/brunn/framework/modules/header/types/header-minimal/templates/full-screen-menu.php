<div class="qodef-fullscreen-menu-holder-outer">
    <div class="qodef-fullscreen-menu-holder">
        <div class="qodef-fullscreen-menu-holder-inner">
			<?php if ( $fullscreen_menu_in_grid ) : ?>
            <div class="qodef-container-inner">
				<?php endif; ?>

				<?php
				//Navigation
				brunn_select_get_module_template_part( 'templates/full-screen-menu-navigation', 'header/types/header-minimal' );;
				?>

				<?php if ( brunn_select_is_header_widget_area_active( 'two' ) ): ?>
                    <div class="qodef-fullscreen-below-menu-widget-holder">
						<?php brunn_select_get_header_widget_area_two(); ?>
                    </div>
				<?php endif; ?>

				<?php if ( $fullscreen_menu_in_grid ) : ?>
            </div>
		<?php endif; ?>
        </div>
        <a class="qodef-fullscreen-menu-close" href="javascript:void(0)">
            <span class="icon_close"></span>
        </a>
    </div>
</div>