<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://awesome.one/
 * @since      1.0.0
 *
 * @package    Awsm_Cert
 * @subpackage Awsm_Cert/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Awsm_Cert
 * @subpackage Awsm_Cert/public
 * @author     Awesome Company <support@awesome.one>
 */
class Awsm_Cert_Public {

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
	 * Array of php variables localized to JS.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      array $localized_data Array of php variables localized to JS.
	 */
	private static $localized_data = array();

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		// Export awesome certificate.
		$data['awesome_certificate'] = plugin_dir_url( __FILE__ ) . 'images/awesome_certificate.jpg';

		// Localize awesome certificate to the public JS.
		self::localize( $data );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Awsm_Cert_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Awsm_Cert_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( 
			$this->plugin_name, 
			plugin_dir_url( __FILE__ ) . 'css/awsm-cert-public.css', array(), 
			$this->version, 
			'all' 
		);

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Awsm_Cert_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Awsm_Cert_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		// Register public JS.
		wp_register_script(
			$this->plugin_name,
			plugin_dir_url( __FILE__ ) . 'js/awsm-cert-public.js',
			array( 'jquery' ),
			$this->version,
			true
		);

		// Localize the constants to be used from JS.
		wp_localize_script(
			$this->plugin_name,
			AWSM_CERT_LOCALIZED_VAR_NAME,
			self::get_localized_data()
		);

		// Enqueue public JS.
		wp_enqueue_script( $this->plugin_name );

	}

	/**
	 * Public function to localize any data to js.
	 *
	 * Appends specified data to the current localized array.
	 *
	 * @since   1.0.0
	 *
	 * @param   array $data     Data to be localized in key value pair.
	 */
	public static function localize( $data ) {

		// Get the currently localized data.
		$existing_data = self::get_localized_data();

		// Merge with current data and set.
		self::set_localized_data( array_merge( $existing_data, $data ) );

	}

	/**
	 * Getter for localized_data variable.
	 *
	 * @since   1.0.0
	 *
	 * @return  array Localized data array.
	 */
	public static function get_localized_data() {
		return self::$localized_data;
	}

	/**
	 * Setter for localized_data variable.
	 *
	 * @since   1.0.0
	 *
	 * @param   array $data     Data to be localized in key value pair.
	 */
	public static function set_localized_data( $data ) {
		self::$localized_data = $data;
	}

	/**
	 * Function calls shortcode for awesome certificate.
	 *
	 * @return    awesome certificate shortcode
	 */

	public function shortcode_awesome_certificate(){

	    return Awsm_Cert_Public_Partials::shortcode_awesome_certificate();
	}

}
