<?php $this->load->view('admin/header'); ?>

<!-- Start: Content -->
<section id="content">
    <div id="topbar" class="affix">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('admin'); ?>"><span class="glyphicon glyphicon-home"></span></a></li>
            <li class="active">合作伙伴</li>
        </ol>
    </div>
    <div class="container">

        <div class="row">
            <div class="col-md-10 col-lg-8 center-column">
                <form action="" method="post" class="cmxform">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">编辑合作伙伴</div>
                            <div class="panel-btns pull-right margin-left">
                                <a href="#" onclick="window.history.back();" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicon glyphicon-chevron-left"></span></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <div class="input-group"><span class="input-group-addon">企业名称</span>
                                        <input type="text" name="f_name" value="<?php echo $friend['f_name']; ?>" class="form-control">
                                        <input type="hidden" name="f_id" value="<?php echo $friend['f_id']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group"><span class="input-group-addon">企业地址链接</span>
                                        <input type="text" name="f_url" value="<?php echo $friend['f_url']; ?>" class="form-control">
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