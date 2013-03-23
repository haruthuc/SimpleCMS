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
    
    public function getSession_id() {
        
        return $this->session_id;
    }

    public function setSession_id($session_id) {
        $this->session_id = $session_id;
    }

    public function getSession_data() {
        return $this->session_data;
    }

    public function setSession_data($session_data) {
        $this->session_data = $session_data;
    }

    public function getExpires() {
        return $this->expires;
    }

    public function setExpires($expires) {
        $this->expires = $expires;
    }

        
    public function __construct() {
        
        $this->tableName = parent::PREFIX_TABLE.'_'.$this->tableName;
        parent::__construct();
    }
    
    public function delete() {
        $query = "DELETE FROM ".$this->tableName." WHERE id = ".$this->session_id;
        $stm = self::$dbo->prepare($query);
        return $stm->execute();
    }
    
    public function clean($time)
    {
        $query = "DELETE FROM ".$this->tableName." WHERE expires < ".$time;
        $stm = self::$dbo->prepare($query);
        //$stm->execute();
        return $stm->execute();
        
    }        
    public function find($fields = null, $where = null, $and = null, $order = null, $limit = null, $asoc = false) {
        
           $query = "SELECT ";
        if($fields!=null && is_array($fields)){
            
     
            
            $query.= implode(",", $fields)." ";
            //echo $query;
            
        }else{
            
            $query .= "*";
        }
        $query .=" FROM ".$this->tableName;
        
        if($where!=null&& is_array($where)){
            if(is_string($where['value'])) $where['value'] = "'".$where['value']."'";
            $query.=" WHERE ".$where['key']." =".$where['value'];            
        }
        
        if($and!=null&&  is_array($and)){
            
            foreach ($and as $andValue){
                 if(is_string($andValue['value'])) $andValue['value'] = "'".$andValue['value']."'";
                $query.=" AND ".$andValue['key']." ".$andValue['math'].$andValue['value'];
            }
            
            
        }
        
        if($order!=null){
            $query.=" ORDER BY ".$order['key']." ".$order['sort'];
        }
        
        if($limit!=null){
            $query.=" LIMIT ".$limit['from'].' '.$limit['lenght'];
        }
        try {
            //echo $query;
            $stm = self::$dbo->prepare($query);
            $stm->execute();
            
            if($asoc==TRUE) return $stm->fetchAll(PDO::FETCH_ASSOC);
            else return $stm->fetchAll();
            
        }  catch (Exception $ex){
            
             throw  new Exception("Cant find ".$this->tableName." ".$ex->getMessage());
        }
        
        
        
    }

    public function save($returnLastID = FALSE) {
           try{
             //print_r($this->tableName);

             $query = "REPLACE ".$this->tableName."(session_id,session_data,expires) VALUE(?,?,?)";
             $stm = self::$dbo->prepare($query);
             $resulft = $stm->execute(array($this->session_id,$this->session_data,$this->expires));
             if($returnLastID==TRUE) return $stm->lastInsertId(); 
            
        }catch(PDOException $ex){
            
            throw  new Exception("Cant save ".$this->tableName." ".$ex->getMessage());
        }
        
        
    }

    public function update() {
        
    }

    public function getName() {
 
        return get_class ($this);
    
        
    }
}
?>
