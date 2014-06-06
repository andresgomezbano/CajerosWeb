<?php if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
class FormCajero_Registrar {
        
    public function initialize($banco = NULL)
    {
        $CI =& get_instance();
        $CI->load->helper('form');
        $existeObjeto = ($banco != NULL)?1:0;
        $this->id = form_hidden('id', ($existeObjeto)? $banco->id : $CI->input->post('id'));
        $this->nombre = form_input('nombre', ($existeObjeto)? $banco->nombre : $CI->input->post('nombre'));
        $this->estado = form_dropdown('estado', array('AC' => 'Activo', 'IN' => 'Inactivo'), ($existeObjeto)? $banco->estado : $CI->input->post('estado'));
    }
    
    public function es_valido($reload = FALSE)  
    {
        $CI =& get_instance();
        $CI->load->library('form_validation');
        $CI->form_validation->set_rules('nombre', 'Nombre', 'required');
        $valido = $CI->form_validation->run();
        if($reload || !$valido)$this->initialize();
        return $valido;
    }
    
    public function guardar()
    {
        $CI =& get_instance();
        $CI->load->model('Banco_class','banco',TRUE);
        $CI->banco->id = $CI->input->post('id');
        $CI->banco->nombre = $CI->input->post('nombre');
        $CI->banco->estado = $CI->input->post('estado');
        $CI->banco->guardar();
    }
}