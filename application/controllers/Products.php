<?php


class Products extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('products_model');
    }
    
    public function index(){
        
       $records = $this->products_model->get_list(); 
       $view_params = [
           'products'  =>  $records
       ];
       $this->load->helper('url'); 
       $this->load->view('products/list', $view_params);
    }
    
   
    public function insert(){
       
        if($this->input->post('submit')){
            
            $this->load->library('form_validation');
           
            $this->form_validation->set_rules('productGroup','Termékcsoprt','required');
            $this->form_validation->set_rules('productName','Terméknvév','required');
            $this->form_validation->set_rules('productDescription','Termékleírás','required');
            $this->form_validation->set_rules('productPrice','Termékára','required');
            
            $this->form_validation->set_rules('productCode','Termékkód','required');
            
            if($this->form_validation->run() == TRUE){
                if ($this->input->post('submit')){
            
                    $upload_config['allowed_types'] = 'jpg|jpeg|png';
                    $upload_config['max_size'] = 2355;
        
                    $upload_config['min_width'] = 250; 
                    $upload_config['max_width'] = 1000; 
                    $upload_config['min_height'] = 250; 
                    $upload_config['max_height'] = 1000; 

                    $record = $this->products_model->getId();

                    $upload_config['file_name'] = $this->input->post('productCode');
                    
                    $upload_config['upload_path'] = './uploads/img/products/';
                    
                    $upload_config['file_ext_tolower'] = TRUE;
                    
                    $upload_config['overwrite'] = TRUE;
                    
                
                    $this->load->library('upload'); 
        
                    $this->upload->initialize($upload_config);
                    
                    if ($this->upload->do_upload('file') == TRUE){
                        $picture = $upload_config['upload_path'].$upload_config['file_name'];
                        
                        $this->load->helper('url');
                        $view_params = [
                            'data' => $this->upload->data()
                        ];
                        $this->load->view('products_upload/form',$view_params);
                        $this->load->helper('form');
                        //$this->load->view('products/insert',$view_params);
                         $this->load->view('products_upload/succes',$view_params);
                         $this->products_model->insert($this->input->post('productGroup'),
                                                $this->input->post('productName'),
                                                $this->input->post('productDescription'),
                                                $this->input->post('productPrice'),
                                                $picture,
                                                $this->input->post('productCode'));
                   
                 
                         
                      $this->load->helper('url');
                         
                         redirect(base_url('products'));
                    }else{
                       
                        $view_params = [
                            'errors' => $this->upload->display_errors()
                        ];
                       
                    }
                    
                } else{
                    
                    $this->load->helper('form'); 
                    
                    $this->load->view('products_upload/form',['errors' => '']);
                }
                
                
            }
        }
        
        
       
        $this->load->helper('form');
        $this->load->view('products/insert');
        
    }
    
    
    public function edit($id = NULL){  
       
        if($id == NULL){
            show_error('A szerkesztéshez hiányzik az id!');
        }    
        $record = $this->products_model->select_by_id($id);
        if($record == NULL){
            show_error('Nem létezik ilyen rekord!');
        }
        
        $this->load->library('form_validation');
      
        $this->form_validation->set_rules('name','név','required');
        $this->form_validation->set_rules('tin','adóazonosító','required');
        $this->form_validation->set_rules('ssn','TAJ szám','required');
         
        
        if($this->form_validation->run() == TRUE){
            
            $this->products_model->update($id, 
                                           $this->input->post('name'),
                                           $this->input->post('tin'),
                                           $this->input->post('ssn'));
            $this->load->helper('url');
            redirect(base_url('products'));
        }
        else{
           
            $view_params = [
                'prod'    =>  $record
            ];
           

            $this->load->helper('form'); 
            $this->load->view('products/edit',$view_params);
        }
            
    }
    
    public function delete($id = NULL){
       
        if($id == NULL){
            show_error('Hiányzó rekord azonosító!');
        }
       
        $record = $this->products_model->select_by_id($id);
        if($record == NULL){
            show_error('Ilyen azonosítóval nincs rekord!');
        }
        
        
        $this->products_model->delete($id);
        $this->load->helper('url');
        redirect(base_url('products'));
    }

    public function profile($id = NULL){
        if($id== NULL){
            show_error('Hiányzó rekord azonosító!');
        }

      
        if($id == NULL){
            show_error('Ilyen azonosítóval nincs rekord!');
        } 
        $this->load->helper('form');

        $record = $this->products_model->select_by_id($id);
            $view_params = [
                'prod'  =>  $record
            ];
            $this->load->helper('url');
            $this->load->view('products/profile', $view_params);
        
    }
    
    
    
    public function insert2(){
        
        $this->load->library('form_validation'); 
        
        $this->form_validation->set_rules('productGroup','Termékcsoport','required');
        $this->form_validation->set_rules('productName','Terméknév','required');
        
        $this->form_validation->set_rules('productDescription','Leírás','required');
        
        
        
        $this->form_validation->set_rules('productPrice','Leírás','required');
        
        if($this->form_validaiton->run() == TRUE){
            
            echo 'OK';
        }
        
       
        $this->load->helper('form'); 
        $this->load->view('products/insert2');
    }

    public function check_tin($tin, $birth){
        
        
        return true;
    }
    
    
    public function chech_ssn($ssn){
        $this->form_validation->set_message('check_ssn','Az ellenörző összeg nem helyes a {field} mezőben');
        return false;
        
    }

}
