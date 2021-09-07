<?php 

// create row
if( ! get_option( 'oqtave_custom_ticker_options' ) ) {

          add_option( 'oqtave_custom_ticker_options' );

}

// get option
$oqtave_custom_ticker_option = get_option( 'oqtave_custom_ticker_options' );

// Admin Menu
function oqtave_custom_ticker_menu_pages() {

    // headline show menu page
    add_menu_page( 
        'Oqtave custom ticker list',
        'Oqtave ticker',
        'manage_options',
        'oqtave-custom-ticker',
        'oqtave_custom_ticker_main_page_cb',
        plugin_dir_url( __FILE__ ). '../assests/admin/img/oqtave-ticker.png',
        50
    );

    // add-new headline submenu page
    add_submenu_page( 
        'oqtave-custom-ticker',
        'Add new ticker',
        'add new ticker',
        'manage_options',
        'oqtave-custom-ticker-add_new',
        'oqtave_custom_ticker_add_new_cb'
    );

    // setiings submenu page
    add_submenu_page( 
        'oqtave-custom-ticker',
        'Oqtave custom ticker settings',
        'settings',
        'manage_options',
        'oqtave-custom-ticker-settings',
        'oqtave_custom_ticker_settings_cb'
    );

}

// hook into admin menu
add_action( 'admin_menu', 'oqtave_custom_ticker_menu_pages' );

function oqtave_custom_ticker_options() {

// Settings seection
    add_settings_section(
                'oqtave_custom_ticker_option',
                'Options',
                'oqtave_custom_ticker_options_cb',
                'oqtave-custom-ticker-settings'
    );

// headline color fields
    add_settings_field(
        'ticker-color-code',
        'Ticker color',
        'ticker_color_code',
        'oqtave-custom-ticker-settings',
        'oqtave_custom_ticker_option'
    );  

// headline bg fields
    add_settings_field(
        'ticker-bg-color-code',
        'Ticker bg color',
        'ticker_bg_color_code',
        'oqtave-custom-ticker-settings',
        'oqtave_custom_ticker_option'
    );  

// headline marquee speed
    add_settings_field(
        'ticker-speed',
        'Ticker speed',
        'ticker_speed',
        'oqtave-custom-ticker-settings',
        'oqtave_custom_ticker_option'
    );  

// headline marquee direction
    add_settings_field(
        'ticker-direction',
        'Ticker direction',
        'ticker_direction',
        'oqtave-custom-ticker-settings',
        'oqtave_custom_ticker_option',
        array(
            'label1' => 'Left',
            'label2' => 'Right'
        )
    );  

// Display text
    add_settings_field( 
        'oqtave-custom-ticker-display-text',
        'Display text',
        'oqtave_custom_ticker_display_text',
        'oqtave-custom-ticker-settings',
        'oqtave_custom_ticker_option'
    );

// Display text color
    add_settings_field( 
        'display-text-color',
        'Display text color',
        'oqtave_custom_ticker_display_text_color',
        'oqtave-custom-ticker-settings',
        'oqtave_custom_ticker_option'
    );

// Display text bg color
    add_settings_field( 
        'oqtave-custom-ticker-display-text-bg-color',
        'Display text bg color',
        'oqtave_custom_ticker_display_text_bg_color',
        'oqtave-custom-ticker-settings',
        'oqtave_custom_ticker_option'
    );

// Show on top
    add_settings_field( 
        'ticker-show-on-top',
        'Show ticker on top',
        'show_ticker_on_top',
        'oqtave-custom-ticker-settings',
        'oqtave_custom_ticker_option',
        array(
            'label' => 'Show on top' 
        )
    );

// register settings
    register_setting( 
        'oqtave_custom_ticker_options',
        'oqtave_custom_ticker_options'
    );

}
 
// Section
add_action( 'admin_init', 'oqtave_custom_ticker_options' );
   

// pages

// headline list page callback
function oqtave_custom_ticker_main_page_cb() {
    
    // Page Title
    echo "<h1>".get_admin_page_title() . "</h1><hr>";

    // Headline list 
    include( plugin_dir_path( __FILE__ ) . 'oqtave-custom-ticker-list.php' );

} 

// add new ticker cb
function oqtave_custom_ticker_add_new_cb() {

        // Add new headline 
        include ( plugin_dir_path( __FILE__ ) . 'oqtave-custom-ticker-add-new.php' );

}   

// settings cb
function oqtave_custom_ticker_settings_cb() {

   // Add new headline 
    include ( plugin_dir_path( __FILE__ ) . 'oqtave-custom-ticker-settings.php' );

}



// Settings section

// settings section cb
function oqtave_custom_ticker_options_cb() {
          echo "shortcode '[oqtave-custom-ticker-shortcode]'";
}
    
// ticker color
function ticker_color_code() {
    
$text_color = "";
global $oqtave_custom_ticker_option;

// If color added
        if( isset( $oqtave_custom_ticker_option['text_color'] ) ) {
              $text_color = $oqtave_custom_ticker_option['text_color'];
        }

// fields
 echo '<input type="text" name="oqtave_custom_ticker_options[text_color]" value="'. $text_color .'" >';

}

// ticker bg color
function ticker_bg_color_code() {
    
$bg_color = "";
global $oqtave_custom_ticker_option;

// If bg color added
        if( isset( $oqtave_custom_ticker_option['bg_color'] ) ) {
            $bg_color = $oqtave_custom_ticker_option['bg_color'];
        }

// fields
 echo '<input type="text" name="oqtave_custom_ticker_options[bg_color]" value="'. $bg_color .'" >';

}

// ticker speed
function ticker_speed() {
    
$ticker_speed = "";
global $oqtave_custom_ticker_option;

// If bg color added
        if( isset( $oqtave_custom_ticker_option['ticker_speed'] ) ) {
            $ticker_speed = $oqtave_custom_ticker_option['ticker_speed'];
        }

// fields
 echo '<input type="number" name="oqtave_custom_ticker_options[ticker_speed]" value="'. $ticker_speed .'" min="0.01" max="2.01" step="0.05" >';

}

// Marquee direction
function ticker_direction( $args ) {
    
    $ticker_direction = "";
    global $oqtave_custom_ticker_option;
    
    // if selected 
            if( isset( $oqtave_custom_ticker_option['ticker_direction'] ) ) {
                $ticker_direction = $oqtave_custom_ticker_option['ticker_direction'];
            }
    
    // fields
     echo '<input type="radio" id="ticker_direction_left" name="oqtave_custom_ticker_options[ticker_direction]" value="left" '. checked( 'left', $ticker_direction, false) .' >
            <label for="ticker_direction_left">'. $args['label1'] .'</label> &nbsp
            <input type="radio" id="ticker_direction_right" name="oqtave_custom_ticker_options[ticker_direction]" value="right" '. checked( 'right', $ticker_direction, false) .' >
            <label for="ticker_direction_right">'. $args['label2'] .'</label> ';
    }
    

// Display text 
function oqtave_custom_ticker_display_text() {
    
$display_text = "";
global $oqtave_custom_ticker_option;

// If display text added
        if( isset( $oqtave_custom_ticker_option['display_text'] ) ) {
            $display_text = $oqtave_custom_ticker_option['display_text'];
        }

// fields
 echo '<input type="text" name="oqtave_custom_ticker_options[display_text]" value="'. $display_text .'" >';

}

// Display text color
function oqtave_custom_ticker_display_text_color() {
    
$display_text_color = "";
global $oqtave_custom_ticker_option;

// If display text color added
        if( isset( $oqtave_custom_ticker_option['display_text_color'] ) ) {
            $display_text_color = $oqtave_custom_ticker_option['display_text_color'];
        }

// fields
echo '<input type="text" name="oqtave_custom_ticker_options[display_text_color]" value="'. $display_text_color .'" >';

}

// Display text bg color
function oqtave_custom_ticker_display_text_bg_color() {
    
$display_text_bg_color = "";
global $oqtave_custom_ticker_option;

// If display text bg added
        if( isset( $oqtave_custom_ticker_option['display_text_bg_color'] ) ) {
            $display_text_bg_color = $oqtave_custom_ticker_option['display_text_bg_color'];
        }

// fields
 echo '<input type="text" name="oqtave_custom_ticker_options[display_text_bg_color]" value="'. $display_text_bg_color .'" >';

}

// Show on top cb
function show_ticker_on_top( $args ) {
    
$show_ticker_on_top = "";
global $oqtave_custom_ticker_option;

// if checked show on top
        if( isset( $oqtave_custom_ticker_option['show_ticker_on_top'] ) ) {
            $show_ticker_on_top = $oqtave_custom_ticker_option['show_ticker_on_top'];
        }

// fields
 echo '<input type="checkbox" id="show_ticker_on_top" name="oqtave_custom_ticker_options[show_ticker_on_top]" value="1" '. checked( 1, $show_ticker_on_top, false) .' >
        <label for="show_ticker_on_top">'. $args['label'] .'</label> ';

}





