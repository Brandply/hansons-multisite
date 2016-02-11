<?php
	if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' && class_exists('ReduxFrameworkPlugin') ) {
		global $sampleReduxFramework;
		$flaton_free = get_option('flaton');
		foreach((array)$flaton_free as $option => $value ) {
			$sampleReduxFramework->ReduxFramework->set($option, $value);
		}
	}