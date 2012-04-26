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
 * @param type $con  database pointer
 * @return type image path for latest comic
 */
function comics_get_latest($con)
{
    $query = "SELECT image_path
                FROM comics
                ORDER BY id DESC
                LIMIT 0,1";
    $result = mysql_query($query,$con) or die("bad query");
    $comic = mysql_fetch_assoc($result);   
    
    return $comic['image_path'];
}

/**
 *  Gets All Comics For Specified Book
 * @param type $con  database pointer
 * @param type $book    book name
 * @return type Sock Array of all comics for book, with bookname, chapter, imagepath
 */
function comics_get_book_and_comic($con,$book)
{
    $query = "SELECT book_names.b_name, comics.chapter, comics.image_path, comics.book, comics.id
                FROM comics,book_names
                WHERE comics.book = $book AND comics.book = book_names.id
                ORDER BY chapter";
    $result = mysql_query($query,$con) or die("bad query");
    
    $comic = array();
    while($temp = mysql_fetch_assoc($result))
    {
        array_push($comic,$temp);
    }
    return $comic;
}

/**
 *  Gets all book names & ids
 * @param type $con
 * @return array 
 */
function comics_get_books($con)
{
    $query = "SELECT *
                FROM book_names";
    $result = mysql_query($query,$con);
    
    $books = array();
    while($temp = mysql_fetch_assoc($result))
    {
        array_push($books,$temp);
    }
    return $books;
}

/**
 *  Gets all comics & info for specified Book
 * @param type $con
 * @param type $book
 * @return array 
 */
function comics_get_chapters($con,$book)
{
    $query = "SELECT *
            FROM comics
            WHERE book = $book";
    $result = mysql_query($query,$con);
    
    $comic = array();
    while($temp = mysql_fetch_assoc($result))
    {
        array_push($comic,$temp);
    }
    return $comic;
}

/**
 *  Gets Prints Proper HTML line to display book names straight into radio choices
 * @param type $con 
 */
function display_book_choices($con)
{
    $query = "SELECT b_name FROM book_names";
    $result = mysql_query($query,$con);
        
    while ($temp = mysql_fetch_assoc($result))
    {
        echo "<input name='book_name' type='radio' value=".$temp['b_name'].">".$temp['b_name']." </input><br/>";
    }
}
?>
