<?php

/*
 * About Page for Apex
 * 
 * TODO: Add Spot for About on database and way to modify it
 */

include_once('modules/modules.php');
include_once('database/db_object.php');  

$server_name='localhost';
$db_name='';
$user='user';
$pass='pass';

$db = new DB_OBJECT($server_name, $db_name, $user, $pass);

display_start();    // No Span
display_header();   // Span should be 24, the entire page
display_menu();     // if horizontal then this should also span 24
?>
<!-- Stuff that is specific to a page goes here -->

<div id="about-info" class="span-12">
        <!--    Here we can display the information the creators
        		of Apex Comics find important to their creation and
        		and for the inspriation of their work. This can either be
        		hardcoded are made into a php module, but hardcoded will probably
        		be best.-->
        <p>
                This will be where the information about the creators of Apex Comics can
            	give information about themsevles and their work in orderro inform other 
            	readers. Probably won't change to much, and we will be sure to make room
            	for pictures if necessary.
                <?php
                    echo get_about_latest($db);
                ?>
        </p>
        
        </div>
   
<div id="image-col" class="span-8">

		<img id ="about_phto" alt="team photo?"
            src="images/team.jpg" width="400" height="200" />
</div>



<!-- Back to Php for the footer! -->
<?php

display_footer();

?>