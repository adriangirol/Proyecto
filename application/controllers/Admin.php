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
    
    
}

