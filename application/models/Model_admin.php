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
     public function MisUser(){
        
         $query=$this->db->query("SELECT * FROM usuarios;");
        return $query->result_array(); 
    }
    public function TraerLineasProducto($id){
        $query=$this->db->query("SELECT Nombre,Codigo,Precio,Categoria_Codigo  FROM productos WHERE Codigo= '".$id."'");
        return $query->result_array(); 
    }
    public function StockBajo(){
       $query=$this->db->query("SELECT * FROM productos WHERE Stock<10 ");
        return $query->result_array();  
        
    }
     public function Producto($id){
        
         $query=$this->db->query("SELECT * FROM productos WHERE codigo=".$id.";");
        return $query->result_array(); 
    }
}