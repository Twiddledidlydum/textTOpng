<?php

//global variables
$names = array();
$images = array();
$width = 200;
$height = 100;
$filename="names.txt";
//fonts
$font_file = 'CartoGothicStd-Bold-webfont.ttf';
$font_size = 20; //px


//read file contents into an array by splitting the text by the comma
$file = fopen($filename, "rd");
$contents = fread($file, filesize($filename));
fclose($file);

$delimiter = ",";
$names = explode($delimiter, $contents);

// Create image for each name:
foreach ($names as $name) {
      // Retrieve bounding box:
      $type_space = imagettfbbox($font_size, 0, $font_file, $name);
      $image= imagecreatetruecolor($width, $height);

      // Switch anti-aliasing on
      imageantialias($image, true);
      imagealphablending($image, true);

      // Allocate text and background colors (RGB format):
      $text_color = imagecolorallocate ($image, 88, 88, 88 );
      $bg_color = imagecolorallocate($image, 0, 0, 0);

      // Make the background transparent
      imagecolortransparent($image, $bg_color);

      // Fill image:
      imagefill($image, 0, 0, $bg_color);

      // Fix starting x and y coordinates for the text:
      $x = 5; // Padding of 5 pixels.
      $y = $height - 5; // So that the text is vertically centered.

      // Add TrueType text to image:
      imagettftext($image, $font_size, 5, $x, $y, $text_color, $font_file, $name);
      imagepng($image, $name.'.png');
      imagedestroy($image);
}

?>