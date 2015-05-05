<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CUsuario extends CI_Controller {
    public function __construct()
    {
            parent::__construct();
            //mostrar
            $this->load->helper('cookie');
            $this->load->library('form_validation');
            $this->load->model('Modelo_admin');
           
            
            
    }

    public function index()
    {
           
       if(!file_exists(APPPATH.'/views/form_usuario.php'))
       {
          show_404();
       }
       //validaciones
       $this->form_validation->set_rules('nickname','Usuario','required');
       $this->form_validation->set_rules('contrasena','Contraseña','required');
       //$this->form_validation->set_rules('checkpass','Confirmacion Contraseña','required');
       
       if($this->form_validation->run() == FALSE)
       {
           $data['title']=  ucfirst('Usuario');
           $this->load->view('plantilla/header',$data);
           $this->load->view('form_usuario.php');
           $this->load->view('plantilla/footer');
       }else
       {
           //agregar
           $this->agregar_usuario();
       }  
          
    }
    
    public function agregar_usuario()
    {
        $data = array('nickname' => $this->input->post('nickname'),
            'contrasena' => $this->input->post('contrasena'),
            'perfil' => 1);
            
        $this->Modelo_admin->set_data('Usuario',$data);
        redirect('login');
          
    }
    
    
    
}
?>