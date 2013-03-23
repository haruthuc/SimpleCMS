<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class AccountModel extends BaseModel{
    
   
    private $tableName = "account";
    private $id;
    private $username;
    private $password;
    private $email;
    private $datejoin;
    private $status;
    private $role;
    
    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }
    
    public function __construct() {
        
        $this->tableName = parent::PREFIX_TABLE.'_'.$this->tableName;
        parent::__construct();
    }
    
    public function setId($id) {
        $this->id = $id;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setDatejoin($datejoin) {
        $this->datejoin = $datejoin;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getDatejoin() {
        return $this->datejoin;
    }

    public function getStatus() {
        return $this->status;
    }

    public function delete() {
        $stm = self::$dbo->prepare("DELETE FROM ".$this->tableName." WHERE id=?");
        $stm->execute(array($this->id));
    }

    public function find($fields = null, $where = null,$and=null, $order = null,$limit = null,$asoc = TRUE) {
        
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
                $query.=" AND ".$andValue['key']." =".$andValue['value'];
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

    public function save($returnID = FALSE) {
        
      
        //$eventManager->fireEvent($this,"before-add");
        
        try{
             //print_r($this->tableName);

             $query = "INSERT INTO ".$this->tableName."(username,password,email,datejoin,status,role) VALUE(?,?,?,?,?,?)";
           
             $stm = self::$dbo->prepare($query);
             $resulft = $stm->execute(array($this->username,$this->password,$this->email,$this->getDatejoin(),$this->status,$this->role));
            
             //var_dump($resulft);
             if($returnID==TRUE) return $stm->lastInsertId(); 
            
        }catch(PDOException $ex){
            
            throw  new Exception("Cant save ".$this->tableName." ".$ex->getMessage());
        }
       
    }

    public function update() {
        
        
    }
    
    public function login(){
        $fields = array("username","role");
        $where = array();
        $where['key'] = "username";
        $where['value'] = $this->username;
        
        $and  =  array();
        $and[0]["key"] = "password";
        $and[0]["value"]= $this->password;
        
        return $this->find($fields,$where,$and,null,null);
        
    }

    public function getName() {
         return get_class ($this);
    }
}

?>
