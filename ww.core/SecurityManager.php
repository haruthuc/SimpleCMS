<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class SecurityManager{
    const ROLE_ADMIN = "ADMIN";
    const ROLE_USER = "USER";

    public function __construct() {
        
        
        
    }



    public static function checkSecurityRole(){
      
       
        
        if(isset($_SESSION['role'])){
            return $_SESSION['role'];
           
        }else{
            
            
             return SecurityManager::ROLE_USER;
            
        }
        
    }
    
    public static function setPermissionRole($role){
        
        
       
        
        $_SESSION['role'] = $role;
            
    }
    
    
}

?>
