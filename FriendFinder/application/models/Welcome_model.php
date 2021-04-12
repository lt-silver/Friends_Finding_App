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
        $hobby = $this->input->post('hobbySearch');

        if(null !==($this->input->post('searchByName')))
        {
            //costruct query
            $this->db->select('username');
            $this->db->select('firstname');
            $this->db->select('surname');
            $this->db->from('users');
            $this->db->like('firstname',$search);
            $this->db->or_like('surname',$search);
            $this->db->or_like('username',$search);

            //return results
            $query = $this->db->get();
            return $query;
        }
        if(null !==($this->input->post('searchByHobby')))
        {
            //costruct query
            $this->db->select('username');
            $this->db->select('firstname');
            $this->db->select('surname');
            $this->db->select('hobbyID');
            
            $this->db->from('users');
            $this->db->join('userHobby', 'users.userID = userHobby.userID', 'inner'); 

            $this->db->like('hobbyID',$hobby);

            //return results
            $query = $this->db->get();
            return $query;

        }
    }

    //import user data
    function getUserData() 
    {
        //create a query that returns username and password for every user
        $query = $this->db->query("select `username`,`password` from `users`");
        $userData = $query->result_array();

        //return data array that contains username and password
        return $userData;
    }

    //check user id
    function checkUserID($user) 
    {
        //costruct query
        $this->db->select('userID');
        $this->db->from('users');
        $this->db->where('username', $user);

        //return results
        $query = $this->db->get();
        $id = $query->row();
        $userID = $id->userID;
        return $userID;
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
        $this->db->select('phone_number');
        $this->db->select('email');
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
        $this->db->select('userHobby.hobbyID');
        $this->db->from('users');
        $this->db->join('userHobby', 'users.userID = userHobby.userID', 'inner'); 
        $this->db->join('hobbies', 'userHobby.hobbyID= hobbies.hobbyID', 'inner'); 
        $this->db->where('username', $user);

        //return results
        $query = $this->db->get();
        return $query->result();
    }

    //check user details
    function checkUserById($id) 
    {
        //costruct query
        $this->db->select('username');
        $this->db->select('firstname');
        $this->db->select('surname');
        $this->db->from('users');
        $this->db->where('userID', $id);

        //return results
        $query = $this->db->get();
        return $query->result();
    }

    //check user posts
    function checkUserPosts() 
    {
          //costruct query
          $this->db->select('userChatID');
          $this->db->select('recieverID');
          $this->db->select('senderID');
          $this->db->select('message');
          $this->db->select('time');
          $this->db->select('date');
          $this->db->select('username');
          $this->db->select('firstname');
          $this->db->select('surname');
          $this->db->from('users');
          $this->db->join('userChat', 'users.userID = userChat.recieverID', 'inner'); 
          $this->db->order_by('userChatID DESC');
          $this->db->like('userChat.recieverID',$this->session->reciever);

          //return results
          $query = $this->db->get();
          return $query->result();
      }

      //delete post
      function deletePost($postID) 
      {
        $this->db->where('userChatID', $postID);
        $this->db->delete('userChat');
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
        //Hash Password
        $userinput = $enc_password;
        $password = password_hash($userinput ,PASSWORD_DEFAULT);

        $data = array(
            'username' => $this->input->post('username'),
            'password' => $password,
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

    function updateUserInfo()
    {
        //get information from questionaire
		$data = array(
			'firstname'=>$this->input->post('firstname'),
			'surname'=>$this->input->post('surname'),
            'gender'=>$this->input->post('gender'),
            'email'=>$this->input->post('email'),
            'phone_number'=>$this->input->post('phone'),
            'user_description'=>$this->input->post('user_description')
		);

        //use session username for database update
        $username = $_SESSION['username'];
        $id = $_SESSION['user_id'];
        $this->db->where('username', $username);
        $this->db->update('users',$data);
        
        //delete old Hobbies
        $this->db->delete('userHobby', array('userID' => $id)); 

        //upload new Hobbies
        for ($i = 1; $i < 4; $i++)
        {
            $hobbies = array(
                'userID' => $id,
                'hobbyID' => $this->input->post('hobby'.$i)
            );

            $this->db->insert('userHobby', $hobbies);
        }

    }

    function sendPost()
    {   
        //Daylight Saving
        if (date('I', time()))
        {
            $time = date('H:i', strtotime(" -1 hours"));
        }
        else
        {
            $time = date('H:i');
        }

        //today date
        $date = date('d-m-y');

        $message = array(
            'senderID' => $this->session->user_id,
            'recieverID' => $this->session->reciever,
            'date' => $date,
            'time' => $time,
            'message' => $this->input->post('message'),
        );

        $this->db->insert('userChat', $message);
    }

    //log user in
    public function login()
    {
        //get user data and loop though every user 
        $userdata = $this->getUserData();

        //get username and password
		$data = array(
			'username'=>$this->input->post('username'),
			'password'=>$this->input->post('password')
		);

        foreach ($userdata as $user)
        {
            if (password_verify($data['password'], $user['password']) && $data['username'] == $user['username'])
            {
                //get User id
                $this->db->select('userID');
                $this->db->from('users');
                $this->db->where('username', $user['username']);
                $query = $this->db->get();
                $user_id = $query->row();

                return $user_id->userID;
            }
        }
        return false;
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
