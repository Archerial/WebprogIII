<?php

class User_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        
        $this->load->database();
    }

   

    public function register($userEmail, $userName, $userPassword){
       
        $record = [
            'email'  =>  $userEmail, 
            'username'   =>  $userName,
            'password'   =>  $userPassword
        ];
        
        return $this->db->insert('users',$record);
        
        return $this->db->insert_id();
    }
    //Lehet nem lesz jó így..!!!
    public function login($userEmail){
        $this->db->select('password');
        $this->db->from('users');
        $this->db->where('email',$userEmail);
        $query = $this->db->get()->row();

        return $query;
    }

    public function delete($id){
        $this->db->where('id',$id);
        return $this->db->delete('users');
    }

    public function select_by_id($id){
        
        $this->db->select("*");
        $this->db->from('users');
        $this->db->where('id',$id); 
        
        return $this->db->get()
                        ->row(); 
    }












}    