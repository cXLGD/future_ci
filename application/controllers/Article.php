<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends MY_Controller {

	public function index()
	{
		//查询文章id
		$aid = $this->uri->segment(4);

		//获取文章类型
		$type = $this->uri->segment(3);
		$types = $this->db
					  ->select('cid')
					  ->where('pid', $type)
					  ->get('category')
					  ->result_array();

		$ids = [];
		foreach($types as $item){
			$ids[] = $item['cid'];
		}

		//加载模型
		$this->load->model('Article_model');

		$article = $this->Article_model->detail($aid);

		//上一页
		$prev = $this->Article_model->prev($aid, $ids)['aid'];
		$next = $this->Article_model->next($aid, $ids)['aid'];

		if($prev){
			$prev = $prev;
		}else{
			$prev = '';
		}

		if($next){
			$next = $next;
		}else{
			$next = '';
		}

		// 相关新闻
		$more = $this->db->from('article')
						 ->join('category','article.cid=category.cid')
						 ->select('article.aid,article.title,category.pid')
						 ->limit(3,$aid)
						 ->get()
						 ->result_array();

		$data = [
			'article' => $article,
			'type' => $type,
			'prev' => $prev,
			'next' => $next,
			'more' => $more,
		];
		$this->load->view('article/article', $data);
	}
}
