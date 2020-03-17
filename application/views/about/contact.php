<?php $this->load->view('header'); ?>

<div class="warp">
    <div class="blog-header">
        <div class="container">
            <nav class="about-nav">
                <a href="<?php echo site_url('About/index'); ?>" >平台简介</a>
                <a href="<?php echo site_url('About/contact'); ?>" class="active">联系方式</a>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="blog-main">
                <div class="contact">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">姓名</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword3" value="陈旭良" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">手机号码</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPassword3" value="13433159407" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                        <label class="col-sm-2 control-label">我的邮箱</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="" value="844745054@qq.com" disabled>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->

</div>
<?php $this->load->view('footer'); ?>