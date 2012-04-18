<?php // upload.php
echo <<<_END
<html><head><title>PHP Form Upload</title></head><body>
<form method='post' action='upload.php' enctype='multipart/form-data'>
Select File: <input type='file' name='filename' size='10' />
<input type='submit' value='Upload' />
</form>
_END;

if ($_FILES['filename']['error'] === UPLOAD_ERR_OK)
{
	$name = $_FILES['filename']['name'];
	move_uploaded_file($_FILES['filename']['tmp_name'], $name) or die("uoload error ok, bad move");
	echo "Uploaded image '$name'<br /><img src='$name' />";
}

 else {
     echo "upload error! lol ".$_FILES['filename']['error'];
}

echo "</body></html>";
?>