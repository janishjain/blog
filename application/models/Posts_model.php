<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posts_model extends CI_Model
{
	public function add($title, $content)
	{
		$this->db->insert('posts', array(
			'userid' => $_SESSION['userid'],
			'title' => $title,
			'content' => $content,
			'likes' => 0,
			'dislikes' => 0
			)
		);

		if ($this->db->affected_rows() > 0)
		{
			return true;
		}

		return false;
	}

	public function get_all_posts()
	{
		return $this->db->select('title, content, likes, dislikes')
				->where('userid', $_SESSION['userid'])
				->get('posts')
				->result_array();
	}
}
