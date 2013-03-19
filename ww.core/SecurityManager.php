<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class SecurityManager{
    const ROLE_ADMIN = "ADMIN";
    const ROLE_USER = "USER";
    //private static $PERMISSION_ROLE;
    public function __construct() {
      
    }



    public static function checkSecurityRole(){
        if($_SESSION['role']==null){
            
            return SecurityManager::ROLE_USER;
        }else{
            
            return $_SESSION['role'];
            
        }
        
    }
    
    public static function setPermissionRole($role){
        
        $_SESSION['role'] = $role;
        
    }
    
    
}

?>
