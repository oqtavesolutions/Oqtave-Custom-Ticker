<!-- Page Title -->
<h1>Edit Ticker </h1><hr>
<h2>Fill all fileds</h2>

<!--  Success message -->

<?php function oqtave_custom_ticker_edit_success() { ?>
   
<div class="notice notice-success is-dismissible">
    <p><?php  _e( "Edited successfully", 'oqtave-custom-ticker' ) ?> <a href="<?php echo admin_url( 'admin.php?page=oqtave-custom-ticker' ) ?>">Show</a> </p>
</div>

<?php } ?>

<!--  error message -->

<?php function oqtave_custom_ticker_edit_error() {  ?>
  
<div class="notice notice-error is-dismissible">
    <p><?php  _e( "Error, please try again or make sure that you edited something", 'oqtave-custom-ticker' ) ?></p>
</div>

<?php
}

global $wpdb;

// table name
    $table_name = $wpdb -> prefix . 'oqtave_custom_ticker';

// item id
    $item_id = $_GET[ 'edit_id' ] ;

// query
    $sql = "SELECT * FROM $table_name WHERE id = $item_id";
// result
    $result = $wpdb -> get_results( $sql );

// empty variable
$text = $url = $no_follow = $new_window = "";

    if( ! empty( $result ) ) {

        foreach ($result as  $value) {
        
            $text = $value -> text; // text
            $url = $value -> url; // url
            $no_follow = $value -> no_follow; // rel type
            $new_window = $value -> new_window; // url target

        }
    
    
    } // result



// save edit
if( isset( $_POST[ 'save-headline' ]  ) ) {

// get data
    $text = trim($_POST[ 'oqtave-custom-ticker-text' ]);
    $url = trim($_POST[ 'oqtave-custom-ticker-url' ]);
// url target
    $new_window = 0;
    if( isset($_POST[ 'new_window' ] ) ) {
        $new_window  = 1;
    }
// rel type
    $no_follow = 0;
    if( isset( $_POST[ 'no_follow' ] ) ) {
        $no_follow = 1;
    }

// Insert data 
    if ( $wpdb -> update( $table_name, array( 
            'text'     => $text,
            'url'        => $url,
            'new_window' => $new_window,
            'no_follow' => $no_follow
        ),array(
            'id' => $item_id // edit in this row
            )
        )  
    ) {

// Success message
    oqtave_custom_ticker_edit_success();
        }else{
// error message
    oqtave_custom_ticker_edit_error();
        }

} // save edit

?>

<!-- Edit form -->
<form method="post">

    <label for="oqtave-custom-ticker-text-input">Ticker text</label><br>
    <textarea name="oqtave-custom-ticker-text" id="oqtave-custom-ticker-text-input" cols="100" rows="3"  required> <?php echo $text ?> </textarea><br><br>

    <label for="oqtave-custom-ticker-url-input">URL</label><br>
    <input type="text" name="oqtave-custom-ticker-url" id="oqtave-custom-ticker-url-input" value="<?php echo $url ?>"  > <br><br>

    <?php if( $no_follow == 1 ) { ?>
        <input type="checkbox" name="no_follow" id="no-follow" checked>
    <?php } else { ?>
        <input type="checkbox" name="no_follow" id="no-follow" >
   <?php } ?> 

   <label for="no-follow">Set no-follow </label> <br><br>

   <?php if( $new_window == 1 ) { ?>
        <input type="checkbox" name="new_window" id="new-window" checked>
    <?php } else { ?>
        <input type="checkbox" name="new_window" id="new-window">
   <?php } ?> 

    <label for="new-window">Open in new window </label> <br><br>

    <button type="submit" name="save-headline"> Save headline </button>

</form> 









