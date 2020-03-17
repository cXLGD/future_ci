<?php $this->load->view('admin/header'); ?>

<!-- Start: Content -->
<section id="content">
    <div id="topbar" class="affix">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('admin'); ?>"><span class="glyphicon glyphicon-home"></span></a></li>
            <li class="active">添加用户</li>
        </ol>
    </div>
    <div class="container">

        <div class="row">
            <div class="col-md-10 col-lg-8 center-column">
                <form action="" method="post" class="cmxform">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">添加用户</div>
                            <div class="panel-btns pull-right margin-left">
                                <a href="#" onclick="window.history.back();" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicon glyphicon-chevron-left"></span></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <div class="input-group"><span class="input-group-addon">用户名</span>
                                        <input type="text" name="a_user" value="" placeholder="<?php echo $user['a_user'] ?>" class="form-control">
                                        <input type="hidden" name="a_id" value="<?php echo $user['a_id'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group"><span class="input-group-addon">登录密码</span>
                                        <input type="password" name="a_pass" value="" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group"><span class="input-group-addon">随机盐</span>
                                        <input type="text" name="a_salf" placeholder="<?php echo $user['a_salf'] ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group"><span class="input-group-addon" style="width:100px;height:28px;">是否可使用</span>
                                        <input type="radio" name="a_isshow" id="" value="1" <?php if($user['a_isshow'] == 1) echo 'checked'; ?>>是
                                        <input type="radio" name="a_isshow" id="" value="0" <?php if($user['a_isshow'] == 0) echo 'checked'; ?>>否
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="submit" value="提交"  class="submit btn btn-blue">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</section>
<!-- End: Content -->
</div>
<!-- End: Main -->
<link rel="stylesheet" href="<?php echo base_url('static/admin/js/jquery.min.js'); ?>">
<link rel="stylesheet" href="<?php echo base_url('static/admin/js/bootstrap.min.js'); ?>">
</body>

</html>