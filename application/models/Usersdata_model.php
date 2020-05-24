<?php

class Usersdata_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    //Beszúrás
    public function insert($email,$firstname,$lastname, $city, $postalcode,$streetandnumber,$phonenumber){
        $record = [
            'email' => $email,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'city' => $city,
            'postalCode'  =>  $postalcode,
            'streetandnumber' => $streetandnumber,
            'phonenumber' => $phonenumber
        ];
        return $this->db->insert('usersdatas',$record);
        return $this->db->insert_id();
    }



}