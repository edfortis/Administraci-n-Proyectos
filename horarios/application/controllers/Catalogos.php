<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalogos extends CI_Controller {
    public function __construct()
    {
            parent::__construct();
            //mostrar
            $this->load->helper('cookie');
            $this->load->library(array('form_validation','pagination','session'));
            $this->load->model('Modelo_admin');     
            
    }

    public function index($page = 0)
    {
           
       if(!file_exists(APPPATH.'/views/form_usuario.php'))
       {
          show_404();
       }
       //validaciones
       $cookie = $this->input->cookie('the_cookie');
       if(!isset($cookie))
       {
            redirect('login');
       }
       
       //inicializar paginador
       if($this->uri->segment(4))
       {
        $elemt = ($this->uri->segment(4)) ;
       }else{
        $elemt = 0;
       }
       
       //case que controla que tabla mostrar
       if(isset($_POST['tabla']))
       {
        $tabla = $_POST['tabla'];    
       }
       else 
       {
        if(null !==$this->session->flashdata('tabla')){
           $tabla = $this->session->flashdata('tabla'); 
        }else{
            $tabla = 1;
        }
          
       }
       
       


       switch ($tabla) 
       {
        case 1:
           $vista = 'Usuario';
           $data["links"] = $this->paginacion($page,$vista);
           $limit = $data['links']['per_page'];
           $start = $elemt ;
           $data["items"] = $this->Modelo_admin->fetch_data($limit,$start,$vista);
           $data['tabla'] = $tabla;
           
           $data['title']=  ucfirst('Usuario');
           
           $this->load->view('plantilla/header-catalogos',$data);
           $this->load->view('Vusuario.php',$data);
           $this->load->view('plantilla/footer');
                           
                                              
        break;
        case 2:

           $vista = 'Licenciaturas';
           $data["links"] = $this->paginacion($page,$vista);
           $limit = $data['links']['per_page'];
           $start = $elemt ;
           $data["items"] = $this->Modelo_admin->fetch_data($limit,$start,$vista);
           $data['tabla'] = $tabla;
           
           $data['title']=  ucfirst('Licenciatura');
           
           $this->load->view('plantilla/header-catalogos',$data);
           $this->load->view('Vlicenciatura.php',$data);
           $this->load->view('plantilla/footer');            

        break;
        case 3:
                       
        break;
        case 4:
            
        break;   
        default:
                       
        break;
       }
            
            
    }

       function paginacion($page,$tabla)
       {
            
            $config = array();
            $config["base_url"] = base_url() . "sitio/admin/$page";
            $total_row = $this->Modelo_admin->record_count($tabla);
            
            $config["total_rows"] = $total_row;
            $config["per_page"] = 100;
            $config['use_page_numbers'] = TRUE;
            $choice = round($config["total_rows"] / $config["per_page"]);
            $config['num_links'] = $choice; 
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['uri_segment'] = '4';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['last_link'] = FALSE;
            $config['first_link'] = FALSE;
            $config['next_link'] = '&raquo;';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['prev_link'] = '&laquo;';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            
            
            
            
            
            
            $this->pagination->initialize($config);
            $str_links = $this->pagination->create_links();
            $data["per_page"] = $config["per_page"];
            $data["links"] = explode('&nbsp;',$str_links );
            
            return $data;
       }
    
    
    
    
    
}
?>
