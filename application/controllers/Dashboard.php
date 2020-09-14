<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('posts_model', 'posts');
	}

	public function index()
	{
		$keyword = !empty($this->input->post('keyword')) ? $this->input->post('keyword') : '';
		$total_posts = $this->posts->get_posts_count($keyword);
		$page = !empty($this->input->post('page')) ? $this->input->post('page') : 1;
		$limit = 3;
		$offset = ($page - 1) * $limit;
		$data['pagination']['total_pages'] = ceil(($total_posts/$limit));
		$data['pagination']['page'] = $page;
		$data['posts'] = $this->posts->get_all_posts($keyword, $limit, $offset);
		$data['keyword'] = $keyword;
		$this->load->view('header');
		$this->load->view('dashboard', $data);
		$this->load->view('footer');
	}

	public function pagination()
	{
		$keyword = !empty($this->input->post('keyword')) ? $this->input->post('keyword') : '';
		$total_posts = $this->posts->get_posts_count($keyword);
		$page = !empty($this->input->post('page')) ? $this->input->post('page') : 1;
		$limit = 3;
		$offset = ($page - 1) * $limit;
		$data = $this->posts->get_all_posts($keyword, $limit, $offset);
		echo json_encode($data);
	}
}
