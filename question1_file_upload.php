<?php

/**
* Question 1:
* Using the language of your choice, demonstrate the handling of a file upload
*
* I would expect that there are probably exploits that malicious users can use
* to abuse this script. 
*/




$max_file_size_in_megabytes = 3;
$max_file_size = $max_file_size_in_megabytes * 1048576;
$upload_directory = './uploads';

if (isset($_FILES['userfile']))
{
	//if the user is uploading a file handle it	

	if (!file_exists($upload_directory)) {
		 mkdir( $upload_directory, 0744);
	}

	// the is_uploaded_file function checks to see if the file was uploaded
	// and not a file that was already on the server
	// using the POST upload mechanism returns true if successful
	$is_upload = is_uploaded_file($_FILES['userfile']['tmp_name']);
 	$copyFile = FALSE;
 	// make sure file was uploaded
 	if ($is_upload)  {
 		//if it was copy it to destination directory
		$copyFile = copy($_FILES['userfile']['tmp_name'], $upload_directory.'/'.$_FILES['userfile']['name']);
	}
	if ($copyFile) {
		// if the file was succesfully uploaded and saved
	    echo "File was successfully uploaded.";
	} else {
		// else show error
		$errorCode =  $_FILES['error'];
	    echo "File upload failed <br/>";
	    echo "Error code errorCode";
	}
} 
else
{
	// show the user the upload form
	?>
	<!--The form -->
	<form enctype="multipart/form-data" action="question1_file_upload.php" method="POST">
		<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>"/>
	    Send this file: <input name="userfile" type="file" />
	    <input type="submit" value="Send File" />
	</form>

	<?php
}