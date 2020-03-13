<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article_model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }

    // 详情页内容
    public function detail($aid){
        return $this->db
                    ->select('*')
                    ->where('aid', $aid)
                    ->get('article')
                    ->row_array();
    }

    //上一页
    public function prev($cur_id, $ids){
        $prev_id = $this->db
                        ->select('aid')
                        ->where_in('cid', $ids)
                        ->where('aid <', $cur_id)
                        ->limit(1)
                        ->order_by('aid DESC')
                        ->get('article')
                        ->row_array();
        
        return $prev_id;
    }

    // 下一页
    public function next($cur_id, $ids){
        $prev_id = $this->db
                        ->select('aid')
                        ->where_in('cid', $ids)
                        ->where('aid >', $cur_id)
                        ->limit(1)
                        ->order_by('aid DESC')
                        ->get('article')
                        ->row_array();
        
        return $prev_id;
    }

    // 模糊查询
    public function like($keyword, $offset, $limit){
        $article = $this->db
                        ->select('*')
                        ->like('title', $keyword)
                        ->or_like('content', $keyword)
                        ->limit($limit, $offset)
                        ->get('article')
                        ->result_array();

        return $article;
    }

    // 查询所有分类
    function allNav(){
        $all_nav = $this->db
                        ->get('category')
                        ->result_array();

        return $all_nav;
    }

    // 查询二级分类
    function sedNav(){
        $sed_nav = $this->db
                        ->select('cid, cname')
                        ->where('pid !=', 0)
                        ->get('category')
                        ->result_array();

        return $sed_nav;
    }
}