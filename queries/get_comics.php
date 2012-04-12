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
include_once('db_object.php');


/**
 *  Gets latest comic added
 * @param type $db  database pointer
 * @return type image path for latest comic
 */
function comics_get_latest($db)
{
    $query = "SELECT image_path
                FROM comics
                ORDER BY id desc
                LIMIT 1";
    $db->query($query);
    
    $db->query($query);
    $comic = $db->getRow();    
    return $comic['image_path'];
}

/**
 *  Gets All Comics For Specified Book
 * @param type $db  database pointer
 * @param type $book    book name
 * @return type Sock Array of all comics for book, with bookname, chapter, imagepath
 */
function comics_get_book($db,$book)
{
    $query = "SELECT book_names.b_name,comics.chapter,comics.image_path
                FROM comics,book_names
                WHERE book_names.b_name = $book
                AND comics.$book = book_names.b_name
                ORDER BY chapter";
    $db->query($query);
    $comic = $db->getAllRowsSock();
    return $comic;
}

function comics_get_booknames($db)
{
    $query = "SELECT b_names
                FROM book_names";
    $db->query($query);
    $names = $db->getAllRowsNum();
    return $names;
}

?>
