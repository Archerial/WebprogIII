<?php

class Admin_model extends CI_Model {
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

    public function register($adminEmail, $adminName, $adminPassword){
       
        $record = [
            'email'  =>  $adminEmail, 
            'adminname'   =>  $adminName,
            'password'   =>  $adminPassword
        ];
        
        return $this->db->insert('admin',$record);
        
        return $this->db->insert_id();
    }

    public function adminlogin($adminEmail,$adminName,$adminPassword){
        
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('email',$adminEmail);
        $this->db->where('adminname',$adminName);
        $this->db->where('password',$adminPassword);
        $query = $this->db->get()->row();

        if($query != null){
            return true;
        }else{
            return false;
        }

    }

    public function delete($id){
        $this->db->where('id',$id);
        return $this->db->delete('admin');
    }

    




}