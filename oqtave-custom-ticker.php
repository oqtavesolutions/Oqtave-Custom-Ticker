<?php
/**
 * Plugin Name:         Oqtave Custom Ticker
 * Plugin URI:          https://oqtavesolutions.com/
 * Description:         Oqtave Custom Ticker is a wordpress plugin for custom tickers.
 * Version:             0.1.3
 * Requires at least:   5.2
 * Requires PHP:        7.2
 * Author:              Oqtave Solutions
 * Author URI:          https://oqtavesolutions.com/
 * License:             Apache License (Version 2.0, January 2004)
 * License URI:         https://www.apache.org/licenses/LICENSE-2.0.txt
 * Update URI:          https://oqtavesolutions.com/plugins/
 * Text Domain:         oqtave-custom-ticker
 * Domain Path:
 */

// direct access restrictions
if( ! defined( 'WPINC' ) ) {
    die();
}

// plugin dir path
define( 'OQTAVE_CUSTOM_TICKER_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Database management file
require_once( plugin_dir_path( __FILE__ ) . 'includes/oqtave-custom-ticker-management.php' );

// include assests
include( plugin_dir_path( __FILE__ ) . 'includes/oqtave-custom-ticker-assests.php' );

// Include Admin Pages
include( plugin_dir_path( __FILE__ ) . 'includes/oqtave-custom-ticker-pages.php' );

// shortcode 
include( plugin_dir_path( __FILE__ ) . 'includes/oqtave-custom-ticker-shortcode.php' );

// headline show settings --- front end 
if( get_option( 'oqtave_custom_ticker_options' ) ) {
      $oqtave_custom_ticker_settings = get_option( 'oqtave_custom_ticker_options' );
}

// call front end file if checked on settings page
if( isset( $oqtave_custom_ticker_settings['show_ticker_on_top'] ) ) {

    // Front end file
    include ( plugin_dir_path( __FILE__ ) . 'includes/oqtave-custom-ticker-frontend.php'  );

}

