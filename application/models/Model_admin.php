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
     public function InsertCategorias($datos){
       
       $this->db->insert('categorias',$datos);
    }
    public function Num_categoria(){
        
         $query=$this->db->query("SELECT count(*) as numero  FROM categorias;");
        return $query->row_array()['numero']; 
    }
    public function Misproductos(){
        
         $query=$this->db->query("SELECT * FROM productos WHERE Eliminado<>'S' OR ELiminado is NULL;");
        return $query->result_array(); 
    }
     public function MisUser(){
        
         $query=$this->db->query("SELECT * FROM usuarios WHERE Borrado is null OR Borrado<>'S';");
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
     public function Pedidospendientes(){
        
         $query=$this->db->query("SELECT pedidos.codigo_pedido,pedidos.fecha,usuarios.Nombre,pedidos.Estado,
                                        CONCAT(usuarios.Direccion,', ',usuarios.Provincias) as destino 
                                            FROM pedidos,usuarios 
                                                WHERE pedidos.Compradores_codigo=usuarios.codigo and pedidos.estado='NP';");
        return $query->result_array(); 
    }
    public function TraerLineasPedido($idpedido){
        $query=$this->db->query("SELECT Nombre,Cantidad,Importe,Pedidos_codigo_pedido, Precio FROM lineas_de_pedido,productos WHERE lineas_de_pedido.Productos_Codigo=productos.Codigo AND Pedidos_codigo_pedido= '".$idpedido."'");
        return $query->result_array(); 
    }
     public function PedidosEnviados(){
        
         $query=$this->db->query("SELECT pedidos.codigo_pedido,pedidos.fecha,pedidos.fecha_envio,usuarios.Nombre,pedidos.Estado,
                                        CONCAT(usuarios.Direccion,', ',usuarios.Provincias) as destino 
                                            FROM pedidos,usuarios 
                                                WHERE pedidos.Compradores_codigo=usuarios.codigo and pedidos.estado='EN';");
        return $query->result_array(); 
    }
     public function Miscategorias(){
        
         $query=$this->db->query("SELECT * FROM categorias WHERE Oculto is NULL OR Oculto<>'S';");
        return $query->result_array(); 
    }
    public function PedidoConLineas($id){
        
        $query=$this->db->query("Select productos.Nombre as Nombre, pedidos.fecha as fecha, productos.Precio as Precio,lineas_de_pedido.Cantidad as Cantidad from pedidos,lineas_de_pedido,productos WHERE pedidos.codigo_pedido=lineas_de_pedido.Pedidos_codigo_pedido AND lineas_de_pedido.Productos_Codigo=productos.Codigo and pedidos.codigo_pedido=".$id.";");
        return $query->result_array(); 
        
    }
    public function Enviar($id){
        
        $q='UPDATE pedidos SET Estado="EN" WHERE codigo_pedido="'.$id.'";';
        $this->db->query($q);
    }
    public function Cancelar($id){
        
        $q='UPDATE pedidos SET Estado="CN" WHERE codigo_pedido="'.$id.'";';
        $this->db->query($q);
    }
    public function Volverpendiente($id){
        $q='UPDATE pedidos SET Estado="NP" WHERE codigo_pedido="'.$id.'";';
        $this->db->query($q);
    }
    public function DeleteProducto($id){
        
         $q='UPDATE productos SET Eliminado="S" WHERE Codigo="'.$id.'";';
        $this->db->query($q);
    }
    public function DeleteUser($id){
        
         $q='UPDATE usuarios SET Borrado="S" WHERE Codigo='.$id.';';
         
        $this->db->query($q);
    }
    public function DeleteCat($id){
        
        $q='UPDATE categorias SET Oculto="S" WHERE Codigo='.$id.';';
         
        $this->db->query($q);
    }
     public function UpdatePro($id,$datos){
        $this->db->where('Codigo', $id);
        $this->db->update('Productos', $datos); 
    }
}