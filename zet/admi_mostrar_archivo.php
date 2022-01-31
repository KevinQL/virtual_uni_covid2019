<?php
#$file = $_GET["file"];
// $file = '../'.$_GET["file"];
// echo '../'.$file;
// echo '<img src="../'.$file.'">';exit;
// header('Content-type: imagen/jpg');
// header('Content-Disposition: attachment; filename="'.$file.'"');
#readfile($file);
#$file = $_GET["file"];
$file = '../'.$_GET["file"];
#echo $file;
// echo '<img src="'.$file.'">';exit;
header('Content-type: imagen/jpg');
header('Content-Disposition: attachment; filename="'.$file.'"');
readfile($file);
?>