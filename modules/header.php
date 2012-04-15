<?php

/*
 * header.php
 * 
 * first thing the user will 'see'
 * might add a banner here for the page
 * 
 * span-24
 */

function display_header()
{
    echo <<< _END
    
    <div id="header" class="span-24">
       <img src= "images/banner.gif" width="900" height="200"/>
    </div>

    
    
_END;
}
?>
