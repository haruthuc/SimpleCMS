<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 * 
 */


/* * * auto load model classes ** */

function __autoload($class_name) {

    $file = null;

    if (strstr($class_name, "Manager") != FALSE) {



        $file = __SITE_PATH . '/ww.core/' . $class_name;
    }

    if (strstr($class_name, "Controller") != FALSE) {
            //$file = __SITE_PATH . '/ww.controller/' . $class_name;
        if($class_name="BaseController") $file = __SITE_PATH . '/ww.controller/' . $class_name;
    }

    if (strstr($class_name, "Model") != FALSE) {

        $file = __SITE_PATH . '/ww.model/' . $class_name;
    }

    if (strstr($class_name, "Component") != FALSE) {

        $file = __SITE_PATH . '/ww.component/' . $class_name;
    }

    if (strstr($class_name, "Helper") != FALSE) {

        $file = __SITE_PATH . '/ww.helper/' . $class_name;
    }


    $file = $file . '.php';
    //var_dump($file);
    if (file_exists($file) == false) {
        return false;
    }

    include_once ($file);
}

//check config session engine
if(__SESSION_ENGINE=="DATABASE"){
    $sessionManager = new DBSessionManager ();
} elseif(__SESSION_ENGINE=="FILE") {
    $sessionManager = new FileSessionManager();
}


//create register manager
$registerManager = new RegisterManager();

$requestManager = new RequestManager($registerManager);

//set asset mananger
$assetManager = new AssetManager($registerManager);

$registerManager->assets = $assetManager;

$templateManager = new TemplateManager($registerManager);

//set template to register 
$registerManager->template = $templateManager;

$registerManager->request = $requestManager;


//set router to register
$routerManager = new RouterManager($registerManager,$requestManager);
$routerManager->checkRouting();



?>
