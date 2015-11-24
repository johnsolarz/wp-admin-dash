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
require_once( 'includes/class-wp-admin-dash-mce.php' );
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

WP_Admin_Dash()->register_post_type( 'work', __( 'Work', 'wp-custom-post-types' ), __( 'Work', 'wp-custom-post-types' ), null, array('menu_icon' => 'dashicons-arrow-right-alt') );

WP_Admin_Dash()->register_post_type( 'people', __( 'People', 'wp-custom-post-types' ), __( 'Person', 'wp-custom-post-types' ), null, array('menu_icon' => 'dashicons-arrow-right-alt') );

/**
 * Register custom post type taxonomies
 *
 * @since 1.0.0
 */
WP_Admin_Dash()->register_taxonomy( 'work-category', __( 'Categories', 'wp-custom-post-types' ), __( 'Category', 'wp-custom-post-types' ), 'work' );

WP_Admin_Dash()->register_taxonomy( 'work-subcategory', __( 'Subcategories', 'wp-custom-post-types' ), __( 'Subcategory', 'wp-custom-post-types' ), 'work' );

WP_Admin_Dash()->register_taxonomy( 'people-category', __( 'Categories', 'wp-custom-post-types' ), __( 'Category', 'wp-custom-post-types' ), 'people' );

WP_Admin_Dash()->register_taxonomy( 'people-subcategory', __( 'Subcategories', 'wp-custom-post-types' ), __( 'Subcategory', 'wp-custom-post-types' ), 'people' );
