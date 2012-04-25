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
    if(!$con) die('Could not connect: ' . mysql_error());
    mysql_select_db("webcomic",$con);
/****************************************************************
 * Load web page, then revert back after adding
 ****************************************************************/

    upload_it($con, $_POST, $_FILES);
    header('index.php');

/****************************************************************
 * Functions
 ****************************************************************/

function upload_it($con, $post, $files){
    
    /*
     * Print Initialization Info for the Browser
     * 
     * If files has anything in it:
     *      1 Create New Name for it
     *      2 Check that it is a jpeg, png or gif
     *      3 Print file info
     *      4 Copy file from temp, print error if there is one
     *      5 Add To Database
     *      6 Display Image if Successful
     * 
     * Finish Browser Junk
     */
    
    echo <<<_END
    <html>
        <head>
            <title>Upload</title>
        </head>
        <body>
_END;
    
    
    if(count($files)){ 
        //  1--
        $path = 'comics/' . rand(0, 99999999) . '.jpg';
        
        //  2--
        if (!(($files["new_comic"]["type"] == "image/gif") || ($files["new_comic"]["type"] == "image/jpeg") || ($files["new_comic"]["type"] == "image/pjpeg")))
            die ("<p>File must be a jpg,png or gif</p></body></html>");
        
        //  3--
        echo "<pre>";
        print_r ($files);
        echo '<p>'.$path.'</p>';
        echo "</pre>";

        //  4--
        if(!copy($files['new_comic']['tmp_name'], '../' . $path) ){ 
            echo "error ".$files['new_comic']['error'];
        }
        else{
            //  5--
            comic_add_to_database($con,$post,$path);
            //  6--
            echo "<img src= '../$path' id='new_comic' ></img>";
        }
    }   
    echo "</body></html>";
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
    
    echo '<pre>';
    print_r($post);
    echo '</pre>    ';
    
    //  1--
    if( $post['new_name']=='yes'){                  
        $b_name = $post['book'];
        $query = "INSERT INTO book_names (b_name) VALUES ($book_name)";
        mysql_query($query,$con);
        
    //  2--
        $query = "SELECT id
            FROM book_names
            ORDER BY id
            LIMIT 0,1";
        $result = mysql_query($query,$con);
        $book = mysql_fetch_field($result);
    }
    else{
        echo "existing book";
        $book = $post['book'];
    }
    
    //  3--
    $query = "SELECT id
        FROM comics
        WHERE book = $book";
    $result = mysql_query($query,$con);
    $chapter = mysql_num_rows($result);
    
    if(!isSet($chapter))
        $chapter = 1;
    else
        $chapter ++;
    
    //  4--
    $query="INSERT INTO comics (book,chapter,date_added,image_path) 
        VALUES ($book,$chapter,CURDATE(),'$path')";
    mysql_query($query, $con) or die("Database Failed chapter:$chapter book:$book,".  mysql_error());
    echo "<p>success chapter:$chapter book:$book</p>";
}            
?>