<?php
$ds          = DIRECTORY_SEPARATOR;
$galleryRoot = dirname(dirname(dirname(__FILE__)));

 
if (!empty($_FILES)) {
/*print_r($_FILES);
Array
(
    [image] => Array
        (
            [name] => Array([0] => 400.png)
            [type] => Array([0] => image/png)
            [tmp_name] => Array([0] => /tmp/php5Wx0aJ)
            [error] => Array([0] => 0)
            [size] => Array([0] => 15726)
        )
)*/
	
	//make a unique name for this upload
	$uniqueTime = time();
	$uniqueRand = mt_rand(1000,9999);
	$uniqueName = $uniqueTime . $uniqueRand;
	
	
	

	//store the original
	$tempFile = $_FILES['file']['tmp_name'];//file is the name of the posted data from dropzone 
	
	$path2storeOriginal = $galleryRoot . $ds . 'store' . $ds. 'original' . $ds;
	$path2storeThumb    = $galleryRoot . $ds . 'store' . $ds. 'thumb' . $ds;
	$targetFile =  $path2storeOriginal . $_FILES['file']['name']; 
	move_uploaded_file($tempFile,$targetFile);
	
	$path_parts = pathinfo($targetFile);//get array of info about the file - for the extension
	$ext = $path_parts['extension'];//get the extension of the file
	$newName = $uniqueName.'.'.$ext;//this is the new file name
	$originalRenamedFile  = $path2storeOriginal . $newName;//so rename doesnt move the thing
	//$ThumbnailRenamedFile = $path2storeThumb . $newName;
	
	rename($targetFile,$originalRenamedFile);//rename the file
	makejpg($originalRenamedFile);// force the file to be a jpg
	$newName = $uniqueName.'.jpg';//this is the new file name
	saveThumb($newName);//create the thumbnail
	rewriteJavascript();//make the change relevant
	
	
     
}

function saveThumb($pic){
	$ds          = DIRECTORY_SEPARATOR;
	$galleryRoot = dirname(dirname(dirname(__FILE__)));
	$filename = $galleryRoot.$ds.'store'.$ds.'original'.$ds.$pic;
	$image = imagecreatefromjpeg($filename);

	$thumb_width = file_get_contents('settings/thumbWidth.txt');
	$thumb_height = file_get_contents('settings/thumbHeight.txt');

	$width = imagesx($image);
	$height = imagesy($image);

	$original_aspect = $width / $height;
	$thumb_aspect = $thumb_width / $thumb_height;

	if ( $original_aspect >= $thumb_aspect )
	{
	   // If image is wider than thumbnail (in aspect ratio sense)
	   $new_height = $thumb_height;
	   $new_width = $width / ($height / $thumb_height);
	}
	else
	{
	   // If the thumbnail is wider than the image
	   $new_width = $thumb_width;
	   $new_height = $height / ($width / $thumb_width);
	}

	$thumb = imagecreatetruecolor( $thumb_width, $thumb_height );

	// Resize and crop
	imagecopyresampled($thumb,
					   $image,
					   0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
					   0 - ($new_height - $thumb_height) / 2, // Center the image vertically
					   0, 0,
					   $new_width, $new_height,
					   $width, $height);
	$newThumb = $galleryRoot.$ds.'store'.$ds.'thumb'.$ds.$pic;
	imagejpeg($thumb, $newThumb, 100);
}

function makejpg($pic){//if png, turn into jpg
	$path_parts = pathinfo($pic);
	$ext = $path_parts['extension'];
	if($ext == 'png'){
		$filePath = chop($pic,'.png');
		$image = imagecreatefrompng($pic);
		$bg = imagecreatetruecolor(imagesx($image), imagesy($image));
		imagefill($bg, 0, 0, imagecolorallocate($bg, 255, 255, 255));
		imagealphablending($bg, TRUE);
		imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
		imagedestroy($image);
		$quality = 100; // 0 = worst / smaller file, 100 = better / bigger file 
		imagejpeg($bg, $filePath . ".jpg", $quality);
		//imagejpeg($bg, $_FILES['file']['tmp_name'], $quality);
		imagedestroy($bg);
		unlink($pic);
	}
	if($ext == 'jpeg'){//does this matter?
		//do jpeg to jpg conversion here...gif too? nah...thats dumb
	}

}

function rewriteJavascript(){//loop through each of the images in the folder and make them part of the grid by updating the FozenWaffles.js file
	$ds          = DIRECTORY_SEPARATOR;
	$galleryRoot = dirname(dirname(dirname(__FILE__)));
	$scriptLoc   = $galleryRoot.$ds.'js'.$ds.'FrozenWaffles.js';
	$picsLocation= $galleryRoot.$ds.'store'.$ds.'thumb';
	
	
	$scriptTop    = file_get_contents('settings/scriptTop.txt');
	$scriptBottom = file_get_contents('settings/scriptBottom.txt');	
	
 	$files = glob($picsLocation.'/*.{jpg}', GLOB_BRACE);
	foreach($files as $file) {
		$path_parts = pathinfo($file);
		$fileName = $path_parts['basename'];
		$filePath = '/gallery/store/thumb/'.$fileName;// this works if gallery is stored in the root DIR....hmmmmm....
		$scriptMiddle .= "hotToaster += '--><div class=\"waffle hhhhh\"><img src=\"//'+currentLocation+'".$filePath."\"></div><!--'\n";
	} 
	
	
	
	
	$newScript   = $scriptTop . $scriptMiddle . $scriptBottom;
	
	file_put_contents($scriptLoc, $newScript, LOCK_EX);
	//file_put_contents($scriptLoc, $newScript);
}











?>