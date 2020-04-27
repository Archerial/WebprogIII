<?php

class ProfilePicture_upload extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
   
    public function index(){
        if ($this->input->post('submit')){
            
            $upload_config['allowed_types'] = 'jpg|jpeg|png';
            $upload_config['max_size'] = 2355;

            $upload_config['min_width'] = 250; 
            $upload_config['max_width'] = 1000; 
            $upload_config['min_height'] = 250; 
            $upload_config['max_height'] = 1000; 

            //$_FILES['image']['name']
            $upload_config['file_name'] = 'ppicutrsse';
            
            $upload_config['upload_path'] = './uploads/img/employees';
            
            $upload_config['file_ext_tolower'] = TRUE;
            
            $upload_config['overwrite'] = FALSE;
            
        
            $this->load->library('upload'); 

            $this->upload->initialize($upload_config);
            
            if ($this->upload->do_upload('file') == TRUE){
                
                $this->load->helper('url');
                $view_params = [
                    'data' => $this->upload->data()
                ];
                $this->load->view('employees_upload/form',$view_params);
            }else{
               
                $view_params = [
                    'errors' => $this->upload->display_errors()
                ];
                $this->load->helper('form');
               //$this->load->view('employees/insert',$view_params);
                $this->load->view('employees_upload/succes',$view_params);
            }
            
        } else{
            
            $this->load->helper('form'); 
            //$this->load->view('employees/insert',$view_params);
            $this->load->view('employees_upload/form',['errors' => '']);
        }
        
    }
}