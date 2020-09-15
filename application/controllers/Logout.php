<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('blog_model', 'blog');
	}

	public function index()
	{
		// $this->blog->logout();
		$userdata = array(
			'name',
			'userid',
			'username',
			'email',
			'avatar'
		);

		$this->blog->logout();
		$this->session->unset_userdata($userdata);
		session_destroy();
		clearstatcache();

		if(null !==@$_COOKIE['userid'])
		{
			delete_cookie('name');
			delete_cookie('userid');
			delete_cookie('username');
			delete_cookie('email');
			delete_cookie('avatar');
		}

		redirect('/');

	}
}
