<?php
/*
Plugin Name: WP Encrypt
Plugin URI: https://wordpress.org/plugins/wp-encrypt/
Description: Generate and manage SSL certificates for your WordPress sites for free with this Let's Encrypt client.
Version: 0.5.0
Author: Felix Arntz
Author URI: http://leaves-and-love.net
License: GNU General Public License v3
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Text Domain: wp-encrypt
Tags: wordpress, plugin, lets encrypt, ssl, https, free ssl
*/
/**
 * @package WPENC
 * @version 0.5.0
 * @author Felix Arntz <felix-arntz@leaves-and-love.net>
 */

if ( ! defined( 'ABSPATH' ) ) {
	die();
}

if ( ! class_exists( 'WPENC\App' ) ) {
	if ( file_exists( dirname( __FILE__ ) . '/wp-encrypt/vendor/autoload.php' ) ) {
		if ( version_compare( phpversion(), '5.3.0' ) >= 0 ) {
			require_once dirname( __FILE__ ) . '/wp-encrypt/vendor/autoload.php';
		} else {
			require_once dirname( __FILE__ ) . '/wp-encrypt/vendor/felixarntz/leavesandlove-wp-plugin-util/leavesandlove-wp-plugin-loader.php';
		}
	} elseif ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
		if ( version_compare( phpversion(), '5.3.0' ) >= 0 ) {
			require_once dirname( __FILE__ ) . '/vendor/autoload.php';
		} else {
			require_once dirname( __FILE__ ) . '/vendor/felixarntz/leavesandlove-wp-plugin-util/leavesandlove-wp-plugin-loader.php';
		}
	}
}

LaL_WP_Plugin_Loader::load_plugin( array(
	'slug'					=> 'wp-encrypt',
	'name'					=> 'WP Encrypt',
	'version'				=> '0.5.0',
	'main_file'				=> __FILE__,
	'namespace'				=> 'WPENC',
	'textdomain'			=> 'wp-encrypt',
	'use_language_packs'	=> true,
), array(
	'phpversion'			=> '5.3.0',
	'wpversion'				=> '4.0',
	'functions'				=> array(
		'curl_init',
		'curl_setopt',
		'openssl_pkey_new',
		'openssl_csr_new',
		'file_put_contents',
		'stream_get_meta_data',
		'tmpfile',
	),
) );