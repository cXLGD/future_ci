<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends MY_Controller {

	public function index()
	{
		//获取关键字
		$keyword = $this->input->post('q');

		//用session保存关键字
		$this->session->set_userdata(array('keyword' => $keyword));

		//重定向
		redirect('Search/find');
		
	}

	public function find(){
		// $keyword = $this->session->userdata('keyword');
		$keyword = $this->session->keyword;

		//加载模型
		$this->load->model('Article_model');

		//分页参数
		$offset = $this->uri->segment(3, 0);
		$limit = 2;
		$total = $this->db
					  ->like('title', $keyword)
					  ->or_like('content', $keyword)
					  ->count_all_results('article');
		$url = site_url('Search/find');

		$page = MYpage($url, $total, $limit, 3, 2);
		
		$article = $this->Article_model->like($keyword, $offset, $limit);

		$data = [
			'article' => $article,
			'total' => $total,
			'page' => $page
		];

		$this->load->view('search/search', $data);
	}
}
