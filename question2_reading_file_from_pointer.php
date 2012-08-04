<?php

/**
* Question 2:
* Using the language of your choice, demonstrate reading a file from a pointer
*
*/

$filepath = 'example.txt';

//check to see if file exists
if (file_exists($filepath)){

	// if it does open it
	$filePointer = fopen($filepath, 'r');

	if ($filePointer) {
		// if we were able to open it read it
		$readData = fread($filePointer, filesize($filepath));
		// The question does not say that we should, but here we echo the 
		// contents. We would need to check the mime-type and send appropriate 
		// headers to make sure that browesers handle the output correctly
		echo $readData;
	} else {
		echo "file exists, but we are unable to open it";
	}
} else {
	echo 'file does not exist';
}