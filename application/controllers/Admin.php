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
    public function NewProducto(){
        
         $this->load->helper('url');
         $this->load->library('form_validation');      
         $this->load->model('Model_tienda', "tienda");//modelo de la aplicacion.
         
         
         $this->form_validation->set_rules('user','user', 'required');
                if(!isset($_SESSION['modificando'])|| $_SESSION['modificando']==false){
                    $this->form_validation->set_rules('contrasena', 'contrasena', 'required');
                }
                $this->form_validation->set_rules('email', 'email', 'required');
                $this->form_validation->set_rules('DNI', 'DNI', 'required');
                $this->form_validation->set_rules('nombre', 'nombre', 'required');
                $this->form_validation->set_rules('direccion', 'direccion', 'required');
                $this->form_validation->set_rules('CP', 'CP', 'required');
                $this->form_validation->set_rules('provincia','provincia','required');
               
                
                
                if ($this->form_validation->run() == FALSE)
                {
                    $cuerpo=$this->load->view('pages/NewProducto_v','',true);
                    $this->load->view('pages/indexAdmin', Array('cuerpo' => $cuerpo));
                }
                else
                {
                   if($_SESSION['modificando']==false ||$_SESSION['modificando']=="" )
                   {
                    
                    
                    //Recogemos los datos para insertar.
                    $login=$this->input->post('user');
                    $contrasena=$this->input->post('contrasena');
                    $email=$this->input->post('email');
                    $dni= $this->input->post('DNI');
                    $nombre=$this->input->post('nombre');
                    $direccion=$this->input->post('direccion');
                    $CP= $this->input->post('CP');
                    $provincia=$this->input->post('provincia');
                    //Metemos los datos en un array para la inserccion.
                    $datos=array(
                        'DNI'=>$dni,
                        'Nombre'=>$nombre,
                        'Nombre_usuario'=>$login,
                        'Contrasena'=>$contrasena,
                        'Correo'=>$email,
                        'Direccion'=>$direccion,
                        'CP'=>$CP,
                        'Provincias'=>$provincia
                        
                   );
        
        
        
    }
                } 
    }
}
    

  
