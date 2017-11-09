<!DOCTYPE html>
<html>
<head>
	<title>Molecool - Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?= base_url("assets/login") ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
  	<link rel="shortcut icon" href="<?= base_url("assets/login") ?>/images/icon.png" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/login") ?>/css/bootstrap-datetimepicker.css " />
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/login") ?>/css/bootstrap-datetimepicker.min.css " />
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/login") ?>/css/style.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/login") ?>/css/tabs.css " />
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/login") ?>/css/jquery-ui.css " />
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/sweetalert2") ?>/sweetalert2.css">  
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/sweetalert2") ?>/sweetalert2.min.css">  
    <link rel="stylesheet" type="text/css" href="<?= base_url("assets/font-awesome") ?>/css/font-awesome.css" />
	<script src="<?= base_url("assets/login") ?>/js/jquery-1.9.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/login") ?>/css/custom.css " />
	<!--<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-101039839-2', 'auto');
	  ga('send', 'pageview');
	</script>-->
	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-105408751-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body class="bg">
   
   <div class="main wrap">
   		<center><img src="<?= base_url("assets") ?>/molecool.png" style="margin-top: -20px; width:200px;" class="logo_balifiber" /></center>
   		<div style="clear:both; height:10px"></div>
        <div id="login_page">
   			<div style="clear:both; height:20px"></div>

            <div class="resp-tabs-container hor_1">
               <div id="pagelogin" class="page_login">
                    	<table style="width:100%">
                    		<tr>
                    			<td>
                    				<input type="email" id="email" name="email" required="required" placeholder="Email*" />
                    			</td>
                    		</tr>
                    	</table>

                      	<span class="divider"></span>

                    	<table style="width:100%">
                    		<tr>
                    			<td>
                    				<input type="password" id="newpassword" name="newpassword" required="required" class="password" placeholder="New Password*"  /> 
                    			</td>
                    		</tr>
                    	</table>

                      	<span class="divider"></span>

					  	<div style="clear:both; height:30px"></div>					  

					  	<a href="javascript:void(0)" class="cbtn" onclick="doForgotPassword()">RESET PASSWORD</a>

					<div style="clear:both; height: 30px"></div>
		            <center>
			            <ul class="resp-tabs-list hor_1">
			                <li class="create" ><a href="https://balitower.co.id">Back</a></li>
			            </ul>
		            </center>                 
                </div>
			</div>
		</div>
    </div>
	</form>

	<!--<script src="<?= base_url("assets/login") ?>/js/tabs.js"></script>
	<script src="<?= base_url("assets/login") ?>/js/login.js"></script>-->
	<script src="<?= base_url("assets/login") ?>/js/jquery-ui.js"></script>
	<script src="<?= base_url("assets/login") ?>/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= base_url("assets/login") ?>/js/bootstrap-datetimepicker.js"></script>
	<script src="<?= base_url("assets/login") ?>/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="<?= base_url("assets/userconnect") ?>/js/md5.js"></script>
	<script type="text/javascript" src="<?= base_url("assets/sweetalert2") ?>/sweetalert2.js"></script>
	<script type="text/javascript" src="<?= base_url("assets/sweetalert2") ?>/sweetalert2.min.js"></script>
	<script type="text/javascript">

	    function doForgotPassword() {
	      var email = $('#email').val();
	      var newpassword = $('#newpassword').val();

	      if(email == "" || newpassword == "") {
	          swal('Failed!', "All data must be filled!", 'error');
	          return;
	      }

	      $.ajax({
	        type: 'post',
	        async: true,
	        url: '<?= base_url("user") ?>/doForgotPassword',
	        crossDomain: true,
	        data: {
	          'email': email, 
	          'newpassword': newpassword,
	        },
	        beforeSend: function() {
	        },
	        success: function(ret) {
	          var data = JSON.parse(ret); 
	          if(data['status'] == "1") {
	            successRegistration(data['msg']);
	          } else {
	            failedRegistration(data['msg']);
	          }
	        },
	        error: function(jq,status,message) {
	          var msg = 'A jQuery error has occurred. Status: ' + status + ' - Message: ' + message;
	          swal('Failed!', msg, 'error');
	        }
	      });
	    }

	    function successRegistration(msg) {
	      swal(
	        'Success!',
	        msg,
	        'success'
	      )
	    }

	    function failedRegistration(msg) {
	      swal('Failed!', msg, 'error');
	    }

	    function termCondition() {
	      swal({
	        html: $('<div>')
	          .addClass('some-class')
	          .text('jQuery is everywhere.'),
	      })
	    }
	//-->
	</script>
</body>
</html>

