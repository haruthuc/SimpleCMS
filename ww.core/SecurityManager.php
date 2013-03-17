<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class SecurityManager{
    const ROLE_ADMIN = "ADMIN";
    const ROLE_USER = "USER";
    private static $PERMISSION_ROLE;




    public static function checkSecurityRole(){
        
        if(self::$PERMISSION_ROLE==null){
            
            return SecurityManager::ROLE_USER;
        }else{
            
            return self::$PERMISSION_ROLE;
        }
        
    }
    
    public static function setPermissionRole($role){
        
        self::$PERMISSION_ROLE = $role;
    }
    
    
}

?>
