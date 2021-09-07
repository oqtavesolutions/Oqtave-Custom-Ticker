//  action confirmation alert
function do_action_with_headline( action ) {

  if (confirm( action + ' selected item?')){
    return true;
  }else{
    event.stopPropagation();
    event.preventDefault();
    }

}

// Data table  
jQuery(document).ready(function($) {

    $('#oqtave-custom-ticker-list').dataTable({
      responsive: true
    });

  })

