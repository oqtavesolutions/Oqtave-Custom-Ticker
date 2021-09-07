<!--  Success message -->
<?php function oqtave_custom_ticker_delete_success() { ?>
    
<div class="notice notice-success is-dismissible">
    <p><?php  _e( "Ticker deleted", 'oqtave-custom-ticker' ) ?></p>
</div>

<!-- reloading page to prevent error  -->
<script>
        setTimeout(function(){ 
        window.location.href= '<?php echo admin_url( 'admin.php?page=oqtave-custom-ticker' ) ?>';
        }, 500);
</script>

    <?php } ?>


<!-- error message -->
<?php function oqtave_custom_ticker_delete_error() { ?>
    
<div class="notice notice-error is-dismissible">
    <p><?php  _e( "Error, please try again", 'oqtave-custom-ticker' ) ?></p>
</div>

<!-- reloading page to prevent error  -->
<script>
        setTimeout(function(){ 
        window.location.href= '<?php echo admin_url( 'admin.php?page=oqtave-custom-ticker-list' ) ?>';
        }, 500);
</script>

<?php
}


global $wpdb;

// Table name 
    $table_name = $wpdb -> prefix. 'oqtave_custom_ticker';
// item id
    $id = $_GET[ 'oqtave-custom-ticker-delete-id' ];
    
// delete query
    if( $wpdb -> delete( $table_name, array( 'id' => $id ) ) ) {
        // Sucecss Message
        oqtave_custom_ticker_delete_success();
    }else{
        // Error message
        oqtave_custom_ticker_delete_error();
    }








