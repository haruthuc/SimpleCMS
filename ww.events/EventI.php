<?php
/**
 * Class Event Interface
 * 
 */
interface  EventI{
    
    //get Event Name
    public function getName();
    
    //get listeners
    public function getListeners();
    
    //add listener
    public function addListener($listener);
    
    // notify events
    public function notify();
    
    // check exist listener
    public function hasListeners();
    
    //get subject regis event
    public function getSubject();
    
    
    
    
    
}


?>
