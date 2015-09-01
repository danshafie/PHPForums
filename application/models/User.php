<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class User extends CI_Model
{
	public function login_user($post)
	{
		$query = "SELECT * FROM users WHERE email = ? AND password = ?";
		$values = array($post['email'], $post['password']);
		return $this->db->query($query, $values)->row_array();
	}

	public function get_all_users()
	{
		$query = "SELECT * FROM users";
		return $this->db->query($query)->result_array();
	}

	public function register_user($post)
	{
		$query = "INSERT INTO users (email, first_name, last_name, password, user_level, created_at) VALUES (?,?,?,?,?, NOW())";
		$values = array($post['email'], $post['first_name'], $post['last_name'], $post['password'], "normal");
		return $this->db->query($query, $values);

	}

	public function edit_user($post, $id)
	{
		$query = "UPDATE users SET email = ?, first_name = ?, last_name = ?, user_level = ? WHERE id = ?";
		$values = array($post['email'], $post['first_name'], $post['last_name'], $post['user_level'], $id);
		return $this->db->query($query, $values);
	}

	public function get_one_user($id)
	{
		$query = "SELECT * FROM users WHERE id = ?";
		$values = array($id);
		return $this->db->query($query, $values)->row_array();
	}

	public function delete($id)
	{
		$query = "DELETE FROM users WHERE id = ?";
		$values = array($id);
		return $this->db->query($query, $values);
	}

	public function create_user($post)
	{
		$query = "INSERT INTO users (email, first_name, last_name, password, user_level, created_at) VALUES (?,?,?,?,?,NOW())";
		$values = array($post['email'], $post['first_name'], $post['last_name'], $post['password'], 'normal');
		return $this->db->query($query, $values);
	}

	public function edit_password($post, $id)
	{
		$query = "UPDATE users SET password = ? WHERE id = ?";
		$values = array($post['password'], $id);
		return $this->db->query($query, $values);
	} 

	public function edit_info($post, $id)
	{
		$query = "UPDATE users SET email = ?, first_name = ?, last_name = ? WHERE id = ?";
		$values = array($post['email'], $post['first_name'], $post['last_name']);
		return $this->db->query($query, $values);
	}

	public function update_user($id, $post)
	{
		$query = "UPDATE users SET email = ?, first_name = ?, last_name = ? WHERE id = ?";
		$values = array($post['email'], $post['first_name'], $post['last_name'], $id);
		return $this->db->query($query, $values);
	}


}