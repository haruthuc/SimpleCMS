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
        // echo var_dump($_SERVER);
        // echo var_dump($_SERVER["REQUEST_URI"]);

       
        if (isset($_SERVER["PATH_INFO"])) {
            $pathInfo = $_SERVER["PATH_INFO"];

            $pathArray = explode("/", $pathInfo);
            // var_dump($pathArray);
            if (count($pathArray) > 1) {

                $controller = $pathArray[1];

                $controller = strtoupper(substr($controller, 0, 1)) . substr($controller, 1);


                $action = $pathArray[2];
                if ($action == null) {

                    $action = "index";
                }

                $pathParam = array_slice($pathArray, 3);

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
        }else{
              
                $controller = "index";
                $action = "index";
            
            
        }
        
        
            $fileController = __SITE_PATH . "/ww.controller/" . $controller . "Controller.php";
                $classController = $controller . "Controller";
                if (file_exists($fileController)) {
                    try
                    {
                    $reflectionMethod = new ReflectionMethod($classController, strtolower($action) . 'Action');
                   
                    $paramArray = $reflectionMethod->getParameters();
                    $re_argument = array();

                    foreach ($paramArray as $k => $param) {

                        ///$re_argument['']
                        $re_argument[$k] = $arrBuff[$param->name];
                    }

                    $reflectionMethod->invokeArgs(new $classController($this->register), $re_argument);
                    
                    }catch(ReflectionException $ex){
                        
                        echo $ex->getMessage();
                        
                    }
                    
                    
                } else {
                    

                    throw new Exception("Can not be found $fileController");
                    
                }
        
    }

}

?>
