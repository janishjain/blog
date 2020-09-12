<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('blog_model', 'blog');
	}

	public function index()
	{
		$this->dashboard();
		// if(!empty($_COOKIE['userid']))//CHECKS IF COOKIE IS SET//
		// {
		// 	$userdata=array(
		// 		'name' => $_COOKIE['name'],
		// 		'userid' => $_COOKIE['userid'],
		// 		'username' => $_COOKIE['username'],
		// 		'email' => $_COOKIE['email'],	
		// 		'avatar' => $_COOKIE['avatar']
		// 	);
		// 	$this->session->set_userdata($userdata);
		// 	$this->dashboard();
		// }
		// else
		// {
		// 	$credentials=array(
		// 		'password' => $this->input->post('password'),
		//         'username' => $this->input->post('user'),
		// 		'email' => $this->input->post('user')
		// 	);

		// 	$result = $this->blog->login($credentials);

		// 	if (!empty($result))
		// 	{
		// 		if(!empty($this->input->post('remember')))//IF USER CHECKS "REMEMBER ME" (FOR COOKIE AND SESSION)//
		// 		{
		// 			set_cookie('name',$result[0],86400);//SETS COOKIE//
		// 			set_cookie('userid',$result[1],86400);
		// 			set_cookie('username',$result[2],86400);
		// 			set_cookie('email',$result[3],86400);
		// 			set_cookie('avatar',$result[4],86400);
		// 			$userdata = array(//SETS SESSION//
		// 			    'name'=>$result[0],
		// 			    'userid'=>$result[1],
		// 			    'username'=>$result[2],
		// 			    'email'=>$result[3],
		// 				'avatar'=>$result[4]
		// 			);
		// 			$this->session->set_userdata($userdata);
		// 			$this->dashboard();
		// 		}
		// 		else//SETS SESSION (NO COOKIE)//
		// 		{
		// 			$userdata = array(
		// 			    'name' => $result[0],
		// 			    'userid' => $result[1],
		// 			    'username' => $result[2],
		// 			    'email' => $result[3],
		// 				'avatar' => $result[4]
		// 			);
		// 			$this->session->set_userdata($userdata);
		// 			$this->dashboard();
		// 		}
		// 	}
		// 	else
		// 	{
		// 		if( !empty($_SESSION['name']))//CHECKS IF SESSION IS SET//
		// 		{
		// 			$this->dashboard();
		// 		}
		// 		else
		// 		{
		// 			redirect('login/index');
		// 		}
		// 	}
		// }
	}

	public function dashboard()
	{
		$this->load->view('header');
		$this->load->view('dashboard');
		$this->load->view('footer');
	}
}
