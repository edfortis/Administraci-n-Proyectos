<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sitio extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Modelo_admin');
        
    }
    
    public function cargar($page = 'inicio')
    {
           
       if(!file_exists(APPPATH.'/views/'.$page.'.php'))
       {
          show_404();
       }
       
        $cookie = $this->input->cookie('the_cookie');
        $activado = $this->input->cookie('activado');
      
        if(($cookie == null) & ($activado == 0)){
            
            redirect('login');
        }
        //Usuario Docente
        $tabla = array(
        'tabla' => 'Docentes',
        'idcolum' => 'Usuario_idUsuario',
        'id' => $cookie);
        $data['tabla'] = $this->Modelo_admin->get_row($tabla);
        
           
        $data['title']=  ucfirst($page);
        $this->load->view('plantilla/header',$data);   
        $this->load->view($page);
        $this->load->view('plantilla/footer');
          
    }
    
    
}
?>