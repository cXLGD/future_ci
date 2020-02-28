<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

	public function index()
	{
		//在浏览器地址上查询一级导航的id 默认是1（科技）
		$cid = $this->uri->segment(3, 1);

		//在浏览器地址上查询二级导航的id 默认是0
		$sed_cid = $this->uri->segment(4, 0);

		//查询二级分类
		$sed_nav = $this->db
							->where('pid', $cid)
							->get('category')
							->result_array();

		foreach($sed_nav as $item){
			$sed_cids[] = $item['cid'];
		}

		$offset = $this->uri->segment(5, 0);
		$limit = 4;
		//查询所有文章信息
		if($sed_cid == 0){
			$article = $this->db
							->select('title, a_img, cid, pubtime,aid')
							->where_in('cid', $sed_cids)
							->limit($limit, $offset)
							->get('article')
							->result_array();

			$total = $this->db
						->where_in('cid', $sed_cids)
						->count_all_results('article');
		}else{
			$article = $this->db
							->select('title, a_img, cid, pubtime, aid')
							->where(array('isshow'=>1, 'cid'=>$sed_cid))
							->limit($limit, $offset)
							->get('article')
							->result_array();

			$total = $this->db
						  ->where(array('isshow'=>1, 'cid'=>$sed_cid))
						  ->count_all_results('article');
		}

		$url = site_url('Home/index/').$cid.'/'.$sed_cid;
		$segment = 5;
		$num_links = 2;
		$page = MYpage($url, $total, $limit, $segment, $num_links);

		$data = [
			'list' => $article,
			'nav_sed' => $sed_nav,
			'cid' => $cid,
			'sed_cid' => $sed_cid,
			'page' => $page
		];

		$this->load->view('home/home', $data);
	}
}
