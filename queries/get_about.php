<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function get_about_latest($db)
{
    $query = "SELECT article
                FROM news
                WHERE name='about'
                ORDER BY date_added DESC
                LIMIT 0,1";
    $result = mysql_query($query,$db) or die("bad query");
    $about = mysql_fetch_assoc($result);
    
    return $about['article'];
}


function get_about_all($db)
{
    $query = "SELECT article
                FROM news
                WHERE name='about'
                ORDER BY date_added DESC";
    $db->query($query);
    $about = $db->getAllRowsSock();
    
    return $about;
}

function get_about_specific($db,$about_num)
{
    if($about_num < 1) return "bad value";
    $query = "SELECT article
                FROM news
                WHERE name='about'
                ORDER BY date_added DESC
                LIMIT ".($about_num-1).",$about_num";
    $db->query($query);
    $about = $db->getRowSock();
    
    return $about;
}
?>