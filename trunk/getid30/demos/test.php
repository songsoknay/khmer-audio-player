<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>getID3 MP3</title>

</head>
<?php  

require_once('../getid3/getid3.php');
$getID3 = new getID3;
$getID3->encoding = 'UTF-8';
$filename = "痴心绝对.mp3"; 
//$filename = "audio.mp3";
$ThisFileInfo->encoding = 'UTF-8';
$ThisFileInfo = $getID3->analyze($filename);

echo $ThisFileInfo['bitrate'];

//getid3_lib::CopyTagsToComments($ThisFileInfo); 

//echo '<pre>'.htmlentities(print_r($ThisFileInfo, true)).'</pre>';


?>
<body>
</body>
</html>
