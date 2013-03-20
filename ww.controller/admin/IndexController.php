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
        //echo "Test";
         //$this->manageAccountAction();
        
        

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
            
             if(count($resultLogin)>0) SecurityManager::setPermissionRole($resultLogin[0]['role']);
            
             $this->manageAccountAction(); 
        }
        
    }
    
    
    
    
    
    public function manageAccountAction(){
        
            $accountModel = new AccountModel();
            $results =  $accountModel->find();
            //print_r(MessageHelper::renderMessages()); die();
            //var_dump($results);die();
            
            $this->register->template->results = $results;
         
            $this->register->template->render("account");
           
    }
    
    
    public function createAccountAction(){
        
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
            $accountModel->save();
            
            
            $this->manageAccountAction();
           /// $messages = array(array("key"=>  MessageHelper::SUCCESS,"content"=>"Create Account successful."));
           // MessageHelper::setMessages($messages);
        }
 
        
    }
    
    
}

?>
