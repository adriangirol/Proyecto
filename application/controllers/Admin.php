<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controlador central de la aplicacion.
 */
class Admin extends CI_Controller {

    public function index() {
        $this->load->helper('url');
        $this->load->model('Model_admin', "tienda");
        $cuerpo = $this->load->view('pages/Bienvenida', '', true);

        $misalert = $this->tienda->StockBajo();
        $alert = $this->load->view('pages/Alerta_stock', Array('alert' => $misalert), true);
        $this->load->view('pages/indexAdmin', Array('alert' => $alert, 'cuerpo' => $cuerpo));
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
            $misalert = $this->tienda->StockBajo();
            $alert = $this->load->view('pages/Alerta_stock', Array('alert' => $misalert), true);
            $this->load->view('pages/indexAdmin', Array('alert' => $alert, 'cuerpo' => $cuerpo));
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
            $cuerpo = $this->load->view('pages/Producto_Insertado_v', '', true);
            $misalert = $this->tienda->StockBajo();
            $alert = $this->load->view('pages/Alerta_stock', Array('alert' => $misalert), true);
            $this->load->view('pages/indexAdmin', Array('alert' => $alert, 'cuerpo' => $cuerpo));
        }
    }

    public function NewCategoria() {

        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('Model_admin', "tienda"); //modelo de la aplicacion.
        $num = $this->tienda->Num_categoria();

        $this->form_validation->set_rules('nombre', 'nombre', 'required');
        $this->form_validation->set_rules('Descripcion', 'Descripcion', 'required');





        if ($this->form_validation->run() == FALSE) {
            $cuerpo = $this->load->view('pages/NewCategoria_v', Array('num' => $num), true);
            $misalert = $this->tienda->StockBajo();
            $alert = $this->load->view('pages/Alerta_stock', Array('alert' => $misalert), true);
            $this->load->view('pages/indexAdmin', Array('alert' => $alert, 'cuerpo' => $cuerpo));
        } else {



            //Recogemos los datos para insertar.
            $nombre = $this->input->post('nombre');

            $Ds = $this->input->post('Descripcion');

            $cd = $this->input->post('codigo');
            //Metemos los datos en un array para la inserccion.
            $datos = array(
                'Codigo' => $num,
                'Nombre' => $nombre,
                'Descripcion' => $Ds,
            );

            $this->tienda->InsertCategorias($datos);
            $cuerpo = $this->load->view('pages/Producto_Insertado_v', '', true);
            $misalert = $this->tienda->StockBajo();
            $alert = $this->load->view('pages/Alerta_stock', Array('alert' => $misalert), true);
            $this->load->view('pages/indexAdmin', Array('alert' => $alert, 'cuerpo' => $cuerpo));
        }
    }

    public function VerProductos() {
        $this->load->helper('url');
        $this->load->model('Model_admin', "tienda");
        $this->load->library('form_validation');
        $this->load->helper('form');
        
        $this->form_validation->set_rules('id', 'id', 'required');
        
        if ($this->form_validation->run() === FALSE) {
            $misproductos = $this->tienda->MisProductos();
           

            //indexamos los pedidos para mandarlos a la vista.
//            echo "<pre>";
//             print_r($mispedidos);
//            echo"</pre>";

            $cuerpo = $this->load->view('pages/Mis_productos_v', Array('misproductos' => $misproductos), true);
            $misalert = $this->tienda->StockBajo();
            $alert = $this->load->view('pages/Alerta_stock', Array('alert' => $misalert), true);
            $this->load->view('pages/indexAdmin', Array('alert' => $alert, 'cuerpo' => $cuerpo));
        } else {
            //Si la validación es correcta, cogemos los datos de la variable POST
            //y los enviamos al modelo
            $id = $this->input->post('id');
            $nombre = $this->input->post('nombre');
            $precio=$this->input->post('precio');
            $cat=$this->input->post('cat');
           $this->ModificarProducto($id, $nombre, $precio, $cat);
           
           $misproductos = $this->tienda->MisProductos();
           

            //indexamos los pedidos para mandarlos a la vista.
//            echo "<pre>";
//             print_r($mispedidos);
//            echo"</pre>";

            $cuerpo = $this->load->view('pages/Mis_productos_v', Array('misproductos' => $misproductos), true);
            $misalert = $this->tienda->StockBajo();
            $alert = $this->load->view('pages/Alerta_stock', Array('alert' => $misalert), true);
            $this->load->view('pages/indexAdmin', Array('alert' => $alert, 'cuerpo' => $cuerpo));
            
        }
    }


    public function MostrarUser() {
        $this->load->helper('url');
        $this->load->model('Model_admin', "tienda");
        $misuser = $this->tienda->MisUser();


        //indexamos los user para mandarlos a la vista.
//            echo "<pre>";
//             print_r($mispedidos);
//            echo"</pre>";

        $cuerpo = $this->load->view('pages/Mis_usuarios_v', Array('misuser' => $misuser), true);
        $misalert = $this->tienda->StockBajo();
        $alert = $this->load->view('pages/Alerta_stock', Array('alert' => $misalert), true);
        $this->load->view('pages/indexAdmin', Array('alert' => $alert, 'cuerpo' => $cuerpo));
    }

    public function MostrarUnProducto($id) {
        $this->load->helper('url');
        $this->load->model('Model_admin', "tienda");
        $misproductos = $this->tienda->Producto($id);


        //indexamos los pedidos para mandarlos a la vista.
//            echo "<pre>";
//             print_r($mispedidos);
//            echo"</pre>";

        $cuerpo = $this->load->view('pages/Mis_productos_v', Array('misproductos' => $misproductos), true);
        $misalert = $this->tienda->StockBajo();
        $alert = $this->load->view('pages/Alerta_stock', Array('alert' => $misalert), true);
        $this->load->view('pages/indexAdmin', Array('alert' => $alert, 'cuerpo' => $cuerpo));
    }

    public function Enviados() {
        $this->load->helper('url');
        $this->load->model('Model_admin', "tienda");
        $mispedidos = $this->tienda->PedidosEnviados();

        //indexamos los pedidos para mandarlos a la vista.
        foreach ($mispedidos as $idx => $pedido) {

            $mispedidos[$idx]['lineas'] = $this->tienda->TraerLineasPedido($mispedidos[$idx]['codigo_pedido']);
        }

        $cuerpo = $this->load->view('pages/Mis_enviados_v', Array('mispedidos' => $mispedidos), true);
        $misalert = $this->tienda->StockBajo();
        $alert = $this->load->view('pages/Alerta_stock', Array('alert' => $misalert), true);
        $this->load->view('pages/indexAdmin', Array('alert' => $alert, 'cuerpo' => $cuerpo));
    }

    public function Categorias() {
        $this->load->helper('url');
        $this->load->model('Model_admin', "tienda");
        $miscategorias = $this->tienda->Miscategorias();


        //indexamos los pedidos para mandarlos a la vista.
//            echo "<pre>";
//             print_r($mispedidos);
//            echo"</pre>";

        $cuerpo = $this->load->view('pages/Mis_categorias_v', Array('miscategorias' => $miscategorias), true);
        $misalert = $this->tienda->StockBajo();
        $alert = $this->load->view('pages/Alerta_stock', Array('alert' => $misalert), true);
        $this->load->view('pages/indexAdmin', Array('alert' => $alert, 'cuerpo' => $cuerpo));
    }

    public function Pendientes() {
        $this->load->helper('url');
        $this->load->model('Model_admin', "tienda");
        $mispedidos = $this->tienda->PedidosPendientes();

        //indexamos los pedidos para mandarlos a la vista.
        foreach ($mispedidos as $idx => $pedido) {

            $mispedidos[$idx]['lineas'] = $this->tienda->TraerLineasPedido($mispedidos[$idx]['codigo_pedido']);
        }

        $cuerpo = $this->load->view('pages/Mis_pendientes_v', Array('mispedidos' => $mispedidos), true);
        $misalert = $this->tienda->StockBajo();
        $alert = $this->load->view('pages/Alerta_stock', Array('alert' => $misalert), true);
        $this->load->view('pages/indexAdmin', Array('alert' => $alert, 'cuerpo' => $cuerpo));
    }

    public function EnvioPedido($id) {
        $this->load->helper('url');
        $this->load->model('Model_admin', "tienda");

        $this->tienda->Enviar($id);
        $mispedidos = $this->tienda->PedidosPendientes();

        //indexamos los pedidos para mandarlos a la vista.
        foreach ($mispedidos as $idx => $pedido) {

            $mispedidos[$idx]['lineas'] = $this->tienda->TraerLineasPedido($mispedidos[$idx]['codigo_pedido']);
        }

        $cuerpo = $this->load->view('pages/Mis_pendientes_v', Array('mispedidos' => $mispedidos), true);
        $misalert = $this->tienda->StockBajo();
        $alert = $this->load->view('pages/Alerta_stock', Array('alert' => $misalert), true);
        $this->load->view('pages/indexAdmin', Array('alert' => $alert, 'cuerpo' => $cuerpo));
    }

    public function CancelarPedido($id) {
        $this->load->helper('url');
        $this->load->model('Model_admin', "tienda");

        $this->tienda->Cancelar($id);
        $mispedidos = $this->tienda->PedidosPendientes();

        //indexamos los pedidos para mandarlos a la vista.
        foreach ($mispedidos as $idx => $pedido) {

            $mispedidos[$idx]['lineas'] = $this->tienda->TraerLineasPedido($mispedidos[$idx]['codigo_pedido']);
        }

        $cuerpo = $this->load->view('pages/Mis_pendientes_v', Array('mispedidos' => $mispedidos), true);
        $misalert = $this->tienda->StockBajo();
        $alert = $this->load->view('pages/Alerta_stock', Array('alert' => $misalert), true);
        $this->load->view('pages/indexAdmin', Array('alert' => $alert, 'cuerpo' => $cuerpo));
    }

    public function VolverPedido($id) {
        $this->load->helper('url');
        $this->load->model('Model_admin', "tienda");

        $this->tienda->Volverpendiente($id);
        $mispedidos = $this->tienda->PedidosEnviados();

        //indexamos los pedidos para mandarlos a la vista.
        foreach ($mispedidos as $idx => $pedido) {

            $mispedidos[$idx]['lineas'] = $this->tienda->TraerLineasPedido($mispedidos[$idx]['codigo_pedido']);
        }

        $cuerpo = $this->load->view('pages/Mis_enviados_v', Array('mispedidos' => $mispedidos), true);
        $misalert = $this->tienda->StockBajo();
        $alert = $this->load->view('pages/Alerta_stock', Array('alert' => $misalert), true);
        $this->load->view('pages/indexAdmin', Array('alert' => $alert, 'cuerpo' => $cuerpo));
    }

    public function Del_producto($confir) {
        $this->load->helper('url');
        $this->load->model('Model_admin', "tienda");

        if ($confir == "NO") {
            $this->VerProductos();
        } else {
            $this->tienda->DeleteProducto($_SESSION['id']);
            $_SESSION['id'] = false;
            $this->VerProductos();
        }
    }

    public function EstasSeguroPro($id) {

        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('Model_admin', "tienda"); //modelo de la aplicacion.

        $_SESSION['id'] = $id;

        $cuerpo = $this->load->view('pages/EstasSeguro_v', '', true);
        $misalert = $this->tienda->StockBajo();
        $alert = $this->load->view('pages/Alerta_stock', Array('alert' => $misalert), true);
        $this->load->view('pages/indexAdmin', Array('alert' => $alert, 'cuerpo' => $cuerpo));
    }

    public function EstasSeguroCat($id) {
        $this->load->helper('url');

        $this->load->model('Model_admin', "tienda"); //modelo de la aplicacion.

        $_SESSION['id'] = $id;

        $cuerpo = $this->load->view('pages/EstasSeguroCat_v', '', true);
        $misalert = $this->tienda->StockBajo();
        $alert = $this->load->view('pages/Alerta_stock', Array('alert' => $misalert), true);
        $this->load->view('pages/indexAdmin', Array('alert' => $alert, 'cuerpo' => $cuerpo));
    }

    public function EstasSeguroUser($id) {

        $this->load->helper('url');

        $this->load->model('Model_admin', "tienda"); //modelo de la aplicacion.

        $_SESSION['id'] = $id;

        $cuerpo = $this->load->view('pages/EstasSeguroCat_v', '', true);
        $misalert = $this->tienda->StockBajo();
        $alert = $this->load->view('pages/Alerta_stock', Array('alert' => $misalert), true);
        $this->load->view('pages/indexAdmin', Array('alert' => $alert, 'cuerpo' => $cuerpo));
    }

    public function Del_user($confir) {
        $this->load->helper('url');
        $this->load->model('Model_admin', "tienda");

        if ($confir == "NO") {
            $this->MostrarUser();
        } else {
            $this->tienda->DeleteUser($_SESSION['id']);
            $_SESSION['id'] = false;
            $this->MostrarUser();
        }
    }

    public function Del_Cat($confir) {
        $this->load->helper('url');
        $this->load->model('Model_admin', "tienda");

        if ($confir == "NO") {
            $this->Categorias();
        } else {
            $this->tienda->DeleteCat($_SESSION['id']);
            $_SESSION['id'] = false;
            $this->Categorias();
        }
    }

    
      public function ModificarProducto($id,$nombre,$precio,$cat) {
      
            $this->load->model('Model_admin', "tienda");

          $cambios=Array(
              'Nombre'=>$nombre,
              'Codigo'=>$id,
              'Precio'=>$precio,
              'Categoria_Codigo'=>$cat
          );
            
        $this->tienda->UpdatePro($id,$cambios);
     


      } 
}
