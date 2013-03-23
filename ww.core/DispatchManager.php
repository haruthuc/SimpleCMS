<?php

/**
 * Event Dispatch Manager 
 * Get config event from file json
 *
 * 
 */
class DispatchManager{
    
    protected $eventsDisppatcher ;
    protected $configManager;
    
    //read config events from file json and register events
    public function __construct() {
        
         $this->eventsDisppatcher = new EventsDispatcher();
         $this->configManager = ConfigManager::getConfig("listeners");
         //var_dump($this->configManager);
         
    }
    
    public function registEvent(EventI $event){
        
         $this->eventsDisppatcher->addEvent($event);
            
        
    }
    
    public function removeEvent($eventName){
        
         $this->eventsDisppatcher->removeEvent($eventName);
    }
    
    
    public function fireEvent(BaseModel $entity,$eventName){
        
         $entityName = $entity->getName();
        
         
         //get config listeners
         $listenerData  = $this->configManager['data'][$entityName];
         
         
         //get events from file config
         $listeners = $listenerData["events"];
         
         
          //var_dump($listeners);
         $eventObject = new Event($entity, $entityName."-".$eventName);
         
         if(array_key_exists($eventName,$listeners))
         {
             $listenerArr = $listeners[$eventName];
             foreach ($listenerArr as $listValue) {
                 
                 $eventObject->addListener($listValue);
                 
             }
             
             $this->registEvent($eventObject);
             $eventObject->notify();
         }
         
         
          
         
         
         
        
        
    }
    
    
    
}


?>
