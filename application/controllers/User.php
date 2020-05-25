<?php

class User extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('products_model');

        $this->load->library('cart');
    }

    public function index(){
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
                $password = $this->input->post('userPassword');
                $this->user_model->register($this->input->post('userEmail'),
                                            $this->input->post('userName'),
                                            password_hash($password,PASSWORD_BCRYPT));
                   
                 $this->load->helper('url');
                 
                 $this->load->library('session');
                 $this->session->set_userdata('email','userEmail');
                 redirect(base_url('products/userlist'));
            } else{
                
            $this->load->helper('form');
            }


        } else{
            $this->load->helper('form');
        }
        $this->load->helper('form');
        $this->load->view('user/register');
    }


    public function login(){
        
        $this->load->helper('url');
        if($this->input->post('submit')){

            $this->load->library('form_validation');
            $this->form_validation->set_rules('userEmail','E-mail cím','trim|required|valid_email');
            $this->form_validation->set_rules('userPassword','Jelszó','trim|required');

            if($this->form_validation->run() == TRUE){
                $this->load->helper('form');
                $userdata = $this->user_model->login($this->input->post('userEmail'));
                if(password_verify($this->input->post('userPassword'),$userdata->password) == TRUE){
                    
                    $this->load->library('session');
                    $this->session->set_userdata('email','userEmail');
                    
                    $this->load->helper('url');
                    redirect(base_url('products/userlist'));
                }else{ 
                    $this->load->helper('form');
                }
            } else{
                $this->load->helper('form');
            }

        } else{
            $this->load->helper('form');
            $this->load->view('user/login');
        }
        
        $this->load->helper('form');
        $this->load->view('user/login');
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

    //Cart

    public function show_cart2(){
        $this->load->helper('form');
        $this->load->view('user/show_cart2');   
    }

    public function show_cart(){
        if($this->input->post('submit')){

            if($this->session->userdata('username')){
                $this->load->helper('form');
                $i = 0;
                foreach ($this->cart->contents() as $item) {

                $qty1 = count($this->input->post('qty'));
                    for ($i = 0; $i < $qty1; $i++) {
                        echo $_POST['qty'][$i];
                        echo $_POST['rowid'][$i];
                        $data = array('rowid' => $_POST[$i.'[rowid]'], 'qty' => $_POST[$i.'qty']);
                        $this->cart->update($data);
                    }

                }
                $this->load->helper('url');
                
                redirect(base_url('user/show_cart'));
            } else{
                $this->load->helper('url');
                $this->load->helper('form');
            }


        } else{
            $this->load->helper('url');
            $this->load->helper('form'); 
        }
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->view('user/show_cart');
    }

    public function destroy_cart(){
        if($this->session->userdata('username')){
            foreach ($this->cart->contents() as $items){
                $this->cart->remove($items['rowid']);
            }
                    $this->load->helper('url');
                    redirect(base_url('products'));
        }else{
            $this->load->helper('url');
            redirect(base_url('products'));
        }
    }

    public function addCart($id){
        $prod = $this->products_model->select_by_id($id);
        $data = array(
            'id'      => $prod->id,
            'qty'     => 1,
            'price'   => $prod->productPrice,
            'name'    => $prod->productName
        );

        $this->cart->insert($data);
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->view('user/show_cart');
    }

    public function removeItem($rowid){
        $this->cart->remove($rowid);
        
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->view('user/show_cart');

    }

    public function makePdf(){
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->view('user/show_cart_to_pdf');

		$html = $this->output->get_output();

		$this->load->library('pdf');

		$this->dompdf->loadHtml($html);

		$this->dompdf->setPaper('A4','portair');

		$this->dompdf->render();

		$this->dompdf->stream('Cart.pdf',array('Attachment'=>0));
    }



}