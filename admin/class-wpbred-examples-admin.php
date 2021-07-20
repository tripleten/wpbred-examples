<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.wpbred.com/
 * @since      1.0.0
 *
 * @package    Wpbred_Examples
 * @subpackage Wpbred_Examples/admin
 * @author     WPbred.com Team <support@wpbred.com>
 */
class Wpbred_Examples_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the settings submenu
	 *
	 * @since    1.0.0
	 */
	public function add_settings_menu() {
		
		add_options_page(
			 __( 'WPB Example', $this->plugin_name),
			 __( 'WPB Settings', $this->plugin_name),
			 'manage_options',
			 'wpb-settings',
			 array($this, 'settings_page_html')
		);
	}
	
	/**
	 * Displays the settings page 
	 *
	 * @since    1.0.0
	 */
	public function settings_page_html() {
		
		// Check user capabilities
		if ( ! current_user_can( 'manage_options' ) ) {
			return;
		}
		
		// Register a settings error/ message to be displayed to the user.
		if ( isset( $_GET['settings-updated'] ) ) {
			add_settings_error( $this->plugin_name.'-messages', $this->plugin_name.'-message', __( 'Settings updated', $this->plugin_name ), 'updated' );
		}

		// Include the form to display the setting fields
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/wpbred-examples-admin-settings.php';
	}

	/**
	 * Custom options & settings for the admin area.
	 *
	 * @since    1.0.0
	 */
	 public function settings_init() {
		
		$settingsId = $this->plugin_name.'-settings';
		
		// Add section heading
		add_settings_section(
			$settingsId, __( 'WP Bred Demo Settings', $this->plugin_name ), [$this, 'render_setting_heading'], $this->plugin_name
		);
		
		// Add Min width field
		add_settings_field(
			'image_min_width',
			__( 'Minimum Width', $this->plugin_name),
			[$this,'render_text_field'],
			$this->plugin_name,
			$settingsId,
			['id' => 'image_min_width', 'name' => 'image_min_width', 'placeholder' => __('Minimum width', $this->plugin_name), 'default_value' => '800', 'class' => 'form-field form-required', 'style' => 'width:15em']
		);

		// Add Max width field
		add_settings_field(
			'image_max_width',
			__( 'Maximum Width', $this->plugin_name),
			[$this,'render_text_field'],
			$this->plugin_name,
			$settingsId,
			['id' => 'image_max_width', 'name' => 'image_max_width', 'placeholder' => __('Maximum width', $this->plugin_name), 'default_value' => '1920', 'class' => 'form-field form-required', 'style' => 'width:15em']
		);

		// Register settings
		register_setting( $this->plugin_name, 'wpb_examples_options' );
	}
	
	/**
	 * Render section heading
	 *
	 * @since    1.0.0
	 */
	public function render_setting_heading( $args ) {
		?>
		<p id="<?php echo esc_attr( $args['id'] ); ?>">
			<?php esc_html_e( 'Ideal image dimension should be 1920x1080 px.', $this->plugin_name ); ?>
		</p>
		<?php
	}
	
	/**
	 * Render a text field
	 *
	 * @since    1.0.0
	 */
	public function render_text_field( $args ) {
		$options = get_option( 'wpb_examples_options' );
		?>
		<input type="text" 
			id="<?php echo esc_attr( $args['id'] ); ?>" 
			name="wpb_examples_options[<?php echo esc_attr( $args['name'] ); ?>]" 
			value="<?php echo isset( $options[ $args['name'] ] ) ? esc_attr($options[ $args['name'] ]) : esc_attr( $args['default_value']); ?>" 
			class="<?php echo isset($args['class']) ? esc_attr($args['class']): '' ?>" 
			style="<?php echo isset($args['style']) ? esc_attr($args['style']): '' ?>" 
			placeholder="<?php echo isset($args['placeholder']) ? esc_attr($args['placeholder']): '' ?>" 
		<?php
	}
	

}
