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

			<input type="hidden" id="usermac" name="usermac" value="<?= $mac ?>" />
			<input type="hidden" id="usertype" name="usertype" value="<?= $type ?>" />

            <div class="resp-tabs-container hor_1">
               <div id="pagelogin" class="page_login">
                    <form name="login" method="post" onSubmit="return doLogin()" accept-charset="utf-8" >
                    	<table style="width:100%">
                    		<tr>
                    			<!-- <td style="width:35px">
									<span class="glyphicon glyphicon-envelope" style="color:#777"></span>
                    			</td> -->
                    			<td>
                    				<input type="email" id="username" name="username" required="required" placeholder="Email*" />
                    			</td>
                    		</tr>
                    	</table>

                      	<span class="divider"></span>

                    	<table style="width:100%">
                    		<tr>
                    			<!-- <td style="width:35px">
									<span class="glyphicon glyphicon-lock" style="color:#777"></span>
                    			</td> -->
                    			<td>
                    				<input type="password" id="password" name="password" required="required" class="password" placeholder="Password*"  /> 
                    			</td>
                    		</tr>
                    	</table>

                      	<span class="divider"></span>

						  <!--<div class="check">
								<label class="checkbox w3l"><input type="checkbox" name="checkbox" required="required"><i> </i>I accept the terms and conditions</label>
						 </div>-->

			        	<!--<a href="javascript:void(0)" class="forgot_password">Forgot Password?</a>-->

					  	<div style="clear:both; height:30px"></div>					  

					  	<input type="submit" value="Sign In" class=""/>
					</form> 

					<div style="clear:both; height: 30px"></div>
		            <center>
			            <ul class="resp-tabs-list hor_1">
			                <li class="create" onclick="changeStatus('create')">Don't have an account? Sign up</li>
			            </ul>
		            </center>                 
                </div>
                <div id="pageregistration" class="page_registration">
                    <form method="post" name="register">

                    	<div id="panelont">
                    		<center>
   								<img src="<?= base_url("assets/login/images") ?>/barcode.jpg" style="width:150px;" class="logo_balifiber" />
   								<div style="clear:both; height:20px"></div>
				            	<span style="color:#777; letter-spacing:1px">
				            		Please insert your WiFi Serial Number
				            	</span>
				            </center>

				            <div style="clear:both; height:20px"></div>

            				<input type="text" id="ontno" name="ontno" style="font-size:20px; text-align:center" />

	                      	<span class="divider"></span>

				            <div style="clear:both; height:20px"></div>

				            <center>
				            	<span style="font-size:12px; color:#ccc; font-style: italic; letter-spacing:1px">Click Next if you can't find serial number. By entering serial number, 
				            	your monthly quota will be much bigger</span>
				            </center>

				            <div style="clear:both; height:20px"></div>

						   	<a href="javascript:void(0)" class="cbtn" onclick="checkONT()">NEXT</a>

				            <div style="clear:both; height:50px"></div>

				            <center>
					            <ul class="resp-tabs-list hor_1">
					                <li class="create" onclick="changeStatus('login')">Have an account? Sign in</li>
					            </ul>
				            </center> 

                      	</div>

                      	<div id="paneldataregistation">

	                    	<!-- <table style="width:100%">
	                    		<tr>
	                    			<td style="width:35px">
										<span class="glyphicon glyphicon-user" style="color:#777"></span>
	                    			</td>
	                    			<td>
	                    				<input type="text" id="name" name="name" required="required" placeholder="Name*" />
	                    			</td>
	                    		</tr>
	                    	</table>

	                      	<span class="divider"></span> -->

	                      	<table style="width:100%">
	                    		<tr>
	                    			<td style="padding-right:15px; width: 34%">
	                    				<input type="text" id="first_name" name="first_name" required="required" placeholder="First name*" />
	                      				<span class="divider"></span>
	                    			</td>
	                    			<td style="width: 32%">
	                    				<input type="text" id="middle_name" name="middle_name" required="required" placeholder="Middle name" />
	                      				<span class="divider"></span>
	                    			</td>
	                    			<td style="padding-left:15px; width: 34%">
	                    				<input type="text" id="last_name" name="last_name" required="required" placeholder="Last name*" />
	                      				<span class="divider"></span>
	                    			</td>
	                    		</tr>
	                    	</table>

	                    	<table style="width:100%">
	                    		<tr>
	                    			<!-- <td style="width:35px">
										<span class="glyphicon glyphicon-heart" style="color:#777"></span>
	                    			</td> -->
	                    			<td>
	                    				<select id="gender" name="gender" style="width:100%">
											<option value="">Gender*</option>
											<option value="male">Male</option>
											<option value="female">Female</option>
									  	</select>
	                    			</td>
	                    		</tr>
	                    	</table>

	                      	<span class="divider"></span>

	                    	<!--<table style="width:100%">
	                    		<tr>
	                    			<td style="width:35px">
	                    				<img src="<?= base_url("assets/login/images") ?>/ic_email.png" style="width: 20px; height: 20px; position: relative; top:5px">
	                    			</td>
	                    			<td>
									  	<select id="dd" name="dd" style="width:25%">
											<option value="">Day</option>
											<?php
												for($i=1; $i<=31; $i++){
													echo "<option value='".$i."'>".$i."</option>";
												}
											?>
									  	</select>
									  	<select id="mm" name="mm" style="width:40%">
											<option value="">Month</option>
											<option value="01">January</option>
											<option value="02">February</option>
											<option value="03">March</option>
											<option value="04">April</option>
											<option value="05">May</option>
											<option value="06">June</option>
											<option value="07">July</option>
											<option value="08">August</option>
											<option value="09">September</option>
											<option value="10">October</option>
											<option value="11">November</option>
											<option value="12">December</option>
									  	</select>
									  	<input type="number" id="yyyy" name="yyyy" required="required" placeholder="Year" style="width:19%" />
	                    			</td>
	                    		</tr>
	                    	</table>

	                      	<span class="divider"></span>

	                    	<table style="width:100%">
	                    		<tr>
	                    			<td style="width:35px">
	                    				<img src="<?= base_url("assets/login/images") ?>/ic_email.png" style="width: 20px; height: 20px; position: relative; top:5px">
	                    			</td>
	                    			<td>
	                    				<select id="gender" name="gender" style="width:100%">
											<option value="">Gender</option>
											<option value="male">Male</option>
											<option value="female">Female</option>
									  	</select>
	                    			</td>
	                    		</tr>
	                    	</table>

	                      	<span class="divider"></span>

	                    	<table style="width:100%">
	                    		<tr>
	                    			<td style="width:35px">
	                    				<img src="<?= base_url("assets/login/images") ?>/ic_email.png" style="width: 20px; height: 20px; position: relative; top:5px">
	                    			</td>
	                    			<td>
	                    				<input type="text" id="user-birthdate" name="birthdate" required="required" placeholder="Date of Birth" />
	                    			</td>
	                    		</tr>
	                    	</table>

	                    	<table style="width:100%">
	                    		<tr>
	                    			<td style="width:35px">
	                    				<img src="<?= base_url("assets/login/images") ?>/ic_email.png" style="width: 20px; height: 20px; position: relative; top:5px">
	                    			</td>
	                    			<td>                    				
	                    				<div class="form-group">
							                <div class="input-group date form_date col-md-12" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
							                    <input style="width:100%" type="text" value="" readonly>
												<span class="input-group-addon" style="background: none; border: none"><span class="glyphicon glyphicon-calendar" style="color:#777"></span></span>
							                </div>
											<input type="hidden" id="dtp_input2" value="" />
	            						</div>
	                    			</td>
	                    		</tr>
	                    	</table>-->

	                    	<!-- <div class="form-group" style="padding:0px; margin: 0px">
				                <div class="input-group date form_date col-md-12" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd" style="padding:0px; margin: 0px">
				                	<table style="width:100%">
			                    		<tr>
			                    			<td style="width:35px; text-align: left">
												<span class="input-group-addon" style="background: none; border: none; float: left; margin-left:-10px; padding: 0px; margin: 0px; margin-top: 20px; ">
													<span class="glyphicon glyphicon-calendar" style="color:#777"></span>
												</span>
			                    			</td>
			                    			<td>   
				                    			<input style="width:100%" type="text" value="" style="margin-top: 10px" placeholder="Date of Birth*" readonly />
			                    			</td>
			                    		</tr>
			                    	</table>
				                </div>
								<input type="hidden" id="dtp_input2" value="" />
							</div> -->

	                    	<table style="width:100%">
	                    		<tr>
	                    			<td style="padding-right:15px; width: 34%">
	                    				<select id="tgllahir" name="tgllahir" style="width:100%">
											<option value="">Day of birth*</option>
											<?php
												for($i=1; $i<=31; $i++){
													echo '<option value="'.$i.'">'.$i.'</option>';
												}
											?>
									  	</select>
	                      				<span class="divider"></span>
	                    			</td>
	                    			<td style="width: 32%">
	                    				<select id="blnlahir" name="blnlahir" style="width:100%">
											<option value="">Month of birth*</option>
											<option value="1">January</option>
											<option value="2">February</option>
											<option value="3">March</option>
											<option value="4">April</option>
											<option value="5">May</option>
											<option value="6">June</option>
											<option value="7">July</option>
											<option value="8">August</option>
											<option value="9">September</option>
											<option value="10">October</option>
											<option value="11">November</option>
											<option value="12">December</option>
									  	</select>
	                      				<span class="divider"></span>
	                    			</td>
	                    			<td style="padding-left:15px; width: 34%">
	                    				<select id="thnlahir" name="thnlahir" style="width:100%">
											<option value="">Year of birth*</option>
											<?php
												for($i=date("Y"); $i>=1900; $i--){
													echo '<option value="'.$i.'">'.$i.'</option>';
												}
											?>
									  	</select>
	                      				<span class="divider"></span>
	                    			</td>
	                    		</tr>
	                    	</table>

	                    	<table style="width:100%">
	                    		<tr>
	                    			<!-- <td style="width:35px">
										<span class="glyphicon glyphicon-earphone" style="color:#777"></span>
	                    			</td> -->
	                    			<td>
	                    				<input type="text" id="user-phone" name="userphone" required="required" placeholder="Phone Number*" />
	                    			</td>
	                    		</tr>
	                    	</table>

	                      	<span class="divider"></span>

	                    	<table style="width:100%">
	                    		<tr>
	                    			<!-- <td style="width:35px">
										<span class="glyphicon glyphicon-envelope" style="color:#777"></span>
	                    			</td> -->
	                    			<td>
	                    				<input type="email" id="user-email" name="useremail" required="required" placeholder="Email*" />
	                    			</td>
	                    		</tr>
	                    	</table>

	                      	<span class="divider"></span>

	                    	<table style="width:100%">
	                    		<tr>
	                    			<!-- <td style="width:35px">
										<span class="glyphicon glyphicon-lock" style="color:#777"></span>
	                    			</td> -->
	                    			<td>
	                    				<input type="password" id="user-pw" name="userpw" required="required" placeholder="Password*">
	                    			</td>
	                    		</tr>
	                    	</table>

	                      	<span class="divider"></span>

	                    	<table style="width:100%">
	                    		<tr>
	                    			<!-- <td style="width:35px">
										<span class="glyphicon glyphicon-lock" style="color:#777"></span>
	                    			</td> -->
	                    			<td>
	                    				<input type="password" id="user-pw-repeat" required="required" placeholder="Confirm Password*">
	                    			</td>
	                    		</tr>
	                    	</table>

	                      	<span class="divider"></span>				  
						  
							<div style="clear:both; height:5px"></div>
						  
	         	  			<!--<div class="check w3_agileits">
								<label class="checkbox w3"><input type="checkbox" name="checkbox" required="required" ><i> </i>I accept the terms and conditions</label>
							</div>-->

							<div style="clear:both; height:30px"></div>

						   	<a href="javascript:void(0)" class="cbtn" onclick="doRegistration()">SIGN UP</a>

							<div style="clear:both; height: 30px"></div>
				            <center>
					            <ul class="resp-tabs-list hor_1">
					                <li class="login" onclick="changeStatus('login')">Have an account? Sign in</li>
					            </ul>
				            </center>
						</div>
					</form> 
				</div>
            </div>
        </div>

    </div>

	<!-- <center>
		<a href=""><img src="<?= base_url("assets/login/images") ?>/playstore.png" style="margin-top: -20px; width:150px;" class="logo_balifiber" /></a>
		<a href=""><img src="<?= base_url("assets/login/images") ?>/appstore.png" style="margin-top: -20px; width:150px;" class="logo_balifiber" /></a>
	</center> -->

	<div style="clear:both; height:30px"></div>

	<!-- $(if chap-id) -->
	<form name="sendin" action="<?php echo $linkloginonly; ?>" method="post">
	  <input type="hidden" name="username" id="username" />
	  <input type="hidden" name="password" id="password" />
	  <input type="hidden" name="dst" value="<?php echo $linkorig; ?>" />
	  <input type="hidden" name="popup" value="true" />
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

		$( document ).ready(function() {
		    /*$("#user-birthdate").datepicker();

			$('.form_date').datetimepicker({
		        weekStart: 1,
		        todayBtn:  1,
				autoclose: 1,
				todayHighlight: 1,
				startView: 2,
				minView: 2,
				forceParse: 0
		    });*/

		  	var usertype = $('#usertype').val();
		    if(usertype == "home") {
			    $('#paneldataregistation').hide();
			    $('#pagelogin').hide();
			    $('#panelont').show(); 		    
		    	$('#ontno').focus();
		    } else {
			    $('#paneldataregistation').show();
			    $('#pagelogin').hide();
			    $('#panelont').hide(); 		    	
		    } 
		});

		function changeStatus(status) {
		  var usertype = $('#usertype').val();
		  if(status == "login") {
		    $('#pagelogin').show();
		    $('#pageregistration').hide();
		  } else {
		    $('#pagelogin').hide();
		    $('#pageregistration').show();

		    if(usertype == "home") {
			    $('#paneldataregistation').hide();
			    $('#panelont').show(); 		    
		    	$('#ontno').focus();
		    } else {
			    $('#paneldataregistation').show();
			    $('#panelont').hide(); 		    	
		    } 		
		  }
		}

		function changePanel(status) {
		  if(status == "ont") {
		    $('#paneldataregistation').hide();
		    $('#panelont').show();  	
		    $('#ontno').focus();
		  } else {
		    $('#paneldataregistation').show();
		    $('#panelont').hide();  	 	
		  }
		}

		function checkONT() {
			var ontno = $('#ontno').val();
			$.ajax({
	        type: 'post',
	        async: true,
	        url: '<?= base_url("user") ?>/checkONT',
	        crossDomain: true,
	        data: {
	          'ontid': ontno,
	        },
	        success: function(ret) {
	          var data = JSON.parse(ret); 
	          if(data['status'] == "1") {
	            changePanel('registration');
	          } else {
	            failedRegistration(data['msg']);
	          }
	        },
	        error: function(jq,status,message) {
	          var msg = 'A jQuery error has occurred. Status: ' + status + ' - Message: ' + message;
	          swal('Failed!', msg, 'error');
	          $('.sumbit').html('Create Account');   
	          $(".sumbit").attr("disabled", false); 
	        }
	      });
		}

	    function doLogin() {
	      //alert("<?=$chapid?>");

	      <?php if(strlen($chapid) < 1) echo "return true;\n"; ?>
	      
	      var username = document.login.username.value;
	      var plain_password = document.login.password.value;
	      var password = hexMD5('<?php echo $chapid; ?>' + document.login.password.value + '<?php echo $chapchallenge; ?>');
	      
	      document.sendin.username.value = username;
	      document.sendin.password.value = password;
	      document.sendin.submit();
	      return false;
	    }

	    function doRegistration() {
	      var ontid = $('#ontno').val();
	      var first_name = $('#first_name').val();
	      var middle_name = $('#middle_name').val();
	      var last_name = $('#last_name').val();
	      var gender = $('#gender').val();
	      var dd = $('#tgllahir').val();
	      var mm = $('#blnlahir').val();
	      var yyyy = $('#thnlahir').val();
	      var birthofdate = yyyy + "-" + mm + "-" + dd;
	      //var birthofdate = $('#dtp_input2').val();
	      var userphone = $('#user-phone').val();
	      var useremail = $('#user-email').val();
	      var userpw = $('#user-pw').val();
	      var userpw2 = $('#user-pw-repeat').val();
	      var usermac = $('#usermac').val();
	      var usertype = $('#usertype').val();
		  
		  

	      if(first_name == "" || last_name == "" || gender == "" || birthofdate == "" || userphone == "" || useremail == "" || userpw == "") {
	          swal('Failed!', "All data must be filled!", 'error');
	          return;
	      }

	      if(userpw != userpw2) {
	          swal('Failed!', "Password and Confirm Password did not match!", 'error');
	          return;

	      }

	      $.ajax({
	        type: 'post',
	        async: true,
	        url: '<?= base_url("user") ?>/doRegistration',
	        crossDomain: true,
	        data: {
	          'first_name': first_name, 
	          'middle_name': middle_name,
	          'last_name': last_name,
	          'gender': gender,
	          'birthofdate': birthofdate, 
	          'userphone': userphone,
	          'useremail': useremail,
	          'userpw': userpw,
	          'ontid': ontid,
	          'usermac': usermac,
	          'usertype': usertype,
	        },
	        beforeSend: function() {
	          $('.sumbit').html('Loading...');   
	          $(".sumbit").attr("disabled", true); 
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
	          $('.sumbit').html('Create Account');   
	          $(".sumbit").attr("disabled", false); 
	        }
	      });
	    }

	    function successRegistration(msg) {
		    $('#pagelogin').show();
		    $('#pageregistration').hide();

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

