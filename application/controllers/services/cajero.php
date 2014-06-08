<?php
require(APPPATH.'libraries/REST_Controller.php');
class Cajero extends REST_Controller {

    public function consultar_get($idBanco)
    {
        $this->load->model('Cajero_class','negocio',TRUE);
        $data = $this->negocio->listado($idBanco);
        $this->response($data);
    }
}
?>
