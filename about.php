<?php

/*
 * About Page for Apex
 * 
 */

    if(!isset($_COOKIE['user'])){
        setcookie('user',time(),time()+60*60);
    }

/****************************************************************
 * Inclusions & Database Connecting
 ****************************************************************/
    include_once('modules/modules.php');
    include_once('database/db_object.php');  
    include_once('queries/get_about.php');
    include_once('queries/get_images.php');

    $con = mysql_connect("localhost","user","pass");
    if(!$con) die('Could not connect: ' . mysql_error());
    mysql_select_db("webcomic",$con);
/****************************************************************
 * Start Web Page! Load Modules
 ****************************************************************/
    display_start();   
    display_header(); 
    display_menu();   
/****************************************************************
 * Unique Page Info
 ****************************************************************/
?>

<div id="about-info" class="span-12">
    <p> <?php echo get_about_latest($con); ?> </p>        
</div>
   
<div id="image-col" class="span-8">
    <?php
        $source = images_get_image_by_name($con, 'team');
        echo "<img id ='about_phto' alt='about-photo' src=$source width='400' height='200' />";
    ?>
</div>
<?php
/****************************************************************
 * Finish With the Footer
 ****************************************************************/
display_footer();



/****************************************************************
 * End of Page -- Additional Functions
 ****************************************************************/
?>
