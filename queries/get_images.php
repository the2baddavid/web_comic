<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 * 
 CREATE TABLE images(
    id INT UNSIGNED NOT NULL PRIMARY KEY,
    i_name VARCHAR(50),
    image_path VARCHAR(50)) ENGINE INNODB;
 */
include_once('db_object.php');

/**
 *  Returns Path for Specific Image
 * @param type $db  database pointer
 * @param type $id  Id of specific image
 * @return type     image path
 */
function get_image_by_id($db,$id)
{
    $query = "SELECT image_path
                FROM images
                WHERE id = $id";
    
    $db->query($query);
    $image = $db->getRow();    
    return $image['image_path'];
}

/**
 *  Returns Path for Specific Image
 * @param type $db database pointer
 * @param type $name name of image to find
 * @return type path of image
 */
function get_image_by_name($db,$name)
{
    $query = "SELECT image_path
                FROM images
                WHERE i_name = $name";
    
    $db->query($query);
    $image = $db->getRow();    
    return $image['image_path'];
}

/**
 *  Gets All the images with names and path
 * @param type $db  database pointer
 * @return type Sock Array for all the Images
 */
function get_all_images($db)
{
    $query = "SELECT name,image_path
                FROM images";
    
    $db->query($query);
    $image = $db->getAllRowsSock();    
    return $image;
}
?>
