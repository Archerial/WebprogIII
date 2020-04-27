<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Employees
 *
 * @author BallaT
 */
class Employees extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('employees_model');
        // innentől az emp. model metódusait 
        // a $this->employees_model-en keresztül
        // tudjuk hívni
    }
    
    // alkalmazottak listázása 
    public function index(){
        
       // 1) lekérdezem az adatbázisból a rekordokat
       $records = $this->employees_model->get_list(); 
       // 2) a rekordok megjelenítése a böngészőben 
       $view_params = [
           'employees'  =>  $records
       ];
       $this->load->helper('url'); // segéd az url kezeléshez
       // 3) Felhelyezem a nézetet + átadom a paramétereket 
       $this->load->view('employees/list', $view_params);
    }
    
    // alkalmazott hozzáadása 
    public function insert(){
        // miért kerültünk ide? 
        // a - valaki meghívta első alkalommal ezt a metódust
        // b - valaki kitöltötte az űrlapot és szeretné beküldeni
        // $this->input --> az input kezelést valósítja 
        if($this->input->post('submit')){
            // valaki rákattintott a submit-ra, az adatokat validálni kell
            // a validácóhoz a form_validation könyvtárat használjuk 
            $this->load->library('form_validation');
            // validációs szabályok beállítása 
            // a) mindhárom mező kitöltése kötelező 
            $this->form_validation->set_rules('name','név','required');
            $this->form_validation->set_rules('tin','adóazonosító','required');
            $this->form_validation->set_rules('ssn','TAJ szám','required');
            //$this->form_validation->set_rules('picturePath','Elérési útvonal','required');
            
            if($this->form_validation->run() == TRUE){
                if ($this->input->post('submit')){
            
                    $upload_config['allowed_types'] = 'jpg|jpeg|png';
                    $upload_config['max_size'] = 2355;
        
                    $upload_config['min_width'] = 250; 
                    $upload_config['max_width'] = 1000; 
                    $upload_config['min_height'] = 250; 
                    $upload_config['max_height'] = 1000; 
        
                    //$_FILES['image']['name']
                    $upload_config['file_name'] = $this->input->post('ssn') . '_001';
                    
                    $upload_config['upload_path'] = './uploads/img/employees/';
                    
                    $upload_config['file_ext_tolower'] = TRUE;
                    
                    $upload_config['overwrite'] = FALSE;
                    
                
                    $this->load->library('upload'); 
        
                    $this->upload->initialize($upload_config);
                    
                    if ($this->upload->do_upload('file') == TRUE){
                        
                        $photo_path = $upload_config['upload_path'].$upload_config['file_name'];
                        $this->load->helper('url');
                        $view_params = [
                            'data' => $this->upload->data()
                        ];
                        $this->load->view('employees_upload/form',$view_params);
                        $this->load->helper('form');
                        //$this->load->view('employees/insert',$view_params);
                         $this->load->view('employees_upload/succes',$view_params);
                         $this->employees_model->insert($this->input->post('name'),
                                                $this->input->post('tin'),
                                                $this->input->post('ssn'),
                                                $photo_path);
                 
                         // irányítsuk az oldalt listázó nézetre
                      $this->load->helper('url');
                         // redirect -> átirányítás
                         //redirect('profilepicture_upload');
                         redirect(base_url('employees'));
                    }else{
                       
                        $view_params = [
                            'errors' => $this->upload->display_errors()
                        ];
                       
                    }
                    
                } else{
                    
                    $this->load->helper('form'); 
                    //$this->load->view('employees/insert',$view_params);
                    $this->load->view('employees_upload/form',['errors' => '']);
                }
                // a validáció ok, mehet a beszúrás
                
            }
        }
        
        
        // a nézetben formot szeretnék kezelni, ezért a helperek 
        // közül a form helpert behivatkozom 
        $this->load->helper('form');
        $this->load->view('employees/insert');
        
    }
    
    // alkalmazott módosítása 
    // nyilván a szerkesztés során tudnom kell, hogy melyik 
    // rekordot szeretnénk módosítani (fontos, hogy az edit
    // paramétere elsődleges kulcs érték legyen vagy egyedi
    // érték az adattáblában) 
    public function edit($id = NULL){  
        // id értékének ellenőrzése, hogy csak akkor menjünk tovább, 
        // ha az id mögött ténylegesen van rekord 
        if($id == NULL){
            show_error('A szerkesztéshez hiányzik az id!');
        }    
        $record = $this->employees_model->select_by_id($id);
        if($record == NULL){
            show_error('Nem létezik ilyen rekord!');
        }
        
        $this->load->library('form_validation');
        // lemásolom az insertből a validációs szabályokat
        $this->form_validation->set_rules('name','név','required');
        $this->form_validation->set_rules('tin','adóazonosító','required');
        $this->form_validation->set_rules('ssn','TAJ szám','required');
         
        // megnézem, hogy rendben vannak-e validációs szabályok, ha nem, akkor felület, 
        // ha igen, akkor szerkesztés
        if($this->form_validation->run() == TRUE){
            // kezdeményezzük a rekord frissítését, 
            // amely ha sikeres visszamegyünk a 
            // lista oldara 
            $this->employees_model->update($id, 
                                           $this->input->post('name'),
                                           $this->input->post('tin'),
                                           $this->input->post('ssn'));
            $this->load->helper('url');
            redirect(base_url('employees'));
        }
        else{
            // összeállítom a nézet számára a paraméter tömböt
            $view_params = [
                'emp'    =>  $record
            ];
            // követkeménye, hogy viewban $emp-ként tudok 
            // hivatkozni a $record tartalmára

            $this->load->helper('form'); // ahhoz kell, hogy a nézetben a form elkészíthető legyen a metódushívások segítéségével
            // felhelyezem a nézetet a böngészőbe
            $this->load->view('employees/edit',$view_params);
        }
            
    }
    
    //alkalmazott törlése
    // a delete-et úgy alakítom ki, hogy paraméterrel és 
    // annélkül is hívható legyen, ezzel szeretném elkerülni 
    // a böngészőben az olyan hibajelzést, amely a hiányzó 
    // paraméterre utal => alapértelemzett paraméterérték
    public function delete($id = NULL){
        // van-e jogosultságom a rekord törléséhez? 
        
        // létezik-e egyáltalán a törölni kívánt rekord? 
        if($id == NULL){
            show_error('Hiányzó rekord azonosító!');
        }
        // nézzük meg, hogy az adatbázisban létezik-e az 
        // adott táblában az id 
        $record = $this->employees_model->select_by_id($id);
        if($record == NULL){
            show_error('Ilyen azonosítóval nincs rekord!');
        }
        
        // ha minden ok, akkor törlés, majd a listázó oldalra megyünk
        $this->employees_model->delete($id);
        $this->load->helper('url');
        redirect(base_url('employees'));
    }

    public function profile($ssn = NULL){
        if($ssn== NULL){
            show_error('Hiányzó rekord azonosító!');
        }

      
        if($ssn == NULL){
            show_error('Ilyen azonosítóval nincs rekord!');
        } 
        $this->load->helper('form');

        $record = $this->employees_model->select_by_ssn($ssn);
            $view_params = [
                'emp'  =>  $record
            ];
            $this->load->helper('url');
            $this->load->view('employees/profile', $view_params);
        
    }
    
    
    
    public function insert2(){
        //a végrehajtás elindításához, behivatkozom a megfelelő library-t
        $this->load->library('form_validation'); //validációhoz szükséges library
        
        //felépítem a vizsgálathoz szükséges szabályokat
        $this->form_validation->set_rules('name','Név','required');
        //TAJ szám esetén mit lehet ellenőrizni
        //1) kötelező kitölteni (NOT NULL) required
        //2) hosszra vonatkozó megszorítás (9 karakter) - exact_length[hossz], min_length[], max_length[]
        //3) csak számjegyeket tartalmazhat - alpha, numeric, alphanumeric
        //4) nem ismétlődhet (UNIQUE) - is_unique
        //5) ellenörző összeg képzés (saját algoritmus) - nincs beépített lehetőség hanem egy fejleszőti metódust kell hívni
        // => egy mezőre több szabályt érvényesítek
        //a, | jelekkel választjuk el az egggyes szabályokat
        $this->form_validation->set_rules('ssn','Tajszám','required|exact_length[9]|numeric|is_unique[employees.ssn]|callback_chech_ssn');
        //Adó azonosító jel esetén:
        //kötelező - required
        //10 karakter
        //csak számjegyeket tartalmaz
        //nem ismétlődhet
        //ellenörző összeg képzése, ehhet nem árt ismerni a születési időt sem
        
        
        $this->form_validation->set_rules('tin','Adóazonosító','required|callback_chech_tin[birth]');
        
        if($this->form_validaiton->run() == TRUE){
            //ha minden szabály teljesül, mehet a beszúrás
            echo 'OK';
        }
        
        //felhelyezem azt a formot amelyen keresztül az adatrögzítés elvégezhető
        $this->load->helper('form'); //helper a mezők generálásához
        $this->load->view('employees/insert2');
    }

    public function check_tin($tin, $birth){
        
        
        return true;
    }
    
    //ha validáció során szeretném használni akkor am etódusnak egészen bizotsna van egy paramétere, mégpedig a mező érték
    //a validációs metódus biztosan puclic lesz!! annak kell lennie
    public function chech_ssn($ssn){
        //a validációs metódus mindig logikai értékkel tér vissza
        //ellenörző algoritmus
        //karakterenként feldolgozni és ennek megfelelően megnézni, hogy az 
        //ellenörző összeg kiszámítható-e vagy nem
        
        
        
        
        
        
        
        
        $this->form_validation->set_message('check_ssn','Az ellenörző összeg nem helyes a {field} mezőben');
        return false;
        
    }

}
