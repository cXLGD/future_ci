<?php $this->load->view('admin/header'); ?>

<!-- Start: Content -->
<section id="content">
    <div id="topbar" class="affix">
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('admin/index'); ?>"><span class="glyphicon glyphicon-home"></span></a></li>
            <li class="active">修改资讯</li>
        </ol>
    </div>
    <div class="container">

        <div class="row">
            <div class="col-md-10 col-lg-8 center-column">
                <form action="" method="post" class="cmxform" enctype="multipart/form-data">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">添加文章</div>
                            <div class="panel-btns pull-right margin-left">
                                <a href="#" onclick="window.history.back();" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicon glyphicon-chevron-left"></span></a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <div class="input-group"><span class="input-group-addon">分类</span>
                                        <select name="cid" id="standard-list1" class="form-control">
                                            <?php foreach ($cate as $item) { ?>
                                                <optgroup label="<?php echo $item['cname']; ?>">
                                                    <?php if (!empty($item['sub'])) {
                                                        foreach ($item['sub'] as $sub) {
                                                    ?>
                                                            <option value="<?php echo $sub['cid']; ?>"
                                                            <?php if($sub['cid'] == $article['cid']) echo 'selected'; ?>>
                                                                <?php echo $sub['cname']; ?>
                                                            </option>
                                                    <?php }
                                                    } ?>
                                                </optgroup>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group"><span class="input-group-addon">标题</span>
                                        <input type="text" name="title" value="<?php set_value('title'); ?>" class="form-control" placeholder="<?php echo $article['title']; ?>">
                                    </div>
                                    <?php echo form_error('title'); ?>
                                </div>
                                <div class="form-group">
                                    <div class="input-group"><span class="input-group-addon">作者</span>
                                        <input type="text" name="author" value="<?php set_value('author'); ?>" class="form-control" placeholder="<?php echo $article['author']; ?>">
                                    </div>
                                    <?php echo form_error('title'); ?>
                                </div>
                                <div class="form-group">
                                    <div class="input-group"><span class="input-group-addon">是否显示</span>
                                        <input type="radio" name="isshow" id="" value="1">是
                                        <input type="radio" name="isshow" id="" value="2">否
                                    </div>
                                </div>
                                <div class="form-group">
                                    <img src="<?php echo base_url($article['a_img']); ?>" alt="">
                                    <input type="file" name="image" id="">
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="input-group"><span class="input-group-addon">内容</span>
                                    <script type="text/plain" id="myEditor" style="width:100%;height:200px;">
                                        <p><?php echo $article['content']; ?></p>
                                    </script>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <input type="submit" value="提交" class="submit btn btn-blue">
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
<link type="text/css" rel="stylesheet" href="<?php echo base_url('static/admin/umeditor/themes/default/_css/umeditor.css'); ?>">
<script src="<?php echo base_url('static/admin/umeditor/umeditor.config.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('static/admin/umeditor/editor_api.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('static/admin/umeditor/lang/zh-cn/zh-cn.js'); ?>" type="text/javascript"></script>
<script type="text/javascript">
    var ue = UM.getEditor('myEditor', {
        autoClearinitialContent: true,
        wordCount: false,
        elementPathEnabled: false,
        initialFrameHeight: 300
    });
</script>
</body>

</html>