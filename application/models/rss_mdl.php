<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Rss_mdl extends CI_Model 
{        
    public function __construct() 
    {
        parent::__construct();
        $this->condb  = $this->load->database('rss', TRUE);
    }

    public function getByQuery($qry)
    {
        $query = $this->condb->query($qry);
        
        if ($query->num_rows() > 0) 
        {
            return $query->result();
        }
        else
        {
            return "";      
        }
    }
    
    public function insert($table, $data)
    {
        $query = $this->condb->insert($table, $data);
        if($query > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public function insertRet($table, $data)
    {
        $this->condb->insert($table, $data);
        return $this->condb->insert_id();
    }
    
    public function update($table, $data, $where)
    {
        $query = $this->condb->update($table, $data, $where);
        if($query > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public function delete($table, $where)
    {   
        $query = $this->condb->delete($table, $where);
        if($query > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}