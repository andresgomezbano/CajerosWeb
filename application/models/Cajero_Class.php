<?php
class Cajero_class extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }

    function initialize()
    {
        $this->banco_id = null;
        $this->nombre = null;
        $this->direccion = null;
        $this->latitud = null;
        $this->longitud = null;
        $this->estado = null;
    }
    
    function guardar()
    {
        unset($this->id);
        $this->db->query($this->db->insert_string('cajero', (array)$this));
        $this->id = $this->db->insert_id();
    }
    
    
    public function consultar()
    {
        return 1;
    }
    
    function listado()
    {
        $sql="select * from materia";
        $query=$this->db->query($sql);
        return $query->result();
    }

}
?>