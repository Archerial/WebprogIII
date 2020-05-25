<?php

class Fileread extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->load->model('fileread_model');

    }

    public function index(){
       $this->load->helper('url'); 
       $this->load->view('admin/filereading');

    }

    
    public function read_from_text(){
        $this->load->helper('url');
        $this->load->helper('form');
        /*$string = readfile(base_url('/uploads/txt/text.txt'));
        echo $string;
        $stringg = "Fred, Bili, Joe";
        $stringg = reducemultiples($stringg, ",");
        echo $stringg;*/

        $data=file_get_contents(base_url('/uploads/txt/text.txt'));
        
        $splittedstring=explode(",",$data);
        /*foreach ($splittedstring as $key => $value) {
        echo "key[".$key."] = ".$value."<br>";
        }*/
        $email = $splittedstring[0];
        $username = $splittedstring[1];
        $passwd = $splittedstring[2];

        $requested = '@';
        ?>
        <?php if(strpos($email,$requested)): ?>
            <?php $this->fileread_model->insert_from_text($email,$username,$passwd); ?>
            <div class="readsucc">
            <?php echo 'Siker'; ?>
            </div>
        <?php else: ?> 
            <div class="readerror">
            <?php echo 'Nem megfelelő e-mail input'; ?>
            </div>
        <?php endif; ?>
        <?php
       $this->load->helper('url'); 
       $this->load->view('admin/filereading');

    }

    
}



