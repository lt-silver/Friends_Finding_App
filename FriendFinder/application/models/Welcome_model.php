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
        $this->db->select('hobby_description');
        $this->db->from('hobbies');

        //return results
        $query = $this->db->get();
        return $query->result();
    }
}
