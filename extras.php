<?php

/*
 * Extras Page, for the extras for the sites (jokes, fanart, promo material, etc.)
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


<!-- Back to Php for the footer! -->
<?php

display_footer();

?>