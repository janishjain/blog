<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class People extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('people_model', 'people');
	}

	public function index()
	{
		$data['users'] = $this->people->get_all_people();
		$this->load->view('header');
		$this->load->view('people',$data);
		$this->load->view('footer');
	}

	public function addfriend()
	{
		$data=array(
			'user1' => $this->input->post('user1'),
			'user2' => $this->input->post('user2'),
			'friends' => TRUE
		);
		$result = $this->people->add_follower($data);
		echo json_encode($result);
	}
}
