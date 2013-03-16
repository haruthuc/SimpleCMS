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
    public function checkRouting() {
        $controller = "index";
        $action = "index";
        if (isset($_SERVER["PATH_INFO"])) {
            $pathInfo = $_SERVER["PATH_INFO"];
            $pathInfo = substr($pathInfo,1);
            //echo $pathInfo; 
            $pathArray = explode("/", $pathInfo);
           // echo count($pathArray);die();
           //  var_dump($pathArray);
            if (count($pathArray) > 1) {

                 //var_dump($pathArray); 
             
                $controller = $pathArray[0];
                

                $controller = strtoupper(substr($controller, 0, 1)) . substr($controller, 1);
                
                
             
                $action = $pathArray[1];
               
                if($action=="") $action="index";
               

                $pathParam = array_slice($pathArray, 2);

                $arrBuff = null;
                $keyBuff = null;
                $valueBuff = null;

                foreach ($pathParam as $key => $pathValue) {
                    if ($key % 2) {

                        $valueBuff = $pathValue;
                        // echo $pathValue;
                        $arrBuff[$keyBuff] = $valueBuff;
                    } else {
                        $keyBuff = $pathValue;
                    }
                }
            }
            
         
            
        } else {

            $controller = "index";
            $action = "index";
        }


       $fileController = __SITE_PATH . "/ww.controller/" . $controller . "Controller.php";
            
       if (($controller == "Admin"&&$action =="index")|| SecurityManager::checkSecurityRole() == SecurityManager::ROLE_ADMIN||($controller == "Admin"&&$action =="login")) {
                
                
                $fileController = __SITE_PATH . "/ww.controller/admin/" . $controller . "Controller.php";
        }


        $classController = $controller . "Controller";
        //echo "Routing ".$classController;
       // var_dump($fileController);
        
        if (file_exists($fileController)) {
            //include fileController
            include_once ($fileController);
            
            try {
                $reflectionMethod = new ReflectionMethod($classController, strtolower($action) . 'Action');

                $paramArray = $reflectionMethod->getParameters();
                $re_argument = array();

                foreach ($paramArray as $k => $param) {

                    ///$re_argument['']
                    $re_argument[$k] = $arrBuff[$param->name];
                }

                $reflectionMethod->invokeArgs(new $classController($this->register), $re_argument);
                
            } catch (ReflectionException $ex) {

                echo $ex->getMessage();
            }
        } else {

             echo "Can not be found controller ".$fileController;   
            //throw new Exception("Can not be found $fileController");
        }
        
        
    }

}

?>
