<?php
class Modelo_admin extends CI_Model {

    public function __construct()
    {
        
        $this->load->database();
        $this->load->library('cart');
    }
    
    public function last_id_producto()
    {
        $tabla = array('id' => FALSE, 
                       'tabla' => 'producto',
                       );  
        $array = $this->get_row($tabla);
        foreach ($array as $arrays) {
            $id = $arrays['idproducto'];
        }
        return $id;
    }
    
    public function guardar_datos($file)
    {
        $slug = url_title($this->input->post('title'), 'dash', TRUE);
        $url = $file['raw_name'].'_thumb'.$file['file_ext'];
        $data = array(
            'titulo' => $this->input->post('titulo'),
            'url'=> $url
        );
    
        return $this->db->insert('img', $data);
    }
    //array para configuracion de la funcion
    // array = ('tabla' => tablaname, 'idcolum'=>idcolumname, 'id' => idnumber)
    public function get_row($tabla)
    {
        if($tabla['id'] == FALSE)
        {
            $query = $this->db->get($tabla['tabla']);
            return $query->result_array();
        }
        $query = $this->db->get_where($tabla['tabla'],array($tabla['idcolum'] => $tabla['id']));
        
        return $query->row_array();    
    }
    public function get_items($tabla){
        $query = $this->db->get_where($tabla['tabla'],array($tabla['idcolum'] => $tabla['id']));
        return $query->result();
    }
    
    public function get_item($id = FALSE,$tabla){
        if ($id === FALSE)
        {
            $query = $this->db->get($tabla);
            return $query->result_array();
        }
    
        $query = $this->db->get_where($tabla, array('id' => $id));
        return $query->row_array();
    }
    //array('idcolum' => 'idcolumna', 'id' => 'idvalue', 'nombre' => 'nombretabla')
    function entry_update($tabla,$data){
       $this->db->where($tabla['idcolum'],$tabla['id']);
       $this->db->update($tabla['nombre'],$data); 
     }
    function entry_delete($tabla){
     
      $this->db->delete($tabla['nombre'], array($tabla['idcolum'] => $tabla['id']));
    }
    // Count all record of table "contact_info" in database.
    public function record_count($table = 'img') 
    {
        return $this->db->count_all($table);
    }
    
    // Fetch data according to per_page limit.
    public function fetch_data($limit, $start,$tabla) 
    {
        
        $this->db->limit($limit, $start);
        $query = $this->db->get($tabla);
 
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
    
    public function set_data($tabla,$data)
    {
        $this->load->helper('url');
        
        
    
        return $this->db->insert($tabla, $data);
    }
    
    // Add an item to the cart
    function validate_add_cart_item()
    {
     
        $id = $this->input->post('product_id'); // Assign posted product_id to $id
        $cty = $this->input->post('quantity'); // Assign posted quantity to $cty
         
        $this->db->where('idproducto', $id); // Select where id matches the posted id
        $query = $this->db->get('producto', 1); // Select the products where a match is found and limit the query by 1
         
        // Check if a row has matched our product id
        if($query->num_rows > 0){
         
        // We have a match!
            foreach ($query->result() as $row)
            {
                // Create an array with product information
                $data = array(
                    'id'      => $id,
                    'qty'     => $cty,
                    'price'   => $row->precio,
                    'name'    => $row->nombre_producto
                );
     
                // Add the data to the cart using the insert function that is available because we loaded the cart library
                $this->cart->insert($data); 
                 
                return TRUE; // Finally return TRUE
            }
         
        }else{
            // Nothing found! Return FALSE! 
            return FALSE;
        }
    
    }
    function get_usuario($data)
    {
       extract($data);
       $this -> db -> select('idUsuario, nickname, contrasena, perfil, activado');
       $this -> db -> from('Usuario');
       $this -> db -> where('nickname', $nickname);
       $this -> db -> where('contrasena',$pass);
       $this -> db -> limit(1);
     
       $query = $this -> db -> get();
     
       if($query -> num_rows() == 1)
       {
         return $query->result();
       }
       else
       {
         return false;
       }
    }
    // Updated the shopping cart
    function validate_update_cart()
    {
         
        // Get the total number of items in cart
        $total = $this->cart->total_items();
         
        // Retrieve the posted information
        $item = $this->input->post('rowid');
        $qty = $this->input->post('qty');
     
        // Cycle true all items and update them
        for($i=0;$i < $total;$i++)
        {
            // Create an array with the products rowid's and quantities. 
            $data = array(
               'rowid' => $item[$i],
               'qty'   => $qty[$i]
            );
             
            // Update the cart with the new information
            $this->cart->update($data);
        }
 
    }    
}
?>