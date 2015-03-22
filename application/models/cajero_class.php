<?php
class Cajero_class extends CI_Model {
    
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
            $this->banco_id = null;
            $this->nombre = null;
            $this->horario = null;
            $this->direccion = null;
            $this->latitud = null;
            $this->longitud = null;
            $this->estado = null;   
        }
    }
    
    function guardar()
    {
        if(!isset($this->id) || $this->id == NULL)
        {
            unset($this->id);
            $this->db->query($this->db->insert_string('cajero', (array)$this));
            $this->id = $this->db->insert_id();
        }
        else
        {
            $id = $this->id;
            unset($this->id);
            $where = "id = ".$id;
            $this->db->query($this->db->update_string('cajero', (array)$this, $where));
            $this->id = $id;
        }
    }
    
    function eliminar($id)
    {
        $this->db->query("delete from cajero where id = ?",array($id));
    }
    
    public function consultar($idCajero)
    {
        $query = $this->db->query("select * from cajero where id = ?", array($idCajero));
        $datos = $query->result();
        $this->initialize($datos[0]);
    }
    
    function listado($idBanco)
    {
        $sql="select * from cajero where banco_id = ?";
        $query=$this->db->query($sql,array($idBanco));
        $data = $query->result();
        return $data;
    }
    
    function getCercanos($coordenada)
    {   
        if($coordenada['bancos'] == null or $coordenada['bancos'] == '')
        {
            $coordenada['bancos'] = "-1";
        }
        $sql="SELECT caj.id,ban.id idBanco,ban.nombre nombreBanco,caj.nombre,caj.direccion,caj.latitud, caj.longitud,
                    111.045* DEGREES(ACOS(COS(RADIANS(?))
                               * COS(RADIANS(latitud))
                               * COS(RADIANS(?) - RADIANS(longitud))
                               + SIN(RADIANS(?))
                               * SIN(RADIANS(latitud)))) AS distancia
               FROM 	cajero caj,
                        banco ban
              WHERE 	caj.banco_id = ban.id AND
                      caj.latitud IS NOT NULL AND caj.longitud IS NOT NULL AND (? = -1 or banco_id in (".$coordenada['bancos']."))
              ORDER BY distancia
              LIMIT 25";
        $query=$this->db->query($sql,array($coordenada['latitud'],$coordenada['longitud'],$coordenada['latitud'],$coordenada['bancos']));
        $data = $query->result();
        return $data;
    }
    
    function getLatitud()
    {
        return ($this->latitud != NULL)?$this->latitud :0;
    }
    
    function getLongitud()
    {
        return ($this->longitud != NULL)?$this->longitud :0;
    }

}
?>