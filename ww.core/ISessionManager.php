<?php

/*
 * Session Manager Interface
 *
 */
abstract class ISessionManager{
    protected $savePath;
    protected $sessionName;
    protected $life_time;
    public function __construct() {
        
        if(__SESSION_TIMEOUT!=0){
            $this->life_time = __SESSION_TIMEOUT;
        }else{
            $this->life_time = get_cfg_var("session.gc_maxlifetime");
        }
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
