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
                                        <input type="text" name="user" value="<?php set_value('a_user'); ?>" class="form-control">
                                    </div>
                                    <?php echo form_error('a_user'); ?>
                                </div>
                                <div class="form-group">
                                    <div class="input-group"><span class="input-group-addon">登录密码</span>
                                        <input type="password" name="a_pass" value="<?php set_value('a_pass'); ?>" class="form-control">
                                    </div>
                                    <?php echo form_error('a_pass'); ?>
                                </div>
                                <div class="form-group">
                                    <div class="input-group"><span class="input-group-addon">确认密码</span>
                                        <input type="password" name="a_compass" value="<?php set_value('a_compass'); ?>" class="form-control">
                                    </div>
                                    <?php echo form_error('a_compass'); ?>
                                </div>
                                <div class="form-group">
                                    <div class="input-group"><span class="input-group-addon" style="width:100px;height:28px;">是否可使用</span>
                                        <input type="radio" name="a_isshow" id="" value="1">是
                                        <input type="radio" name="a_isshow" id="" value="2">否
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

<script>
    // $().ready(function(){
    //     $('.submit').click(function(){
    //         $.post("<?php //site_url('admin/User/add'); ?>",{
    //             a_user: $('input[name=a_user]').val(),
    //             a_pass: $('input[name=a_pass]').val(),
    //             a_compass: $('input[name=a_compass]').val(),
    //             a_isshow: $('input[name=a_isshow]').val(),
    //         },function(res){
    //             if(res.code == 0){
    //                 alert('添加成功！');
    //             }else{
    //                 alert('添加失败！');
    //                 window.location.reload();
    //             }
    //         })
    //     })
    // });
</script>
</body>

</html>