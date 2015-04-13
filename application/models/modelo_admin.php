<?php
class Modelo_admin extends CI_Model {

    public function __construct()
    {
        
        $this->load->database();
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
    
    public function get_item($id = FALSE,$tabla){
        if ($id === FALSE)
        {
            $query = $this->db->get($tabla);
            return $query->result_array();
        }
    
        $query = $this->db->get_where($tabla, array('id' => $id));
        return $query->row_array();
    }
    function entry_update($file){
       
      $data = array(
            'titulo' => $this->input->post('titulo'),
            'url'=> $file['raw_name']
        );
       $this->db->where('id',$this->input->post('id'));
       $this->db->update('img',$data); 
     }
    function delete($id){
     
      $this->db->delete('img', array('id' => $id));
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
    
    
}
?>