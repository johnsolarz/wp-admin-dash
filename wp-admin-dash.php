<?php
/*
 * Plugin Name: WP Admin Dash
 * Version: 1.0
 * Plugin URI: http://www.nownow.io/
 * Description: Registers custom WordPress post types, taxonomies, login screen, dashboard widgets, shortcodes and editor formats.
 * Author: John Solarz
 * Author URI: http://www.nownow.io/
 * Requires at least: 4.0
 * Tested up to: 4.3.1
 *
 * Text Domain: wp-admin-dash
 * Domain Path: /lang/
 *
 * @package WordPress
 * @author John Solarz
 * @since 1.0.0
 */

namespace Now\Now\Admin;

use WP_Admin_Dash;
use WP_Admin_Dash_Settings;

if ( ! defined( 'ABSPATH' ) ) exit;

// Load plugin class files
require_once( 'includes/class-wp-admin-dash.php' );
require_once( 'includes/class-wp-admin-dash-settings.php' );
require_once( 'includes/class-wp-admin-dash-backend.php' );
require_once( 'includes/class-wp-admin-dash-editor-formats.php' );
require_once( 'includes/class-wp-admin-dash-shortcodes.php' );

// Load plugin libraries
require_once( 'includes/lib/class-wp-admin-dash-admin-api.php' );
require_once( 'includes/lib/class-wp-admin-dash-post-type.php' );
require_once( 'includes/lib/class-wp-admin-dash-taxonomy.php' );

/**
 * Returns the main instance of WP_Admin_Dash to prevent the need to use globals.
 *
 * @since  1.0.0
 * @return object WP_Admin_Dash
 */
function WP_Admin_Dash () {
	$instance = WP_Admin_Dash::instance( __FILE__, '1.0.0' );

	if ( is_null( $instance->settings ) ) {
		$instance->settings = WP_Admin_Dash_Settings::instance( $instance );
	}

	return $instance;
}

// Example usage: WP_Admin_Dash();

/**
 * Register custom post types
 *
 * @since 1.0.0
 */
$cpt_1_post_type   = get_option('wpt_cpt_1_post_type');
$cpt_1_plural      = get_option('wpt_cpt_1_plural_name');
$cpt_1_singular    = get_option('wpt_cpt_1_singular_name');
$cpt_1_description = get_option('wpt_cpt_1_description');
$cpt_2_post_type   = get_option('wpt_cpt_2_post_type');
$cpt_2_plural      = get_option('wpt_cpt_2_plural_name');
$cpt_2_singular    = get_option('wpt_cpt_2_singular_name');
$cpt_2_description = get_option('wpt_cpt_2_description');
$cpt_3_post_type   = get_option('wpt_cpt_3_post_type');
$cpt_3_plural      = get_option('wpt_cpt_3_plural_name');
$cpt_3_singular    = get_option('wpt_cpt_3_singular_name');
$cpt_3_description = get_option('wpt_cpt_3_description');
$cpt_4_post_type   = get_option('wpt_cpt_4_post_type');
$cpt_4_plural      = get_option('wpt_cpt_4_plural_name');
$cpt_4_singular    = get_option('wpt_cpt_4_singular_name');
$cpt_4_description = get_option('wpt_cpt_4_description');

if($cpt_1_post_type && $cpt_1_plural && $cpt_1_singular) {
  WP_Admin_Dash()->register_post_type( $cpt_1_post_type, __( $cpt_1_plural, 'wp-admin-dash' ), __( $cpt_1_singular, 'wp-admin-dash' ), __( $cpt_1_description, 'wp-admin-dash' ), array('menu_icon' => 'dashicons-arrow-right-alt') );
}
if($cpt_2_post_type && $cpt_2_plural && $cpt_2_singular) {
  WP_Admin_Dash()->register_post_type( $cpt_2_post_type, __( $cpt_2_plural, 'wp-admin-dash' ), __( $cpt_2_singular, 'wp-admin-dash' ), __( $cpt_2_description, 'wp-admin-dash' ), array('menu_icon' => 'dashicons-arrow-right-alt') );
}
if($cpt_3_post_type && $cpt_3_plural && $cpt_3_singular) {
  WP_Admin_Dash()->register_post_type( $cpt_3_post_type, __( $cpt_3_plural, 'wp-admin-dash' ), __( $cpt_3_singular, 'wp-admin-dash' ), __( $cpt_3_description, 'wp-admin-dash' ), array('menu_icon' => 'dashicons-arrow-right-alt') );
}
if($cpt_4_post_type && $cpt_4_plural && $cpt_4_singular) {
  WP_Admin_Dash()->register_post_type( $cpt_4_post_type, __( $cpt_4_plural, 'wp-admin-dash' ), __( $cpt_4_singular, 'wp-admin-dash' ), __( $cpt_4_description, 'wp-admin-dash' ), array('menu_icon' => 'dashicons-arrow-right-alt') );
}

/**
 * Register custom taxonomies
 *
 * @since 1.0.0
 */
$tax_1_taxonomy  = get_option('wpt_tax_1_taxonomy');
$tax_1_plural    = get_option('wpt_tax_1_plural_name');
$tax_1_singular  = get_option('wpt_tax_1_singular_name');
$tax_1_post_type = get_option('wpt_tax_1_post_type');
$tax_2_taxonomy  = get_option('wpt_tax_2_taxonomy');
$tax_2_plural    = get_option('wpt_tax_2_plural_name');
$tax_2_singular  = get_option('wpt_tax_2_singular_name');
$tax_2_post_type = get_option('wpt_tax_2_post_type');
$tax_3_taxonomy  = get_option('wpt_tax_3_taxonomy');
$tax_3_plural    = get_option('wpt_tax_3_plural_name');
$tax_3_singular  = get_option('wpt_tax_3_singular_name');
$tax_3_post_type = get_option('wpt_tax_3_post_type');
$tax_4_taxonomy  = get_option('wpt_tax_4_taxonomy');
$tax_4_plural    = get_option('wpt_tax_4_plural_name');
$tax_4_singular  = get_option('wpt_tax_4_singular_name');
$tax_4_post_type = get_option('wpt_tax_4_post_type');


if($tax_1_taxonomy && $tax_1_plural && $tax_1_singular && $tax_1_post_type) {
  WP_Admin_Dash()->register_taxonomy( $tax_1_taxonomy, __( $tax_1_plural, 'wp-admin-dash' ), __( $tax_1_singular, 'wp-admin-dash' ), $tax_1_post_type );
}
if($tax_2_taxonomy && $tax_2_plural && $tax_2_singular && $tax_2_post_type) {
  WP_Admin_Dash()->register_taxonomy( $tax_2_taxonomy, __( $tax_2_plural, 'wp-admin-dash' ), __( $tax_2_singular, 'wp-admin-dash' ), $tax_2_post_type );
}
if($tax_3_taxonomy && $tax_3_plural && $tax_3_singular && $tax_3_post_type) {
  WP_Admin_Dash()->register_taxonomy( $tax_3_taxonomy, __( $tax_3_plural, 'wp-admin-dash' ), __( $tax_3_singular, 'wp-admin-dash' ), $tax_3_post_type );
}
if($tax_4_taxonomy && $tax_4_plural && $tax_4_singular && $tax_4_post_type) {
  WP_Admin_Dash()->register_taxonomy( $tax_4_taxonomy, __( $tax_4_plural, 'wp-admin-dash' ), __( $tax_4_singular, 'wp-admin-dash' ), $tax_4_post_type );
}
