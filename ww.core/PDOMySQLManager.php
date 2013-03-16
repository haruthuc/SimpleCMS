<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class PDOMySQLManager implements IDatabaseManager{
    private static $connection=null;
       
    public function createConnection() {
         if (!self::$connection) {
             
            try{
                //self::$connection = new PDO('mysql:host='.ConfigManager::getConfig("mysql.host").';dbname='.ConfigManager::getConfig("mysql.database").';charset=UTF-8',ConfigManager::getConfig("mysql.host"),ConfigManager::getConfig("mysql.password"));
                //var_dump(); die();
                self::$connection = new PDO('mysql:host='.ConfigManager::getConfig("mysql.host").';dbname='.ConfigManager::getConfig("mysql.database").';charset=UTF-8',ConfigManager::getConfig("mysql.username"),ConfigManager::getConfig("mysql.password"));
                
                self::$connection->setAttribute(PDO::ATTR_CURSOR, PDO::CURSOR_SCROLL);
                self::$connection->exec('SET CHARACTER SET utf8');
                
            }  catch (PDOException $ex){
                
                throw new Exception("Can't create connection ".$ex->getMessage());
            
            }
        }
        return self::$connection;
        
    }
    private function _clone() {
        
    }
    
    
}

?>
