<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->header();
    }

    public function header(){
        $this->load->database();

		$query = $this->db->query("SELECT * FROM pre_category WHERE pid = 0");

        $nav = $query->result_array();
        
        //从地址栏获取导航id
        $nav_id = $this->uri->segment(3, 1);

        //文章管理
        $this->load->model('Article_model');
        //所有分类
        $allCate = $this->Article_model->allNav();

        $cate = [];
        foreach($allCate as $key => $item){
            if($item['pid'] == 0){
                $cate[$key] = $item;
            }

            foreach($allCate as $val){
                if($val['pid'] == $item['cid'] && $val['pid'] > 0){
                    $cate[$key]['sub'][] = $val;
                }
            }
        }

        $data = [
            'nav' => $nav,
            'nav_id' => $nav_id,
            'cate' => $cate
        ];

        //vars 只传数据
        $this->load->vars($data);
    }

    public function isLogin(){
        //判断登录状态
        if(!$this->session->userdata('user') && !$this->session->userdata('is_login')){
            redirect(site_url('admin/Login'));
        }
    }
}
