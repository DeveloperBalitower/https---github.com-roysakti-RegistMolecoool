<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Datatables_mdl extends CI_Model 
{        
    public function __construct() 
    {
        parent::__construct();
        $this->condb  = $this->load->database('default', TRUE);
    }
    
    private function _get_datatables_query($database, $table, $column, $where)
    {
        $this->condb  = $this->load->database($database, TRUE);
        $this->condb->from($table);
		if($where != "")
			$this->condb->where($where);
		
        $i = 0;
        foreach ($column as $item)
        {
            if($_POST['search']['value'])
                ($i===0) ? $this->condb->like($item, $_POST['search']['value']) : $this->condb->or_like($item, $_POST['search']['value']);
            $column[$i] = $item;
            $i++;
        }
 
        if(isset($_POST['order']))
        {
            $this->condb->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->condb->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables($database, $table, $column, $where)
    {
        $this->condb  = $this->load->database($database, TRUE);     
        $this->_get_datatables_query($database, $table, $column, $where);
        if($_POST['length'] != -1)
        $this->condb->limit($_POST['length'], $_POST['start']);
        $query = $this->condb->get();
        return $query->result();
    }
 
    function count_filtered($database, $table, $column, $where)
    {
        $this->condb  = $this->load->database($database, TRUE);	
        $this->_get_datatables_query($database, $table, $column, $where);
        $query = $this->condb->get();
        return $query->num_rows();
    }
 
    public function count_all($database, $table, $column)
    {
        $this->condb  = $this->load->database($database, TRUE);		
        $this->condb->from($table);
        return $this->condb->count_all_results();
    }
}