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
		}
		else
		{
			redirect('login');
		}
	}

	//register
	public function signup()
	{
		$data['title'] = 'Register';
		$data['hobbies']=$this->Welcome_model->getHobbies();
		// var_dump($this->session->userdata('logged_in')); //this a true or false statement stating if the user is logged in or not

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
			$this->load->view('header');
			$this->load->view('login', $data);
			$this->load->view('footer');
		} 
		else 
		{
			//get username
			$username = $this->input->post('username');
			//get and enctype password
			$password = $this->input->post('password');

			//login user
			$user_id = $this->Welcome_model->login($username, $password);

			if($user_id != false)
			{
				//create session
				$user_data = array(
					'user_id' => $user_id,
					'username' => $username,
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
				
		redirect('register');
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