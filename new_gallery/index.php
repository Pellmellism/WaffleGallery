<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Gallery</title>
</head>
<body>
	<div style='width:30%; height:30%' id=galleryDiv></div>
  <!-- #http://askubuntu.com/questions/135477/how-can-i-scale-all-images-in-a-folder-to-the-same-width -->
	
	<!-- 
	###############################################################
	###############################################################
	just include this script tag and change the kitchen attribute 
	to the name of the div where the waffle gallery should be
	###############################################################
	############################################################### 
	-->
   <script>
      var image_names = [];
 
      <?php
         $imgDirectory = 'imgs/thumb/';
         $entries = scandir($imgDirectory);

         //skip first 2 (. and ..)
         for ($i = 2; $i < count($entries); ++$i) {
            $filepath = $imgDirectory . $entries[$i];
            echo 'image_names.push("' . $filepath . '");';
         }
      ?>
   </script>

	<script src="FrozenWaffles.js" kitchen="galleryDiv"></script>


</body>
</html>
