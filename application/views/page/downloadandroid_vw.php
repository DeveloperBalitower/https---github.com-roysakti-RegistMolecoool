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
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-101039839-2', 'auto');
	  ga('send', 'pageview');
	</script>
</head>
<body class="bg">

	<div style="clear:both; height:150px"></div>

   	<center><img src="<?= base_url("assets") ?>/molecool.png" style="width:150px;" class="logo_balifiber" /></center>   

	<div style="clear:both; height:50px"></div>

	<center>
		<a href="<?=$linkloginonly?>?dst=<?=$linkorigesc?>&username=T-<?=$macesc?>" 
			onclick="window.open('https://play.google.com/store/apps/details?id=id.co.molecool&hl=en','_blank');window.open(this.href,'_self');">
			<img src="<?= base_url("assets/login/images") ?>/playstore.png" style="width:150px;" class="logo_balifiber" />
		</a>
	</center>

	<script src="<?= base_url("assets/login") ?>/js/jquery-ui.js"></script>
	<script src="<?= base_url("assets/login") ?>/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?= base_url("assets/login") ?>/js/bootstrap-datetimepicker.js"></script>
	<script src="<?= base_url("assets/login") ?>/js/bootstrap-datetimepicker.min.js"></script>
	<script type="text/javascript" src="<?= base_url("assets/userconnect") ?>/js/md5.js"></script>
	<script type="text/javascript" src="<?= base_url("assets/sweetalert2") ?>/sweetalert2.js"></script>
	<script type="text/javascript" src="<?= base_url("assets/sweetalert2") ?>/sweetalert2.min.js"></script>
</body>
</html>

