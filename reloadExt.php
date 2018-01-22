<?php

require_once 'FileHandler.php';

$fh = new FileHandler("files");
$fh->scanDirectory();
$exts = $fh->extArray();
foreach($exts as $element){
    print("$element;");
}