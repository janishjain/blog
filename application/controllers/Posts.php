<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Posts extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('posts_model', 'posts');
	}

	public function index()
	{
		$pid = $this->uri->segment(3);
		$this->load->view('header');
		$this->load->view('post');
		$this->load->view('footer');
	}

	public function add()
	{
		$title = $this->input->post('title');
		$content = $this->input->post('content');
		$result = $this->posts->add($title, $content);

		if ($result)
		{
			echo json_encode(1);
		}

		echo json_encode(0);
	}
}
