<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    function index()
    {

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', '用户名', 'required');
        $this->form_validation->set_rules('password', '密码', 'required');
        $this->form_validation->set_rules('code', '验证码', 'required');

        $username = $this->input->post('username');

        if ($this->form_validation->run() == FALSE) {

            $code = $this->imgCode();

            $data = ['code' => $code];
            
            $this->load->view('admin/login', $data);
        } else {

            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));

            $this->load->model('admin/Login_model');

            $user_res = $this->Login_model->selectOne($username, $password);

            if($user_res){
                $sen_data = [
                    'user' => $username,
                    'is_login' => 1
                ];

                $this->session->set_userdata($sen_data);

                $url = site_url('admin/Home');
                
                echo "<script>alert('登录成功！');window.location.href='{$url}';</script>";
            }else{
                echo "<script>alert('用户名或密码错误！');window.history.go(-1);</script>";
            }
        }
    }

    //退出
    public function logout(){
        $info = array('user', 'is_login');

        $this->session->unset_userdata($info);

        //销毁session
        $this->session->sess_destroy();

        $url = site_url('admin/Login');

        echo "<script>alert('退出成功！');window.location.href='{$url}';</script>";
    }

    //用于ajax判断验证码是否正确（无刷新）
    public function checkCode(){
        $code = $this->session->userdata('code');
        $input_code = $this->input->post('input_code');

        if($code == $input_code){
            echo TRUE;
        }else{
            echo FALSE;
        }
    }

    public function imgCode()
    {
        // 验证码
        $this->load->helper('captcha');

        if(!file_exists('captcha')){
            mkdir('captcha', 0777);
        }

        $vals = array(
            'img_path'  => './captcha/',        
            'img_url'   => base_url('captcha'),
            'font_path' => base_url('static/admin/font/texb.ttf'),
            'expiration'    => 60 * 60,
            'img_width'    => '100',
            'word_length'   => 4,
            'font_size' => 20,
            'img_id'    => 'Imageid',
            'pool'      => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

            // White background and border, black text and red grid
            'colors'    => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
            )
        );

        $cap = create_captcha($vals);

        $code_img = $cap['image'];

        $code_str = strtolower($cap['word']);

        //将验证码字符串存储到session
        $this->session->set_userdata('code', $code_str);

        $is_ajax = $this->input->post('is_ajax');

        if($is_ajax == 1){
            echo $code_img;
            exit;
        }else{
            return $code_img;
        }
    }
}
