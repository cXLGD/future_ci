<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <title>CMS内容管理系统</title>
  <meta name="keywords" content="Admin">
  <meta name="description" content="Admin">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Core CSS  -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/admin/css/bootstrap.css'); ?>">

  <!-- Theme CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/admin/css/theme.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/admin/css/pages.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/admin/css/plugins.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/admin/css/responsive.css'); ?>">

  <!-- Boxed-Layout CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/admin/css/boxed.css'); ?>">

  <!-- Demonstration CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/admin/css/demo.css'); ?>">

  <!-- Your Custom CSS -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('static/admin/css/custom.css'); ?>">

</head>

<body class="login-page">

  <!-- Start: Main -->
  <div id="main">
    <div class="container">
      <div class="row">
        <div id="page-logo"></div>
      </div>
      <div class="row">
        <div class="panel">
          <div class="panel-heading">
            <div class="panel-title">CMS内容管理系统</div>
          </div>
          <form action="" class="cmxform" id="altForm" method="post">
            <div class="panel-body">
              <div class="form-group">
                <div class="input-group"> <span class="input-group-addon">用户名</span>
                  <input type="text" name="username" class="form-control phone" value="<?php echo set_value('username'); ?>" maxlength="10" autocomplete="off" placeholder="">
                </div>
                <span style="color:red;"><?php echo form_error('username'); ?></span>
              </div>
              <div class="form-group">
                <div class="input-group"> <span class="input-group-addon">密&nbsp;&nbsp;&nbsp;码</span>
                  <input type="password" name="password" class="form-control product" value="<?php echo set_value('password'); ?>" maxlength="10" autocomplete="off" placeholder="">
                </div>
                <span style="color:red;"><?php echo form_error('password'); ?></span>
              </div>
              <div class="form-group">
                <div class="input-group"> <span class="input-group-addon">验证码</span>
                  <input type="text" name="code" id="input_code" class="form-control product" style="width:150px;" value="<?php echo set_value('code'); ?>" maxlength="10" autocomplete="off" placeholder="">
                  <div id="code" class="pull-right" style="border:1px soild #ccc;"><?php echo $code; ?></div>
                </div>

                <span style="color:red;"><?php echo form_error('code'); ?></span>
              </div>
            </div>
            <div class="panel-footer"> <span class="panel-title-sm pull-left" style="padding-top: 7px;"></span>
              <div class="form-group margin-bottom-none">
                <input class="btn btn-primary pull-right" type="submit" id="sub" name="sub" disabled value="登 录" />
                <div class="clearfix"></div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- End: Main -->

  <!-- Core Javascript - via CDN -->
  <script src="<?php echo base_url('static/admin/js/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('static/admin/js/jquery-ui.min.js'); ?>"></script>
  <script src="<?php echo base_url('static/admin/js/bootstrap.min.js'); ?>"></script> <!-- Theme Javascript -->
  <script type="text/javascript" src="<?php echo base_url('static/admin/js/uniform.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('static/admin/js/main.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('static/admin/js/custom.js'); ?>"></script>
  <script type="text/javascript">
    jQuery(document).ready(function() {

      // Init Theme Core 	  
      // Core.init();

      function code_ajax() {
        var _this = $('#code');
        $.ajax({
          type: 'post',
          url: '<?php echo site_url('admin/Login/imgCode'); ?>',
          data: 'is_ajax=1',
          success: function(data) {
            $(_this).html(data);
          }
        });
      }

      $('#code').click(function() {
        code_ajax();
      });

      $('#input_code').blur(function() {
        var input_code = $(this).val();

        $.ajax({
          type: 'post',
          url: '<?php echo site_url('admin/Login/checkCode'); ?>',
          data: 'input_code=' + input_code,
          success: function(data) {
            if (!data){
              alert('验证码错误!');
              code_ajax();
            }else{
              $('#sub').removeAttr('disabled')
            }
          }
        })
      })

    });
  </script>
</body>

</html>