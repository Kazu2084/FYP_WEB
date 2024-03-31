<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>
    
  </title>
  <!-- <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"> -->
  <!-- Bootstrap 3.3.5 -->
  <!-- <link rel="stylesheet" href="<?php //echo web_root; ?>bootstrap/css/bootstrap.min.css"> -->
  <!-- Font Awesome -->
  <!-- <link rel="stylesheet" href="<?php //echo web_root; ?>plugins/font-awesome/css/font-awesome.min.css"> -->

  <!-- <link rel="stylesheet" href="<?php //echo web_root; ?>plugins/dataTables/dataTables.bootstrap.css">  -->
  <!-- <link rel="stylesheet" href="<?php //echo web_root; ?>plugins/dataTables/jquery.dataTables.min.css">  -->

  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
  <!-- Theme style -->
  <!-- <link rel="stylesheet" href="<?php //echo web_root; ?>dist/css/AdminLTE.min.css"> -->
  <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
  <!-- <link rel="stylesheet" href="<?php //echo web_root; ?>dist/css/skins/_all-skins.min.css"> -->
  <!-- iCheck -->
  <!-- <link rel="stylesheet" href="<?php //echo web_root; ?>plugins/iCheck/flat/blue.css"> -->
  <!-- Morris chart -->
  <!-- <link rel="stylesheet" href="<?php //echo web_root; ?>plugins/morris/morris.css"> -->
  <!-- jvectormap -->
  <!-- <link rel="stylesheet" href="<?php //echo web_root; ?>plugins/jvectormap/jquery-jvectormap-1.2.2.css"> -->
  <!-- Date Picker -->
  <!-- <link href="<?php //echo web_root; ?>plugins/datepicker/bootstrap-datetimepicker.min.css" rel="stylesheet"
    media="screen"> -->

  <!-- <link rel="stylesheet" href="<?php //echo web_root; ?>plugins/dataTables/jquery.dataTables.min.css"> -->

  <!-- <link rel="stylesheet" href="<?php //echo web_root; ?>plugins/datepicker/datepicker3.css"> -->
  <!-- Daterange picker -->
  <!-- <link rel="stylesheet" href="<?php //echo web_root; ?>plugins/daterangepicker/daterangepicker-bs3.css"> -->
  <!-- bootstrap wysihtml5 - text editor -->
  <!-- <link rel="stylesheet" href="<?php //echo web_root; ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css"> -->

</head>
<!-- 
<body class="hold-transition skin-blue fixed sidebar-mini">
  <div class="wrapper">

       -->
    <!-- Content Wrapper. Contains page content -->
    <!-- <div class="content-wrapper"> -->

      <!-- <section class="content-header">
        <h1>
          <?php //echo isset($title) ? $title : ''; ?>
         
        </h1>
        <ol class="breadcrumb">
          <?php

          // if ($title != 'Home') {
         
          //   $active_title = '';
          //   if (isset($_GET['view'])) {
             
          //     $active_title = '<li class=' . $active_title . '><a href="index.php">' . $title . '</a></li>';
          //   } else {
          //     $active_title = '<li class=' . $active_title . '>' . $title . '</li>';
          //   }
          //   echo '<li><a href=' . web_root . 'admin/><i class="fa fa-dashboard"></i> Home</a></li>';
          //   echo $active_title;
          //   echo isset($_GET['view']) ? '<li class="active">' . $_GET['view'] . '</li>' : '';
          // }


          ?>
        </ol>
      </section> -->
      <!-- <section class="content"> -->

        <!-- <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-body"> -->

                <?php
                //check_message();
                require_once $content;
                ?>
              <!-- </div>
            </div>
          </div>
        </div> -->
      <!-- </section>
    </div> -->
    <!-- /.content-wrapper -->

</body>
<!-- <script type="text/javascript" src="<?php //echo web_root; ?>plugins/jQuery/jQuery-2.1.4.min.js"> </script> -->
<!-- <script type="text/javascript" src="<?php //echo web_root; ?>bootstrap/js/bootstrap.min.js"></script> -->
<!-- <script src="<?php //echo web_root; ?>dist/js/app.min.js"></script>

<script type="text/javascript" src="<?php //echo web_root; ?>plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php //echo web_root; ?>plugins/datepicker/bootstrap-datetimepicker.js"
  charset="UTF-8"></script>
<script type="text/javascript" src="<?php //echo web_root; ?>plugins/datepicker/locales/bootstrap-datetimepicker.uk.js"
  charset="UTF-8"></script>

<script type="text/javascript" src="<?php //echo web_root; ?>plugins/dataTables/dataTables.bootstrap.min.js"></script>
<script src="<?php //echo web_root; ?>plugins/datatables/jquery.dataTables.min.js"></script>

<script src="<?php //echo web_root; ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>

<script type="text/javascript" language="javascript"
  src="<?php //echo web_root; ?>plugins/input-mask/jquery.inputmask.js"></script>
<script type="text/javascript" language="javascript"
  src="<?php //echo web_root; ?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script type="text/javascript" language="javascript"
  src="<?php //echo web_root; ?>plugins/input-mask/jquery.inputmask.extensions.js"></script> -->


<script>
  // $(function () {
  //   $("#dash-table").DataTable();
  //   $('#dash-table2').DataTable({
  //     "paging": true,
  //     "lengthChange": false,
  //     "searching": false,
  //     "ordering": true,
  //     "info": true,
  //     "autoWidth": false
  //   });
  // });

  $('input[data-mask]').each(function () {
    var input = $(this);
    input.setMask(input.data('mask'));
  });


  $('#BIRTHDATE').inputmask({
    mask: "2/1/y",
    placeholder: "mm/dd/yyyy",
    alias: "date",
    hourFormat: "24"
  });
  $('#HIREDDATE').inputmask({
    mask: "2/1/y",
    placeholder: "mm/dd/yyyy",
    alias: "date",
    hourFormat: "24"
  });

  $('.date_picker').datetimepicker({
    format: 'mm/dd/yyyy',
    startDate: '01/01/1950',
    language: 'en',
    weekStart: 1,
    todayBtn: 1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0

  });


</script>

</html>