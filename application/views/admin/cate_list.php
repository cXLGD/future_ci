<?php $this->load->view('admin/header'); ?>

    <!-- Start: Content -->
    <section id="content">
        <div id="topbar" class="affix">
            <ol class="breadcrumb">
                <li><a href="#"><span class="glyphicon glyphicon-home"></span></a></li>
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
                        <form action="#" method="post">
                            <div class="panel-body">

                                <table class="table table-hover js-table-sections">
                                    <thead>
                                    <tr>
                                        <th style="width: 30px;"></th>
                                        <th>分类名称</th>
                                        <th width="200">操作</th>
                                    </tr>
                                    </thead>

                                    <tbody class="js-table-sections-header">
                                    <tr>
                                        <td><i class="glyphicon glyphicon-chevron-right"></i></td>
                                        <td>
                                            <input type="text" class="pcat" data-id="1" name="category[1][cname]" value="科技"/>
                                            <input type="hidden" name="category[1][cid]" value="1"/>
                                            <input type="hidden" name="category[1][pid]" value="0"/>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default btn-gradient btnDelRow"><span
                                                        class="glyphicons glyphicon-trash"></span></button>
                                                <button type="button" onclick="return addRow2(event);" class="btn btn-default btn-gradient"><span
                                                        class="glyphicons glyphicon-plus"></span></button>
                                            </div>

                                        </td>
                                    </tr>
                                    </tbody>
                                    <tbody>

                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="text"  class="pcat"  data-id="2"  name="category[2][cname]" value="互联网"/>
                                            <input type="hidden" name="category[2][cid]" value="2"/>
                                            <input type="hidden" name="category[2][pid]" value="1"/>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button onclick="return delRow(this)" type="button" class="btn btn-default btn-gradient dropdown-toggle">
                                                    <span class="glyphicons glyphicon-trash"></span></button>
                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="text"  class="pcat"  data-id="3"  name="category[3][cname]" value="数码"/>
                                            <input type="hidden" name="category[3][cid]" value="3"/>
                                            <input type="hidden" name="category[3][pid]" value="1"/>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button onclick="return delRow(this)" type="button" class="btn btn-default btn-gradient dropdown-toggle">
                                                    <span class="glyphicons glyphicon-trash"></span></button>
                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="text"  class="pcat"  data-id="4"  name="category[4][cname]" value="IT"/>
                                            <input type="hidden" name="category[4][cid]" value="4"/>
                                            <input type="hidden" name="category[4][pid]" value="1"/>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button onclick="return delRow(this)" type="button" class="btn btn-default btn-gradient dropdown-toggle">
                                                    <span class="glyphicons glyphicon-trash"></span></button>
                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="text"  class="pcat"  data-id="12"  name="category[12][cname]" value="test"/>
                                            <input type="hidden" name="category[12][cid]" value="12"/>
                                            <input type="hidden" name="category[12][pid]" value="1"/>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button onclick="return delRow(this)" type="button" class="btn btn-default btn-gradient dropdown-toggle">
                                                    <span class="glyphicons glyphicon-trash"></span></button>
                                            </div>

                                        </td>
                                    </tr>

                                    </tbody>

                                    <tbody class="js-table-sections-header">
                                    <tr>
                                        <td><i class="glyphicon glyphicon-chevron-right"></i></td>
                                        <td>
                                            <input type="text" class="pcat" data-id="5" name="category[5][cname]" value="文化"/>
                                            <input type="hidden" name="category[5][cid]" value="5"/>
                                            <input type="hidden" name="category[5][pid]" value="0"/>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default btn-gradient btnDelRow"><span
                                                        class="glyphicons glyphicon-trash"></span></button>
                                                <button type="button" onclick="return addRow2(event);" class="btn btn-default btn-gradient"><span
                                                        class="glyphicons glyphicon-plus"></span></button>
                                            </div>

                                        </td>
                                    </tr>
                                    </tbody>
                                    <tbody>

                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="text"  class="pcat"  data-id="6"  name="category[6][cname]" value="阅读"/>
                                            <input type="hidden" name="category[6][cid]" value="6"/>
                                            <input type="hidden" name="category[6][pid]" value="5"/>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button onclick="return delRow(this)" type="button" class="btn btn-default btn-gradient dropdown-toggle">
                                                    <span class="glyphicons glyphicon-trash"></span></button>
                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="text"  class="pcat"  data-id="7"  name="category[7][cname]" value="思考"/>
                                            <input type="hidden" name="category[7][cid]" value="7"/>
                                            <input type="hidden" name="category[7][pid]" value="5"/>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button onclick="return delRow(this)" type="button" class="btn btn-default btn-gradient dropdown-toggle">
                                                    <span class="glyphicons glyphicon-trash"></span></button>
                                            </div>

                                        </td>
                                    </tr>

                                    </tbody>

                                    <tbody class="js-table-sections-header">
                                    <tr>
                                        <td><i class="glyphicon glyphicon-chevron-right"></i></td>
                                        <td>
                                            <input type="text" class="pcat" data-id="8" name="category[8][cname]" value="生活"/>
                                            <input type="hidden" name="category[8][cid]" value="8"/>
                                            <input type="hidden" name="category[8][pid]" value="0"/>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default btn-gradient btnDelRow"><span
                                                        class="glyphicons glyphicon-trash"></span></button>
                                                <button type="button" onclick="return addRow2(event);" class="btn btn-default btn-gradient"><span
                                                        class="glyphicons glyphicon-plus"></span></button>
                                            </div>

                                        </td>
                                    </tr>
                                    </tbody>
                                    <tbody>

                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="text"  class="pcat"  data-id="9"  name="category[9][cname]" value="美食"/>
                                            <input type="hidden" name="category[9][cid]" value="9"/>
                                            <input type="hidden" name="category[9][pid]" value="8"/>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button onclick="return delRow(this)" type="button" class="btn btn-default btn-gradient dropdown-toggle">
                                                    <span class="glyphicons glyphicon-trash"></span></button>
                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="text"  class="pcat"  data-id="10"  name="category[10][cname]" value="家居"/>
                                            <input type="hidden" name="category[10][cid]" value="10"/>
                                            <input type="hidden" name="category[10][pid]" value="8"/>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button onclick="return delRow(this)" type="button" class="btn btn-default btn-gradient dropdown-toggle">
                                                    <span class="glyphicons glyphicon-trash"></span></button>
                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="text"  class="pcat"  data-id="11"  name="category[11][cname]" value="旅游"/>
                                            <input type="hidden" name="category[11][cid]" value="11"/>
                                            <input type="hidden" name="category[11][pid]" value="8"/>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button onclick="return delRow(this)" type="button" class="btn btn-default btn-gradient dropdown-toggle">
                                                    <span class="glyphicons glyphicon-trash"></span></button>
                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="text"  class="pcat"  data-id="13"  name="category[13][cname]" value="ttt"/>
                                            <input type="hidden" name="category[13][cid]" value="13"/>
                                            <input type="hidden" name="category[13][pid]" value="8"/>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button onclick="return delRow(this)" type="button" class="btn btn-default btn-gradient dropdown-toggle">
                                                    <span class="glyphicons glyphicon-trash"></span></button>
                                            </div>

                                        </td>
                                    </tr>

                                    </tbody>

                                </table>

                                <div class="pull-left">
                                    <button onclick="addRow(this);" type="button" class="btn btn-default btn-gradient pull-right"><span
                                            class="glyphicons glyphicon-plus"></span></button>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-info btn-gradient">保存</button>
                                </div>

                            </div>
                            <input type="hidden" name="__hash__" value="d00660f4576a969ab08ecaf8f3e59489_1c70957626bb13ae90a5adcdbb4be0a6" /></form>
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
                '<input type="hidden" name="category['+n+'][cid]" value=""/>'+
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

    function delRow(obj){

        if (confirm("是否删除？")) {
            var $row = $(obj).parent().parent().parent();
            $row.remove();
        }

        return false;
    }

</script>