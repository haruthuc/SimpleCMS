<?php

/*
 * Router Manager
 * Check Config Router
 * 
 */

class RouterManager {

    private static $_routerConfigMap = null;
    private $request;
    private $register;
    function __construct(RegisterManager $register,  RequestManager $request) {
        
         $this->request = $request;
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
                
                $controller = $this->request->getController();
                
                $action = $this->request->getAction();
                $isAdmin = $this->request->checkIsAdmin();
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
                        
                        
                            $classController -> $action();
                   
          }
          
          
      }

}

?>
