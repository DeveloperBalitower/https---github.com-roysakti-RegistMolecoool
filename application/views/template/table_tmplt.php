<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= PAGE_TITLE ?> - <?= COMPANY_NAME ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?= base_url("assets/backend") ?>/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url("assets/backend") ?>/plugins/select2/select2.min.css">
  <link rel="stylesheet" href="<?= base_url("assets/backend") ?>/plugins/custom/font-awesome.min.css">
  <link rel="stylesheet" href="<?= base_url("assets/backend") ?>/plugins/custom/ionicons.min.css">
  <link rel="stylesheet" href="<?= base_url("assets/backend") ?>/dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?= base_url("assets/backend") ?>/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?= base_url("assets/backend") ?>/dist/css/custom.css">
  <link rel="stylesheet" href="<?= base_url("assets/backend") ?>/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?= base_url("assets/backend") ?>/plugins/datatables/extensions/Button/buttons.dataTables.min.css">
  <link rel="stylesheet" href="<?= base_url("assets/backend") ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <script src="<?= base_url("assets/backend") ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>  
  <script type="text/javascript" src="<?=base_url('assets/backend')?>/chart/highcharts.js"></script>
  <script type="text/javascript" src="<?=base_url('assets/backend')?>/chart/exporting.js"></script>
  <script type="text/javascript" src="<?=base_url('assets/backend')?>/chart/highcharts-more.js"></script>
  <script type="text/javascript" src="<?=base_url('assets/backend')?>/chart/solid-gauge.js"></script>
  <link rel="shortcut icon" href="<?= base_url("assets/backend") ?>/dist/img/icon-aksesprima.png"/>
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">  
  
  <?php
    echo $_header;
    echo $_menu;
    echo $_content;
    echo $_footer;
  ?>
  
</div>

<script src="<?= base_url("assets/backend") ?>/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url("assets/backend") ?>/plugins/select2/select2.full.min.js"></script>
<script src="<?= base_url("assets/backend") ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url("assets/backend") ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?= base_url("assets/backend") ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?= base_url("assets/backend") ?>/plugins/fastclick/fastclick.js"></script>
<script src="<?= base_url("assets/backend") ?>/dist/js/app.min.js"></script>
<script src="<?= base_url("assets/backend") ?>/dist/js/demo.js"></script>
<script src="<?= base_url("assets/backend") ?>/dist/js/bootbox.min.js"></script>
<script src="<?= base_url("assets/backend") ?>/dist/js/custom.js"></script>
<script type="text/javascript" src="<?= base_url("assets/backend") ?>/plugins/datatables/extensions/Button/dataTables.buttons.js"></script>
<script type="text/javascript" src="<?= base_url("assets/backend") ?>/plugins/datatables/extensions/Button/buttons.flash.js"></script>
<script type="text/javascript" src="<?= base_url("assets/backend") ?>/plugins/datatables/extensions/Button/jszip.js"></script>
<script type="text/javascript" src="<?= base_url("assets/backend") ?>/plugins/datatables/extensions/Button/pdfmake.js"></script>
<script type="text/javascript" src="<?= base_url("assets/backend") ?>/plugins/datatables/extensions/Button/vfs_fonts.js"></script>
<script type="text/javascript" src="<?= base_url("assets/backend") ?>/plugins/datatables/extensions/Button/buttons.html5.js"></script>
<script type="text/javascript" src="<?= base_url("assets/backend") ?>/plugins/datatables/extensions/Button/buttons.print.js"></script>
<script type="text/javascript" src="<?= base_url("assets/backend") ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script type="text/javascript">
  $(function () {
    $(".select2").select2();
  });
</script>
</body>
</html>
