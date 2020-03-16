<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    // 添加管理员
    function add($item){
        $res = $this->db->insert('admin', $item);
        if($res){
            $arr = array('code'=>0, 'msg'=>'添加成功！');
            return $arr;
        }else{
            $arr = array('code'=>1, 'msg'=>'添加失败！');
            return $arr;
        }
    }
}