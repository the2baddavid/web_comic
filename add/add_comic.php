<?php

/*
 *  TODO: Test if add_comic works as a function
 *  TODO: test names for uploaded files
 */

function add_comic()
{
    $target = "../comics/"; 
    $target = $target . basename( $_FILES['uploaded']['name']) ; 
    $ok=1;
    
    //  Check File Type
    if (!(getimagesize($target)))
    {
        echo "You may only upload Image files.<br>";
        $ok=0;
    } 
    
    
    if($ok==0)
    {
        echo 'file not uploaded';
    }
    
    elseif(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
    {
        echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded";
    }
    
    else
    {
        echo "Sorry, there was a problem uploading your file.";
    }
 }
?>