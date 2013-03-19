<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class RegisterManager{
    
        private $vars = array();
        
        //private static $messages = array();
        
        
        //get value form array
        public function __get($index){
            
            return $this->vars[$index];
        }
        
        public function __set($index,$value){
            
            $this->vars[$index] = $value;
            
            
        }
        
       
        
    
    
    
}
?>
