<?php // upload.php
echo <<<_END
<html><head><title>PHP Form Upload</title></head><body>
    <form method='post' action='upload.php' enctype='multipart/form-data'>
        Select File: <input type='file' name='new_comic' size='10' />
        <input type='submit' value='Upload' />
    </form>
_END;


if(count($_FILES)){
    $path = rand(0, 99999999) . '.jpg';
    echo '<p>'.$path.'</p>';
    
    echo "<pre>";
    print_r ($_FILES);
    echo "</pre>";
    
    
    if(!copy($_FILES['new_comic']['tmp_name'], $path) ){ 
        echo "error ".$_FILES['new_comic']['error'];
    }
    else{
        echo "<img src=$path id='new_comic' ></img>";
    }
}   

echo "</body></html>";
?>