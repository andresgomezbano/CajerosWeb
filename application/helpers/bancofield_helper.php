<?php
    
    function BancoField($nombre,$seleccionado = array())
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
        return form_dropdown($nombre, $datos, $seleccionado);
    }
?>