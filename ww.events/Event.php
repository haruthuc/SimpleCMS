<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Event implements EventI{
    
    protected $eventName;
    
    protected $stopagion;
    
    protected $listeners = array();
    
    protected $subject;
    
    protected $value  = null;
    
    protected $msgs ;




    public function __construct($subject,$eventName) {
        $this->eventName = $eventName;
        $this->subject = $subject;
    }
    

    public function addMesages($msgs){
        
        $this->msgs = $msgs;
    }
    
    
    public function getMesages(){
        
        return $this->msgs;
    }


    public function getValue(){
        
        return $this->value;
    }



    public function addListener($listener) {
        
        //echo "Listenter has been registed at Event ".$this->eventName; die();
        $buffArray = explode("::",$listener);
        $className = $buffArray[0];
        $functionName = $buffArray[1];
        $listenerBuff = array(new $className,$functionName);
    
        
        $this->listeners[] = $listenerBuff; 
        
    }

    public function getListeners() {
        return $this->listeners;
    }

    public function getName() {
        
    }

    public function getSubject() {
        
        return $this->subject;
        
    }

    public function hasListeners() {
        return !empty($this->listeners);
    }

    public function notify() {
        
        
        foreach ($this->listeners as $valueListener) {
            
            call_user_func_array($valueListener,array($this));
            
            
        }
        
        
      
        
    }
    
    private function setValue($value){
        
        $this->value = $value;
    }
}

?>
