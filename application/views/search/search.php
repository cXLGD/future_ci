<?php $this->load->view('header'); ?>

<div class="warp">
  <div class="post-topheader">
    <div class="container">
      <form class="row" action="">
        <div class="col-md-9">
          <input type="text" placeholder="输入关键字搜索" value="" name="q" class="input-lg form-control">
        </div>
        <div class="col-md-2">
          <button class="btn btn-primary btn-lg btn-block" type="submit">搜索</button>
        </div>
      </form>
    </div>
  </div>


  <div class="container mt20">

    <div class="row">
      <div class="col-md-9 main search-result">
        <h3 class="h5 mt0">找到约 <strong><?php echo $total; ?></strong> 条结果</h3>

        <?php foreach($article as $item){ ?>
        <section>
          <h2 class="h4">
            <a target="_blank" href="#"><?php echo $item['title']; ?></a>
            <span class="text-muted"></span>
          </h2>
          <p class="excerpt"><?php echo $item['content']; ?>...</p>
        </section>
        <?php }?>
        
        <div class="text-center">
          <ul class="pagination">
            <!-- <li class="active"><a href="javascript:void(0);">1</a></li>
            <li><a href="/search?q=php&amp;type=activity&amp;page=2">2</a></li>
            <li class="next"><a href="/search?q=php&amp;type=activity&amp;page=2" rel="next">下一页</a></li> -->
            <?php echo $page; ?>
          </ul>
        </div>
      </div>
      <div class="col-md-3 side">

      </div>
    </div>
  </div>

</div>


<?php $this->load->view('footer'); ?>