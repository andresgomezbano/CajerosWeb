<?php if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
class FormBanco_Mapa {
    
    public function FormBanco_Mapa()
    {
        $CI =& get_instance();
        $CI->load->helper('bancofield');
        $this->banco = BancoField('banco');
    }
    
    public function getIdBanco()
    {
        $CI =& get_instance();
        return  $CI->input->post('banco');
    }
}