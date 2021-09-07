<!-- Page title -->
<h1><?php esc_html_e( get_admin_page_title(), 'headlineshow' )?></h1><hr>

<!-- Form -->
<form action="options.php" method="post">

<?php do_settings_sections( 'oqtave-custom-ticker-settings' ) ?>

<?php settings_fields( 'oqtave_custom_ticker_options' ); ?>

<?php submit_button( "Save Settings" ) ?>

</form>





