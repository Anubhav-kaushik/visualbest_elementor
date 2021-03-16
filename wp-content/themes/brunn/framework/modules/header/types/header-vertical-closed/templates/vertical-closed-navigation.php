<?php do_action('brunn_select_action_before_top_navigation'); ?>
<div class="qodef-vertical-menu-outer">
	<nav class="qodef-vertical-menu qodef-vertical-dropdown-below">
		<?php
			wp_nav_menu(array(
				'theme_location'  => 'vertical-navigation',
				'container'       => '',
				'container_class' => '',
				'menu_class'      => '',
				'menu_id'         => '',
				'fallback_cb'     => 'top_navigation_fallback',
				'link_before'     => '<span>',
				'link_after'      => '</span>',
				'walker'          => new BrunnSelectClassTopNavigationWalker()
			));
		?>
	</nav>
</div>
<?php do_action('brunn_select_action_after_top_navigation'); ?>