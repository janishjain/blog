<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('blog_model', 'blog');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function login()
	{
		if(!empty($_COOKIE['userid']))
		{
			$userdata=array(
				'name' => $_COOKIE['name'],
				'userid' => $_COOKIE['userid'],
				'username' => $_COOKIE['username'],
				'email' => $_COOKIE['email'],	
				'avatar' => $_COOKIE['avatar']
			);
			$this->session->set_userdata($userdata);
			redirect('dashboard/');
		}
		else
		{
			$user = $this->input->post('user');
			$password = md5($this->input->post('password'));
			$result = $this->blog->login($user, $password);

			if (!empty($result))
			{
				$name = trim($result['fname'].' '.$result['lname']);
				if(!empty($this->input->post('remember')))
				{
					set_cookie('name', $name, 86400);
					set_cookie('userid', $result['userid'], 86400);
					set_cookie('username', $result['username'], 86400);
					set_cookie('email', $result['email'], 86400);
					set_cookie('avatar', $result['avatar'], 86400);
					$userdata = array(
					    'name' => $name,
					    'userid' => $result['userid'],
					    'username' => $result['username'],
					    'email' => $result['email'],
						'avatar' => $result['avatar']
					);
					$this->session->set_userdata($userdata);
					redirect('dashboard/');
				}
				else
				{
					$userdata = array(
					    'name' => $name,
					    'userid' => $result['userid'],
					    'username' => $result['username'],
					    'email' => $result['email'],
						'avatar' => $result['avatar']
					);
					$this->session->set_userdata($userdata);
					redirect('dashboard/');
				}
			}
			else
			{
				if(!empty($_SESSION['userid']))
				{
					redirect('dashboard/');
				}
				else
				{
					redirect('login/index');
				}
			}
		}
	}

	public function register()
	{
		$this->load->view('register');
	}
}
