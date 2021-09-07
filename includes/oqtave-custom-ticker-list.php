<?php 

    global $wpdb;

// table name
    $table_name  = $wpdb -> prefix . 'oqtave_custom_ticker';
// sql
    $sql = "SELECT * FROM $table_name ORDER BY id DESC";

// results
    $results = $wpdb -> get_results( $sql );

?>

<!-- wrapper -->
<div class="oqtave-custom-ticker-list-wrapper">

<!--  table to show in list -->
    <h3 class="h3"> <?php esc_html_e( 'Ticker List', 'oqtave-custom-ticker' ) ?> <a href="<?php echo admin_url('admin.php?page=oqtave-custom-ticker-add_new')  ?>" ><?php esc_html_e( 'Add new ', 'oqtave-custom-ticker' ) ?></a> </h3>
    <table class="display" id="oqtave-custom-ticker-list">

    <!-- Table header -->
        <thead>
        
          <tr>
            <th>#Id</th>
            <th>Text</th>
            <th>URL</th>
            <th>URL target</th>
            <th>Backlink_type</th>
            <th>Added by</th>
            <th>Added time</th>
            <th>Actions</th>
          </tr>

        </thead> 
        
        <tbody>

<?php 

// show if not empty
if( ! empty ( $results ) ) {

// print
        foreach( $results as $key => $val ) {

            $url_target = "Same window";
            $link_type = "do follow";

// url target new window
            if( 1 == $val -> new_window ) {
                $url_target =  "New window";
            }

// link type no follow
            if( 1 == $val -> no_follow ) {
                $link_type = "No follow";
            }
 
 // print row
        echo "<tr> 
                            <td>". ( $key + 1 ) ." </td>
                            <td>". $val -> text . "</td>
                            <td>". $val -> url . "</td>
                            <td>". $url_target . "</td>
                            <td>". $link_type . "</td>
                            <td>". $val -> added_by . "</td>
                            <td>". $val -> time . "</td>
                            <td>";

                            $item_id = $val -> id;  ?>

                            <!-- actions -->
                            <div class="do_action_headline">

                                <!--  delete  -->
                                <a href="<?php echo admin_url( 'admin.php?page=oqtave-custom-ticker&oqtave-custom-ticker-delete-id='. $item_id ) ?>" class="delete_ticker" onclick="do_action_with_headline( 'Delete' )"> <i class="fas fa-trash"></i></a> 
                                <!--  edit  -->                              
                                <a href="<?php echo admin_url( 'admin.php?page=oqtave-custom-ticker-add_new&edit_id='. $item_id )  ?>" class="edit_ticker" onclick="do_action_with_headline( 'Edit' )"> <i class="fas fa-pen"></i></a>
                             
                            </div>

                            <?php
                            
                            echo "</td></tr>";
                
    }

}

// delete a headline text
if( isset( $_GET[ 'oqtave-custom-ticker-delete-id' ] ) ) {

    // Delete page 
    require_once( plugin_dir_path( __FILE__ ) . 'oqtave-custom-ticker-delete.php' );

}

?>

    </tbody> <!-- # table body -->
    
    </table> <!-- # table -->

    </div> <!-- # wrapper -->
