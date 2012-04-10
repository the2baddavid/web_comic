<?php

/*
 *menu.php
 * 
 * main menu for navigation within the webpages
 */
function display_menu()
{
    echo <<< _END
    <div id="menu" class="spawn-24">
        <table>
            <td><a href="/" id="menu-home">Home</a></td>
            <td><a href="/archive" id="menu-comics">Comics</a></td>
            <td><a href="/extras" id="menu-extras">Extras</a></td>
            <td><a href="/about" id="menu-about">About</a></td>
        </table>
    </div>
_END;
}
?>
