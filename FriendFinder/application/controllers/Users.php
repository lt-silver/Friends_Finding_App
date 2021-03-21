<?php
    class Users extends CI_Controller{
        //register
        public function register(){
            $data['title'] = 'Register';
            // var_dump($this->session->userdata('logged_in')); //this a true or false statement stating if the user is logged in or not

            $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password_repeat', 'Confirm Password', 'required', 'matches[password]');
            $this->form_validation->set_rules('firstname', 'Firstname', 'required');
            $this->form_validation->set_rules('surname', 'Surname', 'required');
            $this->form_validation->set_rules('phone_number', 'phone_number', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|callback_check_email_exists');
            $this->form_validation->set_rules('gender', 'Gender', 'required');
        
            if($this->form_validation->run() === False){
                $this->load->view('templates/header');
                $this->load->view('users/register', $data);
                $this->load->view('templates/footer');
            } else {
                // could use md5 encryption for password
                $enc_password = md5($this->input->post('password'));


                //call register function in user model for submission
                $this->user_model->register($enc_password);

                redirect('users/login');
            }
        }

        //user login
        public function login(){
            $data['title'] = 'Log In';

            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            
            if($this->form_validation->run() === False){
                $this->load->view('templates/header');
                $this->load->view('users/login', $data);
                $this->load->view('templates/footer');
            } else {
                
                //get username
                $username = $this->input->post('username');
                //get and enctype password
                $password = md5($this->input->post('password'));

                //login user
                $user_id = $this->user_model->login($username, $password);

                if($user_id){

                    //create session
                    $user_data = array(
                        'user_id' => $user_id,
                        'username' => $username,
                        'logged_in' => true
                    );

                    $this->session->set_userdata($user_data);
                    
                    redirect('users/register');

                } else{
                    redirect('users/login');
                }
                
            }
        }
        
        //user log out
        public function logout(){
            //unset user data
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('username');
                    
            redirect('users/register');
        }

        //check if username already exists
        function check_username_exists($username){
            $this->form_validation->set_message('check_username_exists', 'This Username is already in use, please choose a different username, or log in.');
            if($this->user_model->check_username_exists($username)){
                return true;
            } else{
                return false;
            }
        }

        //check if email already exists
        function check_email_exists($email){
            $this->form_validation->set_message('check_email_exists', 'This email is already in use, log in, or please use a different email.');
            if($this->user_model->check_email_exists($email)){
                return true;
            } else{
                return false;
            }
        }
    }