<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends MY_Controller{
    function __construct(){
        parent::__construct();
        $this->isLogin();

        
        // $data = ['cate' => $cate];

        // $this->load->view('admin/header', $data);
    }

    function index(){
        //一级
        $fir = $this->uri->segment(4);
        //二级
        $sed = $this->uri->segment(5);

        $segment = 6;
        $offset = $this->uri->segment(6);
        $limit = 2;
        $num_links = 1;

        if($sed){
            $url = site_url('admin/Article/index/'.$fir.'/'.$sed.'/');
            $total = $this->db
                        ->where('cid', $sed)
                        ->count_all_results('article');

            $page = MYpage($url, $total, $limit, $segment, $num_links);

            $article = $this->db
                            ->where('cid', $sed)
                            ->limit($limit, $offset)
                            ->get('article')
                            ->result_array();
        }else{
            $segment = 4;
            $offset = $this->uri->segment(4);
            $url = site_url('admin/Article/index/');
            $total = $this->db->count_all_results('article');
            $page = MYpage($url, $total, $limit, $segment, $num_links);
            $article = $this->db
                            ->limit($limit, $offset)
                            ->get('article')
                            ->result_array();
        }

        //批量删除
        $delall = $this->input->post('idarr');
        if($delall){
            $res = $this->db->where_in('aid', $delall)->delete('article');
            if($res){
                echo "<script>alert('删除成功！');window.location.href='".site_url('admin/Article/index')."';</script>";
            }            
        }
        
        $data = [
            'article' => $article,
            'page' => $page,
            
        ];

        $this->load->view('admin/article_list', $data);
    }

    public function add(){
        $this->load->model('Article_model');
        //所有分类
        $allCate = $this->Article_model->allNav();

        $cate = [];
        foreach($allCate as $key => $item){
            if($item['pid'] == 0){
                $cate[$key] = $item;
            }

            foreach($allCate as $val){
                if($val['pid'] == $item['cid'] && $val['pid'] > 0){
                    $cate[$key]['sub'][] = $val;
                }
            }
        }

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', '标题', 'required');
        $this->form_validation->set_rules('title', '作者', 'required');

        if($this->form_validation->run() == TRUE){
            $cid = empty($this->input->post('cid')) ? "" : $this->input->post('cid');
            $title = empty($this->input->post('title')) ? "" : $this->input->post('title');
            $content = empty($this->input->post('editorValue')) ? "" : $this->input->post('editorValue');
            $author = empty($this->input->post('author')) ? "" : $this->input->post('author');
            $isshow = empty($this->input->post('title')) ? "" : $this->input->post('title');
            $a_img = $this->upload();

            $formData = [
                'cid'=>$cid,
					'title'=>$title ,
					'content'=>$content,
					'author'=>$author,
					'isshow'=>$isshow,
					'pubtime'=> time(),
					'a_img'=>$a_img
            ];

            $res = $this->db->insert('article', $formData);

            if($res){
                echo "<script>alert('添加文章成功！');window.location.href='".site_url("admin/Article/index")."'</script>";
            }
        }

        $data= [
            'cate' => $cate
        ];

        $this->load->view('admin/article_add', $data);
    }

    public function upload(){
        $path = 'uploads/article/';
        if(!file_exists($path)){
            mkdir($path, 0777);
        }

        $config['upload_path']      = $path;
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']     = 1024*2;
        // $config['max_width']        = 1024;
        // $config['max_height']       = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('image'))
        {
            $error = array('error' => $this->upload->display_errors());

            echo "<script>alert('文件上传失败---{$error}');</script>";
            exit;
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());

            $uploadPath = $path.$data['upload_data']['file_name'];

            $thumb = $this->thumb($uploadPath);

            return $uploadPath;
        }
    }

    public function thumb($path){
        $thumbPath = 'uploads/article/thumb/';
        if(!file_exists($thumbPath)){
            mkdir($thumbPath, 0777);
        }
       
        $config['image_library'] = 'gd2';
        $config['source_image'] = $path;
        $config['create_thumb'] = TRUE;
        $config['maintain_ratio'] = TRUE;
        $config['new_image'] = $thumbPath;
        $config['width']     = 150;
        $config['height']   = 102;

        $this->load->library('image_lib', $config);//加载图片处理类
        $this->image_lib->resize();
    }

    //删除
    public function delArt(){
        $delId = $this->uri->segment(4);

        $res = $this->db->where('aid', $delId)->delete('article');

        if($res){
            echo "<script>alert('删除成功！');window.location.href='".site_url('admin/Article/index')."';</script>";
        }    
    }

    // 编辑
    public function editArt(){
        $editId = $this->uri->segment(4);

        $article = $this->db
                        ->where('aid', $editId)
                        ->get('article')
                        ->row_array();
        
        $this->load->model('Article_model');
        //所有分类
        $allCate = $this->Article_model->allNav();

        $cate = [];
        foreach($allCate as $key => $item){
            if($item['pid'] == 0){
                $cate[$key] = $item;
            }

            foreach($allCate as $val){
                if($val['pid'] == $item['cid'] && $val['pid'] > 0){
                    $cate[$key]['sub'][] = $val;
                }
            }
        }

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', '标题', 'required');
        $this->form_validation->set_rules('title', '作者', 'required');

        if($this->form_validation->run() == TRUE){
            $cid = empty($this->input->post('cid')) ? "" : $this->input->post('cid');
            $title = empty($this->input->post('title')) ? "" : $this->input->post('title');
            $content = empty($this->input->post('editorValue')) ? "" : $this->input->post('editorValue');
            $author = empty($this->input->post('author')) ? "" : $this->input->post('author');
            $isshow = empty($this->input->post('title')) ? "" : $this->input->post('title');
            $a_img = $this->upload();

            $formData = [
                'cid'=>$cid,
					'title'=>$title,
					'content'=>$content,
					'author'=>$author,
					'isshow'=>$isshow,
					'pubtime'=> time(),
					'a_img'=>$a_img
            ];

            $res = $this->db->where('aid' ,$editId)->update('article', $formData);

            if($res){
                echo "<script>alert('修改文章成功！');window.location.href='".site_url("admin/Article/index")."'</script>";
            }
        }

        $data = [
            'cate' => $cate,
            'article' => $article
        ];

        $this->load->view('admin/article_edit', $data);
    }
}