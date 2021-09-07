<?php

// admin assests
function oqtave_custom_ticker_admin_assests( $hook ) {

// register style
    // admin css
    wp_register_style( 
        'oqtave-custom-ticker-admin-css', 
        OQTAVE_CUSTOM_TICKER_PLUGIN_URL . 'assests/admin/css/oqtave-custom-ticker-admin.css', 
        false,
        '1.0',
        'all'
    );

    // datatable css
    wp_register_style( 
        'oqtave-custom-ticker-datatable-css',
        OQTAVE_CUSTOM_TICKER_PLUGIN_URL . 'assests/DataTables/datatables.min.css',
        [ 'oqtave-custom-ticker-admin-css' ],
        '1.0'
    );

    // datatable responsive css
    wp_register_style( 
        'oqtave-custom-ticker-datatable-responsive-css',
        OQTAVE_CUSTOM_TICKER_PLUGIN_URL . 'assests/DataTables/Responsive/css/responsive.dataTables.min.css',
        [ 'oqtave-custom-ticker-datatable-css' ],
        '1.0'
    );

    // fontawesome css
    wp_register_style( 
        'oqtave-custom-ticker-fontawesome-css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css',
        false,
        '1.0',
        'all'
    );

// register scripts
    // admin js
    wp_register_script( 
        'oqtave-custom-ticker-admin-js',
        OQTAVE_CUSTOM_TICKER_PLUGIN_URL . 'assests/admin/js/oqtave-custom-ticker-admin.js',
        false,
        '1.0',
        'all'
    );

    // datatable js
    wp_register_script( 
        'oqtave-custom-ticker-datatable-js',
        OQTAVE_CUSTOM_TICKER_PLUGIN_URL . 'assests/DataTables/datatables.min.js',
        [ 'oqtave-custom-ticker-admin-js' ],
        '1.0'   
    );

    // datatable responsive js
    wp_register_script( 
        'oqtave-custom-ticker-datatable-responsive-js',
        OQTAVE_CUSTOM_TICKER_PLUGIN_URL . 'assests/DataTables/Responsive/js/responsive.dataTables.min.js',
        [ 'oqtave-custom-ticker-datatable-js' ],
        '1.0'    
    );


// admin js 
        wp_enqueue_script( 'oqtave-custom-ticker-admin-js' );
        // datatable js
        wp_enqueue_script( 'oqtave-custom-ticker-datatable-js' );
        // datatable responsive js
        wp_enqueue_script( 'oqtave-custom-ticker-datatable-responsive-js' );

// admin css
        wp_enqueue_style( 'oqtave-custom-ticker-admin-css' );
        // datatable css
        wp_enqueue_style( 'oqtave-custom-ticker-datatable-css' );
        // data table responsive css
        wp_enqueue_style( 'oqtave-custom-ticker-datatable-responsive-css' );
        // fontawesome css
        wp_enqueue_style( 'oqtave-custom-ticker-fontawesome-css' );


}

// hook 
add_action( 'admin_enqueue_scripts', 'oqtave_custom_ticker_admin_assests' );

// ########## Admin - Assests ################

// frontend assests
function oqtave_custom_ticker_frontend_assests() {

// register style
    // main css 
    wp_register_style( 
        'oqtave-custom-ticker-frontend-css',
        OQTAVE_CUSTOM_TICKER_PLUGIN_URL . 'assests/frontend/css/oqtave-custom-ticker-frontend.css',
        false,
        '1.0'
    );

    // marquee css
    wp_register_style( 
        'oqtave-custom-ticker-marquee-css',
        OQTAVE_CUSTOM_TICKER_PLUGIN_URL. 'assests/frontend/css/marqueue-style.min.css',
        false,
        '1.0'
    );

// register js

    // ticker js
   wp_register_script(
           'marquee-js',
           OQTAVE_CUSTOM_TICKER_PLUGIN_URL . 'assests/frontend/js/marqueue.min.js',
           [ 'jquery' ],
           '1.0'
    );

 // Enqueue css
    // main css
    wp_enqueue_style( 'oqtave-custom-ticker-frontend-css' );
    // marquee css
    wp_enqueue_style( 'oqtave-custom-ticker-marquee-css' );

    // marquee js
    wp_enqueue_script( 'marquee-js' );

}

// hook
add_action( 'wp_enqueue_scripts', 'oqtave_custom_ticker_frontend_assests' );

// ########## frontend - Assests ################

// Users settings
function users_customization() {

    // get_options
    if( get_option( 'oqtave_custom_ticker_options' ) ) {
        $options = get_option( 'oqtave_custom_ticker_options' );
    }

    //  add user settings to page
    $display_text_color = "black";
    $display_text_bg_color = "green";
    $ticker_color = "black";
    $ticker_bg_color = "yellow";
    $ticker_speed = 0.05;
    $ticker_direction = "left";

    // display text color
    if( isset( $options[ 'display_text_color' ] ) && !empty( $options[ 'display_text_color' ] ) ) {
        $display_text_color = $options[ 'display_text_color' ];
    }

    // display text bg color
    if( isset( $options[ 'display_text_bg_color' ] ) && !empty( $options[ 'display_text_bg_color' ] ) ) {
        $display_text_bg_color = $options[ 'display_text_bg_color' ];
    }

    // text color
    if( isset( $options[ 'ticker_color' ] ) && !empty( $options[ 'ticker_color' ] ) ) {
        $ticker_color = $options[ 'ticker_color' ];
    }

    // text bg color
    if( isset( $options[ 'ticker_bg_color' ] ) && !empty( $options[ 'ticker_bg_color' ] ) ) {
        $ticker_bg_color = $options[ 'ticker_bg_color' ];
    }

    // marquee_speed
    if( isset( $options[ 'ticker_speed' ] ) && !empty( $options[ 'ticker_speed' ] ) ) {
        $ticker_speed = $options[ 'ticker_speed' ];
    }

    // marquee direction
    if( isset( $options[ 'ticker_direction' ] ) && !empty( $options[ 'ticker_direction' ] ) ) {
        $ticker_direction = $options[ 'ticker_direction' ];
    }

?>

<!-- enqueue to frontend -->
<style>

/* headline color */
.oqtave-custom-ticker-frontend-section li a {
    color: <?php echo $ticker_color ?>;
}

/* headline bg color */
.oqtave-custom-ticker-frontend-section {
    background: <?php echo $ticker_bg_color ?>;
}

/* display text color */
.oqtave-custom-ticker-frontend-section .latest {
    color: <?php echo $display_text_color ?> ;
}

/* display text bg color */
.oqtave-custom-ticker-frontend-section .latest {
    background-color: <?php echo $display_text_bg_color ?> ;
}
</style>

<!-- Marquee settings -->
<script>
    jQuery(document).ready( function( $ ) {
  
  // top 
      $('#oqtave-custom-ticker-frontend-section-marquee').AcmeTicker({
        type:'marquee',/*horizontal/horizontal/Marquee/type*/
        direction: '<?php echo $ticker_direction ?>',/*up/down/left/right*/
        speed: <?php echo $ticker_speed ?>,/*true/false/number*/ /*For vertical/horizontal 600*//*For marquee 0.05*//*For typewriter 50*/
      });
  
  // shortcode
      $('#oqtave-custom-ticker-frontend-section-marquee-shortcode').AcmeTicker({
        type:'marquee',/*horizontal/horizontal/Marquee/type*/
        direction: '<?php echo $ticker_direction ?>',/*up/down/left/right*/
        speed: <?php echo $ticker_speed ?>,/*true/false/number*/ /*For vertical/horizontal 600*//*For marquee 0.05*//*For typewriter 50*/
      });
  
  });
</script>


<?php
} // function

// hook into head
add_action( 'wp_head' ,'users_customization' );








