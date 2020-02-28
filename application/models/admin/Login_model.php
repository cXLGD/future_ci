<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function selectOne($username, $password){
        $res = $this->db
                    ->select('a_user, a_pass')
                    ->where('a_user', $username)
                    ->where('a_pass', $password)
                    ->get('admin')
                    ->row_array();

        $res = $res ? $res : '';

        return $res;
    }
}