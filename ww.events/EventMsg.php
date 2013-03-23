<?php

/**
 * Event Message
 */

class EventMessage{
    
    protected  $msgs = array();
    
    public function addMsg($msg){
        
        $this->msgs [] = $msg;
        
    }
    
    // check has msg
    public function hasMsg(){
        
        return empty($this->msgs);
        
    }
    
    public function getMsgs(){
        
        return $this->msgs;
    }
    
    
    
    
}


?>
