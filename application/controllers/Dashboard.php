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
		$data['posts'] = $this->posts->get_all_posts();
		$this->load->view('header');
		$this->load->view('dashboard', $data);
		$this->load->view('footer');
	}
}
