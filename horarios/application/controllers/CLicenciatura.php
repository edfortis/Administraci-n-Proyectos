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

    public function index($id = FALSE)
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

           //if para modificar
           if($id != false)
           {
                $tabla = array('tabla' => 'Licenciaturas','idcolum' => 'idLicenciatura','id' => $id);
                $data = $this->Modelo_admin->get_row($tabla);

           }
           $this->load->view('form_licenciatura.php',$data);
           $this->load->view('plantilla/footer');
       }else
       {
        //if de modificacion
           if($id != False)
           {
               //Agregar
               $this->modificar_licenciatura($id); 
               
           }
           else
           {
               //modificar
               $this->agregar_licenciatura(); 
               
           }  
          
    }
  }
    //agregar
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
        $array = array('tabla'=> 2);
        $this->session->set_flashdata('tabla',2);
        redirect('Catalogos');
        }
        var_dump($post);
        $data = array('nombre' => $this->input->post('nombre'),
            'creditosTotal' => $this->input->post('creditosTotal'));
        $tabla = array(
            'idcolum' => 'idLicenciatura',
            'id' => $id,
            'nombre' => 'Licenciaturas' 
        );
        $this->Modelo_admin->entry_update($tabla,$data);
        $array = array('tabla'=> 2);
        $this->session->set_flashdata('tabla',2);
        redirect('Catalogos'); 
        
    }
    //eliminar
    public function eliminar_licenciatura($id = FALSE){
        if($id == FALSE)
        {        
        $array = array('tabla'=> 2);
        $this->session->set_flashdata('tabla',2);
        redirect('Catalogos'); 
        }
        $tabla = array('idcolum'=>'idLicenciatura',
            'id' => $id,
            'nombre' => 'Licenciaturas');
        
        $this->Modelo_admin->entry_delete($tabla);
        $array = array('tabla'=> 2);
        $this->session->set_flashdata('tabla',2);
        redirect('Catalogos'); 
    }
    
    
}
?>