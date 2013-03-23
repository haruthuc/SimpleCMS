<?php

/**
 * Class EventsDispatcher
 * 
 *
 */

class EventsDispatcher {
    
    protected $events = array();
    protected $listeners = array();
    
    
    //add event
    
    public function addEvent(EventI $event){
        
        if(key_exists($event->getName(),$this->events)){
            
            return false;
            
        }
        else{
            
            $this->events[$event->getName()] = $event;
        
            return true;
        }
        
        
    }
    
    
    public function removeEvent($event){
        
        if($event instanceof EventI){
            
            $event= $event->getName();
            
        }else{
            
            throw new Exception("Event dont exist $event");
        }
        
        if(array_key_exists($event, $this->events)) {
                unset($this->events[$event]);   
                return true;
                }


        
    }
    
    
    public function getEvent($eventName){
        if(array_key_exists($eventName, $this->events)) {
                    return $this->events[$eventName];
        }
        
        
    }
    
    public function addListener($eventName, $listener){
        
        if(!is_string($eventName)){
            
            throw new Exception("Event name must is string");
            
        }
        
        if(!array_key_exists($eventName, $this->events)) {
             throw new Exception("Event not registed");
            
        }
        
        $this->events[$eventName]->addListener($listener);
      
        
    }
    
    public function getListeners($eventName){
        
        if(!array_key_exists($eventName, $this->events)) {
             throw new Exception("Event not registed");
            
        }
        
        
        return $this->events[$eventName]->getListeners();
        
        
    }
    
    
    
    
    
}

?>
