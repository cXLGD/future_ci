<footer id="footer">
    <div class="container">
      <div class="row hidden-xs">
        <dl class="col-sm-2 site-link">
          <dt>关于我们</dt>
          <dd><a href="#">平台简介</a></dd>
          <dd><a href="#">联系方式</a></dd>
        </dl>
        <!-- <dl class="col-sm-2 site-link">
          <dt>帮助中心</dt>
          <dd><a href="#">常见问题</a></dd>
          <dd><a href="#">服务条款</a></dd>
        </dl> -->
        <dl class="col-sm-2 site-link">
          <dt>友情链接</dt>
          <?php foreach($friend as $val){ ?>
          <dd><a href="<?php echo $val['f_url']; ?>"><?php echo $val['f_name']; ?></a></dd>
          <?php } ?>
        </dl>
        <dl class="col-sm-2 site-link">
          <dt>关注我们</dt>
          <dd><a href="#"><img src="<?php echo base_url('static/home/images/qrcode_weixin.png'); ?>" alt="" /></a></dd>
        </dl>

      </div>
      <div class="copyright">
        Copyright &copy; 2015. <a rel="nofollow" href="http://www.miibeian.gov.cn/">粤ICP备15000000号-2</a>
      </div>
    </div>
  </footer>



  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.js"></script>
  <script src="<?php base_url('static/js/bootstrap.min.js'); ?>"></script>
  <script src="<?php base_url('static/js/docs.min.js'); ?>"></script>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>