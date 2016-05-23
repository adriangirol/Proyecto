<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controlador central de la aplicacion.
 */
class Admin extends CI_Controller {

    public function index() {
        $this->load->helper('url');
        $this->load->view('pages/indexAdmin');
    }

    public function NewProducto() {

        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('Model_admin', "tienda"); //modelo de la aplicacion.
       
        $this->form_validation->set_rules('Categoria', 'Categoria', 'required');
        $this->form_validation->set_rules('Precio', 'Precio', 'required');
        $this->form_validation->set_rules('nombre', 'nombre', 'required');
        $this->form_validation->set_rules('Imagen', 'Imagen', 'required');
        $this->form_validation->set_rules('IVA', 'IVA', 'required');
        $this->form_validation->set_rules('Descripcion', 'Descripcion', 'required');
        $this->form_validation->set_rules('Stock', 'Stock', 'required');
       



        if ($this->form_validation->run() == FALSE) {
            $cuerpo = $this->load->view('pages/NewProducto_v', '', true);
            $this->load->view('pages/indexAdmin', Array('cuerpo' => $cuerpo));
        } else {



            //Recogemos los datos para insertar.
            $nombre = $this->input->post('nombre');
            $cat = $this->input->post('Categoria');
            $Im = $this->input->post('Imagen');
            $Pr = $this->input->post('Precio');
            $Ds = $this->input->post('Descripcion');
            $St = $this->input->post('Stock');
            $Dt = $this->input->post('Destacado');
            $IVA = $this->input->post('IVA');
            //Metemos los datos en un array para la inserccion.
            $datos = array(
                'Nombre' => $nombre,
                'Precio' => $Pr,
                'Imagen_Producto' => $Im,
                'IVA' => $IVA,
                'Descripcion' => $Ds,
                'Categoria_Codigo' => $cat,
                'Stock' => $St,
                'Destacado' => $Dt
            );
            
            $this->tienda->InsertProducto($datos);
            $cuerpo=$this->load->view('pages/Producto_Insertado_v','',true);
                    $this->load->view('pages/IndexAdmin', Array('cuerpo' => $cuerpo));
        }
        
    }
     public function VerProductos(){
        $this->load->helper('url');
        $this->load->model('Model_admin', "tienda");
        $misproductos=$this->tienda->MisProductos();
        
       
          //indexamos los pedidos para mandarlos a la vista.
      
//            echo "<pre>";
//             print_r($mispedidos);
//            echo"</pre>";
             
        $cuerpo= $this->load->view('pages/Mis_productos_v',Array('misproductos'=>$misproductos), true);
        $this->load->view('pages/IndexAdmin', Array('cuerpo' => $cuerpo)); 
    }

}
