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
        
        public function delete_producto($id)
        {
            
            $this->db->delete('producto', array('idproducto' => $id));
            redirect('sitio/admin');   
        }
        public function modificar_producto($id)
        {
            //si no encuentra el id mostrar error 404
            if(!isset($id)){
                show_404();
            }   
             
            //carga de librerias
            $this->load->helper('form');
            $this->load->helper('html');
            $this->load->library('form_validation');
            
            $data['title'] = 'Modificar Productos';
            
            
            //reglas de validación para el formulario
            $required = array('required' => 'Debes llenar el campo  %s.');
            $this->form_validation->set_rules('nombre_producto', 'Nombre Producto','required',$required );
            $this->form_validation->set_rules('idtalla', 'Talla', 'required',$required);
            $this->form_validation->set_rules('idcolor', 'Color', 'required',$required);
            $this->form_validation->set_rules('idtipo', 'Tipo', 'required',$required);
            $this->form_validation->set_rules('precio', 'Precio', 'required',$required);
            $this->form_validation->set_rules('cantidad', 'Cantidad', 'required',$required);
            
            //obteniendo informacion de la tupla a modificar
            $tabla = array('tabla' => 'producto', 'idcolum' => 'idproducto', 'id' => $id);
            $data['form'] = $this->Modelo_admin->get_row($tabla);
            $data['talla'] = $this->Modelo_admin->get_item(FALSE,'talla');
            $data['color'] = $this->Modelo_admin->get_item(FALSE,'color');
            $data['tipo']  = $this->Modelo_admin->get_item(FALSE,'tipo');
            
            //funcion para subir la imagen
            $imgurl = $data['form']['url'];
            
            $bandera = $this->do_upload($imgurl);
            
            
            if ($this->form_validation->run() == FALSE and $bandera['error'] != '')
            {
            
                //cargar el formulario
                $this->load->view('Plantilla/header',$data);
                $this->load->view('modificar-producto',$data);
                $this->load->view('Plantilla/footer');
            }
            else
            {
                $data = array(
                        'nombre_producto' => $this->input->post('nombre_producto'),
                        'precio' => $this->input->post('precio'),
                        'cantidad' => $this->input->post('cantidad'),
                        'color_idcolor' => $this->input->post('idcolor'),
                        'talla_idtalla' => $this->input->post('idtalla'),
                        'tipo_idtipo' => $this->input->post('idtipo'),
                        'url' => $imgurl
                        );
                $tabla = array(
                            'idcolum' => 'idproducto',
                            'id' => $id,
                            'nombre' => 'producto' 
                );
                
                //miniaturas de las imagenes
                $resize = array(
                            'marker' => '_min',
                            'width' => 431,
                            'height' => 278
                );
                $resize2 = array(
                            'marker' => '_min',
                            'width' => 800,
                            'height' => 700
                );
                
                $this->thumb($bandera,$resize);
                $this->thumb($bandera,$resize2);
                
                $this->Modelo_admin->entry_update($tabla,$data);
                
            }
        }
        
        
        
        public function agregar_producto($id = FALSE)
        {
                
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
            $this->form_validation->set_rules('idtipo', 'Tipo', 'required',$required);
            $this->form_validation->set_rules('precio', 'Precio', 'required',$required);
            $this->form_validation->set_rules('cantidad', 'Cantidad', 'required',$required);
            //$this->form_validation->set_rules('img','La imagen','required',$required);
            
            //funcion para subir la imagen
            $imgurl = $this->Modelo_admin->last_id_producto();
            echo $imgurl;
            $imgurl +=1;
            $bandera = $this->do_upload($imgurl);
            
            //si paso la validación
            if ($this->form_validation->run() == FALSE and $bandera['error'] != '' )
            {
                
                //cargar datos para los selects
                $data['talla']= $this->Modelo_admin->get_item(FALSE,'talla');
                $data['color']= $this->Modelo_admin->get_item(FALSE,'color');
                $data['tipo'] = $this->Modelo_admin->get_item(FALSE,'tipo');
                $data['error'] = $bandera;
                $data['post'] = $_POST;
                $data['file'] = $_FILES;
                //cargar el formulario
                $this->load->view('Plantilla/header',$data);
                $this->load->view('agregar-producto',$data);
                $this->load->view('Plantilla/footer');
            }
            else
            {
                
                
                $data = array(
                        'nombre_producto' => $this->input->post('nombre_producto'),
                        'precio' => $this->input->post('precio'),
                        'cantidad' => $this->input->post('cantidad'),
                        'color_idcolor' => $this->input->post('idcolor'),
                        'talla_idtalla' => $this->input->post('idtalla'),
                        'tipo_idtipo' => $this->input->post('idtipo'),
                        'url' => $imgurl
                        );
                //
                $resize = array(
                            'marker' => '_min',
                            'width' => 431,
                            'height' => 278
                );
                $resize2 = array(
                            'marker' => '_min',
                            'width' => 800,
                            'height' => 700
                );
                
                $this->thumb($bandera,$resize);
                $this->thumb($bandera,$resize2);
                //var_dump($bandera); 
                $this->Modelo_admin->set_data('producto',$data);
                
                redirect('sitio/admin');
                
            }
            
           
            
        }

        //$name nombre que se la dara al archivo en el servidor
        public function do_upload($name)
        {
                $config['upload_path']          = './img/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 0;
                $config['max_width']            = 0;
                $config['max_height']           = 0;
                $config['file_name']            = $name;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('file'))
                {
                        $data = array('error' => $this->upload->display_errors());

                        return $data;
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());

                        return $data;
                }
        }
 
        function thumb($data,$config)
        {
            $config['image_library'] = 'gd2';
            $config['source_image'] =$data['upload_data']['full_path'];
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['thumb_marker'] = $config['marker'];
            $config['width'] = $config['width'];
            $config['height'] = $config['height'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
        } 
        
    }
?>