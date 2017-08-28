<?php	
    function getByQuery($qry)
    {
        $ci =& get_instance();      
        return $ci->dataaccess_mdl->getByQuery($qry);        
    }

    function insert($table, $data) {
        $ci =& get_instance();   
        return $ci->dataaccess_mdl->insertRet($table, $data);
    }

    function insertRet($table, $data) {
        $ci =& get_instance();   
        return $ci->dataaccess_mdl->insertRet($table, $data);
    }

    function update($table, $data, $where) {
        $ci =& get_instance();   
        return $ci->dataaccess_mdl->update($table, $data, $where);
    }

    function delete($table, $where) {
        $ci =& get_instance();   
        return $ci->dataaccess_mdl->delete($table, $where);
    }   

    function insertSystemLog($module, $key_id, $action, $data) {     
        $insert = array(
            'created_by' => loginId(),
            'created_date' => date("Y-m-d H:i:s"),
            'module' => $module,
            'key_id' => $key_id,
            'action' => $action,
            'data' => json_encode($data),
        );
        insert("systemlogtable", $insert);
    }

    function deleteData($action, $module, $table, $where, $key_id) {
        $ci =& get_instance();   
        insertSystemLog($module, $key_id, $action, "");
        return $ci->dataaccess_mdl->delete($table, $where);
    }	

    function insertData($action, $module, $table, $data) {
        $key_id = insertRet($table, $data);
        insertSystemLog($module, $key_id, $action, $data);
    }

    function updateData($action, $module, $table, $data, $where, $key_id) {
        update($table, $data, $where);
        insertSystemLog($module, $key_id, $action, $data);
    }
?>