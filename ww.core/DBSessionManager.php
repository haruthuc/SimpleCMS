<?php

/*
 * Session in Datbase Manage
 * 
 */

class DBSessionManager extends ISessionManager {
    
    
     public function __construct() {
       
        if(__SESSION_TIMEOUT!=0){
            $this->life_time = __SESSION_TIMEOUT;
        }else{
            $this->life_time = get_cfg_var("session.gc_maxlifetime");
        }
        session_set_save_handler(
            array($this, "open"),
            array($this, "close"),
            array($this, "read"),
            array($this, "write"),
            array($this, "destroy"),
            array($this, "gc")
        );
        
    }

    public function close() {
        return true;
    }

    public function destroy($id) {
        
        $newid = mysql_real_escape_string($id);
        $modelSession = new SessionModel();
        $modelSession->setSession_id($newid);
        return $modelSession->delete();
    }

    public function gc($maxlifetime) {
         $old = time() - $maxlifetime;
         $old = mysql_real_escape_string($old);
         $modelSession = new SessionModel();
         return $modelSession->clean($old);
         
         
    }

    public function open($savePath, $sessionName) {
        
        global $sess_save_path;
        $sess_save_path = $savePath;
        return true;
        
    }

    public function read($id) {
       
        $newid = mysql_real_escape_string($id);
        //var_dump($id);
        $time = time();
        $fields = array("session_data");
        
        $where['key'] = "session_id";
        $where['value'] = $newid;
        
        $and  =  array();
        $and[0]["key"] = "expires";
        $and[0]["value"]= $time;
        $and[0]['math'] = " >";
        $modelSession = new SessionModel();
        $result = $modelSession->find($fields,$where,$and,null,null,true);
        
        // print_r();
        return $result[0]['session_data'];
        
    }

    public function write($id, $data) {
        
         $time = time() + $this->life_time;
         $newid = mysql_real_escape_string($id);
         $newdata = mysql_real_escape_string($data);
         //var_dump($newdata);
         $sessionModel = new SessionModel();
         $sessionModel->setSession_id($newid);
         $sessionModel->setSession_data($newdata);
         $sessionModel->setExpires($time);
         $sessionModel->save();
         
         echo "Save Session";die();
         
    }

}

?>
