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
           
           //if para entrar a modificar
           if($id != False)
           {
               $tabla = array('tabla' => 'Usuario',
                'idcolum' => 'idUsuario',
                'id' => $id);
              $data = $this->Modelo_admin->get_row($tabla);
             
           }
           $this->load->view('form_usuario.php',$data);
           $this->load->view('plantilla/footer');
       }else
       {
           //if de modificacion
           if($id != False)
           {
               //Agregar
               $this->modificar_usuario($id); 
               
           }
           else
           {
               //modificar
               $this->agregar_usuario(); 
               
           }
           
       }  
          
    }
    //agregar
    public function agregar_usuario()
    {
        $data = array('nickname' => $this->input->post('nickname'),
            'contrasena' => $this->input->post('contrasena'),
            'perfil' => $this->input->post('perfil'));
            
        $this->Modelo_admin->set_data('Usuario',$data);
<<<<<<< HEAD
        
=======
        //redireccionado de tabla
       
>>>>>>> c27509d0944f1c806a1366de6dc89d0b9c241c46
        redirect('catalogos');
          
    }
    //modificar
    public function modificar_usuario($id = FALSE)
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
    public function eliminar_usuario($id = FALSE){
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
    
    //activar usuario
    public function activar($id = FALSE)
    {
        if(id==FALSE)
        {
            redirect('catalogos');
        }
        $data = array('activado' => 1);
        $tabla = array(
            'idcolum' => 'idUsuario',
            'id' => $id,
            'nombre' => 'Usuario' 
        );
        $this->Modelo_admin->entry_update($tabla,$data);
        redirect('catalogos');
        
        
    }
    //desactivar usuario
    public function desactivar($id = FALSE)
    {
        if(id==FALSE)
        {
            redirect('catalogos');
        }
        $data = array('activado' => 0);
        $tabla = array(
            'idcolum' => 'idUsuario',
            'id' => $id,
            'nombre' => 'Usuario' 
        );
        $this->Modelo_admin->entry_update($tabla,$data);
        redirect('catalogos');
        
        
    }
    
    
    
}
?>