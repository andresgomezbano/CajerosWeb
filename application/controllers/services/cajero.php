<?php
require(APPPATH.'libraries/REST_Controller.php');
class Cajero extends REST_Controller {

    public function consultar_get($idBanco)
    {
        $this->load->model('Cajero_class','negocio',TRUE);
        $data = $this->negocio->listado($idBanco);
        $this->response($data);
    }
    
    public function cercanos_post()
    {
        $latitud = $this->post('latitud');
        $longitud = $this->post('longitud');
        $coordenada = array('latitud' => $latitud,'longitud' => $longitud);
        $this->load->model('Posicion_class','posicion',TRUE);
        $this->posicion->initialize($coordenada);
        $this->posicion->guardar();
        
        $this->load->model('Cajero_class','negocio',TRUE);
        $data = $this->negocio->getCercanos($coordenada);
        $this->response($data);
    }
    
    public function cercanos_get($latitud,$longitud)
    {   
        $coordenada = array('latitud' => $latitud,'longitud' => $longitud);
        $this->load->model('Cajero_class','negocio',TRUE);
        $data = $this->negocio->getCercanos($coordenada);
        $this->response($data);
    }
}
?>
