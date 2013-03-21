<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class RequestManager{
    
       private $register;
       private static $_controller; 
       private static $_action;
       private static $_params = array();
       private static $_isAdmin = false;




       public function __construct($register) {
        
        $this->register = $register;
        
        self::$_action = "index";
        self::$_controller = "index";
        
            if(isset($_SERVER["PATH_INFO"])){
                                    
                    $pathInfo = $_SERVER["PATH_INFO"];
                    $pathInfo = strtolower(substr($pathInfo,1));
                    
                    if (substr($pathInfo, -1)=="/"){
                        
                        $lenght = strlen($pathInfo)-1;
                      
                        $pathInfo = substr($pathInfo,0,$lenght);
                          //echo $pathInfo;
                        
                    } 
                    //convert string to array
                    $pathArray = explode("/", $pathInfo);
                    $pathParam = null;
                    if($pathArray[0]==__ADMIN_PATH){
                        
                        self::$_isAdmin = true;
                        
                        if(!empty($pathArray[1])) 
                        {
                            self::$_controller = $pathArray[1];
                        }
                        else{
                            
                            self::$_controller = "index";
                            
                        }
                        if(!empty($pathArray[2])){
                            
                            self::$_action = $pathArray[2];
                        }
                        
                        if(count($pathArray) > 3) self::$_params = array_slice($pathArray, 3);
                        
                    }else{
                            
                            
                        if(!empty($pathArray[0])){
                            
                            self::$_controller = $pathArray[0];
                            
                        }
                        
                        if(!empty($pathArray[1])){
                           
                            self::$_action = $pathArray[1];
                        }
                         if(count($pathArray) > 2) self::$_params = array_slice($pathArray, 2);
                         
                        
                    }
                        
                     
                        
              }
               //print_r(  self::$_params);
              
              $arrKey = array();
              $arrValue = array();
              $countParam = count(self::$_params);
              if($countParam>2)
              {
                  
                   
                  $countParam = $countParam/2;
                  $countParam =  floor($countParam);
                  //echo $countParam;
                  
                  $arrayParam = array();
                 
                  for($i=0;$i<$countParam;$i++){
                      //$z = ($i*$i);
                      //echo $i."<br/>";
                     
                     // echo $o ."<br/>";;
                      $z = $i*2;
                      
                      $arrayParam[self::$_params[$z]] = self::$_params[$z+1];
                        
                   }
                   
                   self::$_params = $arrayParam;
              }
    }
    //get request GET METHOD
    public static function getQuery(){
        
        return self::$_params;
        
    }
    
    public static function getController(){
        
        return self::$_controller;
        
    }
    
    public function getAction(){
        
        return self::$_action;
        
    }
    
    public function checkIsAdmin(){
        
        return self::$_isAdmin;
    }
    
    
   
   
    
    
}

?>
