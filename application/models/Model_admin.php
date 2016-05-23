<?php
/**
 * Modelo de nuestra tienda el cual interactuara con la base de datos
 * tienda_online , sera el encargado de todas las operaciones con ella.
 */
class Model_admin extends CI_Model{
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function InsertProducto($datos){
       
       $this->db->insert('productos',$datos);
    }
    public function Misproductos(){
        
         $query=$this->db->query("SELECT * FROM productos;");
        return $query->result_array(); 
    }
    public function TraerLineasProducto($id){
        $query=$this->db->query("SELECT Nombre,Codigo,Precio,Categoria_Codigo  FROM productos WHERE Codigo= '".$id."'");
        return $query->result_array(); 
    }
}