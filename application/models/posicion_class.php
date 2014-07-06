<?php
class Posicion_class extends CI_Model {
    
    function __construct()
    {
        parent::__construct();
    }

    function initialize($datos = NULL)
    {
        if($datos != NULL)foreach($datos as $key => $value)$this->$key = $value;
        else
        {
            $this->latitud = null;
            $this->longitud = null;
        }
    }
    
    function guardar()
    {
        if(!isset($this->id) || $this->id == NULL)
        {
            unset($this->id);
            $this->db->query($this->db->insert_string('posicion', (array)$this));
            $this->id = $this->db->insert_id();
        }
        else
        {
            $id = $this->id;
            unset($this->id);
            $where = "id = ".$id;
            $this->db->query($this->db->update_string('posicion', (array)$this, $where));
            $this->id = $id;
        }
    }
    
    function eliminar($id)
    {
        $this->db->query("delete from posicion where id = ?",array($id));
    }
    
    public function consultar($id)
    {
        $query = $this->db->query("select * from posicion where id = ?", array($id));
        $datos = $query->result();
        $this->initialize($datos[0]);
    }
    
    function listado($fecha = null)
    {
        $sql="select * from posicion where (? is null or fecha > CAST(? AS DATETIME)) order by id DESC limit 10";
        $query=$this->db->query($sql,array($fecha,$fecha));
        return $query->result();
    }

}
?>