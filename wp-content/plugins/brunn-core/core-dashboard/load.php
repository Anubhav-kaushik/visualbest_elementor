<?php
if ( ! function_exists( 'brunn_core_dashboard_load_files' ) ) {
	function brunn_core_dashboard_load_files() {
        require_once BRUNN_CORE_ABS_PATH . '/core-dashboard/core-dashboard.php';
        require_once BRUNN_CORE_ABS_PATH . '/core-dashboard/rest/include.php';
        require_once BRUNN_CORE_ABS_PATH . '/core-dashboard/registration-rest.php';
        require_once BRUNN_CORE_ABS_PATH . '/core-dashboard/sub-pages/sub-page.php';

		foreach (glob(BRUNN_CORE_ABS_PATH . '/core-dashboard/sub-pages/*/load.php') as $subpages) {
			include_once $subpages;
		}
	}

	add_action('after_setup_theme', 'brunn_core_dashboard_load_files');
}