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
      
        
        var_dump($_SESSION);
        
        if(isset($_SESSION['role'])){
          //  echo 'Rcdy';die();
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
