<?php

/*
 * Session Manager Interface
 *
 */
abstract class ISessionManager{
    protected $savePath;
    protected $sessionName;
    
    public function __construct() {
        session_set_save_handler(
            array($this, "open"),
            array($this, "close"),
            array($this, "read"),
            array($this, "write"),
            array($this, "destroy"),
            array($this, "gc")
        );
    }
    
    abstract function open($savePath, $sessionName) ;
    abstract function close();
    abstract function read($id);
    abstract function write($id, $data);
    abstract function destroy($id);
    abstract function gc($maxlifetime);
    
    
    
}

?>
