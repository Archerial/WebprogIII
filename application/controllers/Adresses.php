<?php

class adresses extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('adresses_model');
    }

    public function index(){
        $records = $this->adresses_model->get_list(); 
        $view_params = [
            'adresses'  =>  $records
        ];
        $this->load->helper('url');
        $this->load->view('adresses/list', $view_params);
    }

    public function insert(){
        if($this->input->post('submit')){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('postalCode','irszám','required');
            $this->form_validation->set_rules('name','város név','required');
            
            if($this->form_validation->run() == TRUE){
                $this->adresses_model->insert($this->input->post('postalCode'),$this->input->post('name'));
                
                $this->load->helper('url');
                redirect(base_url('adresses'));
            }
        }

        $this->load->helper('form');
        $this->load->view('adresses/insert');
    }

    public function edit($id = NULL){ 
        if($id == NULL){
            show_error('A szerkesztéshez hiányzik az id!');
        }    
        $record = $this->adresses_model->select_by_id($id);
        if($record == NULL){
            show_error('Nem létezik ilyen rekord!');
        }
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('postalCode','irszám','required');
        $this->form_validation->set_rules('name','város név','required');
         
        if($this->form_validation->run() == TRUE){
            $this->adresses_model->update($id, $this->input->post('postalCode'),$this->input->post('name'));
            $this->load->helper('url');
            redirect(base_url('adresses'));
        }
        else{
            $view_params = [
                'cts'    =>  $record
            ];
            $this->load->helper('form');
            $this->load->view('adresses/edit',$view_params);
        }
            
    }

    public function delete($id = NULL){
        if($id == NULL){
            show_error('Hiányzó rekord azonosító!');
        }
        $record = $this->adresses_model->select_by_id($id);
        if($record == NULL){
            show_error('Ilyen azonosítóval nincs rekord!');
        }
        
        $this->adresses_model->delete($id);
        $this->load->helper('url');
        redirect(base_url('adresses'));
    }






}