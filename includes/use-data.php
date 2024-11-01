<?php

// Sets all head scripts
function tpfftdbit_head_scripts() {
	global $tpfftdbit_options;
	
	// sets favicon for site
	if (isset($tpfftdbit_options['enable_favicon']) && $tpfftdbit_options['enable_favicon'] == true && !empty($tpfftdbit_options['favicon'])) {
		echo '<link rel="shortcut icon" type="image/x-icon" href="' . $tpfftdbit_options['favicon'] . '" />';
	}
}

add_action('wp_head', 'tpfftdbit_head_scripts');

// Sets all login head scripts
function tpfftdbit_login_head_scripts() {
	global $tpfftdbit_options;
	
	// sets custom login logo
	if ($tpfftdbit_options['enable_login_logo'] == true && !empty($tpfftdbit_options['login_logo'])) {
		echo '<style type="text/css">
        h1 a { background-image:url("' . $tpfftdbit_options['login_logo'] . '") !important; }
    </style>';
	}
}

add_action('login_head', 'tpfftdbit_login_head_scripts');

// Sets all admin head scripts
function tpfftdbit_admin_head_scripts() {
	global $tpfftdbit_options;
	
	// sets post highlighting
	if (isset($tpfftdbit_options['highlight']) && $tpfftdbit_options['highlight'] == true) {
		echo '<style>';
		if (!empty($tpfftdbit_options['draft_color'])) { echo '.status-draft{background: ' . $tpfftdbit_options['draft_color'] . ' !important;}'; } else { echo '.status-draft{background: #FFFF99 !important;}'; }
		if (!empty($tpfftdbit_options['pending_color'])) { echo '.status-pending{background: ' . $tpfftdbit_options['pending_color'] . ' !important;}'; } else { echo '.status-pending{background: #87C5D6 !important;}'; }
		if (!empty($tpfftdbit_options['publish_color'])) { echo '.status-publish{background: ' . $tpfftdbit_options['publish_color'] . ' !important;}'; } else { echo '.status-publish{/* no background - keep alternating rows */}'; }
		if (!empty($tpfftdbit_options['future_color'])) { echo '.status-future{background: ' . $tpfftdbit_options['future_color'] . ' !important;}'; } else { echo '.status-future{background: #CCFF99 !important;}'; }
		if (!empty($tpfftdbit_options['private_color'])) { echo '.status-private{background: ' . $tpfftdbit_options['private_color'] . ' !important;}'; } else { echo '.status-private{background:#FFCC99;}'; }
		echo '</style>';
	}
    
    // sets favicon in admin area
	if (isset($tpfftdbit_options['enable_favicon']) && $tpfftdbit_options['enable_favicon'] == true && !empty($tpfftdbit_options['favicon'])) {
		echo '<link rel="shortcut icon" type="image/x-icon" href="' . $tpfftdbit_options['favicon'] . '" />';
	}
}

add_action('admin_head', 'tpfftdbit_admin_head_scripts');

// Sets all footer scripts
function tpfftdbit_footer_scripts() {
	global $tpfftdbit_options;
	
	// adds footer scripts
	if ($tpfftdbit_options['enable_footer_scripts'] == true && !empty($tpfftdbit_options['footer_scripts'])) {
		echo $tpfftdbit_options['footer_scripts'];
	};
}

add_action('wp_footer', 'tpfftdbit_footer_scripts');