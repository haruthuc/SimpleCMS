<?php

/*
 * Database Manager Manage Connection
 * 
 */
 
class DatabaseManager{
    
    private static $connection;
    
    
    public static function setDatabaseConnection(IDatabaseManager $dbcon){
        try{
                
        self::$connection = $dbcon->createConnection();
        
        }catch (Exception $ex){
            throw  new Exception("Can not set Database Connection". $ex->getMessage());
        
        } 
    }
    
    public static function getDatabaseConnection(){
        
        return self::$connection;
    }
    
    
}
?>
