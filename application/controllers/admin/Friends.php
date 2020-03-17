<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Friends extends MY_Controller
{
    function index(){
        $segment = 4;  //获取 page 参数
        $offset = $this->uri->segment(4);
        $limit = 2;
        $num_links = 1;
        $segment = 4;
        $offset = $this->uri->segment(4);
        $url = site_url('admin/Friends/index/');
        $total = $this->db->count_all_results('friends');
        $page = MYpage($url, $total, $limit, $segment, $num_links);
        $friend = $this->db
            ->limit($limit, $offset)
            ->get('friends')
            ->result_array();

        $data = [
            'friend' => $friend,
            'page' => $page
        ];


        $this->load->view('admin/friend_list', $data);
    }

    // 添加合作伙伴
    function add()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('f_name', '企业名称', 'required');
        $this->form_validation->set_rules('f_url', '企业地址链接', 'required');

        if ($this->form_validation->run() == TRUE) {
            $name = empty($this->input->post('f_name')) ? "" : $this->input->post('f_name');
            $url = empty($this->input->post('f_url')) ? "" : $this->input->post('f_url');

            $formData = [
                'f_name' => $name,
                'f_url' => $url,
            ];

            // 加载模型
            $this->load->model('admin/Friends_model');
            $res = $this->Friends_model->add($formData);

            if ($res['code'] == 0) {
                echo "<script>alert('{$res['msg']}');window.location.href='" . site_url("admin/Friends/index") . "'</script>";
            } else {
                echo "<script>alert('{$res['msg']}');</script>";
            }
        }

        $this->load->view('admin/friend_add');
    }

    // 编辑
    function edit(){
        $id = $this->uri->segment(4);
        $user_info = $this->db->where('f_id', $id)->get('friends')->row_array();
        $user = ['friend' => $user_info];

        if($data = $this->input->post()){
            // pre($update);die;
            if(!empty($data)){
                $res = $this->db->where('f_id', $data['f_id'])->update('friends', $data);
                if($res){
                    echo "<script>alert('修改成功！');window.location.href='" . site_url("admin/Friends/index") . "'</script>";
                }else{
                    echo "<script>alert('修改失败！');window.location.href='" . site_url("admin/Friends/edit/".$data['f_id']) . "'</script>";
                }
            }
        }

        $this->load->view('admin/friend_edit',$user);
    }

    // 删除
    function delUser(){
        $id = $this->uri->segment(4);
        $this->load->model('admin/Friends_model');
        $res = $this->Friends_model->del($id);
        echo "<script>alert('{$res['msg']}');window.location.href='" . site_url('admin/Friends/index') . "';</script>";
    }
}