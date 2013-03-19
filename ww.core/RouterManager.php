<?php

/*
 * Router Manager
 * Check Config Router
 * 
 */

class RouterManager {

    private $register;
    private static $_routerConfigMap = null;

    function __construct($register) {



        $this->register = $register;
        try {

            if (self::$_routerConfigMap == null && __ROUTER_FILE_CONFIG == TRUE) {

                self::$_routerConfigMap = ConfigManager::getConfig("routers");
            }
        } catch (Exception $ex) {

            throw new Exception($ex->getMessage());
        }
    }

    /**
     * Check Router Config 
     * 
     */
      public function checkRouting(){
          
          
         // echo "Check Routing";
          // check config router ENABLE 
           $controller = "index";
           $action = "index";
           $pathController = "/ww.controller/";       
          if(self::$_routerConfigMap==null){
              // check exist PATH_INFO
              if(isset($_SERVER["PATH_INFO"])){
                                    
                    $pathInfo = $_SERVER["PATH_INFO"];
                    $pathInfo = strtolower(substr($pathInfo,1));
                    //convert string to array
                    $pathArray = explode("/", $pathInfo);
                    $pathParam = null;
                    if($pathArray[0]==__ADMIN_PATH){
                        
                        if(count($pathArray)>1) 
                        {
                            $controller = $pathArray[1];
                        }
                        else{
                            
                            $controller = "index";
                            
                        }
                        if(isset($pathArray[2])){
                            $action = $pathArray[2];
                        }
                        if(count($pathArray) > 3) $pathParam = array_slice($pathArray, 2);
                        
                        $pathController .="admin/";
                        
                        
                    }else{
                        
                        if(isset($pathArray[0])){
                            
                            $controller = $pathArray[0];
                            
                        }
                        
                        if(isset($pathArray[1])){
                            
                            $controller = $pathArray[1];
                        }
                         if(count($pathArray) > 2) $pathParam = array_slice($pathArray, 1);
                         
                        
                    }
                   // var_dump($pathArray);
                     $controller = strtoupper(substr($controller, 0, 1)) . substr($controller, 1);  
                     //set string file Controller;
                     $fileController = __SITE_PATH . $pathController. $controller . "Controller.php";
                     
                     if(file_exists($fileController)){
                         include_once ($fileController);
                         
                            $reflectionMethod = new ReflectionMethod($classController, strtolower($action) . 'Action');
                            $paramArray = $reflectionMethod->getParameters();
                            $re_argument = array();
                            
                         
                         
                         
                     }else{
                         
                           // Move to 404 page
                           echo "Can not be found controller ".$fileController;
                         
                     }
                     
                        
              }
              
              
                 
                   
              
              
              
              
              
              
          }
          
          
      }

}

?>
