<?php

/*
 *  TODO: Test if add_comic works as a function
 *  TODO: test names for uploaded files
 */

<<<<<<< HEAD

/****************************************************************
 * Inclusions & Database Connecting
 ****************************************************************/
    include_once('modules/modules.php');
    include_once('database/db_object.php');  
    include_once('queries/get_comics.php');

    $con = mysql_connect("localhost","user","pass");
    if(!$con) die('Could not connect: ' . mysql_error());
    mysql_select_db("webcomic",$con);
    
/****************************************************************
 * Load web page, then revert back after adding
 ****************************************************************/
    $success = add_comic($con,$_POST);
    if(!$success) echo "<p>".mysql_error()."</p>";;
    ?>    
    
    <script type="text/javascript">
        function move(){
            window.location='../index.php';
        }
    </script>   

    <?php

/****************************************************************
 * Functions
 ****************************************************************/

function add_comic($con,&$post)
=======
function add_comic()
>>>>>>> 5d6a912f6699a2f2828bb760701ee6f4590b3c59
{
    $target = "../comics/"; 
    $target = $target . basename( $_FILES['uploaded']['name']) ; 
    $ok=1;
    
    //  Check File Type
<<<<<<< HEAD
    if (!(getimagesize($target))){
=======
    if (!(getimagesize($target)))
    {
>>>>>>> 5d6a912f6699a2f2828bb760701ee6f4590b3c59
        echo "You may only upload Image files.<br>";
        $ok=0;
    } 
    
<<<<<<< HEAD
    if($ok==0){
        echo 'file not uploaded';
    }
    
    elseif(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)){
        echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded";
    }
    
    else{
        echo "Sorry, there was a problem uploading your file.";
    }
    
    
=======
    
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
>>>>>>> 5d6a912f6699a2f2828bb760701ee6f4590b3c59
 }
?>