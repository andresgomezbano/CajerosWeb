<?php if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
class FormCajero_Registrar {
        
    public function initialize($cajero = NULL)
    {
        $CI =& get_instance();
        $CI->load->helper(array('form','bancofield'));  
        $existeObjeto = ($cajero != NULL)?1:0;
        $this->id = form_hidden('id', ($existeObjeto)? $cajero->id : $CI->input->post('id'));
        $this->banco_id = BancoField('banco_id', ($existeObjeto)? $cajero->banco_id : $CI->input->post('banco_id'));
        $this->nombre = form_input('nombre', ($existeObjeto)? $cajero->nombre : $CI->input->post('nombre'));
        $this->horario = form_input('horario', ($existeObjeto)? $cajero->horario : $CI->input->post('horario'));
        $this->direccion = form_input('direccion', ($existeObjeto)? $cajero->direccion : $CI->input->post('direccion'));
        $this->latitud = form_input('latitud', ($existeObjeto)? $cajero->latitud : $CI->input->post('latitud'));
        $this->longitud = form_input('longitud', ($existeObjeto)? $cajero->longitud : $CI->input->post('longitud'));
        $this->estado = form_dropdown('estado', array('AC' => 'Activo', 'IN' => 'Inactivo'), ($existeObjeto)? $cajero->estado : $CI->input->post('estado'));
    }
    
    public function es_valido($reload = FALSE)  
    {
        $CI =& get_instance();
        $CI->load->library('form_validation');
        $CI->form_validation->set_rules('nombre', 'Nombre', 'required');
        $CI->form_validation->set_rules('direccion', 'Direccion', 'required');
        $CI->form_validation->set_rules('latitud', 'Latitud', 'required');
        $CI->form_validation->set_rules('longitud', 'Longitud', 'required');
        $valido = $CI->form_validation->run();
        if($reload || !$valido)$this->initialize();
        return $valido;
    }
    
    public function guardar()
    {
        $CI =& get_instance();
        $CI->load->model('Cajero_class','cajero',TRUE);
        $CI->cajero->id = $CI->input->post('id');
        $CI->cajero->banco_id = $CI->input->post('banco_id');
        $CI->cajero->nombre = $CI->input->post('nombre');
        $CI->cajero->horario = $CI->input->post('horario');
        $CI->cajero->direccion = $CI->input->post('direccion');
        $CI->cajero->latitud = $CI->input->post('latitud');
        $CI->cajero->longitud = $CI->input->post('longitud');
        $CI->cajero->estado = $CI->input->post('estado');
        $CI->cajero->guardar();
    }
}