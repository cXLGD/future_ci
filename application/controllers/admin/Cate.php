<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cate extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->isLogin();
    }

    // 渲染文章管理页面
    function index()
    {
        $this->load->model('Article_model');
        //所有分类
        $allCate = $this->Article_model->allNav();

        $cate = [];
        foreach ($allCate as $key => $item) {
            if ($item['pid'] == 0) {
                $cate[$key] = $item;
            }

            foreach ($allCate as $val) {
                if ($val['pid'] == $item['cid']) {
                    $cate[$key]['sub'][] = $val;
                }
            }
        }

        $data = [
            'category' => $cate,
        ];
        // pre($cate);die;
        $this->load->view('admin/cate_list', $data);
    }

    function add()
    {
        // 一级导航
    }

    // 删除分类
    function del()
    {
        $cid = $this->uri->segment();
    }

    function doSome()
    {
        $data = $this->input->post();
        // pre($data);die;
        foreach ($data as $key => $val) {
            if (!empty($data[$key]) && $key != 'category') {
                $update['cname'] = $val;
                $update_res = $this->db->where('cname', $key)->update('category', $update);
                if ($update_res) {
                    echo "<script>alert('修改成功！');window.location.href='" . site_url("admin/Cate/index") . "'</script>";
                } else {
                    echo "<script>alert('修改失败！');window.location.href='" . site_url("admin/Cate/index") . "'</script>";
                }
            }
        }

        if (!empty($data['category'])) {
            $insert = [];
            foreach ($data['category'] as $k => $v) {
                $insert['cname'] = $v['cname'];
                $insert['pid'] = $v['pid'];
                $insert_res = $this->db->insert('category', $insert);
                if ($insert_res) {
                    echo "<script>alert('添加成功！');window.location.href='" . site_url("admin/Cate/index") . "'</script>";
                } else {
                    echo "<script>alert('添加失败！');window.location.href='" . site_url("admin/Cate/index") . "'</script>";
                }
            }
        }
    }
}
