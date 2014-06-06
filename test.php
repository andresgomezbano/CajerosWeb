<?php
$alumnos= simplexml_load_file('test.xml');
foreach($alumnos->alumnos->alumno as $data)
{
    echo $data->nombre;
}
?>