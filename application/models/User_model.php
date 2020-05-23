<?php

class User_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        
        $this->load->database();
    }

    //Userekről lista, adminnak, még jól jöhet
    public function get_list(){
        $this->db->select('*'); 
        $this->db->from('users'); 
        $this->db->order_by('userName','ASC'); 
        
        $query = $this->db->get(); 
        $result = $query->result(); 
    
        return $result;
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

    public function login($userEmail,$userPassword){
        
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email',$userEmail);
        $this->db->where('password',$userPassword);
        $query = $this->db->get()->row();

        if($query != null){
            return true;
        }else{
            return false;
        }

    }



    public function delete($id){
        $this->db->where('id',$id);
        return $this->db->delete('users');
    }












}    