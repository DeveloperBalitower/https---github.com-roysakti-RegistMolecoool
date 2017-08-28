<?php

class sendemail {
    protected $_ci;
    protected $from;
    protected $folder;
    
    function __construct() {        
        $this->_ci = &get_instance();
        $this->from = "intranet@balitower.co.id";
        $this->folder = base_url()."assets/backend/email/";
    }
    
    function registrationPersonal($data) {        
        $replaced = array(
            "[{NAMACUSTOMER}]" => $data['nama_customer'], 
            "[{NOKTP}]" => $data['no_ktp'],
            "[{ALAMAT}]" => $data['alamat'],
            "[{SERVICE}]" => $data['service'],
            "[{METHODPAYMENT}]" => $data['pembayaran']
        );


        
        $arrContextOptions=array(
            "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
            ),
        ); 

        $to = $data['to'];
        $subject = $data['subject'];
        $attachment = $data['attachment'];
        $templateemail = base_url()."assets/backend/email/email_registration.txt"; 	  
        $gettemplate = file_get_contents($templateemail, false, stream_context_create($arrContextOptions));
        $msg = strtr($gettemplate, $replaced);
		
        $this->_ci->load->library('email');           
        $this->_ci->email->from($this->from);
        $this->_ci->email->to($to);
        $this->_ci->email->subject($subject);
        $this->_ci->email->message($msg);   
        $this->_ci->email->set_newline("\r\n");
        
        if($attachment != "") {  
            $this->_ci->email->attach($attachment);            
        }
        
        if($this->_ci->email->send()) {
            echo $this->_ci->email->print_debugger();die;
            return "send";
        } else {
            return false;
        }
    }
}
