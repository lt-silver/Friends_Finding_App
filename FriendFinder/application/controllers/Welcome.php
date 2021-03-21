<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Welcome_model');
	}
	public function index()
	{
		$data['appName'] = $this->Welcome_model->getName();
		$this->load->view('welcome', $data);
	}
}
