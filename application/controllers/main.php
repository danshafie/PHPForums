<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Main extends CI_Controller {
	

	public function __construct()
	{
		parent::__construct();
		$this->output->enable_profiler();
		$this->load->model('User');
	}
	
	public function index()
	{
		$this->load->view('index');
	}

	public function signin()
	{
		$this->load->view('signin');
	}

	public function register()
	{
		$this->load->view('register');
	}

	public function admin()
	{
		$all['users'] = $this->User->get_all_users();
		$this->load->view('admin', $all);
	}

	public function dashboard()
	{
		$all['users'] = $this->User->get_all_users();
		$this->load->view('dashboard', $all);
	}

	public function admin_edit($id)
	{
		
		$admin['info'] = $this->User->get_one_user($id);
		$this->load->view('adminedit', $admin);
	}

	
	public function edit_user($id)
	{
		
		$post = $this->input->post();
		$this->User->edit_user($post, $id);
		redirect('/main/admin');
	}

	public function remove($id)
	{
		$admin['info'] = $this->User->get_one_user($id);
		$this->load->view('remove', $admin);
	}

	public function delete($id)
	{
		$this->User->delete($id);
		redirect('/main/admin');
	}

	public function new_page()
	{
		$this->load->view('new');
	}

	public function create_user()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
		$this->form_validation->set_rules("first_name", "First Name", "trim|required");
		$this->form_validation->set_rules("last_name", "Last Name", "trim|required");
		$this->form_validation->set_rules("password", "Password", "trim|required");
		$this->form_validation->set_rules("confirmation", "Confirm Password", "trim|required|matches[password]");

		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata("new_user_error", validation_errors());
			redirect('/main/new_page');
		}
		else
		{
			$post = $this->input->post();
			$this->User->create_user($post);
			$this->session->set_flashdata("new_user_create", "Created New User!");
			redirect('main/admin'); 			
		}
	}

	public function edit_password($id)
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("password", "Password", "trim|required");
		$this->form_validation->set_rules("confirm", "Confirm Password", "trim|required|matches[password]");

		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata("update_errors", validation_errors());
			redirect('/main/admin');
		}
		else
		{
			
			$this->session->set_flashdata("update_success", "Password Updated!");

			$post = $this->input->post();
			$this->User->edit_password($post,$id);
			redirect('/main/admin');
		}
	}	

	public function login_user()
	{
		$password = $this->input->post('password');
		$this->load->model('User');
		$post = $this->input->post();
		$info['user'] = $this->User->login_user($post);

		if($info['user'] && $info['user']['password'] == $password)
		{
			$user = array(
					"user_id"=>$info['user']['id'],
					"first_name"=> $info['user']['first_name'],
					"last_name"=> $info['user']['last_name'],
					"email"=>$info['user']['email'],
					"user_level"=>$info['user']['user_level'],
					"logged_in"=> TRUE
				);
			
			$this->session->set_userdata($user);

			if($info['user']['user_level'] == "admin")
			{
				$this->load->model('User');
				$all['users'] = $this->User->get_all_users();
				$this->load->view('admin', $all);
			}
			else
			{
				$all['users'] = $this->User->get_all_users();
				$this->load->view('dashboard', $all );
			}
		}
		else
		{
			$this->session->set_flashdata('login_errors', "Incorrect login, please try again!");
			redirect('/main/signin');
		}

	}

	public function register_user()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
		$this->form_validation->set_rules("first_name", "First Name", "trim|required");
		$this->form_validation->set_rules("last_name", "Last Name", "trim|required");
		$this->form_validation->set_rules("password", "Password", "trim|required");
		$this->form_validation->set_rules("confirm", "Password Confirmation", "trim|required|matches[password]");


		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata("register_errors", validation_errors());
			redirect('/main/register');
		}
		else
		{
			$this->load->model('User');
			$post = $this->input->post();
			$new['user'] = $this->User->register_user($post);

			if($new['user'])
			{
				$this->session->set_flashdata("registration_success", "Success! Please sign in!");
				redirect('/main/register');
			}
			else
			{
				$this->session->set_flashdata("registration_errors", "Sorry, please try again!");
				redirect('/main/register');
			}
		}
	}

	public function edit()
	{
		$this->load->view('edit');
	}

	public function edit_info($id)
	{
		$post = $this->input->post();
		$this->User->update_user($id, $post);
		redirect('/main/dashboard');
	}

	public function edit_user_password($id)
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("password", "Password", "trim|required");
		$this->form_validation->set_rules("confirm", "Confirm Password", "trim|required|matches[password]");

		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata("edit_errors" , validation_errors());
			redirect('/main/edit');
		}
		else
		{
			$post = $this->input->post();
			$this->User->edit_password($post, $id);
			$this->session->set_flashdata("edit_success", "Edit Successful!");
			redirect('/main/dashboard');
			
		}

	}


	public function logoff()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
}
//end of main controller