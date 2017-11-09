<?php

class sendemail {
    protected $_ci;
    protected $from;
    protected $folder;
    
    function __construct() {        
        $this->_ci = &get_instance();
        $this->from = "noreply@molecool.id";
        $this->folder = base_url()."assets/backend/email/";
    }
    
    function forgotPassword($data) {        
        $replaced = array(
            "[{LINK_CONFIRM}]" => $data['link_confirm']
        );
        
        $arrContextOptions=array(
            "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
            ),
        ); 

        $to = $data['to'];
        $subject = "Forgot Password - Molecool";
        $templateemail = base_url()."assets/backend/email/email_forgotpassword.txt"; 	  
        $gettemplate = file_get_contents($templateemail, false, stream_context_create($arrContextOptions));
        $msg = strtr($gettemplate, $replaced);
		
        $this->_ci->load->library('email');           
        $this->_ci->email->from($this->from);
        $this->_ci->email->to($to);
        $this->_ci->email->subject($subject);
        $this->_ci->email->message($msg);   
        $this->_ci->email->set_newline("\r\n");
        
        if($this->_ci->email->send()) {
            //echo $this->_ci->email->print_debugger();die;
            return true;
        } else {
            return false;
        }
    }
}
