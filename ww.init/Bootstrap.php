<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 * 
 * 
 */


 /*** auto load model classes ***/
function __autoload($class_name) {
    
    $file = null;
    
    if(strstr($class_name, "Manager")!=FALSE){
        
      
        
        $file = __SITE_PATH.'/ww.core/'.$class_name; 
        
        
        
    }
    
    if(strstr($class_name, "Controller")!=FALSE)
    {
        
         $file = __SITE_PATH.'/ww.controller/'.$class_name; 
        
    }
    
    if(strstr($class_name, "Model")!=FALSE){
        
         $file = __SITE_PATH.'/ww.model/'.$class_name; 
        
        
    }
    
    if(strstr($class_name, "Component")!=FALSE){
        
        $file = __SITE_PATH.'/ww.component/'.$class_name; 
        
    }
    
    if(strstr($class_name, "Helper")!=FALSE){
        
        $file = __SITE_PATH.'/ww.helper/'.$class_name; 
        
    }
    
    
    $file = $file.'.php';
    
    if (file_exists($file) == false)
    {
        return false;

    }
   
    include_once ($file);
}

//create register manager
$registerManager = new RegisterManager();

//set router to register
$registerManager->router = new RouterManager($registerManager);


//set template to register 
$registerManager->template = new TemplateManager($registerManager);


$registerManager->router->checkRouting();




?>
