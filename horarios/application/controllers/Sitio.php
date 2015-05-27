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
        //Usuario Docente una tupla
        $tabla = array(
        'tabla' => 'Docentes',
        'idcolum' => 'Usuario_idUsuario',
        'id' => $cookie
        );
        $data['tabla'] = $this->Modelo_admin->get_row($tabla);
        $idDocente =  $data['tabla']['idDocente'];
        
        //datos Licenciatura todos
        $tabla = array(
            'tabla' => 'Docente_Licenciatura_View',
            'idcolum'=>'Docentes_idDocente',
            'id'=> $idDocente
        );
        $data['Licenciatura'] = $this->Modelo_admin->get_items($tabla);
        //datos Experiencias todos
        $tabla = array(
            'tabla' => 'Docente_Experiencia_View',
            'idcolum'=>'Docentes_idDocente',
            'id'=> $idDocente
        );
        $data['Experiencia'] = $this->Modelo_admin->get_items($tabla);
          
        $data['title']=  ucfirst($page);
        $this->load->view('plantilla/header',$data);   
        $this->load->view($page);
        $this->load->view('plantilla/footer');
          
    }

    public function set(){
        $x = $this->input->post('lista');
        
        foreach($x as $item){
            if($item == 'L1'){
                
            }
        }
    }
    
    
}
?>