<?php

/*
 *  Standalone Viewer for comics
 * 
 * TODO: Use JS to scroll through images
 * TODO: Caption for images?
 * 
 * $comic_num determines which chapter of the book is displayed, defaults to 0
 * All the information for a book is dumped into $comics, which is a 
 * numerical array holding sock arrays with all the information for each chapter
 * $(document).ready(function() {
            document.onkeydown = function() 
                {
                    switch (event.keyCode)
                    {
	                    case 39: window.location = nextUrl; break;
	                    case 37: window.location = prevUrl; break;           
                    }
                   };
            });
 */


/****************************************************************
 * Inclusions & Database Connecting
 ****************************************************************/
    include_once('modules/modules.php'); 
    include_once('queries/get_about.php');
    include_once('queries/get_images.php');
    include_once('queries/get_comics.php');

    $con = connection_start();
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
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js

"type="text/javascript"></script>


<script type="text/javascript"> //Used to offer arrowkey navigation to users of this part of the site
     $(document).ready(function() {
         document.onkeydown = function() 
             {
                 var j = event.keyIdentifier
                 if (j == "Right")
                     window.location = nextUrl
                 else if (j == "Left")
                     window.location = prevUrl            
                     }
                });

      $(document).ready(function() {
                    var nextPage = $("#next_page")
                    var prevPage = $("#previous_page")
                    nextUrl = nextPage.attr("href")
                    prevUrl = prevPage.attr("href")
                });

</script>

</head>

<?php 
echo '<div id="comic-viewer" class="span-12">';
    // Extract $_GET info --
    $book = $_GET['book'];
    $chapter = $_GET['chapter']-1;
    
    // Query Database
    $comics = comics_get_book_and_comic($con, $book);
        
    // print book & chapter -- Prints 
    echo "<h3>".$comics[$chapter]['b_name']."</h3>";
    echo "<h4> Chapter ".$comics[$chapter]['chapter']."</h4>";
    
    // print selected image from book -- 
    echo "<img src=".$comics[$chapter]['image_path']." id=".$_GET['book'].$_GET['chapter']." height='800' width='500' alt='comic' />";

    //For use with arrow key navigation
    $next = $chapter+2;
    $last = $chapter--;
 
    //Print Next button
	echo "<a id ='next_page' href='viewer.php?book=".$_GET['book']."&chapter=".$next."'>Next</a><br/>";
	
	//Print Previous button, but only if $last > 0
	if($last > 0)
	{
		echo "<a id ='previous_page' href='viewer.php?book=".$_GET['book']."&chapter=".$last."'>Previous</a><br/>";
	}

echo '</div>';
echo "<br />";
echo "<br />";

/****************************************************************
 * Finish With the Footer
 ****************************************************************/
display_footer();



/****************************************************************
 * End of Page -- Additional Functions
 ****************************************************************/
?>

