<?php if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
class FormCajero_Mapa {
        
    public function guardar()
    {
        $CI =& get_instance();
        $idCajeros = $CI->input->post('cajero_id');
        $latitudCajeros = $CI->input->post('cajero_latitud');
        $longitudCajeros = $CI->input->post('cajero_longitud');
        $cajerosEliminar = $CI->input->post('cajeros_eliminar');
        $this->eliminarCajeros($cajerosEliminar);
        $n = count($idCajeros);
        for($i=0;$i<$n;$i++)
        {
            $CI->load->model('Cajero_class','cajero',TRUE);
            $CI->cajero->id = $idCajeros[$i];
            $CI->cajero->latitud = $latitudCajeros[$i];
            $CI->cajero->longitud = $longitudCajeros[$i];
            $CI->cajero->guardar();
        }
    }
    
    private function eliminarCajeros($string)
    {
        $CI =& get_instance();
        $CI->load->model('Cajero_class','cajero',TRUE);
        $idCajeros = split(",",$string);
        $n = count($idCajeros);
        for($i=0;$i<$n;$i++)
        {
            $CI->cajero->eliminar($idCajeros[$i]);
        }
    }
}