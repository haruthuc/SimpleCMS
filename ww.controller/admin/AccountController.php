<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class AccountController extends BaseController{
    
    public function __construct($register) {
        

       parent::__construct($register);
       $this->register->assets->appendFile("css/bootstrap.min.css");
       $this->register->assets->appendFile("css/admin.css");
       $this->register->assets->appendFile("js/jquery.js") ;
       $this->register->assets->appendFile("js/bootstrap.min.js");
    }
    
    
    
    public function manageAction(){
        
        
            $accountModel = new AccountModel();
            $results =  $accountModel->find();
            
            $this->register->template->results = $results;
         
            $this->register->template->render("account");
        
        
        
    }
    
    public function createAction(){
         
        if(isset($_POST["username"])){
            
            $username =  $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $accountModel = new AccountModel();
            $accountModel->setPassword($password);
            $accountModel->setUsername($username);
            $accountModel->setEmail($email);
            $accountModel->setRole(SecurityManager::ROLE_USER);
            $accountModel->setDatejoin(date("Y-m-d h:i:s"));      
            $accountModel->setStatus("ENABLE");
            $result = $accountModel->save();
            
            RouterManager::redirect("account", "manage");
        
           /// $messages = array(array("key"=>  MessageHelper::SUCCESS,"content"=>"Create Account successful."));
           // MessageHelper::setMessages($messages);
        }
            
        
        
    }
    
}

?>