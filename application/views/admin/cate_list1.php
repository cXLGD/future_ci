<?php $this->load->view('admin/header'); ?>

<!-- Start: Content -->
<section id="content">
  <div id="topbar" class="affix">
    <ol class="breadcrumb">
      <li><a href="<?php echo site_url('admin'); ?>"><span class="glyphicon glyphicon-home"></span></a></li>
      <li class="active">资讯分类管理</li>
    </ol>
  </div>
  <div class="container">

    <div class="row">
      <div class="col-md-12">
        <div class="panel">
          <div class="panel-heading">
            <div class="panel-title">资讯分类列表</div>
            <a href="<?php echo site_url('admin/Cate/add'); ?>" class="btn btn-info btn-gradient pull-right"><span class="glyphicons glyphicon-plus"></span> 添加分类</a>
          </div>
          <form action="" method="post">
            <div class="panel-body">
              <h2 class="panel-body-title">互联网</h2>
              <table class="table table-striped table-bordered table-hover dataTable">
                <tr class="active">
                  <th class="text-center" width="100"><input type="checkbox" value="" id="checkall" class=""> 全选</th>
                  <th>分类名称</th>
                  <th width="200">操作</th>
                </tr>
                <?php foreach ($category as $item) { ?>
                  <tr class="success">
                    <td class="text-center"><input type="checkbox" value="<?php echo $item['cid']; ?>" name="idarr[]" class="cbox"></td>
                    <td><?php echo $item['cname']; ?></td>
                    <td>
                      <div class="btn-group">
                        <a href="<?php echo site_url('admin/Cate/editArt/' . $item['cid']); ?>" class="btn btn-default btn-gradient"><span class="glyphicons glyphicon-pencil"></span></a>
                        <a onclick="return confirm('确定要删除吗？');" href="<?php echo site_url('admin/Cate/delArt/' . $item['cid']); ?>" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicons glyphicon-trash"></span></a>
                      </div>
                    </td>
                  </tr>
                <?php } ?>
              </table>

              <div class="pull-left">
                <button type="submit" class="btn btn-default btn-gradient pull-right delall" name="delAll" value="delAll"><span class="glyphicons glyphicon-trash"></span></button>
              </div>

              <div class="pull-right">
                <?php echo $page; ?>
              </div>


            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End: Content -->
</div>
<!-- End: Main -->
</body>

</html>