<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class AccountController extends BaseController{
    
    
    public function createAction(){
 
        $accountModel = new AccountModel();
        $accountModel->setPassword("tset");
        $accountModel->setUsername("haruthuc");
        $accountModel->setEmail("haruthuc@gmail.com");
        $accountModel->setDatejoin(date("Y-m-d h:i:s"));      
        $accountModel->setStatus("ENABLE");
        $accountModel->setRole(SecurityManager::ROLE_USER);
        $accountModel->save();
    }
    
    public function testAction($var,$var3){
        
        
        $this->register->template->result = "ABCCC";
        
        $this->register->template->render("index"); 
    }
    
    
    
    
    
}
?>
