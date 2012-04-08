<?php

/*
 * Queries to get the news for the Front Page
 */

function get_latest($db)
{
    $query = "SELECT name,date_added,article
                FROM news
                ORDER BY id desc
                LIMIT 1";
    
    //order by artid desc limit 1;
    
    $db->query($query);
}

function get_news_date($db,$date)
{
    $query = "SELECT name,date_added,article
                FROM news
                WHERE date_added = $date";
    
    $db->query($query);
}

function get_news_number($db,$number)
{
    $query = "SELECT name,date_added,article
                FROM news
                WHERE id = $number";
    
    $db->query($query);
}
?>
