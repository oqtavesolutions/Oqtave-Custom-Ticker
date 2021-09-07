<?php

// frontend page cb
function oqtave_custom_ticker_frontend_section() {

    // db config
    global $wpdb;

    // table name and sql
        $table_name  = $wpdb -> prefix . 'oqtave_custom_ticker';
        $sql = "SELECT * FROM $table_name ORDER BY id DESC";
    
    // get results
        $results = $wpdb -> get_results( $sql );

    // Display text
    $display_text = "Latest";

    // get_options
    if( get_option( 'oqtave_custom_ticker_options' ) ) {
            $options = get_option( 'oqtave_custom_ticker_options' );

            if( isset( $options[ 'display_text' ] ) && !empty( $options[ 'display_text' ] ) ) {
                $display_text = $options[ 'display_text' ];
            }
    }

        if( ! empty( $results ) ) {
            
            echo "<section id='oqtave-custom-ticker-frontend-section' class='oqtave-custom-ticker-frontend-section'>
            <div class='latest'>".$display_text."</div>
            <div id='oqtave-custom-ticker-frontend-section-marquee'> ";
            
    // default variable
         $target = 'target="_self"'; 
         $rel = ""; 


        // print 
        foreach( $results as $key => $val ) {
            
            // target config
            if( 1 == $val -> new_window ) {
                 $target = 'target="_blank"';
            } 
            // relation config
            if( 1 == $val -> no_follow ) {
                $rel = 'rel="nofollow"';
            }
            // first item
            if( 0 == $key  ){
            ?>
           
         <li><a href="<?php echo $val -> url ?>" class="oqtave-custom-ticker-item" <?php echo $target, $rel ;?> > <?php echo $val -> text ?></a></li> 
        
        <?php }else { ?>
        
        <!-- other item -->
        <li><a href="<?php echo $val -> url ?>" class="oqtave-custom-ticker-item" <?php echo $target, $rel ;?> > | <?php echo $val -> text ?></a></li>

        <?php

            } // items
        } // foreach loop

     echo "</div></section>";

} // result
    
} // front page top cb

// hook into wp_head
add_action( 'wp_head' ,'oqtave_custom_ticker_frontend_section' );















