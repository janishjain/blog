<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model
{
	public function create($credentials)
	{
		$this->db->insert('registration', $credentials);
	}

	public function login($user, $password)
	{
		$result = $this->db->select('*')
				->where('password', $password)
				->where("(username = '$user' OR email = '$user')")
				->get('people')
				->row_array();

		if(!empty($result))
		{
			$this->db->where('userid', $result['userid'])->update('people', array('status'=>'1'));
		}

		return $result;
	}

	public function logout()
	{
		$this->db->where('userid', $_SESSION['userid'])->update('people',array('status'=>'0'));
	}
}
