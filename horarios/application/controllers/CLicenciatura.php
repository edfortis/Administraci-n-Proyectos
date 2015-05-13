<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CLicenciatura extends CI_Controller {
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
           
       if(!file_exists(APPPATH.'/views/form_licenciatura.php'))
       {
          show_404();
       }
       //validaciones
       $this->form_validation->set_rules('nombre','nombre','required');
       $this->form_validation->set_rules('creditosTotal','creditosTotal','required');
       //$this->form_validation->set_rules('checkpass','Confirmacion Contraseña','required');
       
       if($this->form_validation->run() == FALSE)
       {
           $data['title']=  ucfirst('Agregar Licenciatura');
           $this->load->view('plantilla/header',$data);
           $this->load->view('form_licenciatura.php');
           $this->load->view('plantilla/footer');
       }else
       {
           //agregar
           $this->agregar_licenciatura();
       }  
          
    }
    
    public function agregar_licenciatura()
    {
        $data = array('nombre' => $this->input->post('nombre'),
            'creditosTotal' => $this->input->post('creditosTotal'));
            
        $this->Modelo_admin->set_data('Licenciaturas',$data);
        $array = array('tabla'=> 2);
        $this->session->set_flashdata('tabla',2);
        redirect('Catalogos');
          
    }
      //modificar
    public function modificar_licenciatura($id = FALSE)
    {
        if($id == FALSE)
        {
            redirect('catalogos');
        }
        var_dump($post);
        $data = array('nickname' => $this->input->post('nickname'),
            'contrasena' => $this->input->post('contrasena'),
            'perfil' => $this->input->post('perfil'));
        $tabla = array(
            'idcolum' => 'idUsuario',
            'id' => $id,
            'nombre' => 'Usuario' 
        );
        $this->Modelo_admin->entry_update($tabla,$data);
        redirect('catalogos');
        
    }
    //eliminar
    public function eliminar_licenciatura($id = FALSE){
        if($id == FALSE)
        {
            redirect('catalogos');
        }
        $tabla = array('idcolum'=>'idUsuario',
            'id' => $id,
            'nombre' => 'Usuario');
        
        $this->Modelo_admin->entry_delete($tabla);
        redirect('catalogos');
    }
    
    
}
?>