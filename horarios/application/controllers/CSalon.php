<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CSalon extends CI_Controller {
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
            
       if(!file_exists(APPPATH.'/views/form_salones.php'))
       {
            show_404();
       }
       //validaciones
       $this->form_validation->set_rules('nombre','nombre','required');
       
        
       if($this->form_validation->run() == FALSE)
       {
           $data['title']=  ucfirst('Salones');
           $this->load->view('plantilla/header',$data);
           
           //if para entrar a modificar
           if($id != False)
           {
               $tabla = array('tabla' => 'salones',
                'idcolum' => 'idSalon',
                'id' => $id);				
              $data = $this->Modelo_admin->get_row($tabla);
             
           }
           $this->load->view('form_salones.php',$data);
           $this->load->view('plantilla/footer');
       }else
       {
           //if de modificacion
           if($id != False)
           {
               //Agregar
			   //aqui en realidad modifica
               $this->modificar_salon($id); 
             
           }
           else
           {
               //modificar
			   //aqui en realidad agrega
               $this->agregar_salon(); 
               
           }
           
       }  
          
    }
    //agregar
    public function agregar_salon()
    {
        $data = array('nombre' => $this->input->post('nombre'));            
        $this->Modelo_admin->set_data('salones',$data);
		$array = array('tabla'=> 4);
        $this->session->set_flashdata('tabla',4);
        redirect('catalogos');
          
    }
    //modificar
    public function modificar_salon($id = FALSE)
    {
        if($id == FALSE)
        {
            redirect('catalogos');
        }
        var_dump($post);
        $data = array('nombre' => $this->input->post('nombre'));
        $tabla = array(
            'idcolum' => 'idSalon',
            'id' => $id,
            'nombre' => 'salones' 
        );
        $this->Modelo_admin->entry_update($tabla,$data);
		$this->session->set_flashdata('tabla',4);
        redirect('catalogos');
        
    }
    //eliminar
    public function eliminar_salon($id = FALSE){
        if($id == FALSE)
        {
            redirect('catalogos');
        }
        $tabla = array('idcolum'=>'idSalon',
            'id' => $id,
            'nombre' => 'salones');
        
        $this->Modelo_admin->entry_delete($tabla);
		 $array = array('tabla'=> 4);
        $this->session->set_flashdata('tabla',4);
        redirect('catalogos');
    }
    
   
    
    
    
}
?>

