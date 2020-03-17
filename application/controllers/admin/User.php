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

        //批量删除
        $delall = $this->input->post('idarr');
        if ($delall) {
            $this->load->model('admin/User_model');
            $res = $this->User_model->del($delall);
            echo "<script>alert('{$res['msg']}');window.location.href='" . site_url('admin/User/index') . "';</script>";
        }

        $data = [
            'user' => $user,
            'page' => $page,
        ];

        $this->load->view('admin/user_list', $data);
    }

    // 编辑
    function edit(){
        $id = $this->uri->segment(4);
        $user_info = $this->db->where('a_id', $id)->get('admin')->row_array();
        $user = ['user' => $user_info];

        if($data = $this->input->post()){
            $update = [];
            foreach($data as $key => $item){
                if(!empty($item)){
                    if($key == 'a_pass'){
                        $update[$key] = md5($item);
                    }else{
                        $update[$key] = $item;
                    }
                }
            }
            // pre($update);die;
            if(!empty($update)){
                $res = $this->db->where('a_id', $update['a_id'])->update('admin', $update);
                if($res){
                    echo "<script>alert('修改成功！');window.location.href='" . site_url("admin/User/index") . "'</script>";
                }else{
                    echo "<script>alert('修改失败！');window.location.href='" . site_url("admin/User/edit/".$update['a_id']) . "'</script>";
                }
            }
        }

        $this->load->view('admin/user_edit',$user);
    }

    // 添加用户
    function add()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user', '用户名', 'required');
        $this->form_validation->set_rules('pwd', '登录密码', 'required');
        $this->form_validation->set_rules('pwdconf', '确认密码', 'required');

        if ($this->form_validation->run() == TRUE) {
            $user = empty($this->input->post('user')) ? "" : $this->input->post('user');
            $pass = empty($this->input->post('pwd')) ? "" : $this->input->post('pwd');
            $compass = empty($this->input->post('pwdconf')) ? "" : $this->input->post('pwdconf');

            if ($pass != $compass) {
                echo "<script>alert('两次密码不一致！');window.location.href='" . site_url("admin/User/add") . "'</script>";
                return;
            }
            $isshow = empty($this->input->post('a_isshow')) ? "" : $this->input->post('a_isshow');

            $formData = [
                'a_user' => $user,
                'a_pass' => md5($pass),
                'a_isshow' => $isshow,
            ];

            // 加载模型
            $this->load->model('admin/User_model');
            $res = $this->User_model->add($formData);

            if ($res['code'] == 0) {
                echo "<script>alert('{$res['msg']}');window.location.href='" . site_url("admin/User/index") . "'</script>";
            } else {
                echo "<script>alert('{$res['msg']}');</script>";
            }
        }

        $this->load->view('admin/user_add');
    }

    // 删除
    function delUser(){
        $id = $this->uri->segment(4);
        $this->load->model('admin/User_model');
        $res = $this->User_model->del($id);
        echo "<script>alert('{$res['msg']}');window.location.href='" . site_url('admin/User/index') . "';</script>";
    }
}
