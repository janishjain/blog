<?php

class People_model extends CI_Model
{
	public function get_all_people()
	{
		$this->db->select('userid, username, fname, lname, avatar');
		$this->db->from('people');
		$this->db->where('userid !=', $_SESSION['userid']);
		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			foreach($query->result() as $row)
			{
				return $query->result();
			}
		}

		return FALSE;
	}

	public function add_follower($data)
	{
		$this->db->insert('friends', $data);

		if ($this->db->affected_rows() > 0)
		{
			return true;
		}

		return false;
	}

	public function check($user1, $user2)
	{
		$this->db->select('request_id');
		$this->db->from('friends');
		$this->db->where('user1', $user1);
		$this->db->where('user2', $user2);
		$this->db->where('friends', 1);
		$query = $this->db->get();

		if($query->num_rows()==1)
		{
			return TRUE;
		}
	
		return FALSE;
	}
}
