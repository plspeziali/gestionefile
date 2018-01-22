<?php

require_once 'FileHandler.php';

$ext = $_GET['ext'];

$fh = new FileHandler("files");
$fh->scanDirectory();
$files = $fh->filesArray($ext);

foreach($files as $element){
    print("$element;");
}

