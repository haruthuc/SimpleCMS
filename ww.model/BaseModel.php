<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
abstract class BaseModel{
    
    protected static $dbo = null;
    const PREFIX_TABLE = "cms2";


    function __construct() {
        if(self::$dbo==null){
                 // $databaseManager = new DatabaseManager();
                 DatabaseManager::setDatabaseConnection(new PDOMySQLManager());
                 self::$dbo = DatabaseManager::getDatabaseConnection();
        }
   
        
    }
    
    abstract function find($fields=null,$and=null, $where = null, $order = null,$limit = null,$asoc = TRUE);
    
    abstract function save($returnLastID = FALSE);
    
    abstract function update();
    
    abstract function delete();
    
    
}

?>
