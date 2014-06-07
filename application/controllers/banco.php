<?php
class Banco extends CI_Controller {
        
    public function index()
    {
        $this->load->model('banco_class','banco',TRUE);
        $data['titulo'] = 'Consultar Bancos';
        $data['bancos'] = $this->banco->listado();
        $data['contenido'] = $this->load->view('bancos_consultar',$data,true);
        $this->load->view('template/base',$data);
    }
    
    public function nuevo()
    {
        $this->load->library('banco/FormBanco_Registrar');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if($this->formbanco_registrar->es_valido())
            {
                $this->formbanco_registrar->guardar();
                redirect('/banco/');
            }
        }
        else $this->formbanco_registrar->initialize();
        $data['titulo'] = 'Ingresar Banco';
        $data['form'] = $this->formbanco_registrar;
        $data['contenido'] = $this->load->view('banco_registrar',$data,true);
        $this->load->view('template/base',$data);
    }
    
    public function editar($id=NULL)
    {
        $this->load->library('banco/FormBanco_Registrar');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if($this->formbanco_registrar->es_valido())
            {
                $this->formbanco_registrar->guardar();
                redirect('/banco/');
            }
        }
        else {
            $this->load->model('banco_class','banco',TRUE);
            $this->banco->consultar($id);
            $this->formbanco_registrar->initialize($this->banco);
        }
        
        $data['titulo'] = 'Editar Banco';
        $data['form'] = $this->formbanco_registrar;
        $data['contenido'] = $this->load->view('banco_registrar',$data,true);
        $this->load->view('template/base',$data);
        
    }
    
    
}
?>