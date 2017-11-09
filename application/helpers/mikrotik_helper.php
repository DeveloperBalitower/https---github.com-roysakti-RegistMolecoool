<?php	
    function setIPMikrotik() {
        return '103.94.168.162';
    }

    function setUserMikrotik() {
        return 'user-api';
    }

    function setPasswordMikrotik() {
        return '112233';
    }
	
    function MikrotikKillSession($mac_address) { 
        $con =& get_instance();  

        $con->load->library('RouterosAPI');

        if ($con->routerosapi->connect(setIPMikrotik(), setUserMikrotik(), setPasswordMikrotik())) {         
            $con->routerosapi->write('/ip/hotspot/active/print',true);
            $read = $con->routerosapi->read(true);

            $is_kill = 0;
            foreach ($read as $value) {
                if ($value['user'] == $mac_address) {
                    $con->routerosapi->write('/ip/hotspot/active/remove',false);
                    $con->routerosapi->write('=.id=' . $value['.id']);
                    $kill = $con->routerosapi->read();
                    $is_kill = 1;
                }
            }

            $ret = array(
                'status' => 1,
                'msg' => "Process successful",
                'kill_session' => $is_kill
            );

            $con->routerosapi->disconnect();
            return $ret;
        } else {
            $ret = array(
                'status' => 0,
                'msg' => "Connect to Mikrotik Failed",
                'kill_session' => 0
            );
            return $ret;
        }

    }

    function MikrotikAddSession($mac_address) { 
        $con =& get_instance();  

        $con->load->library('RouterosAPI');

        if ($con->routerosapi->connect(setIPMikrotik(), setUserMikrotik(), setPasswordMikrotik())) {  
            $con->routerosapi->write('/ip/hotspot/active/add', false);
            $con->routerosapi->write('=user=' . $mac_address);
            $con->routerosapi->read();

            $ret = array(
                'status' => 1,
                'msg' => "Process successful"
            );

            $con->routerosapi->disconnect();
            echo json_encode($ret);
        } else {
            $ret = array(
                'status' => 0,
                'msg' => "Connect to Mikrotik Failed",
            );
            echo json_encode($ret);
        }

    }

?>