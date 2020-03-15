<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller{
    public function __construct(){
        parent::__construct();

        //判断登录状态
        if(!$this->session->userdata('user') && !$this->session->userdata('is_login')){
            redirect(site_url('admin/Login'));
        }
    }
    
    public function index(){
        $admin_info['os'] = PHP_OS;
        $admin_info['php_v'] = PHP_VERSION;
        $admin_info['mysql_v'] = $this->db->version();

        $this->load->view('admin/index', $admin_info);
    }
}