<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

    public function index()
    {
        $data['titulo'] = 'Cajeros de Guayaquil';
        $data['contenido'] = $this->load->view('main_view',$data,true);
        $this->load->view('template/base',$data);
    }
}