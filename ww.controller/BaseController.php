<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
abstract  class BaseController{
    
    protected $register;
    public function __construct($register) {
        $this->register = $register;
    }
    
    public  function indexAction(){
        
        echo "Index Action Here";
        
        
        
    }
    
}

?>
