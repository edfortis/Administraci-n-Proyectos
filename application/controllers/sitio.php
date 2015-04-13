<?php
    class Sitio extends CI_Controller{
        
       
        public function __construct()
        {
            parent::__construct();
            
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->model('Modelo_admin');
            $this->load->library('pagination');
        }
       public function cargar($page = 'inicio')
       {
           
           if(!file_exists(APPPATH.'/views/'.$page.'.php'))
           {
               show_404();
           }
           #si no esta logueado
           /* if (!$this->tank_auth->is_logged_in()) {
                redirect('/auth/login/');
            } else {*/
           $data['notas'] = $this->items_model->get_news();
           $data['title']=  ucfirst($page);
           $this->load->view('Plantilla/header',$data);   
           $this->load->view($page,$data);
           $this->load->view('Plantilla/footer');
          // }
       }
       public function admin($page = 0){
           
           if (!$this->tank_auth->is_logged_in()){
               redirect('/auth/login/');
           }else{
                   
               //podemos otorgar acceso al admin
               $data['title'] = 'Administrador';
               //código que inicia al paginador
               if($this->uri->segment(4)){
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
                $tabla = 1;    
               }
               
               switch ($tabla) 
               {
                   case 1:
                       $vista = 'producto_vista';
                       $data["links"] = $this->paginacion($page,$vista);
                       $limit = $data['links']['per_page'];
                       $start = $elemt ;
                       $data["items"] = $this->Modelo_admin->fetch_data($limit,$start,$vista);
                       $data['tabla'] = $tabla;
                       $this->load->view('Plantilla/headeradmin',$data);
                       $this->load->view('admin-producto',$data);
                       $this->load->view('Plantilla/footeradmin');
                               
                       break;
                   case 2:
                       
                       break;
                   case 3:
                       
                       break;
                   default:
                       
                       break;
               }
               
               //crear las consultas por casos en el switch
               //y cargarlo al $data para crear las tablas 
               
           }
       }
       public function create($id = 0)
        {
            $this->load->helper('form');
            $this->load->helper('html');
            $this->load->library('form_validation');
        
            $data['title'] = 'Administrador';
        
            $this->form_validation->set_rules('titulo', 'Titulo', 'required');
            $this->form_validation->set_rules('texto', 'Texto', 'required');
        
            if ($this->form_validation->run() === FALSE)
            {
                $data['notas'] = $this->items_model->get_news();
                
                $this->load->view('Plantilla/header', $data);
                if ($id > 0){
                 $data['nota'] = $this->items_model->get_news($id);   
                }
                $this->load->view('agregar',$data);
                $this->load->view('Plantilla/footer');
        
            }
            else
            {
                if($this->input->post('id_nota')){
                    $this->items_model->entry_update();
                }else{
                    $this->items_model->set_news();
                }
                $this->cargar('exito');
            }
        }
        
        function del($id){
           $this->load->library('table');
           $this->load->helper('html'); 
           
           if((int)$id > 0){
              $this->items_model->delete($id);
              $this->create();
           }else{
               show_404();
           }
                
       }
        
       function paginacion($page,$tabla)
       {
            
            $config = array();
            $config["base_url"] = base_url() . "sitio/admin/$page";
            $total_row = $this->Modelo_admin->record_count($tabla);
            
            $config["total_rows"] = $total_row;
            $config["per_page"] = 10;
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