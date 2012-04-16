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
    $query = "SELECT name,article
                FROM news
                WHERE name!='about'
                ORDER BY date_added DESC
                LIMIT 0,1";
    
    $result = mysql_query($query,$db) or die("bad query");
    $news = mysql_fetch_assoc($result);
    
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
                WHERE date_added = $date
                AND name!='about'
                ORDER BY date_added DESC
                LIMIT 0,1";
    
    $result = mysql_query($query,$db) or die("bad query");
    $news = mysql_fetch_assoc($result);
    
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
    
    $result = mysql_query($query,$db) or die("bad query");
    $news = mysql_fetch_assoc($result);
    
    return $news;
}
?>
