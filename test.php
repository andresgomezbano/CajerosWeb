<?php
$alumnos= simplexml_load_file('test.xml');
foreach($alumnos->alumnos->alumno as $data)
{
    echo $data->nombre;
}

echo 'test';
echo 'prueba';
echo 'prueba';
echo 'test1';
?>

