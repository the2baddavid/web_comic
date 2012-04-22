<?php

/*
 *menu.php
 * 
 * main menu for navigation within the webpages
 */
function display_menu()
{
    echo <<< _END
    <div id="menu" class="span-24"style="font-size:30px;">
        <table>
        <tr>
            <td><a href="index.php" id="menu-home">Home</a></td>
            <td><a href="comics.php" id="menu-comics">Comics</a></td>
            <td><a href="extras.php" id="menu-extras">Extras</a></td>
            <td><a href="about.php" id="menu-about">About</a></td>
        </tr>
        </table>
    </div>
_END;
}
?>
