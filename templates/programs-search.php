<?php

get_header();

//Gets location entry from form
if(isset($_GET['programLocation']))
{
    $location = htmlspecialchars($_GET['programLocation']);
    $search = $location;    
//Arguments for query
$args = array(
    'post_type' => 'page',
    'posts_per_page' => -1,
    'tax_query' => array(array('taxonomy' => 'programs','field' => 'name','terms' =>$location,'include_children' => false))
);    
}

if(isset($_GET['danceStyle']))
{
    $dance_style = htmlspecialchars($_GET['danceStyle']);
    $search = $dance_style;

//Arguments for query
$args = array(
    'post_type' => 'page',
    'posts_per_page' => -1,
    'tax_query' => array(array('taxonomy' => 'genres','field' => 'name','terms' =>$dance_style,'include_children' => false))
);  
}


$query = new WP_Query($args);


?>

<div class="container-fluid" style="text-align: center;">
    <h1>Your Joffrey Summer Intensive Results For: <strong><?php echo $search;  ?></strong></h1>

    <ul style="flex-wrap: wrap;">
        <?php
            while ($query ->have_posts()) : 
                $query->the_post();
        ?>
        <li>
            <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
            <div style="max-width: 60%; margin: auto;">
                <a href="<?php the_permalink() ?>">
                    <img src="<?php echo plugins_url() . '/joffreyprogramsfinder/public/img/' . get_the_ID(); ?>.jpg" alt="image-of-event">
                </a>
                <div style="position: relative; bottom: 20px; background-color: black; ">
                    <a style="color: white;" href="<?php the_permalink()?>">Click To Learn More</a>
                </div>
            </div>
        </li>
        <?php endwhile;    wp_reset_query(); ?>
    </ul>

</div>
<?php get_footer(); ?>

