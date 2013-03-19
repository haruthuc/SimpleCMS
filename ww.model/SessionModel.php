<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class SessionModel extends BaseModel{
    private $tableName = "session";
    /**
     *
     * @var $session_id varchar(100)
     */
    private $session_id;
    /**
     *
     * @var $session_id text  
     */
    private $session_data;
    /**
     *
     * @var $expires int(11)
     */
    private $expires;
    
    
    
    public function __construct() {
        
        $this->tableName = parent::PREFIX_TABLE.'_'.$this->tableName;
        parent::__construct();
    }
    
    public function delete() {
        
    }

    public function find($fields = null, $and = null, $where = null, $order = null, $limit = null, $asoc = TRUE) {
        
    }

    public function save($returnLastID = FALSE) {
        
        
        
    }

    public function update() {
        
    }
}
?>
