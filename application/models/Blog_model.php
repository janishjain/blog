<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends CI_Model
{
	public function create($credentials)
	{
		$this->db->insert('registration', $credentials);
	}

	public function login($credentials)
	{
		$sql = "SELECT * FROM people WHERE password = ? AND (username = ? OR email = ?)";
        $query = $this->db->query($sql, $credentials);

		if($query->num_rows() == 1)
		{
			foreach($query->result() as $row)
			{
				$this->db->where('userid',$row->userid)->update('registration', array('status'=>'1'));
				return array(
					$row->fname,
					$row->userid,
					$row->username,
					$row->email,
                    $row->avatar
                );
			}
		}
		else
		{
			return NULL;
		}
	}

	public function logout()
	{
		@$this->db->where('userid',$_SESSION['userid'])->update('registration',array('status'=>'0'));
	}
}
