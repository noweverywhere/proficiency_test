<?php

/**
* Question 6:
* Using the language of your choice, demonstrate resizing an image
*
* My solution depends on GD Library
*
*/

 
$filepath = './originals/image.jpg';
// this will distort images that are not square. 
// we can calculate based on arbitrary criteria what size
// to make the new image
$newWidth = 100;
$newHeight = 100;
$save_directory = './resized/';
$savePath = $save_directory . substr($filepath, strrpos($filepath,'/'));
$imageQuality = 100;

//check to see if file exists
if (file_exists($filepath)) 
{
	$image;
	// get the image extentsion
	$extension = strtolower(strrchr($filepath, '.'));
	// inside of the switch statement we open the image
	switch($extension)  
	{  
		case '.jpg':  
		case '.jpeg':  
			$image = imagecreatefromjpeg($filepath);  
			break;  
		case '.gif':  
			$image = imagecreatefromgif($filepath);  
			break;  
		case '.png':  
			$image = imagecreatefrompng($filepath);  
			break;  
		default:  
			$image = false;  
			break;  
	}  

	// measure the size of the image
	$originalWidth = imagesx($image);
	$originalHeight = imagesy($image);

	// imagecreatetruecolor creates a new image
	$newImageAtSize = imagecreatetruecolor($newWidth, $newHeight);

	//imagecopyresampled copies from a specified image to a the image
	imagecopyresampled(
		$newImageAtSize, $image, 0, 0, 0, 0,
		$newWidth, $newHeight, $originalWidth, $originalHeight);

	// before we can save the image we make sure that the target directory exits
	if (!file_exists($save_directory)) {
		mkdir($save_directory, 0744);
	}


	// based on the extentsion we handle saving the file differently
	switch($extension)  
	{  
		case '.jpg':  
		case '.jpeg':  
			// test to see if jpeg image type is supported
			if (imagetypes() & IMG_JPG) {  
				imagejpeg($newImageAtSize, $savePath, $imageQuality);  
			}  
			break;  

		case '.gif':  
			// test to see if gif image type is supported
			if (imagetypes() & IMG_GIF) {  
				imagegif($newImageAtSize, $savePath);  
			}  
			break;  

		case '.png':  
			// Saving png's is very differnt, need to manupulate
			// interger that spcifies image quality
			$scaleQuality = round(($imageQuality/100) * 9);  			
			$invertScaleQuality = 9 - $scaleQuality; 

			// test to see if png image type is supported
			if (imagetypes() & IMG_PNG) {  
				imagepng($newImageAtSize, $savePath, $invertScaleQuality);  
			}  
			break;  

		default:  
			// can not save an file without an extension  
			break;  
	}  

}


