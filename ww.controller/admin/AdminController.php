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
        
        //var_dump($_POST);
        if(isset($_POST['username'])&&isset($_POST['password'])){
            
             $username = mysql_escape_string($_POST['username']);
             $password = mysql_escape_string($_POST['password']);
             
             $accountModel = new AccountModel();
             $accountModel->setUsername($username);
             $accountModel->setPassword($password);
             $resultLogin  = $accountModel->login();
             if(count($resultLogin)>0) SecurityManager::setPermissionRole($resultLogin[0]['role']);
             echo SecurityManager::checkSecurityRole();
            
        }
       
     
        
    }
    
}

?>
