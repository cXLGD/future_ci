<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Friends_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // 添加管理员
    function add($item)
    {
        $user = $this->db->select('f_name')->where('f_name', $item['f_name'])->get('friends')->row();

        if ($user) {
            $arr = array('code' => 1, 'msg' => '该企业已存在！');
            return $arr;
        }

        $res = $this->db->insert('friends', $item);
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
        if ($id) {
            $res = $this->db->where_in('f_id', $id)->delete('friends');
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
