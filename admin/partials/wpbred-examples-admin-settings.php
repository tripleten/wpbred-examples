<?php

/**
 * Provide a admin area view for the plugin's settings page
 *
 * @link       https://www.wpbred.com/
 * @since      1.0.0
 *
 * @package    Wpbred_Examples
 * @subpackage Wpbred_Examples/admin/partials
 */
?>

<div class="wrap">
	<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
	<form action="options.php" method="post">
		 <?php
		 settings_fields( $this->plugin_name );
		 do_settings_sections( $this->plugin_name );
		 submit_button(__( 'Save Settings', $this->plugin_name),);
		 ?>
	</form>
</div>