<?php

class Cities_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        
        $this->load->database();
    }

    //Visszadja a rekordokat:
    public function get_list(){
        $this->db->select('*');
        $this->db->from('cities'); 
        $this->db->order_by('name','ASC'); 
        
        $query = $this->db->get(); 
        $result = $query->result(); 
    
        return $result;
    }

    //Módosítás
    public function update($id, $postalcode, $name){
        $record = [
            'postalCode'  =>  $postalcode, 
            'name'   =>  $name
        ];

        $this->db->where('id',$id);
        return $this->db->update('cities',$record);
    }

    //ID alapú kiválasztás
    public function select_by_id($id){
        $this->db->select("*");
        $this->db->from('cities');
        $this->db->where('id',$id);
        
        return $this->db->get()->row(); 
    }

    //Beszúrás
    public function insert($postalcode,$name){
        $record = [
            'postalCode'  =>  $postalcode, 
            'name'   =>  $name
        ];
        return $this->db->insert('cities',$record);
        return $this->db->insert_id();
    }

    //Törlés
    public function delete($id){
        $this->db->where('id',$id);
        return $this->db->delete('cities');
    }


}