<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once('main.php');

class Wall extends Main
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User');
		$this->load->model('Message');
	}

	public function wall($id)
	{
		$user_info = $this->User->get_one_user($id);
		$user_messages = $this->Message->get_messages($id);
		$user_comments = $this->Message->get_comments($id);
		$all_users = $this->Message->get_all_users();
		$this->load->view('show_user_id', array('info'=> $user_info, 'messages'=>$user_messages, "comments"=>$user_comments, "users"=>$all_users));
	}

	public function insert_post()
	{
		$post = $this->input->post();
		$this->Message->insert_post($post);
		redirect('main/dashboard');

	}

	public function insert_comment()
	{
		$post = $this->input->post();
		$this->Message->insert_comment($post);
		redirect('/main/dashboard');

	}
}