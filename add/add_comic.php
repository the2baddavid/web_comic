<?php

/*
 *  TODO: Test if add_comic works as a function
 *  TODO: test names for uploaded files
 * 
 *  W3 Resource!
 *  http://www.w3schools.com/php/php_file_upload.asp
 */
/****************************************************************
 * Inclusions & Database Connecting
 ****************************************************************/
    include_once('queries/get_comics.php');

    $con = mysql_connect("localhost","user","pass");
    if(!$con) header('../Admin.php?error=Could_not_connect');
    mysql_select_db("webcomic",$con);
/****************************************************************
 * Load web page, then revert back after adding
 ****************************************************************/

    upload_it($con, $_POST, $_FILES);

/****************************************************************
 * Functions
 ****************************************************************/

function upload_it($con, $post, $files){
    
    /*
     * 
     * 
     * If files has anything in it:
     *      1 Create New Name for it
     *      2 Check that it is a jpeg, png or gif
     *      4 Copy file from temp, print error if there is one
     *      5 Add To Database
     *      6 Display Image if Successful
     * 
     * 
     */
    
    if(count($files)){ 
        //  1--
        $path = 'comics/' . rand(0, 99999999) . '.jpg';
        
        //  2--
        if (!($files["new_comic"]["type"] == "image/jpeg")){
            header("../Admin.php?error=file_must_be_jpg");
            echo "file must be jpg!";
        }            

        //  4--
        if(!copy($files['new_comic']['tmp_name'], '../' . $path) ){ 
            header("../Admin.php?error=".$files['new_comic']['error']);
            echo ("../Admin.php?error=".$files['new_comic']['error']);
        }
        else{
            //  5--
            comic_add_to_database($con,$post,$path);
            //  6--
            header("../Admin.php?src=$path");
            echo "<img src= '../$path' id='new_comic' ></img>";
            echo "<br/><a href='../Admin.php'> Back</a>";
        }
    }   
}
            
function comic_add_to_database($con,$post,$path){
    /*
     * Adds comic in path to database
     * 
     * note: comics/book is an index for booknames
     * 
     * ********************** Algorithm  ***********************************
     * If the Book Requested does not already exist, create new and set name
     * otherwise just set name 1
     * 
     * Get Book ID of book matching the name 2
     * 
     * Get number of comics matching book 3
     * 
     * Update comics table with new comic info 4
     * *********************************************************************
     */
    
    //  1--
    if( $post['new_name']=='yes'){                  
        $book_name = $post['book_name'];
        $query = "INSERT INTO book_names (b_name) VALUES ('$book_name')";
        mysql_query($query,$con) or die("couldnt create new book" . mysql_error());
        
    //  2--
        $query = "SELECT id
            FROM book_names
            ORDER BY id DESC
            LIMIT 0,1";
        $result = mysql_query($query,$con);
        $result = mysql_fetch_row($result) or die("bad id fetch");
        
        $book = $result[0];
        $chapter = 1;
    }
    else{
        $book = $post['book'];
        
        $query = "SELECT id
        FROM comics
        WHERE book = $book";
        
        $result = mysql_query($query,$con);
        $chapter = mysql_num_rows($result);
        
        $chapter ++;
    }
    
    //  4--
    $query="INSERT INTO comics (book,chapter,date_added,image_path) 
        VALUES ($book,$chapter,CURDATE(),'$path')" or die("bad comic insert");
    
    if(!(mysql_query($query, $con)))
        header("../Admin.php?error=mysql_error".mysql_error());
}            
?>