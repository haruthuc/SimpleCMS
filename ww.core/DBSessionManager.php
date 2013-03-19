<?php

/*
 * Session in Datbase Manage
 * 
 */

class DBSessionManager extends ISessionManager {

    public function close() {
        return true;
    }

    public function destroy($id) {
        
    }

    public function gc($maxlifetime) {
        
    }

    public function open($savePath, $sessionName) {
        
        global $sess_save_path;
        $sess_save_path = $save_path;
        return true;
        
    }

    public function read($id) {
        
        $newid = mysql_real_escape_string($id);
        $time = time();
        $fields = array("session_data");
        $where = array();
        $where['key'] = "session_id";
        $where['value'] = $newid;
        
        $and  =  array();
        $and[0]["key"] = "expires";
        $and[0]["value"]= $time;
        $and[0]['math'] = " >";
        
        return $this->find($fields,$where,$and,null,null);
        
        
    }

    public function write($id, $data) {
        
         $time = time() + $this->life_time;
         $newid = mysql_real_escape_string($id);
         $newdata = mysql_real_escape_string($data);
         $sessionModel = new SessionModel();
         $sessionModel->setSession_id($newid);
         $sessionModel->setSession_data($newdata);
         $sessionModel->setExpires($time);
         $sessionModel->save();
         
    }

}

?>
