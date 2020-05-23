<?php

class User extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index(){
        //Kell ide valami!!!!
    }

    public function register(){
        $this->load->helper('url');
        if($this->input->post('submit')){

            $this->load->library('form_validation');
            $this->form_validation->set_rules('userEmail','E-mail cím','trim|required|valid_email');
            $this->form_validation->set_rules('userName','Felhasználónév','required');
            $this->form_validation->set_rules('userPassword','Jelszó','required');

            if($this->form_validation->run() == TRUE){
                $this->load->helper('form');
                
                $this->user_model->register($this->input->post('userEmail'),
                                            $this->input->post('userName'),
                                            $this->input->post('userPassword'));
                   
                 $this->load->helper('url');
                 redirect(base_url('products'));
            } else{

            }


        } else{
            $this->load->helper('form');      
            //$this->load->view('products_upload/form',['errors' => '']);
        }
        $this->load->helper('form');
        $this->load->view('user/register');
    }

    public function login(){
        if($this->input->post('submit')){

            $this->load->library('form_validation');
            $this->form_validation->set_rules('userEmail','E-mail cím','trim|required|valid_email');
            $this->form_validation->set_rules('userPassword','Jelszó','trim|required');

            if($this->form_validation->run() == TRUE){
                $this->load->helper('form');
                
                if($this->user_model->login($this->input->post('userEmail'),
                $this->input->post('userPassword')) == TRUE){
                    
                    $this->load->library('session');
                    $this->session->set_userdata('email','userEmail');
                    
                    $this->load->helper('url');
                    redirect(base_url('products/userlist'));
                }else{
                    echo"Nem jo";
                }
                   
                        
                
            } else{
                echo 'Nem megfelelő adatok';
            }

        } else{
            $this->load->helper('form');
            $this->load->view('user/login');
        }
    }

    public function logout(){
        $this->session->unset_userdata('email');
        $this->session->sess_destroy();
        $this->load->helper('url');
        redirect(base_url('user/login'));
    }

    public function delete($id = NULL){
       
        if($id == NULL){
            show_error('Hiányzó user azonosító!');
        }
       
        $record = $this->user_model->select_by_id($id);
        if($record == NULL){
            show_error('Ilyen azonosítóval nincs user!');
        }
        
        
        $this->user_model->delete($id);
        $this->load->helper('url');
        redirect(base_url('admin/listofusers'));
    }

    public function user_profile($id = NULL){
        if($id== NULL){
            show_error('Hiányzó user azonosító!');
        }

      
        if($id == NULL){
            show_error('Ilyen azonosítóval nincs user!');
        } 
        $this->load->helper('form');

        $record = $this->user_model->select_by_id($id);
            $view_params = [
                'user'  =>  $record
            ];
            $this->load->helper('url');
            $this->load->view('user/user_profile', $view_params);
        
    }


}