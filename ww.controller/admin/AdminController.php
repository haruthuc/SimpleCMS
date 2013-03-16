<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class AdminController extends BaseController{
    
    public function indexAction(){
        
        $this->register->template->render("login");
        
    }
    
    public function loginAction(){
        
        $accountModel = new AccountModel();
        $resultLogin  = $accountModel->login();
        print_r($resultLogin);
        
    }
    
}

?>
