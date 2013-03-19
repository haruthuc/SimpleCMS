<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class MessageHelper{
    private static $_messages = null;
    const INFO = "info";
    const ERROR  = "error";
    const SUCCESS = 'success';
    

    public static function setMessages($messages){
        
        self::$_messages = $messages;
        
    }
    
    
    public static function renderMessages(){
        
        
        if(self::$_messages!=null && is_array(self::$_messages)){
                print_r(self::$_messages); die();
            echo ' <div class="alert">';
            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
            
            
            foreach (self::$_messages as $message){

                    echo '<div class="alert alert-'.$message['key'].'">';
                    
                    echo $message['content'];
                    
                    echo '</div>';
                    
                    
                }
                
                    echo '</div>';
                
            }
        
            
            
            
            
        }
        
    
    
    
    
}

?>
