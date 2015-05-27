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

    public function index($id = FALSE)
    {
            
       if(!file_exists(APPPATH.'/views/form_experiencia.php'))
       {
            show_404();
       }
       //validaciones
       $this->form_validation->set_rules('nombre','nrc','bloque','seccion','creditos','Licenciaturas_idLicenciatura');
       $this->form_validation->set_rules('nombre','nrc','bloque','seccion','creditos','Licenciaturas_idLicenciatura','required');
       //$this->form_validation->set_rules('checkpass','Confirmacion Contraseña','required');
        
       if($this->form_validation->run() == FALSE)
       {
           $data['title']=  ucfirst('Experiencia');
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
            'nombreLicenciatura' => $this->input->post('Licenciaturas_idLicenciatura'));
             $this->Modelo_admin->set_data('Experiencias',$data);
        redirect('catalogos');
          
    }
    //modificar
    public function modificar_experiencia($id = FALSE)
    {
        if($id == FALSE)
        {
            redirect('catalogos');
        }
        var_dump($post);
        $data = array('nombre' => $this->input->post('nombre'),
            'nrc' => $this->input->post('nrc'),
            'bloque' => $this->input->post('bloque'),
            'seccion' => $this->input->post('seccion'),
            'creditos' => $this->input->post('creditos'),
            'nombreLicenciatura' => $this->input->post('Licenciaturas_idLicenciatura'));
        $tabla = array(
            'idcolum' => 'idExperiencia',
            'id' => $id,
            'nombre' => 'nombre' 
        );
        $this->Modelo_admin->entry_update($tabla,$data);
        redirect('catalogos');
        
    }
    //eliminar
    public function eliminar_experiencia($id = FALSE){
        if($id == FALSE)
        {
            redirect('catalogos');
        }
        $tabla = array('idcolum'=>'idExperiencia',
            'id' => $id,
            'nombre' => 'Experiencias');
        
        $this->Modelo_admin->entry_delete($tabla);
        redirect('catalogos');
    }
    
    //activar 
    public function activar($id = FALSE)
    {
        if(id==FALSE)
        {
            redirect('catalogos');
        }
        $data = array('activado' => 1);
        $tabla = array(
            'idcolum' => 'idExperiencia',
            'id' => $id,
            'nombre' => 'Experiencias' 
        );
        $this->Modelo_admin->entry_update($tabla,$data);
        redirect('catalogos');
        
        
    }
    //desactivar 
    public function desactivar($id = FALSE)
    {
        if(id==FALSE)
        {
            redirect('catalogos');
        }
        $data = array('activado' => 0);
        $tabla = array(
            'idcolum' => 'idExperiencia',
            'id' => $id,
            'nombre' => 'Experiencias' 
        );
        $this->Modelo_admin->entry_update($tabla,$data);
        redirect('catalogos');
        
        
    }
    
    
    
}
?>