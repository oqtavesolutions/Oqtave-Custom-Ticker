<?php

function oqtave_custom_ticker_shortcode_cb() {
     // db config
  global $wpdb;

  // table name and sql
      $table_name  = $wpdb -> prefix . 'oqtave_custom_ticker';
      $sql = "SELECT * FROM $table_name ORDER BY id DESC";
  
  // get results
      $results = $wpdb -> get_results( $sql );

    // shortcode variable
    $html = "";
    
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
          
          $html = "<section id='oqtave-custom-ticker-frontend-section' class='oqtave-custom-ticker-frontend-section'>
          <div class='latest'>".$display_text."</div>
          <div id='oqtave-custom-ticker-frontend-section-marquee-shortcode'> ";
          

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
          
         $html .= "<li> <a href='".$val -> url."' class='oqtave-custom-ticker-shortcode-item' ".$target."". $rel .">".$val -> text."</a></li>";
       
         }else {
      
        //  other item 
     
        $html .= "<li><a href='".$val -> url."' class='oqtave-custom-ticker-shortcode-item' ".$target." ". $rel . ">| ".$val -> text."</a></li>";
 
          } // items
      } // foreach loop

      $html .= "</div></section>";

  } // result
  
      return $html; 

}

// Short code
add_shortcode( 'oqtave-custom-ticker-shortcode', 'oqtave_custom_ticker_shortcode_cb' );

