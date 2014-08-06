<?php
require(APPPATH.'libraries/REST_Controller.php');
class Banco extends REST_Controller {

    public function consultar_get()
    {
        $this->load->model('Banco_class','banco',TRUE);
        $data = $this->banco->listado();
        $this->response($data);
    }
}
?>
