<!-- Call another page if user want to edit edit   -->
<?php 

// edit param
if( isset( $_GET[ 'edit_id' ] ) ) {

    // Add editable file
    include ( plugin_dir_path( __FILE__ ) . 'oqtave-custom-ticker-edit.php' );
    
    return;

}

?>

<!-- // Page Title -->

<h1><?php echo get_admin_page_title() ?></h1><hr>
<h3>Please fill all fileds</h3>



<!-- success message -->
<?php function oqtave_custom_ticker_add_new_success() {  ?>
  

<div class="notice notice-success is-dismissible">
    <p><?php  _e( "Headline added", 'oqtave-custom-ticker' ) ?> <a href="<?php echo admin_url( 'admin.php?page=oqtave-custom-ticker' ) ?>">Show</a> </p>
</div>

<?php } ?>

<!-- error message -->
<?php function oqtave_custom_ticker_add_new_error() { ?>
    
<div class="notice notice-error is-dismissible">
    <p><?php  _e( "Error, please try again", 'oqtave-custom-ticker' ) ?></p>
</div>

<?php
}

// add data 
if( isset( $_POST[ 'add-new-headline' ]  ) ) {

    global $wpdb;

// table name
    $table_name = $wpdb -> prefix . 'oqtave_custom_ticker';

// get data 
    $text = $_POST[ 'oqtave-custom-ticker-text' ];
    $url = $_POST[ 'oqtave-custom-ticker-url' ];

// url target
    $new_window = 0;
    if( isset($_POST[ 'new_window' ] ) ) {
        $new_window  = 1;
    }
// link type
    $no_follow = 0;
    if( isset( $_POST[ 'no_follow' ] ) ) {
        $no_follow = 1;
    }
// user name
    $added = wp_get_current_user() -> display_name;

// Insert data 
        if ( $wpdb->insert( $table_name, array( 
            'text'     => $text,
            'url'        => $url,
            'new_window' => $new_window,
            'no_follow' => $no_follow,
            'added_by' => $added 
            )
        )  ) {
// Success message
    oqtave_custom_ticker_add_new_success();
        }else{
// error message            
    oqtave_custom_ticker_add_new_error();
        }

} ?>

<!-- add new headline form -->
<form method="post">

    <label for="oqtave-custom-ticker-text-input">Headline text</label><br>
    <textarea name="oqtave-custom-ticker-text" id="oqtave-custom-ticker-text-input" cols="100" rows="3" required></textarea><br><br>

    <label for="oqtave-custom-ticker-url-inpu">URL</label><br>
    <input type="text" name="oqtave-custom-ticker-url" id="oqtave-custom-ticker-url-input" > <br><br>

    <input type="checkbox" name="no_follow" id="no-follow">
    <label for="no-follow">Set no-follow </label> <br><br>

    <input type="checkbox" name="new_window" id="new-window">
    <label for="new-window">Open in new window </label> <br><br>


    <button type="submit" name="add-new-headline"> Add new headline </button>

</form> 






