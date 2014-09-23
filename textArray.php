<?php 
//read file contents into an array by splitting the text by the comma
$filename="names.txt"; 
$fd = fopen($filename, "rd");
$contents = fread($fd, filesize($filename));
fclose($fd);

$delimiter = ",";
$names = explode($delimiter, $contents);

print_r($names);
echo "<br>";
foreach ($names as $myName){
    echo $myName."<br>";
}

?>