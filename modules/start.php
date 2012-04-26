<?php
/*
 * Start.php
 * 
 * Contains Information needed to display the page background-color:#ADADAD;
 */

function display_start()
{
    echo <<< _END
   
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Apex Comics!</title>

        <link rel="stylesheet" href="blueprint/blueprint/screen.css" type="text/css" media="screen,projection" />
        <link rel="stylesheet" href="blueprint/blueprint/print.css"  type="text/css" media="print" />
        <!--[if lt IE 8]><link rel="stylesheet" href="blueprint/blueprint/ie.css" type="text/css" media="screen, projection"><![endif]-->
        <link rel="stylesheet"
	    
        
        <style type="text/css">
			
        grey_back.jpg {
			width: 100%;
			position: absolute;
			top: 0;
			left: 0;
		}
        
		body
		{
        	background-image:url('../images/grey_back.jpg');
        }
        
		</style>
    </head>

    <body>
        <div class="container"style="font-size:16px; background-color:#ADADAD;">
_END;
}

?>
