<?php

class Fileread_model extends CI_Model {
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function insert_from_text($email,$username,$passwd){
        $record = [
            'email'  =>  $email, 
            'username'   =>  $username,
            'password'   =>  $passwd
        ];
        
        return $this->db->insert('users',$record);
        return $this->db->insert_id();
    }

}
