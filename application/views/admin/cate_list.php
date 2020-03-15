<?php $this->load->view('admin/header'); ?>

    <!-- Start: Content -->
    <section id="content">
        <div id="topbar" class="affix">
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url('admin'); ?>"><span class="glyphicon glyphicon-home"></span></a></li>
                <li class="active">文章分类管理</li>
            </ol>
        </div>
        <div class="container cate">

            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <div class="panel-title">文章分类管理</div>
                        </div>
                        <form action="<?php echo site_url('admin/Cate/doSome'); ?>" method="post">
                            <div class="panel-body">

                                <table class="table table-hover js-table-sections">
                                    <thead>
                                    <tr>
                                        <th style="width: 30px;"></th>
                                        <th>分类名称</th>
                                        <th width="200">操作</th>
                                    </tr>
                                    </thead>

                                    <?php foreach($category as $item){ ?>
                                    <tbody class="js-table-sections-header">
                                    <tr>
                                        <td><i class="glyphicon glyphicon-chevron-right"></i></td>
                                        <td>
                                            <input type="text" class="pcat" data-id="<?php echo $item['cid']; ?>" name="<?php echo $item['cname']; ?>" value="<?php echo $item['cname']; ?>"/>
                                            <!-- <input type="hidden" name="<?php //echo $item['cid']; ?>[cid]; ?>]" />
                                            <input type="hidden" name="<?php //echo $item['cid']; ?>[pid]; ?>]" /> -->
                                        </td>
                                        
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" onclick="return delRow(this)" class="btn btn-default btn-gradient btnDelRow"><span
                                                        class="glyphicons glyphicon-trash"></span></button>
                                                <button type="button" onclick="return addRow2(event);" class="btn btn-default btn-gradient"><span
                                                        class="glyphicons glyphicon-plus"></span></button>
                                            </div>

                                        </td>
                                    </tr>
                                    </tbody>
                                    
                                    <tbody>
                                    <?php if(!empty($item['sub']) && is_array($item['sub'])){
                                        foreach($item['sub'] as $val){ ?>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="text"  class="pcat"  data-id="<?php echo $val['cid']; ?>"  name="<?php echo $val['cname']; ?>" value="<?php echo $val['cname']; ?>"/>
                                            <!-- <input type="hidden" name="<?php //echo $val['cid']; ?>[cid]; ?>]" />
                                            <input type="hidden" name="<?php //echo $val['cid']; ?>[pid]; ?>]" /> -->
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button onclick="return delRow(this)" type="button" class="btn btn-default btn-gradient dropdown-toggle">
                                                    <span class="glyphicons glyphicon-trash"></span></button>
                                            </div>

                                        </td>
                                    </tr>
                                        <?php }} ?>
                                    </tbody>
                                    <?php } ?>
                                </table>

                                <div class="pull-left">
                                    <button onclick="addRow(this);" type="button" class="btn btn-default btn-gradient pull-right"><span
                                            class="glyphicons glyphicon-plus"></span></button>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-info btn-gradient">保存</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End: Content -->
</body>
</html>

<script>

    $(function () {
        var $table = $('.js-table-sections');
        var $tableRows = $('.js-table-sections-header > tr', $table);

        $tableRows.click(function (e) {
            var $row = $(this);
            var $tbody = $row.parent('tbody');

            if (!$tbody.hasClass('open')) {
                $('tbody', $table).removeClass('open');
            }

            $tbody.toggleClass('open');
        });
    });

    function getMax(){
        var tmp = $('.pcat');
        var n = 0;
        for(var i=0;i<tmp.length;i++){
            var m = parseInt(tmp.eq(i).attr('data-id'));
            n = n>m?n:m;
        }
        n = n+1;
        return n;
    }

    function addRow(){
        var n = getMax();
        var $html =  '<tbody class="js-table-sections-header">';
        $html += '<tr>';
        $html += '<td><i class="glyphicon glyphicon-chevron-right"></i></td>';
        $html += '<td>';
        $html += '<input type="text" class="pcat" data-id="'+n+'" name="category['+n+'][cname]" value=""/>';
        $html += '<input type="hidden" name="category['+n+'][cid]" value=""/>';
        $html += '<input type="hidden" name="category['+n+'][pid]" value="0"/>';
        $html += '</td>';
        $html += '<td>';
        $html += '<div class="btn-group">';
        $html += '<button onclick="return delRow(this)" type="button" class="btn btn-default btn-gradient"><span class="glyphicons glyphicon-trash"></span></button>';
        $html += '<button onclick="return addRow2(event)" type="button" class="btn btn-default btn-gradient"><span class="glyphicons glyphicon-plus"></span></button>';
        $html += '</div>';
        $html += '</td>';
        $html += '</tr>';
        $html += '</tbody>';
        $html += '<tbody>';
        $html += '</tbody>';

        var $target = $('.js-table-sections');
        $($html).appendTo($target);

        return false;
    }

    function addRow2(event){

        event = event ? event : window.event;

        var obj = event.srcElement ? event.srcElement : event.target;
        var pid = $(obj).parents('td').prev().children('.pcat').attr('data-id');
        var n = getMax();
        var $html = '<tr class="padd">' +
                '<td></td>' +
                '<td><input type="text"  class="pcat" data-id="'+n+'" name="category['+n+'][cname]" value="" />' +
                '<input type="hidden" name="category['+n+'][pid]" value="'+pid+'"/></td>'+
                '<td><div class="btn-group"><button onclick="return delRow(this)" type="button" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicons glyphicon-trash"></span></button></td></div>' +
                '</tr>';

        var $parent = $(obj).parent().parent().parent().parent();
        var $tbody = $parent.next();

        if (!$parent.hasClass('open')) {
            $parent.addClass('open');
        }

        $($html).appendTo($tbody);
        event.stopPropagation();

        return false;
    }

    function delRow(obj){var $row = $(obj).parent().parent().parent();

        var cname = $row.children(1).children('input.pcat').val() 
  
        if (confirm("是否删除？")) {
            $.post("<?php echo site_url('admin/Cate/del'); ?>",{
                cname: $row.children(1).children('input.pcat').val(),
            },function(res){
                if(res == 0){
                    var $row = $(obj).parent().parent().parent();
                    $row.remove();
                }else{
                    alert('删除失败！');
                }
            });
            
        }

        return false;
    }

</script>