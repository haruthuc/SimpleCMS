<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class ConfigManager {

    private static $_config = array();

    private static function loadConfig($filename) {
        
        //get config
        return JSONReaderHelper::loadConfig($filename);
        //save cache
        
    }

    /**
     * Get config exmaple mysql.data.host
     */
    public static function getConfig($keyName) {
       
        $pathArray = explode(".", $keyName);
        //print_r($pathArray);  
        $filename = $pathArray[0];
        $arrayConfig = self::loadConfig($filename);
        //var_dump(count($pathArray));
        
        if (count($pathArray) >1) {
            
            $key = $pathArray[1];
            
            return $arrayConfig['data'][$key];
            
        }else{
          
            //$arrayResult = $arrayConfig;
            return $arrayConfig;
            
        }
        return null;
    }

}

?>
