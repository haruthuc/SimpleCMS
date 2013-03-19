<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class AccountController extends BaseController{
    
    
    
    
    public function testAction($var,$var3){
        
        
        $this->register->template->result = "ABCCC";
        
        $this->register->template->render("index"); 
    }
    
    
    
    
    
}
?>
