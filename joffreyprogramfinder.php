<?php
/*
Plugin Name: JoffreyProgramsFinder
Description: Overlays a form throughtout the site to streamline finding an audition in your location.
Plugin URI: pending
Author: Aaron Munoz
Version: 1.0
Test Domain: joffreyauditionsfinder
Domain Path: /languages

 */
//exit if file is called directly
if ( !defined('ABSPATH')){
    exit;
    
}

//if is admin area

if(is_admin())
{
    //include dependencies
    require_once plugin_dir_path(__FILE__) .  'admin/admin-menu.php';
    require_once plugin_dir_path(__FILE__) .  'admin/settings-page.php';
}
//Not used because for the moment, it's better to enqueue at the top of the Form in joffreyauditionsfinder.php
//require_once plugin_dir_path(__FILE__) . 'public/joffrey-form.php';


function joffrey_program_form () {
    //Show only on front page and NOT IN WOOCOMMERCE. Hard coded for now. 
    if( !is_admin() && !is_page(array(11508,11509))){
            

            $theme_css = get_template();

            $theme_css = $theme_css . "-style";
        
        $src = plugin_dir_url(__FILE__).'public/js/form-programs-process.js';
        wp_enqueue_script('joffrey-programs-public-js', $src, array(), null, true);
        
        $src = plugin_dir_url(__FILE__) . 'public/css/joffrey-programs-public.css';
        wp_enqueue_style('joffrey-programs-public-style',$src,array(),null,'all');
?>

    <div class="joffrey-program-sidenav" id="joffrey-program-sidenav">

        <form method="get" id="programForm" action="" onkeypress="return event.keyCode != 13;" class="transparent-program">
<h1 style="color:  #fff;line-height: 21pt;">Summer of 2019</h1>
<hr/>
        <h1 style="color:  #83d0c9;line-height: 21pt;">Find Your <br>Summer Program</h1><br>

            <div class="tab-program form-group joffrey-labels"><p>Search By</p>
                
                <input id="program-location" type="radio" name="programOption" value="programLocation" checked class="form-check-input">
                <label for="program-location" class="form-check-label joffrey-labels">Location</label>
                
                <input id="dance-style" type="radio" name="programOption" value="danceStyle" class="form-check-input" >
                <label for="dance-style" class="form-check-label joffrey-labels">Dance Style</label>

                <button type="button" id="selectProgramOption" class="form-control">Next</button>
            </div>
            <div class="form-group tab-program">
                <select id="programLocation" class="form-control" name="programLocation">
                <option disabled selected value>--select state--</option>
                <?php
                
                $programs = get_terms(array('taxonomy' => 'programs'));
                
                foreach ( $programs as $program)
                {
                    echo "<option value =\"$program->name\">" . $program->name . "</option>";
                }
                ?>

            </select>
                <button type="button" id="selectProgramLocation" class="form-control">Next</button>
        </div>

            <div class="form-group tab-program" id="danceStyleContainer">
                <select id="danceStyle" class="form-control" name="danceStyle">
                <option disabled selected value>--dance style--</option>
                <?php 
                $danceStyles = get_terms(array('taxonomy' => 'genres'));
                
                foreach ($danceStyles as $style)
                {
                    echo "<option value =\"$style->name\">" . $style->name . "</option>";
                }
                ?>
                
               

            </select>
                <button type="button" id="submitStyle" class="form-control btnprg">Select Style</button>
        </div>




            </form>
            <button class="program-btn" id="findprogram-btn">FIND YOUR PROGRAM</button>



        </div>

<?php }
    }
    add_action('wp_head','joffrey_program_form');
    
    
    add_filter( 'init', function( $template ) {
        if ( isset( $_GET['programLocation'] ) || isset($_GET['danceStyle']) ) {

            include plugin_dir_path(__FILE__).'templates/programs-search.php';
            die;
        }
} );
    ?>