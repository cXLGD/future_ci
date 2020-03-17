<footer id="footer">
  <div class="container">
    <div class="row hidden-xs">
      <dl class="col-sm-2 site-link">
        <dt>关于我们</dt>
        <dd><a href="<?php echo site_url('About/index'); ?>">平台简介</a></dd>
        <dd><a href="<?php echo site_url('About/contact'); ?>">联系方式</a></dd>
      </dl>
      <!-- <dl class="col-sm-2 site-link">
          <dt>帮助中心</dt>
          <dd><a href="#">常见问题</a></dd>
          <dd><a href="#">服务条款</a></dd>
        </dl> -->
      <dl class="col-sm-2 site-link">
        <dt>友情链接</dt>
        <?php foreach ($friend as $val) { ?>
          <dd><a href="<?php echo $val['f_url']; ?>" target="_blank"><?php echo $val['f_name']; ?></a></dd>
        <?php } ?>
      </dl>
      <dl class="col-sm-2 site-link">
        <dt>关注我们</dt>
        <dd><a><img src="<?php echo base_url('static/home/images/1.jpg'); ?>" style="width:100px;height:100px;" alt="" /></a></dd>
      </dl>

    </div>
    <div class="copyright">
      Copyright &copy; 2015. 粤ICP备15000000号-2
    </div>
  </div>
</footer>



<!-- Bootstrap core JavaScript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.js"></script>
<script src="<?php base_url('static/home/js/bootstrap.min.js'); ?>"></script>
<script src="<?php base_url('static/home/js/docs.min.js'); ?>"></script>
<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<!-- <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script> -->
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