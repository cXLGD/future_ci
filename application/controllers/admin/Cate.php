<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cate extends MY_Controller{
    function __construct(){
        parent::__construct();
        $this->isLogin();
    }

    // 渲染文章管理页面
    function index(){
        $category = $this->db->get('category')->result_array();
        $cate_arr = [];

        foreach($category as $key => $item){
            if($item['pid'] == 0){
                $cate_arr[$key] = $item;
            }

            foreach($category as $val){
                if($val['pid'] == $item['cid']){
                    $cate_arr[$key]['sub'][] = $val;
                }
            }
        }
        
        $data = [
            'cate' => $cate_arr,
        ];

        $this->load->view('admin/cate_list', $data);
    }

    // 删除分类
    function del(){
        $cid = $this->uri->segment();
    }

    function doSome(){
        pre($this->input->post());
    }

}