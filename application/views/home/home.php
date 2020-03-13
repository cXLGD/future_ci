<?php $this->load->view('header'); ?>

<div class="container theme-showcase" role="main">

  <p>
    <a href="<?php echo site_url('Home/index/' . $cid . '/0'); ?>">
      <button class="btn btn-sm btn-default <?php if ($sed_cid == 0) echo 'active'; ?>" type="button">全部</button>
    </a>
    <?php foreach ($nav_sed as $item) { ?>
      <a href="<?php echo site_url('Home/index/' . $cid . '/' . $item['cid']); ?>">
        <button class="btn btn-sm btn-default <?php if ($item['cid'] == $sed_cid) echo 'active'; ?>" type="button">
          <?php echo $item['cname']; ?>
        </button>
      </a>
    <?php } ?>
  </p>

  <div class="row all-event-list mt20">
    <?php foreach ($list as $item) { ?>
      <div class="col-md-3 col-sm-4 col-xs-12">
        <div class="widget-event">
          <a href="<?php echo site_url('Article/index/'.$cid.'/'.$item['aid']); ?>">
            <img class="widget-event__banner lazy" src="<?php echo '/'.$item['a_img']; ?>">
          </a>
          <div class="widget-event__info">
            <h2 class="h4 title"><a href="<?php echo site_url('article'); ?>"><?php echo $item['title']; ?></a></h2>
            <ul class="widget-event__meta">
              <li>时间：<?php echo date('Y-m-d', $item['pubtime']); ?></li>
            </ul>
            <a class="btn btn-default btn-sm" href="<?php echo site_url('Article/index/'.$cid.'/'.$item['aid']); ?>">查看</a>
          </div>
        </div>
      </div>
    <?php } ?>

  </div>

  <div class="text-center">
    <!-- <ul class="pagination"> -->
      <?php //echo $this->pagination->create_links(); ?>
      <?php echo $page; ?>
    <!-- </ul> -->
  </div>


</div>

<?php $this->load->view('footer'); ?>