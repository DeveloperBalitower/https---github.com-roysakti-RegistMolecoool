<?php

class Template 
{
    protected $_ci;
    
    function __construct()
    {        
        $this->_ci = &get_instance();
    }
    
    function display_app($template, $data = null)
    {        
        $data['_content'] = $this->_ci->load->view($template, $data, true);       
        $data['_header'] = $this->_ci->load->view("template/header_incld", $data, true); 
        $data['_menu'] = $this->_ci->load->view("template/menu_incld", $data, true); 
        $data['_footer'] = $this->_ci->load->view("template/footer_incld", $data, true); 
        $this->_ci->load->view("template/table_tmplt.php", $data);
    }
}
