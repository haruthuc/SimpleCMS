<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class LinkHelper{
    
    public static function redirect($controller = null ,$action = null){
                 var_dump($register->router);
                 ob_start();
            	
                 if(is_null($controller)) $controller = "index";
                 if(is_null($action)) $action = "index";
                 
                 
            	 Header( "HTTP/1.1 301 Moved Permanently" );
		 Header( "Location: ".$link );
                 ob_flush();
        
        
        
    }
    
    public static function gotoEROR(){
        
        
        
        
    }
    
}

?>
