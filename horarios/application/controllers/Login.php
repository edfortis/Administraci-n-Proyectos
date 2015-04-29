<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
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
           
       if(!file_exists(APPPATH.'/views/login.php'))
       {
          show_404();
       }
      
         $data['title']=  ucfirst('inicio de sesión');
         $data['cookie'] = $this->input->cookie('C_login');  
         $this->load->view('login');
         
          
    }
    
    public function validar()
    {
        $data = array(
            'tabla' => 'Usuario',
            'nickname' => $this->input->post('nickname'),
            'pass' => $this->input->post('pass')
        );
         
        $query = $this->Modelo_admin->get_usuario($data);
        if($query != FALSE)
        {
            $datos = array('id' => $query[0]->idUsuario, 'nombre'=> $query[0]->nickname);
            $cookie = array(
                        'name'   => 'the_cookie',
                        'value'  => $query[0]->nickname,
                        'expire' =>  86500,
                        'secure' => false
            );
            $this->input->set_cookie($cookie); 
            redirect('sitio/cargar');  
        }
        else
        {
            redirect('login');
        }
    }
}
?>