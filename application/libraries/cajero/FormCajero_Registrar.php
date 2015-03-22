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
        
        $this->banred = form_checkbox('banred', '1', ($existeObjeto)? $cajero->banred : $CI->input->post('banred'));
        $this->pacificard = form_checkbox('pacificard', '1', ($existeObjeto)? $cajero->pacificard : $CI->input->post('pacificard'));
        $this->american_express = form_checkbox('american_express', '1', ($existeObjeto)? $cajero->american_express : $CI->input->post('american_express'));
        $this->bankard = form_checkbox('bankard', '1', ($existeObjeto)? $cajero->bankard : $CI->input->post('bankard'));
        $this->nexo = form_checkbox('nexo', '1', ($existeObjeto)? $cajero->nexo : $CI->input->post('nexo'));
        $this->visa_debito = form_checkbox('visa_debito', '1', ($existeObjeto)? $cajero->visa_debito : $CI->input->post('visa_debito'));
        $this->visa = form_checkbox('visa', '1', ($existeObjeto)? $cajero->visa : $CI->input->post('visa'));
        $this->plus = form_checkbox('plus', '1', ($existeObjeto)? $cajero->plus : $CI->input->post('plus'));
        $this->mastercard = form_checkbox('mastercard', '1', ($existeObjeto)? $cajero->mastercard : $CI->input->post('mastercard'));
        $this->cirrus = form_checkbox('cirrus', '1', ($existeObjeto)? $cajero->cirrus : $CI->input->post('cirrus'));
        $this->maestro = form_checkbox('maestro', '1', ($existeObjeto)? $cajero->maestro : $CI->input->post('maestro'));
        $this->diners = form_checkbox('diners', '1', ($existeObjeto)? $cajero->diners : $CI->input->post('diners'));
        
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
        
        $CI->cajero->banred = $CI->input->post('banred');
        $CI->cajero->pacificard = $CI->input->post('pacificard');
        $CI->cajero->american_express = $CI->input->post('american_express');
        $CI->cajero->bankard = $CI->input->post('bankard');
        $CI->cajero->nexo = $CI->input->post('nexo');
        $CI->cajero->visa_debito = $CI->input->post('visa_debito');
        $CI->cajero->visa = $CI->input->post('visa');
        $CI->cajero->plus = $CI->input->post('plus');
        $CI->cajero->mastercard = $CI->input->post('mastercard');
        $CI->cajero->cirrus = $CI->input->post('cirrus');
        $CI->cajero->maestro = $CI->input->post('maestro');
        $CI->cajero->diners = $CI->input->post('diners');

        $CI->cajero->guardar();
        return $CI->cajero;
    }
}