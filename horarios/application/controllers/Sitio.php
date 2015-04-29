<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitio extends CI_Controller {

    
    
    public function cargar($page = 'inicio')
    {
           
       if(!file_exists(APPPATH.'/views/'.$page.'.php'))
       {
          show_404();
       }
       
        $cookie = $this->input->cookie('the_cookie');
        if(!isset($cookie)){
            redirect('login');
        }
           
        $data['title']=  ucfirst($page);
        $this->load->view('plantilla/header',$data);   
        $this->load->view($page);
        $this->load->view('plantilla/footer');
          
    }
}
?>