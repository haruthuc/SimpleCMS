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
        
    }

    public function write($id, $data) {
        
    }

}

?>
