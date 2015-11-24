<?php
/**
 * @todo add class and construct
 */

namespace Now\Now\Backend;

if ( ! defined( 'ABSPATH' ) ) exit;

	/**
	 * Login URL and title
	 *
	 * @link http://primegap.net/2011/01/26/wordpress-quick-tip-custom-wp-login-php-logo-url-without-hacks/
	 * @since  1.0.0
	 * @return string
	 */
	function login_logo_url() {
	  return ('http://nownow.io');
	}
	add_filter('login_headerurl', __NAMESPACE__ . '\\login_logo_url');

	function login_logo_title() {
	  return ('Hello world.');
	}
	add_filter('login_headertitle', __NAMESPACE__ . '\\login_logo_title');

	/**
	 * Remove the dashboard update link
	 *
	 * @link http://www.vooshthemes.com/blog/wordpress-tip/wordpress-quick-tip-remove-the-dashboard-update-message/
	 * @since  1.0.0
	 */
	add_action( 'admin_init', create_function('', 'remove_action( \'admin_notices\', \'update_nag\', 3 );') );

	/**
	 * Update color scheme
	 * @since  1.0.0
	 * @return string
	 */
	function change_admin_color($result) {
	    return 'ocean';
	}
	add_filter('get_user_option_admin_color', __NAMESPACE__ . '\\change_admin_color');

	/**
	 * Footer credits
	 * @since  1.0.0
	 * @return string
	 */
	function footer_text( $default_text ) {
	  return 'Design and code by <a href="http://nownow.io" target="_blank">Now Now</a>';
	}
	add_filter( 'admin_footer_text', __NAMESPACE__ . '\\footer_text' );

	/**
	 * Add dasboard widgets
	 * @since  1.0.0
	 * @return string|object
	 */
	function add_dashboard_widgets() {
	  wp_add_dashboard_widget( 'dashboard_feed', 'Procrastination, sponsored by BuzzFeed',  __NAMESPACE__ . '\\dashboard_feed_output' );
	}

	function dashboard_feed_output() {
	  echo '<div class="rss-widget">';
	  wp_widget_rss_output(array(
	    'url'          => 'http://www.buzzfeed.com/tech.xml',
	    'title'        => '',
	    'items'        => 3,
	    'show_summary' => 1,
	    'show_author'  => 0,
	    'show_date'    => 0,
	  ));
	  echo "</div>";
	}
	add_action('wp_dashboard_setup', __NAMESPACE__ . '\\add_dashboard_widgets');

	/**
	 * Remove dasboard widgets
	 * @since 1.0.0
	 *
	 *    function dashboard_widgets() {
	 *      global $wp_meta_boxes;
	 *
	 *      //unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
	 *      //unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
	 *      //unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	 *      //unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
	 *      //unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
	 *      //unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
	 *      //unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
	 *      //unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
	 *
	 *    }
	 *    add_action('wp_dashboard_setup', __NAMESPACE__ . '\\dashboard_widgets' );
	 */
