<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class JSONReaderHelper{
    
    private static $_PATHCONFIG = "/ww.config/";
    
    public static function loadConfig($filename){
        //print "Test config";die();   
        
        $file = @file_get_contents(__SITE_PATH.self::$_PATHCONFIG.$filename.".json");
        
       
        
        if($file!==FALSE){
        
           $jsonDecode =  json_decode($file, true);
           //json_last_error()
           
           return $jsonDecode;
            
        }else{
            
            throw new Exception("Can't read file $filename");
        }
        
        return null;
    }
    
    
}

?>
