<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model("radius_mdl");
   	}

	public function index() {
		$mac = $this->input->post('mac');
		$ip = $this->input->post('ip');
		$username = $this->input->post('username');
		$linklogin = $this->input->post('link-login');
		$linkorig = $this->input->post('link-orig');
		$error = $this->input->post('error');
		$chapid = $this->input->post('chap-id');
		$chapchallenge = $this->input->post('chap-challenge');
		$linkloginonly = $this->input->post('link-login-only');
		$linkorigesc = $this->input->post('link-orig-esc');
		$macesc = $this->input->post('mac-esc');

		/*$mac = "";
		$ip = "";
		$username = "";
		$linklogin = "";
		$linkorig = "";
		$error = "";
		$chapid = "";
		$chapchallenge = "";
		$linkloginonly = "";
		$linkorigesc = "";
		$macesc = "";*

		echo 'mac => '.$mac.'<BR>';
		echo 'ip => '.$ip.'<BR>';
		echo 'username => '.$username.'<BR>';
		echo 'linklogin => '.$linklogin.'<BR>';
		echo 'linkorig => '.$linkorig.'<BR>';
		echo 'error => '.$error.'<BR>';
		echo 'chapid => '.$chapid.'<BR>';
		echo 'chapchallenge => '.$chapchallenge.'<BR>';
		echo 'linkloginonly => '.$linkloginonly.'<BR>';
		echo 'linkorigesc => '.$linkorigesc.'<BR>';
		echo 'macesc => '.$macesc.'<BR>';
		die();*/

		$data = array(
			'mac' => $mac,
			'ip' => $ip,
			'username' => $username,
			'linklogin' => $linklogin,
			'linkorig' => $linkorig,
			'error' => $error,
			'chapid' => $chapid,
			'chapchallenge' => $chapchallenge,
			'linkloginonly' => $linkloginonly,
			'linkorigesc' => $linkorigesc,
			'macesc' => $macesc,
			'type' => "public",
		);

		$this->load->view('page/loginform_vw', $data);
	}

	public function home() {
		$mac = $this->input->post('mac');
		$ip = $this->input->post('ip');
		$username = $this->input->post('username');
		$linklogin = $this->input->post('link-login');
		$linkorig = $this->input->post('link-orig');
		$error = $this->input->post('error');
		$chapid = $this->input->post('chap-id');
		$chapchallenge = $this->input->post('chap-challenge');
		$linkloginonly = $this->input->post('link-login-only');
		$linkorigesc = $this->input->post('link-orig-esc');
		$macesc = $this->input->post('mac-esc');

		$data = array(
			'mac' => $mac,
			'ip' => $ip,
			'username' => $username,
			'linklogin' => $linklogin,
			'linkorig' => $linkorig,
			'error' => $error,
			'chapid' => $chapid,
			'chapchallenge' => $chapchallenge,
			'linkloginonly' => $linkloginonly,
			'linkorigesc' => $linkorigesc,
			'macesc' => $macesc,
			'type' => "home",
		);

		if($this->isDevice()) {
			if($this->getDeviceOS() == "iOS") {
				$this->load->view('page/downloadios_vw', $data);
			} else if($this->getDeviceOS() == "Android") {
				$this->load->view('page/downloadandroid_vw', $data);
			}
		} else {
			$this->load->view('page/loginform_vw', $data);
		}
	}

	public function index2() {
		$this->load->view('page/loginform_vw');		
	}

	public function doRegistration() {
		$ontid = $this->input->post('ontid');
		$first_name = $this->input->post('first_name');
		$middle_name = $this->input->post('middle_name');
		$last_name = $this->input->post('last_name');
		$gender = $this->input->post('gender');
		$birthofdate = date("Y-m-d", strtotime($this->input->post('birthofdate')));
		$userphone = $this->input->post('userphone');
		$useremail = $this->input->post('useremail');
		$userpw = $this->input->post('userpw');
		$usermac = $this->input->post('usermac');
		$usertype = $this->input->post('usertype');

		$qry = "select * from radcheck where username = '".$useremail."'";
		$rs = $this->radius_mdl->getByQuery($qry);
		if($rs == "") {
	        $input = array(
				'username' => $useremail,
				'attribute' => 'Cleartext-Password',  
				'op' => ':=',
				'value' => $userpw
			);
			$this->radius_mdl->insert("radcheck", $input);
			
			$input = array(
				'username' => $useremail,
				'attribute' => 'Simultaneous-Use',  
				'op' => ':=',
				'value' => '5'
			); 
			$this->radius_mdl->insert("radcheck", $input);
			
			$input = array(
				'username' => $useremail,
				'creationdate' => date("Y-m-d H:i:s"),  
			); 
			$this->radius_mdl->insert("userinfo", $input);

			// $input = array(
			// 	'ont_id' => $ontid,
			// 	'first_name' => $first_name,
			// 	'middle_name' => $middle_name,
			// 	'last_name' => $last_name,
			// 	'gender' => $gender,
			// 	'date_of_birth' => $birthofdate,
			// 	'phone' => $userphone,
			// 	'email' => $useremail,
			// 	'pswrd' => $userpw,
			// 	'mac_address' => $usermac,
			// 	'register_at' => $usertype,
			// 	'created_date' => date("Y-m-d H:i:s"),
			// );
			// insert("customerconnecttable", $input);

			$this->sendDataToSalesServer($ontid, $first_name, $middle_name, $last_name, $gender, $birthofdate, 
			$userphone, $useremail, $userpw, $usermac, $usertype);

			$data = array(
				'status' => "1",
				'msg' => "Your registration is successfully",
				'email' => $useremail,
				'password' => $userpw,
			);
			echo json_encode($data);
		} else {
			$data = array(
				'status' => "0",
				'msg' => "Your account already exists",
				'email' => "",
				'password' => "",
			);
			echo json_encode($data);
		}
	}

	function sendDataToSalesServer(
			$ontid, $first_name, $middle_name, $last_name, $gender, $birthofdate, 
			$userphone, $useremail, $userpw, $usermac, $usertype 
		) {
		$url = 'https://salesorder.balifiber.id/mdataaccess/doRegistrationFromMikrotik';
		$fields = array(
			'ontid' => urlencode($ontid),
			'first_name' => urlencode($first_name),
			'middle_name' => urlencode($middle_name),
			'last_name' => urlencode($last_name),
			'gender' => urlencode($gender),
			'birthofdate' => urlencode($birthofdate),
			'userphone' => urlencode($userphone),
			'useremail' => urlencode($useremail),
			'userpw' => urlencode($userpw),
			'usermac' => urlencode($usermac),
			'usertype' => urlencode($usertype)
		);

		//url-ify the data for the POST
		$fields_string = "";
		foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
		rtrim($fields_string, '&');

		//open connection
		$ch = curl_init();

		//set the url, number of POST vars, POST data
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_POST, count($fields));
		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

		//execute post
		$result = curl_exec($ch);

		//close connection
		curl_close($ch);
	}

	function checkONT() {
		$ontid = $this->input->post("ontid");
		//$rs = getByQuery("select ont_id from vw_ontlist where ont_id = '".$ontid."' and status_txt = 'In use'");
		if($ontid != "") {
			$rs = getByQuery("select ont_id from vw_ontlist where ont_id = '".$ontid."'");
			if($rs != "") {
				$data = array(
					'status' => "1",
					'msg' => "",
				);
				echo json_encode($data);		
			} else {	
				$data = array(
					'status' => "0",
					'msg' => "Your ONT is not active",
				);
				echo json_encode($data);			
			}
		} else {
			$data = array(
				'status' => "1",
				'msg' => "",
			);
			echo json_encode($data);				
		}
	}

	public function isDevice() {
		$useragent=$_SERVER['HTTP_USER_AGENT'];
		if(preg_match('/android|avantgo|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))) {
			return true;
		} else {
			return false;
		}
	}

	public function getDeviceOS() {
		$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
		if(strstr($_SERVER['HTTP_USER_AGENT'],'iPhone') || strstr($_SERVER['HTTP_USER_AGENT'],'iPad')) { 
			return "iOS";
		} else if(stripos($ua,'android') !== false) { 
		    return "Android";
		} else {
			return "";
		}
	}

	public function test() {
		if($this->isDevice()) {
			echo "device - ".$this->getDeviceOS();
		} else {
			echo "computer";
		}
	}
}
