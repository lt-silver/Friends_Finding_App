<?php
class Welcome_model extends CI_Model {

    //get application name
    function getName()
    {
        //set application name
        $appName = "FriendFinder";
        //return set name
        return $appName;
    }

    function searchUser()
    {
        //get information from search
		$search = $this->input->post('search');

        //costruct query
        $this->db->select('username');
        $this->db->select('firstname');
        $this->db->select('surname');
        $this->db->from('users');
        $this->db->like('firstname',$search);
        $this->db->or_like('surname',$search);

        //return results
        $query = $this->db->get();
        return $query;
    }

    //import user data
    function getUserData() 
    {
        //create a query that returns username and password for every user
        $query = $this->db->query("select `username` from `users`");
        $userData = $query->result_array();

        //return data array that contains username
        return $userData;
    }

    //check user details
    function checkUser($user) 
    {
        //costruct query
        $this->db->select('username');
        $this->db->select('firstname');
        $this->db->select('surname');
        $this->db->select('user_description');
        $this->db->select('gender');
        $this->db->from('users');
        $this->db->where('username', $user);

        //return results
        $query = $this->db->get();
        return $query->result();
    }

    //check user hobbies
    function checkUserHobbies($user) 
    {
        //costruct query
        $this->db->select('username');
        $this->db->select('user_description');
        $this->db->select('hobby_name');
        $this->db->from('users');
        $this->db->join('userHobby', 'users.userID = userHobby.userID', 'inner'); 
        $this->db->join('hobbies', 'userHobby.hobbyID= hobbies.hobbyID', 'inner'); 
        $this->db->where('username', $user);

        //return results
        $query = $this->db->get();
        return $query->result();
    }

    function getHobbies() 
    {
        //costruct query
        $this->db->select('hobby_name');
        $this->db->select('hobbyID');
        $this->db->select('hobby_description');
        $this->db->from('hobbies');

        //return results
        $query = $this->db->get();
        return $query->result();
    }

    public function register($enc_password)
    {   
        $data = array(
            'username' => $this->input->post('username'),
            'password' => $enc_password,
            'firstname' => $this->input->post('firstname'),
            'surname' => $this->input->post('surname'),
            'phone_number' => $this->input->post('phone_number'),
            'email' => $this->input->post('email'),
            'user_description' => $this->input->post('user_description'),
            'gender' => $this->input->post('gender')
        );

        //insert new user
        return $this->db->insert('users', $data);
    }

    function setUpProfile($username)
    {   
        //costruct query
        $this->db->select('userID');
        $this->db->from('users');
        $this->db->where('username', $username);

        //return results
        $query = $this->db->get();
        $id = $query->row();
        $userID = $id->userID;

        for ($i = 1; $i < 4; $i++)
        {
            $hobbies = array(
                'userID' => $id->userID,
                'hobbyID' => $this->input->post('hobby'.$i)
            );

            $this->db->insert('userHobby', $hobbies);
        }
    }

    //log user in
    public function login($username, $password)
    {
        //validate login details
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $result = $this->db->get('users');

        if($result->num_rows() == 1)
        {

            return $result->row(0)->userID;
        } 
        else 
        {
            return false;
        }
    }
        
    //check if username already exists
    public function check_username_exists($username)
    {
        $query = $this->db->get_where('users', array('username' => $username));
        if(empty($query->row_array()))
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }

    //cehck if username already exists
    public function check_email_exists($email)
    {
        $query = $this->db->get_where('users', array('email' => $email));
        if(empty($query->row_array())){
            return true;
        } 
        else
        {
            return false;
        }
    }
}
