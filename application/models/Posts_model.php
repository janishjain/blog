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

	public function get_username($userid)
	{
		$result = $this->db->select('username')->where('userid', $userid)->get('people')->row_array();

		if (!empty($result))
		{
			return $result['username'];
		}

		return 'unknown';
	}

	public function get_posts_count($keyword = '')
	{
		$following = $this->get_following();
		$following = array_unique(array_merge($following, [$_SESSION['userid']]));

		$this->db->select('COUNT(postid) as count');
		$this->db->where_in('userid', $following);

		if (!empty($keyword))
		{
			$this->db->where("(title LIKE '%$keyword%' OR content LIKE '%$keyword%')");
		}

		$this->db->order_by('add_time', 'DESC');
		$result = $this->db->get('posts')->row_array();
		$count = 0;
		if ($result['count']) $count = $result['count'];

		return $count;
	}

	public function get_all_posts($keyword = '', $limit, $offset)
	{
		$following = $this->get_following();
		$following = array_unique(array_merge($following, [$_SESSION['userid']]));

		$this->db->select('posts.userid, posts.postid, posts.title, posts.content, posts.likes, posts.dislikes, posts.comments, people.username');
		$this->db->where_in('posts.userid', $following);

		if (!empty($keyword))
		{
			$this->db->where("(posts.title LIKE '%$keyword%' OR posts.content LIKE '%$keyword%')");
		}

		$this->db->join('people', 'posts.userid = people.userid', 'left');
		$this->db->order_by('posts.add_time', 'DESC');
		$this->db->limit($limit, $offset);
		return $this->db->get('posts')->result_array();
	}

	public function get_following()
	{
		$following = [];
		$result = $this->db->select('user1')
				->where('user2', $_SESSION['userid'])
				->get('friends')
				->result_array();

		if (!empty($result))
		{
			foreach ($result as $res)
			{
				$following[] = $res['user1'];
			}
		}

		return $following;
	}

	public function get_followers()
	{
		$followers = [];
		$result = $this->db->select('user2')
				->where('user1', $_SESSION['userid'])
				->get('friends')
				->result_array();

		if (!empty($result))
		{
			foreach ($result as $res)
			{
				$followers[] = $res['user2'];
			}
		}

		return $followers;
	}

	public function get_post($pid)
	{
		return $this->db->select('postid, userid, title, content, likes, dislikes, comments')
				->where('postid', $pid)
				->get('posts')
				->row_array();
	}

	public function get_comments($pid)
	{
		return $this->db->select("comments.comment, people.username AS name, comments.add_time")
				->where('postid', $pid)
				->join('people', 'comments.comment_by = people.userid', 'left')
				->get('comments')
				->result_array();
	}

	public function add_comment($pid, $comment, $by)
	{
		$data = array(
			'postid' => $pid,
			'comment' => $comment,
			'comment_by' => $by
		);

		$this->db->insert('comments', $data);

		if ($this->db->affected_rows() > 0)
		{
			$this->db->set('comments', 'comments+1', FALSE);
			$this->db->where('postid', $pid);
			$this->db->update('posts');
			return true;
		}

		return false;
	}

	public function add_like($pid, $by)
	{
		$is_liked = $this->db->select('id')
							->where(['postid' => $pid, 'like_by' => $by])
							->get('likes')->row_array();

		if (empty($is_liked))
		{
			$data = array(
				'postid' => $pid,
				'like_by' => $by
			);
	
			$this->db->insert('likes', $data);
	
			if ($this->db->affected_rows() > 0)
			{
				$this->db->set('likes', 'likes+1', FALSE);
				$this->db->where('postid', $pid);
				$this->db->update('posts');
	
			}
		}
		elseif(!empty($is_liked))
		{
			$this->db->where(['postid' => $pid, 'like_by' => $by])->delete('likes');
			$this->db->set('likes', 'likes-1', FALSE);
			$this->db->where('postid', $pid);
			$this->db->update('posts');
		}
		
		return $this->db->select('likes')->where('postid', $pid)->get('posts')->row_array();
	}

	public function add_dislike($pid, $by)
	{
		$is_disliked = $this->db->select('id')
								->where(['postid' => $pid, 'dislike_by' => $by])
								->get('dislikes')->row_array();

		if (empty($is_disliked))
		{
			$data = array(
				'postid' => $pid,
				'like_by' => $by
			);
	
			$this->db->insert('dislikes', $data);
	
			if ($this->db->affected_rows() > 0)
			{
				$this->db->set('dislikes', 'dislikes+1', FALSE);
				$this->db->where('postid', $pid);
				$this->db->update('posts');
			}
		}
		elseif(!empty($is_disliked))
		{
			$this->db->where(['postid' => $pid, 'dislike_by' => $by])->delete('dislikes');
			$this->db->set('dislikes', 'dislikes-1', FALSE);
			$this->db->where('postid', $pid);
			$this->db->update('posts');
		}
		
		return $this->db->select('dislikes')->where('postid', $pid)->get('posts')->row_array();
	}

	public function edit($pid, $title, $content)
	{
		$this->db->set('title', $title);
		$this->db->set('content', $content);
		$this->db->where('postid', $pid);
		$this->db->update('posts');

		if ($this->db->affected_rows() > 0)
		{
			return true;
		}

		return false;
	}

	public function delete($pid)
	{
		if (!$_SESSION['is_admin'])
		{
			$this->db->where('userid', $_SESSION['userid']);
		}

		$this->db->where('postid', $pid);
		$this->db->delete('posts');

		if ($this->db->affected_rows() > 0)
		{
			return true;
		}

		return false;
	}
}
