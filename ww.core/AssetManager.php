<?php

/*
 * Asset Manager
 * 
 */

class AssetManager {
    private $register;
    
    public function __construct($register) {
        
        $this->register = $register;
        
    }
    
    private $_assets = array();

    public  function render() {
        foreach ($this->_assets as $key => $value) {
            
               if(preg_match("/.css/", $value)) {
                   
                  echo  '<link href="'."http://".$_SERVER['HTTP_HOST'].'/'.__FOLDER."/ww.asset/".$value.'" rel="stylesheet" />';
                   
               }
               
               if(preg_match("/.js/", $value)){
                   
                    echo  '<script src="'."http://".$_SERVER['HTTP_HOST'].'/'.__FOLDER."/ww.asset/".$value.'" ></script>';
                   
               }
            
            
               
        }
    }

    public function appendFile($filename) {

        $this->_assets[] = $filename;
    }

}

?>
