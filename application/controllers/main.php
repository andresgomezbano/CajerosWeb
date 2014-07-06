<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

    public function index()
    {
        $this->load->model('Posicion_class','posicion',TRUE);
        $data['consultas'] = $this->posicion->listado();
        
        $data['titulo'] = 'Últimas Consultas';
        $data['contenido'] = $this->load->view('main_view',$data,true);
        $this->load->view('template/base',$data);
    }
}