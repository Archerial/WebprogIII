<?php

class Products_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        
        $this->load->database();
    }
    
    public function get_list(){
        $this->db->select('*'); 
        $this->db->from('products'); 
        $this->db->order_by('productName','ASC'); 
        
        $query = $this->db->get(); 
        $result = $query->result(); 
    
        return $result;
    }
    
    public function update($id, $productGroup, $productName, $productDescription,$productPrice,$productPicture){
        $record = [
            'productGroup'  =>  $productGroup, 
            'productName'   =>  $$productName,
            'productDescription'   =>  $productDescription,
            'productPrice' => $productPrice,
            'productPicture' => $productPicture
        ];
      
        $this->db->where('id',$id);
        return $this->db->update('products',$record);
    }
    
    public function select_by_id($id){
       
        $this->db->select("*");
        $this->db->from('products');
        $this->db->where('id',$id); 
        
        return $this->db->get()
                        ->row(); 
    }

  
    
    
    
    
    
    
    public function insert($productGroup, $productName, $productDescription,$productPrice,$productPicture){
       
        $record = [
            'productGroup'  =>  $productGroup, 
            'productName'   =>  $productName,
            'productDescription'   =>  $productDescription,
            'productPrice' => $productPrice,
            'productPicture' => $productPicture
        ];
        
        return $this->db->insert('products',$record);
        
        return $this->db->insert_id();
    }
    
    public function delete($id){
        $this->db->where('id',$id);
        return $this->db->delete('products');
    }
}