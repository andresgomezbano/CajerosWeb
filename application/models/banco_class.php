<?php
class Banco_class extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }

    function initialize($datos = NULL)
    {
        if($datos != NULL)
        {
            foreach($datos as $key => $value)$this->$key = $value;
        }
        else
        {
            $this->nombre = null;
            $this->estado = null;
        }
    }
    
    function guardar()
    {
        if(!isset($this->id) || $this->id == NULL)
        {
            unset($this->id);
            $this->db->query($this->db->insert_string('banco', (array)$this));
            $this->id = $this->db->insert_id();
        }
        else
        {
            $id = $this->id;
            unset($this->id);
            $where = "id = ".$id;
            $this->db->query($this->db->update_string('banco', (array)$this, $where));
            $this->id = $id;
        }
    }
    
    function eliminar($id)
    {
        $this->db->query("delete from banco where id = ?",array($id));
    }
    
    public function consultar($id)
    {
        $query = $this->db->query("select * from banco where id = ?", array($id));
        $datos = $query->result();
        $this->initialize($datos[0]);
    }
    
    function listado()
    {
        $sql="select * from banco";
        $query=$this->db->query($sql);
        return $query->result();
    }

}
?>