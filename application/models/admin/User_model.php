<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // 添加管理员
    function add($item)
    {
        $user = $this->db->select('a_user')->where('a_user', $item['a_user'])->get('admin')->row();

        if ($user) {
            $arr = array('code' => 1, 'msg' => '该用户名已存在！');
            return $arr;
        }

        $res = $this->db->insert('admin', $item);
        if ($res) {
            $arr = array('code' => 0, 'msg' => '添加成功！');
            return $arr;
        } else {
            $arr = array('code' => 1, 'msg' => '添加失败！');
            return $arr;
        }
    }

    // 删除管理员
    function del($id)
    {
        $num = $this->db->select('a_id')->get('admin')->result_array();
        if (count($num) < 2) {
            $arr = array('code' => 1, 'msg' => '再删的话，哪有登录账号了！');
            return $arr;
        } else {
            if ($id) {
                $res = $this->db->where_in('a_id', $id)->delete('admin');
                if ($res) {
                    $arr = array('code' => 0, 'msg' => '删除成功！');
                    return $arr;
                } else {
                    $arr = array('code' => 1, 'msg' => '删除失败！');
                    return $arr;
                }
            }
        }
    }
}
