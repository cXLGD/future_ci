<?php $this->load->view('admin/header'); ?> 

  <!-- Start: Content -->
  <section id="content">
    <div id="topbar" class="affix">
      <ol class="breadcrumb">
        <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
        <li class="active">系统管理员</li>
      </ol>
    </div>
    <div class="container">

	 <div class="row">
        <div class="col-md-12">
			<div class="panel">
                <div class="panel-heading">
                  <div class="panel-title">系统管理员</div>
                  <a href="<?php echo site_url('admin/User/add'); ?>" class="btn btn-info btn-gradient pull-right"><span class="glyphicons glyphicon-plus"></span> 添加管理员</a>
                </div>
                <form action="" method="post">
                <div class="panel-body">
                  <table class="table table-striped table-bordered table-hover dataTable">
                      <tr class="active">
                        <th class="text-center" width="100"><input type="checkbox" value="" id="checkall" class=""> 全选</th>
                        <th>账号</th>
                        <th>添加时间</th>
                        <th>最后登录IP</th>
                        <th>是否可用(1可用,0不可用)</th>
                        <th width="200">操作</th>
                      </tr>
                      <?php foreach($user as $admin){ ?>
                    	<tr class="success">
                        <td class="text-center"><input type="checkbox" value="<?php echo $admin['a_id']; ?>" name="idarr[]" class="cbox"></td>
                        <td><?php echo $admin['a_user']; ?></td>
                        <td><?php echo date('Y-m-d H:i:s', $admin['a_lastlogin']); ?></td>
                        <td><?php echo $admin['a_lastip']; ?></td>
                        <td><?php echo $admin['a_isshow']; ?></td>
                        <td>
		                      <div class="btn-group">
		                        <a href="user_edit.html" class="btn btn-default btn-gradient"><span class="glyphicons glyphicon-pencil"></span></a>
		                        <a onclick="return confirm('确定要删除吗？');" href="<?php echo site_url('admin/User/add'); ?>" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicons glyphicon-trash"></span></a>
		                      </div>
                        
                        </td>
                      </tr>
                      <?php } ?>
                  </table>
                  
                  <div class="pull-left">
                  	<button type="submit" class="btn btn-default btn-gradient pull-right delall"><span class="glyphicons glyphicon-trash"></span></button>
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