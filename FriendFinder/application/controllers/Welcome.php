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

		//connect to database
		$this->load->database();
	}

	//Home page
	public function index()
	{	
		//import model for whole page
		$data['appName'] = $this->Welcome_model->getName();

		//Set session for testing
		$_SESSION['logged_in'] = true;
		$_SESSION['first_time_logged_in'] = "y";
		$_SESSION['username'] = "user1";
		var_dump($_SESSION);

		if ($this->session->first_time_logged_in == "n")
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
			$data['hobbies']=$this->Welcome_model->getHobbies();

			$this->load->view('welcome', $data);
			$this->load->view('setupProfile', $data);
		}
	}

}