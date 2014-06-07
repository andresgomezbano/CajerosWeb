<?php if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
class FormBanco_Mapa {
    
    public function FormBanco_Mapa()
    {
        $CI =& get_instance();
        $CI->load->helper('form');
        $CI->load->model('Banco_class','banco',TRUE);
        $bancos = $CI->banco->listado();
        $datos = array();
        foreach($bancos as $banco)
        {
            $datos[$banco->id] = $banco->nombre;
        }
        $this->banco = form_dropdown('banco', $datos);
    }
    
    
    public function getIdBanco()
    {
        $CI =& get_instance();
        return  $CI->input->post('banco');
    }
}