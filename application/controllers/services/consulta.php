<?php
require(APPPATH.'libraries/REST_Controller.php');
class Consulta extends REST_Controller {

    public function nuevas_post()
    {
        $fecha = $this->post('fecha');
        $this->load->model('Posicion_class','posicion',TRUE);
        $data = $this->posicion->listado($fecha);
        $this->response($data);
    }
}
?>
