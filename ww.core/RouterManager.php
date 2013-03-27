<?php

/*
 * Router Manager
 * Check Config Router
 * 
 */

class RouterManager {

    private static $_routerConfigMap = null;
    private static $request;
    private $register;
    function __construct(RegisterManager $register,  RequestManager $request) {
        
         self::$request = $request;
         $this->register = $register;

       // $this->register = $register;
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
          
          
          
          $pathController = "/ww.controller/";       
          if(self::$_routerConfigMap==null){
                
                $controller = self::$request->getController();
                
                $action = self::$request->getAction();
                $isAdmin = self::$request->checkIsAdmin();
                if($isAdmin){
                    
                    $pathController .= "admin/";                   
                }
                $fileController = __SITE_PATH.$pathController.ucfirst($controller)."Controller.php";
                if(is_readable($fileController)==false){
                       $controller = "index";
                       $action = "index";
                       $fileController = __SITE_PATH.$pathController.ucfirst($controller)."Controller.php";   
                    
                }
                  $action = $action."Action";
                  $controller = ucfirst($controller)."Controller";
                 
                  
                  
                  if(!class_exists($controller)){   
                            include_once $fileController;
                  }
                  
                  
                   $classController = new $controller($this->register);
                   
                   
                   
                   if(is_callable(array($classController,$action))==FALSE){
                       
                            $action = "indexAction";
                   }
                        
                   //print_r($classController);
                   $classController = new AccountController($this->register);
                    
                   $classController->testAction();
                  
          }
          
          
      }
      
      public static function redirect($controller,$action){
                   
          
          
                 ob_start();
            	 $hostURL   =  $_SERVER['HTTP_HOST'];
                 $path  = $_SERVER['SCRIPT_NAME'];
                 $pathController = "/ww.controller/";     
                 if(is_null($controller)) $controller = "index";
                 if(is_null($action)) $action = "index";
                 
                 
                 if(self::$request->checkIsAdmin()) $path .="/".__ADMIN_PATH;
                 
                 $fileController = 'http://'.$hostURL.$path.'/'.$controller."/".$action;
                 
            	 Header( "HTTP/1.1 301 Moved Permanently" );
		 Header( "Location: ".$fileController );
                 ob_flush();
        
          
          
      }

}

?>
