<?php
ini_set('display_errors', 1);
    class Procesar extends CI_Controller{
        
       
        public function __construct()
        {
            parent::__construct();
            //mostrar
            $this->load->helper(array('form', 'url'));
            $this->load->library('form_validation');
            $this->load->model('Modelo_admin');
            $this->load->library('pagination');
            //procesar
            
        }
        
        public function agregar_producto($id = FALSE)
        {
                
            //configuración utilerias para imagenes
            $config['upload_path'] = './img/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '0';
            $config['max_width']  = '0';
            $config['max_height']  = '0';
            //carga de libreria imagenes
            $this->load->library('upload', $config);
            
            //carga de librerias
            $this->load->helper('form');
            $this->load->helper('html');
            $this->load->library('form_validation');
            
            $data['title'] = 'Agregar Productos';
            //reglas de validación para el formulario
            $required = array('required' => 'Debes llenar el campo  %s.');
            $this->form_validation->set_rules('nombre_producto', 'Nombre Producto','required',$required );
            $this->form_validation->set_rules('idtalla', 'Talla', 'required',$required);
            $this->form_validation->set_rules('idcolor', 'Color', 'required',$required);
            $this->form_validation->set_rules('precio', 'Precio', 'required',$required);
            $this->form_validation->set_rules('cantidad', 'Cantidad', 'required',$required);
            //$this->form_validation->set_rules('img','La imagen','required',$required);
            
            //si paso la validación
            if ($this->form_validation->run() == FALSE)
            {
                //mandar error en caso de que exista error en la carga de la imagen
                if(! $this->upload->do_upload())
                {
                    $data['error_img'] =  $this->upload->display_errors();
                    
                       
                }
                
                
                //cargar datos para los selects
                $data['talla']= $this->Modelo_admin->get_item(FALSE,'talla');
                $data['color']= $this->Modelo_admin->get_item(FALSE,'color');
                $data['post'] = $_POST;
                $data['file'] = $_FILES;
                //cargar el formulario
                $this->load->view('Plantilla/header',$data);
                $this->load->view('agregar-producto',$data);
                $this->load->view('Plantilla/footer');
            }
            else
            {
                $data = array('procesar/agregar_producto' => $this->upload->data());
                $data = array(
                        'nombre_producto' => $this->input->post('nombre_producto'),
                        'precio' => $this->input->post('precio'),
                        'cantidad' => $this->input->post('cantidad'),
                        'color_idcolor' => $this->input->post('idcolor'),
                        'talla_idtalla' => $this->input->post('idtalla')
                        );
                var_dump($data);  
                $this->Modelo_admin->set_data('producto',$data);
                
                redirect('sitio/admin');
                
            }
            
           
            
        }
 
        function thumb($data)
        {
            $config['image_library'] = 'gd2';
            $config['source_image'] =$data['full_path'];
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 360;
            $config['height'] = 206;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
        } 
        
    }
?>