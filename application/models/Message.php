<?php 

class Message extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function insert_post($post)
	{
		$query = "INSERT INTO messages (created_for, created_by, content, user_id, created_at) VALUES (?,?,?,?, NOW())";
		$values = array($post['created_for'], $post['created_by'], $post['message'], $post['user_id']);
		return $this->db->query($query, $values);
	}

	public function get_messages($id)
	{
		$query = "SELECT * FROM messages WHERE created_for = ? ORDER BY created_at DESC";
		$values = array($id);
		return $this->db->query($query, $values)->result_array();
	}

	public function insert_comment($post)
	{	
		$query = "INSERT INTO comments (created_for, created_by, content, created_at, user_id, message_id) VALUES (?,?,?,?,?,?)";
		$values = array($post['created_for'], $post['created_by'], $post['comment'], date("Y-m-d H:i:s"), $post['user_id'], $post['message_id']);
		return $this->db->query($query, $values);
	}

	public function get_comments($id)
	{
		$query = "SELECT * FROM comments WHERE created_for = ? ORDER BY created_at DESC";
		$values = array($id);
		return $this->db->query($query, $values)->result_array();
	}

	public function get_all_users()
	{
		$query = "SELECT * FROM users";
		return $this->db->query($query)->result_array();
	}
}


 ?>