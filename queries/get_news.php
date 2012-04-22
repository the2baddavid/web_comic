<?php

/*
 * Queries to get the news for the Front Page
 */


/**
 *  Returns Latest Entry for News
 * @param type $con Pointer to db object
 * @return type News article found
 */
function news_get_latest($con)
{
    $query = "SELECT name,article
                FROM news
                WHERE name!='about'
                ORDER BY news.id DESC
                LIMIT 0,1";
    
    $result = mysql_query($query,$con) or die("bad query");
    $news = mysql_fetch_assoc($result);
    
    return $news;
}


/**
 *
 * @param type $con type $con Pointer to db object
 * @param type $date find specfic article by date added
 * @return type News article found
 */
function news_get_news_date($con,$date)
{
    $query = "SELECT name,date_added,article
                FROM news
                WHERE date_added = $date
                AND name!='about'
                ORDER BY date_added DESC
                LIMIT 0,1";
    
    $result = mysql_query($query,$con) or die("bad query");
    $news = mysql_fetch_assoc($result);
    
    return $news;
}

/**
 *
 * @param type $con type $con Pointer to db object
 * @param type $number find specific article by order added
 * @return type News article found
 */
function news_get_news_number($con,$number)
{
    $query = "SELECT name,date_added,article
                FROM news
                WHERE id = $number";
    
    $result = mysql_query($query,$con) or die("bad query");
    $news = mysql_fetch_assoc($result);
    
    return $news;
}
?>
