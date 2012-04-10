<?php
/*
 * Start.php
 * 
 * Contains Information needed to display the page
 */

function display_start()
{
    echo <<< _END
    <?xml version="1.0" encoding="UTF-8" ?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <title>Apex Comics!</title>
            
            <link rel="stylesheet" href="blueprint/blueprint/screen.css" type="text/css" media="screen, projection"/>
            <link rel="stylesheet" href="blueprint/blueprint/print.css" type="text/css" media="print"/>
            <!--[if IE]><link rel="stylesheet" href="blueprint/blueprint/ie.css" type="text/css" media="screen, projection"><![endif]-->
            <link rel="stylesheet" href="blueprint/plugins/fancy-type/screen.css" type="text/css" media="screen, projection" /> 
	</head>
_END;
}

?>
