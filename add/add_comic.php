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
 * Load web page, then revert back after adding?
 ****************************************************************/

add_comic_w3($con, $_POST);

/****************************************************************
 * Functions
 ****************************************************************/

function add_comic($con,&$post)
{
    $target = "../comics/"; 
    $target = $target . basename( $_FILES['uploaded']['name']) ; 
    
    echo "<p> target: $target </p>";
    $ok=1;
    
    //  Check File Type
    /*
    if (!(getimagesize($target)))
    {
        echo "You may only upload Image files.<br>";
        $ok=0;
    } 
     */

    if($ok==0){
        echo 'file not uploaded';
    }
    
    elseif(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)){
        echo "The file ". basename( $_FILES['uploaded']['name']). " has been uploaded";
    }
    
    else{
        echo "Sorry, there was a problem uploading your file.";
    }
 }
 
 function add_comic_w3($con,$post,$files)
 {
     $path = "comics/";

    if ((($files["uploaded"]["type"] == "image/gif")
    || ($files["uploaded"]["type"] == "image/jpeg")
    || ($files["uploaded"]["type"] == "image/pjpeg")))
    {
        if ($files["uploaded"]["error"] > 0)
        {
            echo "Return Code: " . $files["uploaded"]["error"] . "<br />";
        }
        else
        {
            echo "Upload: " . $files["uploaded"]["name"] . "<br />";
            echo "Type: " . $files["uploaded"]["type"] . "<br />";
            echo "Size: " . ($files["uploaded"]["size"] / 1024) . " Kb<br />";
            echo "Temp file: " . $files["uploaded"]["tmp_name"] . "<br />";

            if (file_exists($path . $files["uploaded"]["name"]))
            {
                echo $files["uploaded"]["name"] . " already exists. ";
            }
            else
            {   //  Success Condition!
                move_uploaded_file($files["uploaded"]["tmp_name"],
                $path . $files["uploaded"]["name"]);
                echo "Stored in: " . "comics/" . $files["uploaded"]["name"];

    // TODO: Add Database Update!
            }
        }
    }
    else
    {
        echo "Invalid file";
    }
}

            
                /*
                 if( $post['new_name']=='yes')
                 {  
                    $book_name = $post['new_name'];
                    $query = "INSERT INTO book_names (b_name) VALUES ($book_name)";
                    mysql_query($query,$con);
                    $book_id;
                 }
                 else
                 {
                    $book_name = $post['book_name'];
                    $book_id;
                 }
                  
                $query="INSERT INTO comics (book,chapter,date_added,image_path) 
                   VALUES ()";
                mysql_query($query, $con) or die("Database Failed".  mysql_error());
                

                 */
?>