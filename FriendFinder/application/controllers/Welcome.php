<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	//contruct for all methods
	public function __construct()
	{
		//import functions used by every other function
		parent::__construct();
		$this->load->library('session');
		$this->load->library('table');
        $this->load->helper('url');
        $this->load->helper('url_helper');
        $this->load->helper('html');
		$this->load->helper('form');
		$this->load->helper('array');	
		$this->load->model('Welcome_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		var_dump($_SESSION);

		//connect to database
		$this->load->database();
	}

	//Home page
	public function index()
	{	
		redirect('login');
	}

	//Home page
	public function hub()
	{	
		//import model for whole page
		$data['appName'] = $this->Welcome_model->getName();
		
		if ($this->session->logged_in == true)
		{
			//import model functions
			$data['seachResult'] = $this->Welcome_model->searchUser();

			//load views
			$this->load->view('welcome', $data);
			$this->load->view('search', $data);
			$this->load->view('hub', $data);
			$this->load->view('logoutButton', $data);

			//Get all users
			$data = $this->Welcome_model->getUserData();

			//loop for each user
			foreach ($data as $user)
			{
				//if username is selected
				if(null !==($this->input->post($user['username'])))
				{
					$data['checkUser']=$this->Welcome_model->checkUser($user['username']);
					$data['checkUserHobbies']=$this->Welcome_model->checkUserHobbies($user['username']);
					$this->load->view('viewProfile', $data);
				}
			}

			//Check your profile
			if(null !==($this->input->post('myProfile')))
			{
				$data['checkUser']=$this->Welcome_model->checkUser($this->session->username);
				$data['checkUserHobbies']=$this->Welcome_model->checkUserHobbies($this->session->username);
				$this->load->view('viewProfile', $data);
			}
		}
		else
		{
			redirect('login');
		}
	}

	//Home page
	public function settings()
	{	
		//import model for whole page
		$data['appName'] = $this->Welcome_model->getName();
		$data['checkUser']=$this->Welcome_model->checkUser($this->session->username);
		$data['checkUserHobbies']=$this->Welcome_model->checkUserHobbies($this->session->username);
		$data['hobbies']=$this->Welcome_model->getHobbies();

		//load Views
		$this->load->view('upload_form', array('error' => ' ' ));
		$this->load->view('settings', $data);

		if(null !==($this->input->post('update_user')))
		{
			$this->Welcome_model->updateUserInfo();
			redirect('settings');
		}
	}

	public function do_upload()
	{
			$config['upload_path']          = './images/';
			$config['allowed_types']        = 'png';
			$config['file_name']        = $this->session->username;
			$config['max_size']             = 10000;
			$config['max_width']            = 1024;
			$config['max_height']           = 768;

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('userfile'))
			{
					$error = array('error' => $this->upload->display_errors());

					$this->load->view('upload_form', $error);
			}
			else
			{
					$data = array('upload_data' => $this->upload->data());

					$this->load->view('upload_success', $data);
					$this->load->view('loginButtons');
			}
	}

	//register
	public function signup()
	{
		$data['title'] = 'Register';
		$data['hobbies']=$this->Welcome_model->getHobbies();

		$this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('password_repeat', 'Confirm Password', 'required', 'matches[password]');
		$this->form_validation->set_rules('firstname', 'Firstname', 'required');
		$this->form_validation->set_rules('surname', 'Surname', 'required');
		$this->form_validation->set_rules('phone_number', 'phone_number', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
	
		if($this->form_validation->run() === False)
		{
			$this->load->view('header');
			$this->load->view('signup', $data);
			$this->load->view('footer');
		} 
		else 
		{
			// could use md5 encryption for password
			$enc_password = $this->input->post('password');

			//call register function in user model for submission
			$this->Welcome_model->register($enc_password);
			$this->Welcome_model->setUpProfile($this->input->post('username'));

			redirect('login');
		}
	}

	//user login
	public function login()
	{
		$data['title'] = 'Log In';

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if($this->form_validation->run() === False)
		{
			if ($this->session->logged_in == true)
			{
				$this->load->view('loginButtons');
			}
			$this->load->view('header');
			$this->load->view('login', $data);
			$this->load->view('footer');
		} 
		else 
		{
			//login user
			$user_id = $this->Welcome_model->login();

			if($user_id != false)
			{
				//create session
				$user_data = array(
					'user_id' => $user_id,
					'username' => $this->input->post('username'),
					'logged_in' => true
				);

				$this->session->set_userdata($user_data);
				
				redirect('hub');
			} 
			else
			{
				redirect('login');
			}
		}
	}
	
	//user log out
	public function logout()
	{
		//unset user data
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('username');
				
		redirect('login');
	}

	//check if username already exists
	function check_username_exists($username)
	{
		$this->form_validation->set_message('check_username_exists', 'This Username is already in use, please choose a different username, or log in.');
		if($this->Welcome_model->check_username_exists($username))
		{
			return true;
		} 
		else
		{
			return false;
		}
	}

	//check if email already exists
	function check_email_exists($email)
	{
		$this->form_validation->set_message('check_email_exists', 'This email is already in use, log in, or please use a different email.');
		if($this->Welcome_model->check_email_exists($email)){
			return true;
		} 
		else
		{
			return false;
		}
	}
}