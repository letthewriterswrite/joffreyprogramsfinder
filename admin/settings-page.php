<?php //JoffreyAuditionsFinder -Settings Display

//exit if file is called directly
if ( !defined('ABSPATH')){
    exit;
    
}
//Display the plugin settings page
function joffreyprogramfinder_display_settings_page()
{
    if ( !current_user_can('manage_options') )        return;
    
    ?>
<div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title() ); ?></h1>
    <form action="options.php" method="post">
        <?php
        //Name of settings group
        settings_fields('joffreyprogramfinder_options');
        //Markup to display plugin settings
        do_settings_sections('joffreyprogramfinder');
        
        //submit_button();
        ?>
    </form>
</div>

<?php
}
