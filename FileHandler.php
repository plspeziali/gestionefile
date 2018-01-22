<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ExtHandler
 *
 * @author paolo
 */
class FileHandler {
    //put your code here
    
    private $dir;
    
    private $fileInfo;
    
    function __construct($dir) {
        $this->dir = $dir;
        $this->fileInfo = array();
    }
    
    function scanDirectory(){
        $dirCont = scandir($this->dir);
        foreach($dirCont as $file){
            array_push($this->fileInfo,pathinfo($file));
        }
    }
    
    function extArray(){
        $exts = array();
        foreach($this->fileInfo as $file){
            array_push($exts,$file['extension']);
        }
        $exts = array_diff($exts, [""]);
        $exts = array_unique($exts);
        return $exts;
    }
    
    function filesArray($ext){
        $files = array();
        foreach($this->fileInfo as $file){
            if(strcmp($file['extension'],$ext) == 0) {
                array_push($files,$file['filename']);
            }
        }
        return $files;
    }
    
    function fileFormat($ext,$filename){
        $filepath = "files/$filename.$ext";
        $filetype = mime_content_type($filepath);
        $filearray = explode("/",$filetype);
        switch ($filearray[0]) {
            case "image":
                return "<img src='$filepath' width='500'>";
            case "audio":
                return "<audio controls><source src='$filepath' type='$filetype'>Your browser does not support the audio element.</audio>";
            case "video":
                return "<video width='800' height='600' controls><source src='$filepath' type='$filetype'>Your browser does not support the video element.</video>";
            default:
                return "<a href='$filepath'>Clicca per scaricare il file!</a>";
        } 
    }
    
}
