<?php
class Cajero extends CI_Controller {
        
    public function index()
    {
        echo 'index';
    }
    
    public function mapa()
    {
        $this->load->library('banco/FormBanco_Mapa');
        $data['titulo'] = 'Consultar Cajeros';
        $data['form_banco'] = $this->formbanco_mapa;
        $data['contenido'] = $this->load->view('cajero_mapa',$data,true);
        $this->load->view('template/base',$data);
    }
    
    public function xml()
    {
        return;
        $url = 'http://broome.directrouter.com/~bancodel/mapa_bg2010/index.php?id_provincia=9&id_ciudad=901&id_categoria=5';
        $datos = simplexml_load_file($url);
        foreach($datos as $dato)
        {
            $atributos = $dato->attributes();
            $this->load->model('Cajero_class','cajero',TRUE);
            $this->cajero->banco_id = 4;
            $this->cajero->nombre = (string)$atributos['label'];
            $this->cajero->direccion = (string)$atributos['direccion']; 
            $this->cajero->latitud = $atributos['lat'];
            $this->cajero->longitud = ($atributos['lng'] != "")?$atributos['lng']:NULL ;
            $this->cajero->estado = 'AC';
            $this->cajero->guardar();
        }
    }
}
?>