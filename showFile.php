<?php

require_once 'FileHandler.php';

$ext = $_GET['ext'];

$filename = $_GET['filename'];

$fh = new FileHandler("files");

print($fh->fileFormat($ext, $filename));

