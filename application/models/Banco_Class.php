<?php
class Banco_class extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }

    function initialize()
    {
        $this->nombre = null;
        $this->descripcion = null;
        $this->tipo_negocio_id = null;
        $this->estado = null;
    }
    
    function insertar()
    {
        $this->db->query($this->db->insert_string('negocio', (array)$this));
        $this->id = $this->db->insert_id();
    }
    
    
    public function retornar()
    {
        return 1;
    }
    
    function consultar()
    {
        $sql="select * from materia";
        $query=$this->db->query($sql);
        return $query->result();
    }

}
?>