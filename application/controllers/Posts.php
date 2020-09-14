<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Posts extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('posts_model', 'posts');
	}

	public function view()
	{
		$pid = $this->uri->segment(2);
		$post['post'] = $this->posts->get_post($pid);
		$post['comments'] = $this->posts->get_comments($pid);
		$this->load->view('header');
		$this->load->view('post', $post);
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

	public function comment()
	{
		$comment = $this->input->post('comment');
		$pid = $this->input->post('postid');
		$by = $_SESSION['userid'];
		$result = $this->posts->add_comment($pid, $comment, $by);

		if ($result)
		{
			echo json_encode(1);
		}

		echo json_encode(0);
	}

	public function like()
	{
		$pid = $this->input->post('postid');
		$by = $_SESSION['userid'];
		$result = $this->posts->add_like($pid, $by);
		echo json_encode($result);
	}

	public function dislike()
	{
		$pid = $this->input->post('postid');
		$by = $_SESSION['userid'];
		$result = $this->posts->add_dislike($pid, $by);
		echo json_encode($result);
	}
}
