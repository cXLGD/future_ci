<?php $this->load->view('header'); ?>

<div class="warp">
  <div class="blog-header">
    <div class="container">
      <h1 class="blog-title"><?php echo $article['title']; ?></h1>
      <p class="blog-post-meta"><?php echo date('m-d h:i:s', $article['pubtime']); ?> by <a href="#"><?php echo $article['author']; ?></a></p>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-sm-8 blog-main">
        <div class="blog-post">
          <?php echo htmlspecialchars_decode($article['content']); ?>
        </div><!-- /.blog-post -->



        <nav>
          <ul class="pager">
            <?php if ($prev !== '') { ?>
              <li><a href="<?php echo site_url('Article/index/' . $type . '/' . $prev); ?>">上一篇</a></li>
            <?php } ?>

            <?php if ($next !== '') { ?>
              <li><a href="<?php echo site_url('Article/index/' . $type . '/' . $next); ?>">下一篇</a></li>
            <?php } ?>
          </ul>
        </nav>

      </div><!-- /.blog-main -->

      <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
        <div class="sidebar-module">
          <h4>推荐文章</h4>
          <ol class="list-unstyled">
            <?php foreach($more as $val){ ?>
            <li><a href="<?php echo site_url('Article/index/'.$val['cid'].'/'.$val['aid']); ?>"><?php echo $val['title']; ?></a></li>
            <?php } ?>
          </ol>
        </div>

      </div><!-- /.blog-sidebar -->

    </div><!-- /.row -->

  </div><!-- /.container -->

</div>

<?php $this->load->view('footer'); ?>