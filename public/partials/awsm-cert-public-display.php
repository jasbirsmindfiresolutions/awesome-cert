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
class Awsm_Cert_Public_Partials {

	/**
	 * Certificate form.
	 *
	 * @return    mixed/html
	 */

	public static function username_section() {
		$data = '<form class="'.AWSM_CERT_PLUGIN_NAME.'-form">';

		    //$data .= '<h2>Username</h2>';

		    $data .= '<input class="'.AWSM_CERT_PLUGIN_NAME.'-username" name="username" placeholder="Enter  Username" required type="text">';

		    $data .= '<button type="submit">Next</button>';

	    $data .= '</form>';

	    return $data;
	}

	/**
	 * Certificate video.
	 *
	 * @return    mixed/html
	 */

	public static function video_section() {
		$data = '<div class="'.AWSM_CERT_PLUGIN_NAME.'-video"><iframe width="560" height="315" src="https://www.youtube.com/embed/kIgboyKEEyc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><button id="'.AWSM_CERT_PLUGIN_NAME.'-skip-video"> >> </button>';

	    $data .= '</div>';

	    return $data;
	}

	/**
	 * Create certificate.
	 *
	 * @return    mixed/html
	 */

	public static function create_certificate_section() {
		$data = '<div class="'.AWSM_CERT_PLUGIN_NAME.'-create-certificate"><canvas id="awsmCertCanvas" style="border:1px dashed #000000; width: 100%; height: 100%"></canvas>';

		$data .= '<div>';
			$data .= '<a href="" class="'.AWSM_CERT_PLUGIN_NAME.'-cert-bttns">Create</a>';

			$data .= '<a href="" class="'.AWSM_CERT_PLUGIN_NAME.'-cert-bttns" download id="'.AWSM_CERT_PLUGIN_NAME.'-download-certificate">Download</a>';
			
			$data .= '<a class="'.AWSM_CERT_PLUGIN_NAME.'-cert-bttns" href="">Share</a>';
		$data .= '</div>';

	    $data .= '</div>';

	    return $data;
	}

	/**
	 * Awesome certificate shortcode.
	 *
	 * @return    mixed/html
	 */

	public static function shortcode_awesome_certificate(){
    	$data = '<div id="'.AWSM_CERT_PLUGIN_NAME.'-section">';

		    $data .= static::username_section();

		    $data .= static::video_section();

		    $data .= static::create_certificate_section();

	    $data .= '</div>';

	    return $data;
	}

}
