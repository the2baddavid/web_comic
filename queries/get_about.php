<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

function get_about_latest($db)
{
    $query = "SELECT article
                FROM news
                WHERE article='news'
                SORT BY date_added
                LIMIT 0,1";
    $db->query($query);
    $about = $db->getRowSock();
    
    return $about;
}

function get_about_all($db)
{
    $query = "SELECT article
            FROM news
            WHERE article='news'
            SORT BY date_added";
    $db->query($query);
    $about = $db->getAllRowsSock();
    
    return $about;
}

function get_about_specific($db,$about_num)
{
    if($about_num < 1) return "bad value";
    $query = "SELECT article
            FROM news
            WHERE article='news'
            SORT BY date_added
            LIMIT ".($about_num-1).",$about_num";
    $db->query($query);
    $about = $db->getRowSock();
    
    return $about;
}
?>