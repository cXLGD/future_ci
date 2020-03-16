<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{
    // 渲染用户列表页面
    function index()
    {
        $segment = 4;  //获取 page 参数
        $offset = $this->uri->segment(4);
        $limit = 2;
        $num_links = 1;
        $segment = 4;
        $offset = $this->uri->segment(4);
        $url = site_url('admin/User/index/');
        $total = $this->db->count_all_results('admin');
        $page = MYpage($url, $total, $limit, $segment, $num_links);
        $user = $this->db
                        ->limit($limit, $offset)
                        ->get('admin')
                        ->result_array();

        $data = [
            'user' => $user,
            'page' => $page,
        ];

        $this->load->view('admin/user_list', $data);
    }

    // 添加用户
    function add(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('a_user', '用户名', 'required');
        $this->form_validation->set_rules('a_psss', '登录密码', 'required');
        $this->form_validation->set_rules('a_compsss', '确认密码', 'required');

        if($this->form_validation->run() == TRUE){
            // echo "<script>alert('添加用户失败！');</script>";
            $user = empty($this->input->post('a_user')) ? "" : $this->input->post('a_user');
            $pass = empty($this->input->post('a_psss')) ? "" : $this->input->post('a_psss');
            $compass = empty($this->input->post('a_compsss')) ? "" : $this->input->post('a_compsss');

            if($pass != $compass){
                echo "<script>alert('两次密码不一致！');window.location.reload();</script>";
                exit;
            }
            $isshow = empty($this->input->post('a_isshow')) ? "" : $this->input->post('a_isshow');

            $formData = [
                'a_user'=>$user ,
                'a_pass'=>md5($pass),
                'a_isshow'=>$isshow,
            ];

            // 加载模型
            $this->load->model('admin/User_model');
            $res = $this->User_model->add($formData);

            if($res['code'] == 0){
                echo "<script>alert('添加用户成功！');window.location.href='".site_url("admin/User/index")."'</script>";
            }else{
                echo "<script>alert('添加用户失败！');</script>";
            }
        }

        $this->load->view('admin/user_add');
    }
}
