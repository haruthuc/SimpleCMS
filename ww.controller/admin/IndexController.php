<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class IndexController extends BaseController{
    
    public function __construct($register) {
        

       parent::__construct($register);
       $this->register->assets->appendFile("css/bootstrap.min.css");
       $this->register->assets->appendFile("css/admin.css");
       $this->register->assets->appendFile("js/jquery.js") ;
       $this->register->assets->appendFile("js/bootstrap.min.js");
    }
    
    public function indexAction(){
        
       $this->register->template->render("login");
    }
    
    public function loginAction(){
   
        
        
        if(isset($_POST['username'])&&isset($_POST['password'])){
            
             $username = mysql_escape_string($_POST['username']);
             $password = mysql_escape_string($_POST['password']);
             $accountModel = new AccountModel();
             $accountModel->setUsername($username);
             $accountModel->setPassword($password);
             $resultLogin = $accountModel->login();
            
             //var_dump($resultLogin);
             if(count($resultLogin)>0){
                 
                 SecurityManager::setPermissionRole($resultLogin[0]['role']);
                 RouterManager::redirect("account", "manage");
             } 
            
             
        }else{
            
            //LinkHelper::redirect('index',"login");
             RouterManager::redirect("index", "login");
            
        }
        
    }
    
    
    
   
    
    
}

?>
