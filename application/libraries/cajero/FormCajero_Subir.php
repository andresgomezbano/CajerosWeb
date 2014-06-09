<?php if ( ! defined('BASEPATH')) exit('No se permite acceso directo al script');
include(APPPATH.'libraries/phpexcel/PHPExcel.php'); 
include(APPPATH.'libraries/phpexcel/chunk.php'); 

class FormCajero_Subir {
    
    public function initialize()
    {
        $CI =& get_instance();
        $CI->load->helper('form');
        $this->archivo = form_upload('archivo');
    }
    
    public function obtenerArchivo()
    {
        $CI =& get_instance();
        $CI->load->library('upload');
        if ($CI->upload->do_upload('archivo'))return $CI->upload->data();
        return NULL;
    }
    
    public function procesarExcel()  
    {
        $archivo = $this->obtenerArchivo();
        $inputFileType = 'Excel5';
        $fileName = './uploads/'.$archivo['file_name'];
        //$fileName = './uploads/cajeros.xls';
        $objReader = PHPExcel_IOFactory::createReader($inputFileType);
        $objReader->setReadDataOnly(true);      
        $objPHPExcel = $objReader->load($fileName);
        $sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
        
        $CI =& get_instance();
        $CI->load->model('cajero_class','cajero',TRUE);
        for($i=2;$i<count($sheetData);$i++)
        {
            $CI->cajero->id = NULL;
            $CI->cajero->banco_id = $sheetData[$i]['A'];
            $CI->cajero->nombre = $sheetData[$i]['B'];
            $CI->cajero->direccion = $sheetData[$i]['C']; 
            $CI->cajero->latitud = $sheetData[$i]['E'];
            $CI->cajero->longitud = $sheetData[$i]['F'];
            $CI->cajero->estado = 'AC';
            $CI->cajero->guardar();
        }
    }
    
}