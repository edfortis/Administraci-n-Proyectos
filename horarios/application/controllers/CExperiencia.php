<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CExperiencia extends CI_Controller {
    public function __construct()
    {
            parent::__construct();
            //mostrar
            $this->load->helper('cookie');
            $this->load->library('form_validation');
            $this->load->model('Modelo_admin');
           
            
            
    }

    public function index($id = FALSE)
    {
            
       if(!file_exists(APPPATH.'/views/form_experiencia.php'))
       {
            //show_404();
       }
       //validaciones
       $this->form_validation->set_rules('nombre','Nombre','required');
       $this->form_validation->set_rules('nrc','NRC','required');
       $this->form_validation->set_rules('bloque','Bloque','required');
       $this->form_validation->set_rules('seccion','Seccion','required');
       $this->form_validation->set_rules('creditos','Creditos','required');
       $this->form_validation->set_rules('nombreLicenciatura','Licenciaturas','required');
       //$this->form_validation->set_rules('checkpass','Confirmacion Contraseña','required');
        
       if($this->form_validation->run() == FALSE)
       {
           $data['title']=  ucfirst('experiencia');
           $this->load->view('plantilla/header',$data);
           
           //if para entrar a modificar
           if($id != False)
           {
               $tabla = array('tabla' => 'Experiencias',
                'idcolum' => 'idExperiencia',
                'id' => $id);
              $data = $this->Modelo_admin->get_row($tabla);
             
           }
           $this->load->view('form_experiencia.php',$data);
           $this->load->view('plantilla/footer');
       }else
       {
           //if de modificacion
           if($id != False)
           {
               //Agregar
               $this->modificar_experiencia($id); 
               
           }
           else
           {
               //modificar
               $this->agregar_experiencia(); 
               
           }
           
       }  
          
    }
    //agregar
    public function agregar_experiencia()
    {
        $data = array('nombre' => $this->input->post('nombre'),
            'nrc' => $this->input->post('nrc'),
            'bloque' => $this->input->post('bloque'), 
            'seccion' => $this->input->post('seccion'),
            'creditos' => $this->input->post('creditos'),
            'Licenciaturas_idLicenciatura' => $this->input->post('Licenciaturas_idLicenciatura'));
        $this->Modelo_admin->set_data('Experiencias',$data);
        //redireccionado de tabla
        $array = array('tabla' => 3);
        $this->session->set_flashdata('tabla',$array);
        redirect('catalogos');
          
    }
    //modificar
    public function modificar_experiencia($id = FALSE)
    {
        if($id == FALSE)
        {
            redirect('Catalogos');
        }
        var_dump($post);
        $data = array('nombre' => $this->input->post('nombre'),
            'nrc' => $this->input->post('nrc'),
            'bloque' => $this->input->post('bloque'),
            'seccion' => $this->input->post('seccion'),
            'creditos' => $this->input->post('creditos'),
            'Licenciaturas_idLicenciatura' => $this->input->post('Licenciaturas_idLicenciatura'));
        $tabla = array(
            'idcolum' => 'idExperiencia',
            'id' => $id,
            'nombre' => 'Experiencias' 
        );
        $this->Modelo_admin->entry_update($tabla,$data);
        redirect('catalogos');
        
    }
    //eliminar
    public function eliminar_experiencia($id = FALSE){
        if($id == FALSE)
        {
            redirect('Catalogos');
        }
        $tabla = array('idcolum'=>'idExperiencia',
            'id' => $id,
            'nombre' => 'Experiencias'
            );
        $this->Modelo_admin->entry_delete($tabla);
         $this->session->set_flashdata('tabla',$array);
        redirect('Catalogos');
    }
     
   
  }
?>