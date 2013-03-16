<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class AdminController extends BaseController{
    
    public function indexAction(){
        
        $this->register->template->render("login");
        
    }
    
    
}

?>
