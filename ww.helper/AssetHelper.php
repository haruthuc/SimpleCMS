<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class AssetHelper{
    
    public static function getAssetFile($filename){
        
        echo "http://".$_SERVER['HTTP_HOST'].'/'.__FOLDER."/ww.asset/".$filename;
        
        
    }
    
    
}
?>
