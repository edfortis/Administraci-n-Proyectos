<?php
ini_set('display_errors', 1);
    class Cart extends CI_Controller{
        
       
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
        
        public function add_cart_item()
        {
            if($this->Modelo_admin->validate_add_cart_item() == TRUE)
            {
                // Check if user has javascript enabled
                if($this->input->post('ajax') != '1')
                {
                    redirect('cart'); // If javascript is not enabled, reload the page with new data
                }else{
                    echo 'true'; // If javascript is enabled, return true, so the cart gets updated
                }
            }
        }
        
        function update_cart()
        {
            $this->Modelo_admin->validate_update_cart();
            redirect('sitio/cargar/inicio');
        }
        
        function empty_cart()
        {
            $this->cart->destroy(); // Destroy all cart data
            //redirect('cart'); // Refresh te page
        }
        
        function show_cart()
        {
            $this->load->view('cart');
        }
        
    }
?>