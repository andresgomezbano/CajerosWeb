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
        $this->load->model('Cajero_class','negocio',TRUE);
        $data = $this->negocio->getCercanos(array('latitud' => $latitud,'longitud' => $longitud));
        $this->response($data);
    }
}
?>
