<?php
class Cajero extends CI_Controller {
        
    public function index()
    {
        $this->load->library('banco/FormBanco_Mapa');
        $data['form_banco'] = $this->formbanco_mapa;
        
         if ($_SERVER['REQUEST_METHOD'] === 'POST')
         {
             $this->load->model('cajero_class','cajero',TRUE);
             $idBanco = $this->formbanco_mapa->getIdBanco();
             $data['cajeros'] = $this->cajero->listado($idBanco);
         }
           
        $data['titulo'] = 'Consultar Cajeros';
        $data['contenido'] = $this->load->view('cajeros_consultar',$data,true);
        $this->load->view('template/base',$data);
    }
    
    public function editar($idCajero)
    {
        $this->load->library('cajero/FormCajero_Registrar');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if($this->formcajero_registrar->es_valido())
            {
                $this->formcajero_registrar->guardar();
                redirect('/cajero/');
            }
        }
        else {
            $this->load->model('cajero_class','cajero',TRUE);
            $this->cajero->consultar($idCajero);
            $this->formcajero_registrar->initialize($this->cajero);
            $data['cajero'] = $this->cajero;
        }
        
        $data['titulo'] = 'Editar Cajero';
        $data['form'] = $this->formcajero_registrar;
        $data['contenido'] = $this->load->view('cajero_registrar',$data,true);
        $this->load->view('template/base',$data);
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
            $this->load->model('cajero_class','cajero',TRUE);
            $this->cajero->id = NULL;
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