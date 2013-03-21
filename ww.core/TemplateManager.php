<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class TemplateManager {

    private $register;
    private $vars = array();

    public function __construct($register) {
        $this->register = $register;
    }

    public function __set($index, $value) {
        $this->vars[$index] = $value;
    }

    public function render($file) {
        
        $pathTemplateFile = null;

        if (SecurityManager::checkSecurityRole() == SecurityManager::ROLE_ADMIN&&$file!='login') {

            $pathTemplateFile = __SITE_PATH . '/' . 'ww.template/' . __TEMPLATE_ADMIN . '/' . $file . '.php';
       
            } else {
            
            $pathTemplateFile = __SITE_PATH . '/' . 'ww.template/' . __TEMPLATE_DEFAULT . '/' . $file . '.php';
        }
        
        

        if (!file_exists($pathTemplateFile)) {

            throw new Exception("Can not be found template $pathTemplateFile");
        } else {
            
             // Load variables
        foreach ($this->vars as $key => $value)
        {
               $$key=$value;
        }
            
        //var_dump($this->vars);
            include_once $pathTemplateFile;
        }
    }
    
    public function renderJSON(){
        
        echo json_encode($this->vars);
        
        
    }
    

}

?>
