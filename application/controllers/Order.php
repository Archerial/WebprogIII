<?php
class Order extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('usersdata_model');
    }
    
    public function index(){
       $this->load->helper('url'); 
       $this->load->view('order/thanks');
    }
}