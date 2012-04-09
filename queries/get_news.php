<?php

/*
 * Queries to get the news for the Front Page
 */
include_once('db_object.php');


/**
 *  Returns Latest Entry for News
 * @param type $db Pointer to db object
 * @return type News article found
 */
function news_get_latest($db)
{
    $query = "SELECT name,date_added,article
                FROM news
                ORDER BY id desc
                LIMIT 1";
        
    $db->query($query);
    $news = $db->getRowSock();
    return $news;
}

/**
 *
 * @param type $db type $db Pointer to db object
 * @param type $date find specfic article by date added
 * @return type News article found
 */
function news_get_news_date($db,$date)
{
    $query = "SELECT name,date_added,article
                FROM news
                WHERE date_added = $date";
    
    $db->query($query);
    $news = $db->getRowSock();
    return $news;
}

/**
 *
 * @param type $db type $db Pointer to db object
 * @param type $number find specific article by order added
 * @return type News article found
 */
function news_get_news_number($db,$number)
{
    $query = "SELECT name,date_added,article
                FROM news
                WHERE id = $number";
    
    $db->query($query);
    $news = $db->getRowSock();
    return $news;
}
?>
