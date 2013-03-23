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






    public function addListener($listener) {
        
        //echo "Listenter has been registed at Event ".$this->eventName; die();
        
        $this->listeners[] = $listener; 
        
    }

    public function getListeners() {
        return $this->listeners;
    }

    public function getName() {
        
    }

    public function getSubject() {
        
    }

    public function hasListeners() {
        return !empty($this->listeners);
    }

    public function notify() {
        
        print_r($this->subject);
        
        "echo Notify event";
        
    }
}

?>
