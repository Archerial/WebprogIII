<?php

class File_upload extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
    
    /*
     * Készítek egy metódust, amely felhelyezi
     *  a feltöltéshez szükséges nézetet a böngészőbe
     */
    
    public function index(){
        //Hozzunk döntést, hogy valaki csak a linket hívta meg, vagy pedig rákattintot amentés gombra.
        if ($this->input->post('submit')){
            //az űrlapot beküldték
            
            //fájl feltöltése !!! CSAK EZ IS EGY INPUT ADAT LESZ, AZAZ VALIDÁLNI KELL !!!!
            //nem form_validation-al fog megtörténni a, fájlok validálásához egy olyan konfiguárciós 
            //tömböt kell éptíenünk ahol az egyes bejegyzések mondják meg a validációs szabályt
            
            //megszorítást adhatok a fájl kiterjesztésére
            $upload_config['allowed_types'] = 'jpg|gif|png';
            //megszorítást adhatok a fájl méretére (kb-ban)
            $upload_config['max_size'] = 100;
            //képek esetén érdekes lehet a kép mérete
            $upload_config['min_width'] = 100; //min szélesség 100 pixel
            $upload_config['max_width'] = 2000; //max szélesség 2000 pixel
            $upload_config['min_height'] = 150; //min magasság 150 pixel
            $upload_config['max_height'] = 1200; //max magasság 1200 pixel
            //Állítsuk be a feltöltés konfigurációját
            //a feltöltött fájl neve, alapértelmezés szerint a feltöltési név lesz
            $upload_config['file_name'] = 'kep_20200331';
            //a feltöltés helye: hová kerüljön a fájl
            $upload_config['upload_path'] = './uploads/';
            //kiterejsztés kisbetűssé konvertálása, megtörténjen-e
            $upload_config['file_ext_tolower'] = TRUE;
            //ha létezik a fájl akkor felülírjuk-e
            $upload_config['overwrite'] = TRUE;
            
            //A feltöltést egy külső könyvtárral valósítjuk meg
            //így azt behivatkozom
            $this->load->library('upload'); //ezt követőne $this->upload mező létrejön
            //a feltöltéshez hozzárendelem a fenti konfigurációt
            $this->upload->initialize($upload_config);
            //kezdeményezem az űralpon megfelelő névvel ellátott 
            //űrlap mező alapján a feltöltést
            //elakarom végezni a feltöltést úgy, hogy a 
            //feltölteni kívánt állomány a file mezőben van az űrlapon
            //ezt validájuk le a config upload alapján
            //és ha minden kritériumnak eleget tesz, akkor mentsük el
            //ugyancsak a config_upload alapján
            if ($this->upload->do_upload('file') == TRUE){
                //IGAZ: sikeres feltöltés
                //a feltöltésre vonatkozó információkat a 
                //$this->upload->data() adja vissza
                //var_dump($this->upload->data());
                //készítek egy succes nézetet ahol kiírom a feltöltött fájl információkat
                $this->load->helper('url');
                $view_params = [
                    'data' => $this->upload->data()
                ];
                $this->load->view('file_upload/succes',$view_params);
            }else{
                //HAMIS: sikertelen feltöltés
                //A hiba oka a $this->upload->display_error()
                //hívással kérhető le
                //var_dump($this->upload->display_errors());
                //Hiba esetén biztosítom, hogy újra fel tudja tölteni:
                $view_params = [
                    'errors' => $this->upload->display_errors()
                ];
                $this->load->helper('form');
                $this->load->view('file_upload/form',$view_params);
            }
            
        } else{
            //nem küldték be az űr lapot, azaz:
            // Feladat: Helyezzük fel a nézetet!
            // F1) Töltsük be azokat a kiegészítő osztályokat, amelyekre a nézetnek
            // szüksége lesz
            $this->load->helper('form'); // Biztosítjuk, hogy a form építése során az építő php függvények hívhatók legyenej
        
            // F2) Helyezzük fel a nézetet a böngészőbe
            $this->load->view('file_upload/form',['errors' => '']);
        }
        
        
        
        
        
    }
}