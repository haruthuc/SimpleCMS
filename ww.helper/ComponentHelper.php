<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class ComponentHelper{
    
    
    public static function getComponentPath($nameComponent){
        
       $fileComponent = __SITE_PATH."/ww.component/".$nameComponent."/model/core.php";
       
       if(file_exists($fileComponent)){
           
           return $fileComponent;
       }else{
           return null;
       }
    }
    
    
    
    
}

?>
