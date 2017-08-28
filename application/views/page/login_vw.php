<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Wifi Balifiber</title>  
  <meta http-equiv="Access-Control-Allow-Origin" content="*">
  <link rel="stylesheet" href="<?= base_url("assets/userconnect") ?>/css/normalize.min.css">
  <link rel='stylesheet prefetch' href='<?= base_url("assets/userconnect") ?>/css/font-awesome.min.css'>
  <link rel="stylesheet" href="<?= base_url("assets/userconnect") ?>/css/style.css">  
  <link rel="stylesheet" href="<?= base_url("assets/sweetalert2") ?>/sweetalert2.css">  
  <link rel="stylesheet" href="<?= base_url("assets/sweetalert2") ?>/sweetalert2.min.css">  
  <link href="<?= base_url("assets/userconnect") ?>/css/jquery-ui.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <div class="logmod">
    <div class="logmod__wrapper">
      <img src="<?= base_url("assets/userconnect") ?>/balifiber.png" style="width:220px; position: absolute; margin-top: -70px; right: 50%; margin-right: -110px;" />
      <div class="logmod__container">
        <ul class="logmod__tabs">
          <li id="lgm-2" data-tabtar="lgm-2"><a href="#">Login</a></li>
          <li id="lgm-1" data-tabtar="lgm-1"><a href="#">Sign Up</a></li>
        </ul>
        <div class="logmod__tab-wrapper">
          <div class="logmod__tab lgm-1">
            <div class="logmod__heading">
              <span class="logmod__heading-subtitle">Enter your personal details <strong>to create an acount</strong></span>
            </div>
            <div class="logmod__form">
              <form name="register" method="post">
                <div class="sminputs">
                  <div class="input full">
                    <label class="string optional" for="user-name">Name*</label>
                    <input class="string optional" maxlength="255" id="name" name="name" placeholder="Name" type="text" size="50" />
                  </div>
                </div>
                <div class="sminputs">
                  <div class="input string optional">
                    <label class="string optional" for="user-pw">Gender*</label>
                    <select class="string optional" id="gender" name="gender">
                      <option value="">Gender</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                    </select>
                  </div>
                  <div class="input string optional">
                    <label class="string optional" for="user-pw-repeat">Date of Birth*</label>
                    <input class="string optional" maxlength="255" id="birth-of-date" name="birthofdate" placeholder="dd-mm-yyyy" type="text" size="50" />
                  </div>
                </div>
                <div class="sminputs">
                  <div class="input full">
                    <label class="string optional" for="user-name">Email*</label>
                    <input class="string optional" maxlength="255" id="user-email" name="useremail" placeholder="Email" type="email" size="50" />
                  </div>
                </div>
                <div class="sminputs">
                  <div class="input string optional">
                    <label class="string optional" for="user-pw">Password *</label>
                    <input class="string optional" maxlength="255" id="user-pw" name="userpw" placeholder="Password" type="password" size="50" />
                  </div>
                  <div class="input string optional">
                    <label class="string optional" for="user-pw-repeat">Confirm password *</label>
                    <input class="string optional" maxlength="255" id="user-pw-repeat" placeholder="Repeat password" type="password" size="50" />
                  </div>
                </div>
                <div class="simform__actions">
                  <a href="#" class="sumbit" style="text-decoration:none" onclick="doRegistration()">Create Account</a>
                  <span class="simform__actions-sidetext">By creating an account you agree to our <a class="special" href="#" role="link" onclick="termCondition()">Terms & Privacy</a></span>
                </div> 
              </form>
            </div> 
            <!--<div class="logmod__alter">
              <div class="logmod__alter-container">
                <a href="#" class="connect facebook">
                  <div class="connect__icon">
                    <i class="fa fa-facebook"></i>
                  </div>
                  <div class="connect__context">
                    <span>Create an account with <strong>Facebook</strong></span>
                  </div>
                </a>
                  
                <a href="#" class="connect googleplus">
                  <div class="connect__icon">
                    <i class="fa fa-google-plus"></i>
                  </div>
                  <div class="connect__context">
                    <span>Create an account with <strong>Google+</strong></span>
                  </div>
                </a>
              </div>
            </div>-->
          </div>
          <div class="logmod__tab lgm-2">
            <div class="logmod__heading">
              <span class="logmod__heading-subtitle">Enter your email and password <strong>to sign in</strong></span>
            </div> 
            <div class="logmod__form">
              <form name="login" accept-charset="utf-8" class="simform" action="<?php echo $linkloginonly; ?>" method="post" onSubmit="return doLogin()">
                <div class="sminputs">
                  <div class="input full">
                    <label class="string optional" for="user-name">Email*</label>
                    <input class="string optional" maxlength="255" id="user-email" name="username" placeholder="Email" type="email" size="50" />
                  </div>
                </div>
                <div class="sminputs">
                  <div class="input full">
                    <label class="string optional" for="user-pw">Password *</label>
                    <input class="string optional" maxlength="255" id="user-pw" name="password" placeholder="Password" type="password" size="50" />
                    <span class="hide-password">Show</span>
                  </div>
                </div>
                <div class="simform__actions">
                  <input class="sumbit" name="commit" type="submit" value="Log In" />
                </div> 
              </form>
            </div> 
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- $(if chap-id) -->
  <form name="sendin" action="<?php echo $linkloginonly; ?>" method="post">
    <input type="hidden" name="username" id="username" />
    <input type="hidden" name="password" id="password" />
    <input type="hidden" name="dst" value="<?php echo $linkorig; ?>" />
    <input type="hidden" name="popup" value="true" />
  </form>

</body>

<script type="text/javascript"  src='<?= base_url("assets/userconnect") ?>/js/jquery.min.js'></script>
<script src="<?= base_url("assets/userconnect") ?>/js/jquery-ui.min.js"></script>
<script type="text/javascript"  src="<?= base_url("assets/userconnect") ?>/js/index.js"></script>
<script type="text/javascript" src="<?= base_url("assets/userconnect") ?>/js/md5.js"></script>
<script type="text/javascript" src="<?= base_url("assets/sweetalert2") ?>/sweetalert2.js"></script>
<script type="text/javascript" src="<?= base_url("assets/sweetalert2") ?>/sweetalert2.min.js"></script>
<script type="text/javascript">
<!--
    $(document).ready(function() {
      fillByMemory();
    });

    function doLogin() {
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
      var name = $('#name').val();
      var gender = $('#gender').val();
      var birthofdate = $('#birth-of-date').val();
      var useremail = $('#user-email').val();
      var userpw = $('#user-pw').val();
      var userpw2 = $('#user-pw-repeat').val();


      if(name == "" || gender == "" || birthofdate == "" || useremail == "" || userpw == "") {
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
          'name': name, 
          'gender': gender,
          'birthofdate': birthofdate, 
          'useremail': useremail,
          'userpw': userpw,
        },
        beforeSend: function() {
          $('.sumbit').html('Loading...');   
          $(".sumbit").attr("disabled", true); 
        },
        success: function(ret) {
          var data = JSON.parse(ret); 
          if(data['status'] == "1") {
            successRegistration(data['msg']);
            $('.sumbit').html('Create Account');   
            $(".sumbit").attr("disabled", false); 
          } else {
            failedRegistration(data['msg']);
            $('.sumbit').html('Create Account');   
            $(".sumbit").attr("disabled", false); 
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
      $("#lgm-1").removeClass("current");
      $(".lgm-1").removeClass("show");
      $("#lgm-2").addClass("current");
      $(".lgm-2").addClass("show");

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
<!-- $(endif) -->
</html>
