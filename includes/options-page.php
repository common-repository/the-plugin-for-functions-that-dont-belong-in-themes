<?php

/***************************
* load admin page scripts and styles
***************************/

function tpfftdbit_admin_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('tpfftdbit-image-uploader', plugins_url('/includes/image-uploader.js', dirname(__FILE__) ), array('jquery','media-upload','thickbox'));
	wp_enqueue_script('tpfftdbit-image-uploader');
}
 
function tpfftdbit_admin_styles() {
wp_enqueue_style('thickbox');
}
 
if (isset($_GET['page']) && $_GET['page'] == 'tpfftdbit-options') {
add_action('admin_print_scripts', 'tpfftdbit_admin_scripts');
add_action('admin_print_styles', 'tpfftdbit_admin_styles');
}

/***************************
* load admin page options
***************************/

function tpfftdbit_options_page() {

	global $tpfftdbit_options;
	
	ob_start(); ?>
	<div class="wrap">
		<h2>Functions that don't belong in your theme</h2>
		
		<form method="post" action="options.php">
		
			<?php settings_fields('tpfftdbit_settings_group'); ?>
			
			<h3><?php _e('Appearance', 'tpfftdbit'); ?></h3>
			
			<h4><?php _e('Favicon', 'tpfftdbit'); ?></h4>
			<p>
				<input id="tpfftdbit_settings[enable_favicon]" name="tpfftdbit_settings[enable_favicon]" type="checkbox" value="1" <?php checked('1', isset ($tpfftdbit_options['enable_favicon'])); ?> />
				<label class="description" for="tpfftdbit_settings[enable_favicon]"><?php _e('Enable custom favicon', 'tpfftdbit'); ?></label>
			</p>
			
			<p>
				<input id="tpfftdbit_settings[favicon]" type="text" size="36" name="tpfftdbit_settings[favicon]" value="<?php echo $tpfftdbit_options['favicon']; ?>" />
				<input id="tpfftdbit_favicon_button" type="button" value="<?php _e('Upload Favicon', 'tpfftdbit'); ?>" />
				<label class="description" for="tpfftdbit_settings[favicon]"><?php _e('Upload your favicon (16x16px .ico file)', 'tpfftdbit'); ?></label>
			</p>
			
			<h4><?php _e('Login Logo', 'tpfftdbit'); ?></h4>
			<p>
				<input id="tpfftdbit_settings[enable_login_logo]" name="tpfftdbit_settings[enable_login_logo]" type="checkbox" value="1" <?php checked('1', isset ($tpfftdbit_options['enable_login_logo'])); ?> />
				<label class="description" for="tpfftdbit_settings[enable_login_logo]"><?php _e('Enable custom login logo', 'tpfftdbit'); ?></label>
			</p>
			
			<p>
				<input id="tpfftdbit_settings[login_logo]" type="text" size="36" name="tpfftdbit_settings[login_logo]" value="<?php echo $tpfftdbit_options['login_logo']; ?>" />
				<input id="tpfftdbit_login_logo_button" type="button" value="<?php _e('Upload Logo', 'tpfftdbit'); ?>" />
				<label class="description" for="tpfftdbit_settings[login_logo]"><?php _e('Enter the URL of your login logo (274 x 63px is ideal)', 'tpfftdbit'); ?></label>
			</p>
			
			<h4><?php _e('Post highlighting', 'tpfftdbit'); ?></h4>
			<p>
				<input id="tpfftdbit_settings[highlight]" name="tpfftdbit_settings[highlight]" type="checkbox" value="1" <?php checked('1', isset ($tpfftdbit_options['highlight'])); ?> />
				<label class="description" for="tpfftdbit_settings[highlight]"><?php _e('Enable post highlighting based on post status (will use default colors if none set)', 'tpfftdbit'); ?></label>
			</p>
			
			<p>
				<input id="tpfftdbit_settings[draft_color]" name="tpfftdbit_settings[draft_color]" size="10" type="text" value="<?php echo $tpfftdbit_options['draft_color']; ?>" />
				<label class="description" for="tpfftdbit_settings[draft_color]"><?php _e('Enter the CSS color for drafts', 'tpfftdbit'); ?></label>
			</p>
			
			<p>
				<input id="tpfftdbit_settings[pending_color]" name="tpfftdbit_settings[pending_color]" size="10" type="text" value="<?php echo $tpfftdbit_options['pending_color']; ?>" />
				<label class="description" for="tpfftdbit_settings[pending_color]"><?php _e('Enter the CSS color for pending posts', 'tpfftdbit'); ?></label>
			</p>
			
			<p>
				<input id="tpfftdbit_settings[publish_color]" name="tpfftdbit_settings[publish_color]" size="10" type="text" value="<?php echo $tpfftdbit_options['publish_color']; ?>" />
				<label class="description" for="tpfftdbit_settings[publish_color]"><?php _e('Enter the CSS color for published posts', 'tpfftdbit'); ?></label>
			</p>
			
			<p>
				<input id="tpfftdbit_settings[future_color]" name="tpfftdbit_settings[future_color]" size="10" type="text" value="<?php echo $tpfftdbit_options['future_color']; ?>" />
				<label class="description" for="tpfftdbit_settings[future_color]"><?php _e('Enter the CSS color for future posts', 'tpfftdbit'); ?></label>
			</p>
			
			<p>
				<input id="tpfftdbit_settings[private_color]" name="tpfftdbit_settings[private_color]" size="10" type="text" value="<?php echo $tpfftdbit_options['private_color']; ?>" />
				<label class="description" for="tpfftdbit_settings[private_color]"><?php _e('Enter the CSS color for private posts', 'tpfftdbit'); ?></label>
			</p>
			<p>
				<?php _e('Valid CSS color values can be found <a href="http://www.w3schools.com/cssref/css_colors_legal.asp" title="Legal CSS colors">here</a>. Includes hex, rgb, rgba, hsl, hsla & color names, though cross-browser support may limit you.', 'tpfftdbit'); ?>
			</p>
			
			<h3><?php _e('Scripts', 'tpfftdbit'); ?></h3>
			
			<h4><?php _e('Head scripts', 'tpfftdbit'); ?></h4>
			<p>
				<?php _e('This section is for adding scripts that you want to insert into the head of every page. A prime example is adding <strong>Google Web Fonts</strong>.', 'tpfftdbit'); ?>
			<p>
				<input id="tpfftdbit_settings[enable_head_scripts]" name="tpfftdbit_settings[enable_head_scripts]" type="checkbox" value="1" <?php checked('1', isset ($tpfftdbit_options['enable_head_scripts'])); ?> />
				<label class="description" for="tpfftdbit_settings[enable_head_scripts]"><?php _e('Enable inserting these scripts in the head section of your site', 'tpfftdbit'); ?></label>
			</p>
			
			<p>
				<textarea id="tpfftdbit_settings[head_scripts]" name="tpfftdbit_settings[head_scripts]" cols="50" rows="8"><?php echo $tpfftdbit_options['head_scripts']; ?></textarea>
				<label class="description" for="tpfftdbit_settings[head_scripts]"><?php _e('Enter all your head scripts', 'tpfftdbit'); ?></label>
			</p>
			
			<h4><?php _e('Footer scripts', 'tpfftdbit'); ?></h4>
			<p>
				This section is for adding scripts that you want to insert into the footer of every page. Prime examples are statistical tracking tools (such as <strong>Google Analytics</strong> or Clicky), or any number of Javascript files, for loading social buttons for example.
			<p>
				<input id="tpfftdbit_settings[enable_footer_scripts]" name="tpfftdbit_settings[enable_footer_scripts]" type="checkbox" value="1" <?php checked('1', isset($tpfftdbit_options['enable_footer_scripts'])); ?> />
				<label class="description" for="tpfftdbit_settings[enable_footer_scripts]"><?php _e('Enable inserting these footer scripts in the footer section of your site', 'tpfftdbit'); ?></label>
			</p>
			
			<p>
				<textarea id="tpfftdbit_settings[footer_scripts]" name="tpfftdbit_settings[footer_scripts]" cols="50" rows="8"><?php echo $tpfftdbit_options['footer_scripts']; ?></textarea>
				<label class="description" for="tpfftdbit_settings[footer_scripts]"><?php _e('Enter all your footer scripts', 'tpfftdbit'); ?></label>
			</p>
			
			<h3><?php _e('Social', 'tpfftdbit'); ?></h3>
			<p>
				Coming soon.
			</p>
			
			<h3><?php _e('SEO', 'tpfftdbit'); ?></h3>
			<p>
				Coming soon.
			</p>
			
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e('Save Options', 'tpfftdbit'); ?>" />
			</p>
		
		</form>
		
	</div>
	<?php
	echo ob_get_clean();
}

function tpfftdbit_add_options_page() {
	add_options_page('Functions that don\'t belong in themes', 'Non-theme Functions', 'manage_options', 'tpfftdbit-options', 'tpfftdbit_options_page');
}
add_action('admin_menu', 'tpfftdbit_add_options_page');

function tpfftdbit_register_settings() {
	register_setting('tpfftdbit_settings_group', 'tpfftdbit_settings');
}
add_action('admin_init', 'tpfftdbit_register_settings');