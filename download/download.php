<?php

//get variables
$saveName = stripslashes($_GET["name"]);
$savePath = stripslashes($_GET["path"]);

//send headers to initiate a binary download
header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=$saveName");
header("Content-Transfer-Encoding: binary");

//set file length so browser can calculate download time
header("Content-length: " . filesize($savePath));

//read file
readfile($savePath);

?>
