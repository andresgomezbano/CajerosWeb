<?php
$alumnos= simplexml_load_file('test.xml');
foreach($alumnos->alumnos->alumno as $data)
{
    echo $data->nombre;
}
echo 'prueba';
echo 'test1';
?>