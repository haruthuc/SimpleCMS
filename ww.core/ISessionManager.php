<?php

/*
 * Session Manager Interface
 *
 */
abstract class ISessionManager{
    protected $savePath;
    protected $sessionName;
    protected $life_time;
   
    
    abstract function open($savePath, $sessionName) ;
    abstract function close();
    abstract function read($id);
    abstract function write($id, $data);
    abstract function destroy($id);
    abstract function gc($maxlifetime);
    
    
}

?>
