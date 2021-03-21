<?php
    class User_model extends CI_Model{
		public function register($enc_password){   
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $enc_password,
                'firstname' => $this->input->post('firstname'),
                'surname' => $this->input->post('surname'),
                'phone_number' => $this->input->post('phone_number'),
                'email' => $this->input->post('email'),
                'gender' => $this->input->post('gender')
            );

            //insert new user
            return $this->db->insert('users', $data);
        }

        //log user in
        public function login($username, $password){
            //validate login details
            $this->db->where('username', $username);
            $this->db->where('password', $password);

            $result = $this->db->get('users');

            if($result->num_rows() == 1){
                return $result->row(0)->userID;
            } else {
                return false;
            }
        }
			
        //check if username already exists
        public function check_username_exists($username){
            $query = $this->db->get_where('users', array('username' => $username));
            if(empty($query->row_array())){
                return true;
            } else {
                return false;
            }
        }

        //cehck if username already exists
        public function check_email_exists($email){
            $query = $this->db->get_where('users', array('email' => $email));
            if(empty($query->row_array())){
                return true;
            } else {
                return false;
            }
        }
	}