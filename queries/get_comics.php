<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 * 
 CREATE TABLE comics(
    id INT UNSIGNED NOT NULL PRIMARY KEY,
    book VARCHAR(50),
    chapter INT,
    date_added DATE,
    image_path VARCHAR(50)) ENGINE INNODB;
 */

/**
 *  Gets latest comic added
 * @param type $db  database pointer
 * @return type image path for latest comic
 */
function comics_get_latest($db)
{
    $query = "SELECT image_path
                FROM comics
                ORDER BY id DESC
                LIMIT 0,1";
    $result = mysql_query($query,$db) or die("bad query");
    $comic = mysql_fetch_assoc($result);   
    
    return $comic['image_path'];
}

/**
 *  Gets All Comics For Specified Book
 * @param type $db  database pointer
 * @param type $book    book name
 * @return type Sock Array of all comics for book, with bookname, chapter, imagepath
 */
function comics_get_book_and_comic($db,$book)
{
    $query = "SELECT book_names.b_name, comics.chapter, comics.image_path
                FROM comics,book_names
                WHERE comics.book = $book
                ORDER BY chapter";
    $result = mysql_query($query,$db) or die("bad query");
    
    $comic = array();
    while($temp = mysql_fetch_assoc($result))
    {
        array_push($comic,$temp);
    }
    return $comic;
}

/**
 *  Gets all book names & ids
 * @param type $db
 * @return array 
 */
function comics_get_books($db)
{
    $query = "SELECT *
                FROM book_names";
    $result = mysql_query($query,$db);
    
    $books = array();
    while($temp = mysql_fetch_assoc($result))
    {
        array_push($books,$temp);
    }
    return $books;
}

/**
 *  Gets all comics & info for specified Book
 * @param type $db
 * @param type $book
 * @return array 
 */
function comics_get_chapters($db,$book)
{
    $query = "SELECT *
            FROM comics
            WHERE book = $book";
    $result = mysql_query($query,$db);
    
    $comic = array();
    while($temp = mysql_fetch_assoc($result))
    {
        array_push($comic,$temp);
    }
    return $comic;
}

/**
 *  Gets Prints Proper HTML line to display book names straight into radio choices
 * @param type $db 
 */
function display_book_choices($db)
{
    $query = "SELECT b_name FROM book_names";
    $result = mysql_query($query,$db);
        
    while ($temp = mysql_fetch_assoc($result))
    {
        echo "<input name='book_name' type='radio' value=".$temp['b_name'].">".$temp['b_name']." </input><br/>";
    }
}
?>
